<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sermon;
use App\Mail\StudentAdmitted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class SermonController extends Controller
{
     public function index()
    {
        $sermons = Sermon::orderBy('created_at', 'desc')->get();
        return view('admin.sermons', compact('sermons'));
    }


public function upload(Request $request)
{
    try {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'audio' => 'required|mimes:mp3,wav,ogg|max:100000',
        ]);

        // Check if the audio file is present
        if ($request->hasFile('audio')) {
            // Upload the audio file to Cloudinary
            $uploadCloudinary = cloudinary()->upload(
                $request->file('audio')->getRealPath(),
                [
                    'folder' => 'sermons', 
                    'resource_type' => 'auto', // Automatically detect file type (audio, video, etc.)
                ]
            );

            // Access the secure URL and public ID from the upload response
            $audioUrl = $uploadCloudinary->getSecurePath();
            $audioId = $uploadCloudinary->getPublicId();

            // Save audio information in the database
            $audioModel = new \App\Models\Sermon();
            $audioModel->title = $validated['title'];
            $audioModel->audio_url = $audioUrl;
            $audioModel->audio_id = $audioId;
            $audioModel->save();

            return response()->json(['message' => 'Sermon uploaded successfully!']);
        }

        // If no file is provided
        return response()->json(['message' => 'No audio file uploaded.'], 400);

    } catch (\Exception $e) {
        Log::error('Audio upload error: ' . $e->getMessage());
        return response()->json([
            'message' => 'An error occurred while uploading the audio.',
            'error' => $e->getMessage(), // Include the error message for debugging
        ], 500);
    }
}
public function delete($id)
{
    try {
        // Find the sermon by its ID
        $sermon = Sermon::findOrFail($id);

        // // Delete from Cloudinary
        // $response = Cloudinary::destroy($sermon->audio_id, ['resource_type' => 'audio']);

        // Delete the sermon record from the database
        $sermon->delete();

        return response()->json(['message' => 'Sermon deleted successfully!']);
    } catch (\Exception $e) {
        Log::error('Error deleting sermon: ' . $e->getMessage());
        return response()->json(['message' => 'An error occurred while deleting the sermon. ' . $e->getMessage()], 500);
    }
}
}
