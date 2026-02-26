<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\View\View;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ImagesController extends Controller
{
    public function index(): View
    {
        return view('admin.images');
    }  

    public function store(Request $request)
    {
        $request->validate([
            'images'   => 'required|array|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif',
            'category' => 'required|in:Anniversary,Sunday School,Couples Dinner,EDBTI',
        ]);

        $uploadedImages = [];

        foreach ($request->file('images') as $image) {

            $imagePath = $image->getRealPath();

            if ($image->getSize() > 10 * 1024 * 1024) {
                $imagePath = $this->resizeWithGD($image);
            }

            $upload = Cloudinary::upload($imagePath, [
                'folder' => 'laravel_images',
            ]);

            // Clean up temp file if we created one
            if ($imagePath !== $image->getRealPath()) {
                @unlink($imagePath);
            }

            $uploadedImages[] = [
                'public_id' => $upload->getPublicId(),
                'url'       => $upload->getSecurePath(),
                'category'  => $request->category,
            ];
        }

        Image::insert($uploadedImages);

        return redirect()->back()->with('message', 'Images uploaded successfully!');
    }

    private function resizeWithGD($imageFile): string
    {
        $path = $imageFile->getRealPath();
        $mime = $imageFile->getMimeType();

        // Create image resource from the uploaded file
        $source = match($mime) {
            'image/png'  => imagecreatefrompng($path),
            'image/gif'  => imagecreatefromgif($path),
            default      => imagecreatefromjpeg($path),
        };

        $quality  = 85;
        $scale    = 90;
        $tmpPath  = sys_get_temp_dir() . '/' . uniqid('img_', true) . '.jpg';
        $origW    = imagesx($source);
        $origH    = imagesy($source);

        do {
            $newW = (int) ($origW * $scale / 100);
            $newH = (int) ($origH * $scale / 100);

            // Create a true color canvas and copy resized image onto it
            $canvas = imagecreatetruecolor($newW, $newH);

            // Preserve transparency for PNG/GIF
            imagealphablending($canvas, false);
            imagesavealpha($canvas, true);

            imagecopyresampled($canvas, $source, 0, 0, 0, 0, $newW, $newH, $origW, $origH);

            imagejpeg($canvas, $tmpPath, $quality);
            imagedestroy($canvas);

            $quality -= 5;
            $scale   -= 5;

        } while (filesize($tmpPath) > 10 * 1024 * 1024 && $quality > 10 && $scale > 10);

        imagedestroy($source);

        return $tmpPath;
    }
}