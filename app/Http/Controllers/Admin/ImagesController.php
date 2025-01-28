<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ImagesController extends Controller
{
    public function index()
    {
        return view('admin.images');
    }  

    // Handle image upload
    public function store(Request $request)
    {
        $request->validate([
            'images' => 'required|array|max:5',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|in:Anniversary,Sunday School,Couples Dinner',
        ]);

        $uploadedImages = [];

        foreach ($request->file('images') as $image) {
            $upload = Cloudinary::upload($image->getRealPath(), [
                'folder' => 'laravel_images',
            ]);

            $uploadedImages[] = [
                'public_id' => $upload->getPublicId(),
                'url' => $upload->getSecurePath(),
                'category' => $request->category,
            ];
        }

        // Save images to the database
        Image::insert($uploadedImages);

        return redirect()->back()->with('message', 'Images uploaded successfully!');
    }
}
