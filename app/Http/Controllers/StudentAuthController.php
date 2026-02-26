<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentResult;

class StudentAuthController extends Controller
{
    public function showLogin()
    {
        return view('student.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'matric_no' => 'required',
            'password' => 'required',
        ]);

        $student = Student::where('matric_no', $request->matric_no)->first();

        if ($student && \Hash::check($request->password, $student->password)) {
            session(['student_id' => $student->id]);
            return redirect()->route('student.dashboard');
        }

        return back()->with('error', 'Invalid Matric No or Password');
    }

    public function dashboard()
    {
        if (!session('student_id')) return redirect()->route('student.login');
        
        $student = Student::find(session('student_id'));
        $results = StudentResult::where('student_id', $student->id)->orderBy('created_at', 'desc')->get();
        
        return view('student.dashboard', compact('student', 'results'));
    }

    public function viewResult($id)
    {
        if (!session('student_id')) return redirect()->route('student.login');
        
        $student = Student::find(session('student_id'));
        $result = StudentResult::with('items')->findOrFail($id);

        if ($result->student_id !== $student->id) { abort(403); }

        return view('student.result', compact('student', 'result'));
    }

    public function printCertificate($id)
    {
        if (!session('student_id')) return redirect()->route('student.login');
        
        $student = Student::find(session('student_id'));
        $result = StudentResult::with('items')->findOrFail($id);

        if ($result->student_id !== $student->id) { abort(403); }

        return view('student.certificate', compact('student', 'result'));
    }

    public function logout()
    {
        session()->forget('student_id');
        return redirect()->route('student.login');
    }
}