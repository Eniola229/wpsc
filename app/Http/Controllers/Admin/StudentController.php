<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Mail\StudentAdmitted;
use Illuminate\Support\Facades\Mail;


class StudentController extends Controller
{

     public function viewStudent($id)
    {
        // Find the student by ID
        $student = Student::find($id);

        // Check if the student exists
        if (!$student) {
            return redirect()->back()->with('error', 'Student not found.');
        }


        return view('admin.student-details', compact('student'));
    }

    public function admitStudent(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        if ($student->is_admitted === 'NO') {
            // Update the admission status
            $student->is_admitted = 'YES';
            $student->save();

            // Send the email notification
            Mail::to($student->email)->send(new StudentAdmitted($student));

            return redirect()->back()->with('message', 'Student has been admitted and email sent successfully.');
        }

        return redirect()->back()->with('error', 'Student is already admitted.');
    }

    public function deleteStudent($id){
        $studentImage = Product::select('passport', 'passport_id')->where('id', $id)->first();
        cloudinary()->uploadApi()->destroy($studentImage->passport_id);
        Product::where('id', $id)->delete();
        $message = 'Student been deleted successfully';
        session::flash('success_message', $message);
        return back();
    }

}
