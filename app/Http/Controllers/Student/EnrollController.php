<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Validator;


class EnrollController extends Controller
{
    public function create()
    {
        return view('application-form');
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'passport' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'name' => 'required|string|max:255',
        'dob' => 'required|date',
        'sex' => 'required|in:Male,Female',
        'age' => 'required',
        'relationship' => 'required',
        'address' => 'required',
        'state_of_origin' => 'required|string|max:255',
        'place_of_birth' => 'required|string|max:255',
        'nationality' => 'required|string|max:255',
        'type_of_baptism' => 'required|in:Immerse,Under Cross,Sprinkle,None',
        'holy_ghost_baptism' => 'nullable|string|max:255',
        'father_name' => 'required|string|max:255',
        'father_address' => 'required|string|max:255',
        'father_mobile' => 'required|max:55',
        'mother_name' => 'required|string|max:255',
        'mother_address' => 'required|string|max:255',
        'mother_mobile' => 'required|string|max:55',
        'spouse_name' => 'nullable|string|max:255',
        'spouse_address' => 'nullable|string|max:255',
        'spouse_mobile' => 'nullable|max:255',
        'church_name' => 'required|string|max:255',
        'church_location' => 'required|string|max:255',
        'pastor_name' => 'required|string|max:255',
        'pastor_mobile' => 'nullable|max:55',
        'commissioned' => 'required|string|max:255',
        'denomination' => 'required|string|max:255',
        'email' => 'required|email|unique:students,email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Remove dd($request) and log validation errors if any
    if ($validated) {
        //dd($validated);
        // Fetch the latest student to determine the next matric number
        $latestStudent = Student::latest()->first();

        // Generate matric number
        $matricNo = $this->generateMatricNumber($latestStudent);

            if ($request->hasFile('passport')) {
                $uploadCloudinary = cloudinary()->upload(
                    $request->file('passport')->getRealPath(),
                    [
                        'folder' => 'wpsc/students/passport',
                        'resource_type' => 'auto',
                    ]
                );

                // Get the URL and Public ID (Image ID)
                $imageUrl = $uploadCloudinary->getSecurePath(); 
                $imageId = $uploadCloudinary->getPublicId(); 
            }

        // Create a new Student record
        $admission = Student::create([
            'name' => $validated['name'],
            'dob' => $validated['dob'],
            'sex' => $validated['sex'],
            'age' => $validated['age'],
            'relationship' => $validated['relationship'],
            'address' => $validated['address'],
            'state_of_origin' => $validated['state_of_origin'],
            'place_of_birth' => $validated['place_of_birth'],
            'nationality' => $validated['nationality'],
            'type_of_baptism' => $validated['type_of_baptism'],
            'holy_ghost_baptism' => $validated['holy_ghost_baptism'],
            'father_name' => $validated['father_name'],
            'father_address' => $validated['father_address'],
            'father_mobile' => $validated['father_mobile'],
            'mother_name' => $validated['mother_name'],
            'mother_address' => $validated['mother_address'],
            'mother_mobile' => $validated['mother_mobile'],
            'spouse_name' => $validated['spouse_name'],
            'spouse_address' => $validated['spouse_address'],
            'spouse_mobile' => $validated['spouse_mobile'],
            'church_name' => $validated['church_name'],
            'church_location' => $validated['church_location'],
            'pastor_name' => $validated['pastor_name'],
            'pastor_mobile' => $validated['pastor_mobile'] ?? null,
            'commissioned' => $validated['commissioned'],
            'denomination' => $validated['denomination'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'matric_no' => $matricNo,
            'passport' => $imageUrl,
            'passport_id' => $imageId,
        ]);

        return redirect()->back()->with('success', 'Application submitted successfully!');
    } else {
        // If validation fails, return back with errors
        return redirect()->back()->with('error', $validated)->withInput();
    }
}


    /**
     * Generate the matric number based on the latest student record.
     *
     * @param Admission|null $latestStudent
     * @return string
     */
    private function generateMatricNumber($latestStudent)
    {
        $year = date('Y'); // Current year
        $nextNumber = $latestStudent ? (int) substr($latestStudent->matric_no, -3) + 1 : 1;
        return sprintf('EDBTI/%s/%03d', $year, $nextNumber);
    }

}
