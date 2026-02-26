<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\StudentResult;
use App\Models\ResultItem;
use App\Mail\StudentAdmitted;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{
    public function viewStudent($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return redirect()->back()->with('error', 'Student not found.');
        }

        // ✅ FIX: load results with their course items
        $results = StudentResult::with('items')
                    ->where('student_id', $id)
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('admin.student-details', compact('student', 'results'));
    }

    public function admitStudent(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        if ($student->is_admitted === 'NO') {
            $student->is_admitted = 'YES';
            $student->save();
            try {
                Mail::to($student->email)->send(new StudentAdmitted($student));
                return redirect()->back()->with('message', 'Student has been admitted and email sent successfully.');
            } catch (\Exception $e) {
                \Log::error('Admission email failed for student ' . $student->name . ': ' . $e->getMessage());
                return redirect()->back()->with('message', 'Student has been admitted.');
            }
        }
        return redirect()->back()->with('error', 'Student is already admitted.');
    }

    public function deleteStudent($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return back()->with('message', 'Student has been deleted successfully.');
    }

    public function uploadResult($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.upload-result', compact('student'));
    }

public function storeResult(Request $request, $id)
{
    $request->validate([
        'session'          => 'required|string',
        'level'            => 'required|string',
        'total_score'      => 'required|numeric',
        'total_grade'      => 'required|string',
        'total_remark'     => 'required|string',
        'courses'          => 'required|array|min:1',
        'courses.*.name'   => 'required|string',
        'courses.*.score'  => 'required|numeric',
        'courses.*.grade'  => 'required|string',
        'courses.*.remark' => 'required|string',
    ]);

    $result = StudentResult::create([
        'student_id'          => $id,
        'session'             => $request->session,
        'level'               => $request->level,
        'assignment_score'    => $request->assignment_score    ?? null,
        'assignment_grade'    => $request->assignment_grade    ?? null,
        'assignment_position' => $request->assignment_position ?? null,
        'test_score'          => $request->test_score          ?? null,
        'test_grade'          => $request->test_grade          ?? null,
        'test_position'       => $request->test_position       ?? null,
        'total_score'         => $request->total_score,
        'total_grade'         => $request->total_grade,
        'total_remark'        => $request->total_remark,
        'certificate_date'    => $request->certificate_date    ?? null,
        'class_size'          => $request->class_size          ?? null,
        'class_position'      => $request->class_position      ?? null,
        'overall_position'    => $request->overall_position    ?? null,
    ]);

    foreach ($request->courses as $course) {
        if (!empty($course['name'])) {
            ResultItem::create([
                'student_result_id'  => $result->id,
                'course_name'        => $course['name'],
                'course_code'        => $course['code']               ?? null,
                'score'              => $course['score'],
                'grade'              => $course['grade'],
                'remark'             => $course['remark'],
                'position_in_course' => $course['position_in_course'] ?? null,
            ]);
        }
    }

    if ($request->ajax() || $request->wantsJson()) {
        return response()->json([
            'success'  => true,
            'message'  => 'Result uploaded successfully!',
            'redirect' => route('admin.view.student', $id),
        ], 200);
    }

    // Fallback for non-JS browsers
    return redirect()->route('admin.view.student', $id)->with('message', 'Result Uploaded Successfully!');
}
}