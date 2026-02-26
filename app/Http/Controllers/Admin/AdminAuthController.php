<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Admin;
use Hash;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Student;
use App\Models\Sermon;
use App\Models\StudentResult;
use App\Models\ResultItem;

class AdminAuthController extends Controller
{
    /**
     * Show the login page.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.login');
    }  

    /**
     * Show the registration page.
     *
     * @return View
     */
    public function registration(): View
    {
        return view('admin.registration');
    }

    /**
     * Handle login request.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        
        // Use the 'admins' guard for authentication
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('admin/dashboard')
                        ->withSuccess('You have successfully logged in');
        }

        return redirect("admin/login")->with('error', 'Oops! You have entered invalid credentials');
    }

    /**
     * Handle registration request.
     *
     * @param Request $request
     * @return RedirectResponse
     */
        public function postRegistration(Request $request): RedirectResponse
        {  
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:admins',
                'mobile' => 'required|numeric|unique:admins',
                'password' => 'required|min:6',
            ]);

            // Hash the password before saving to the database
            $data = $request->all();
            $data['password'] = bcrypt($data['password']);

            // Use updateOrCreate to either update or create a new admin record
            $admin = Admin::updateOrCreate(
                [
                    'email' => $data['email'], // Search by email
                ],
                [
                    'name' => $data['name'],
                    'mobile' => $data['mobile'],
                    'password' => $data['password'],
                ]
            );

            return redirect()->back()->with('message', 'Great! The admin record has been successfully updated or created.');
        }
    /**
     * Show the admin dashboard.
     *
     * @return View|RedirectResponse
     */
    public function dashboard(Request $request)
    {
        // ── Build the student query ──────────────────────────────────────
        $query = Student::query()->orderBy('created_at', 'desc');

        // Filter by year extracted from matric_no (format: EDBTI/2026/001)
        if ($request->filled('year')) {
            // The year sits in the middle segment, so we match EDBTI/{year}/
            $query->where('matric_no', 'like', '%/' . $request->year . '/%');
        }

        // Search by name OR full matric number
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('matric_no', 'like', '%' . $search . '%');
            });
        }

        $students = $query->get();

        // ── Build year list for the dropdown ────────────────────────────
        // Pull distinct years from all matric numbers so the dropdown is always accurate.
        // matric_no format: EDBTI/YYYY/NNN  →  explode on '/' →  index [1] is the year.
        $matricYears = Student::pluck('matric_no')
            ->map(function ($matric) {
                $parts = explode('/', $matric);
                return isset($parts[1]) ? $parts[1] : null;
            })
            ->filter()           // remove nulls
            ->unique()
            ->sortDesc()         // most recent year first
            ->values();

        // ── Counts for the stat cards ────────────────────────────────────
        $studentCount = Student::count();
        $sermonCount  = Sermon::count(); // swap model name if needed

        return view('admin.dashboard', compact(
            'students',
            'matricYears',
            'studentCount',
            'sermonCount'
        ));
    }
    /**
     * Create a new admin instance.
     *
     * @param array $data
     * @return Admin
     */
    public function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Handle admin logout.
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::guard('admin')->logout();

        return redirect('admin/login');
    }

        public function viewStudent($id)
    {
        $student = Student::findOrFail($id);
        $results = StudentResult::where('student_id', $id)->orderBy('created_at', 'desc')->get();
        return view('admin.view-student', compact('student', 'results'));
    }

    // public function admitStudent($id)
    // {
    //     $student = Student::findOrFail($id);
    //     $student->is_admitted = 'YES';
    //     $student->save();
    //     return back()->with('message', 'Student has been admitted successfully.');
    // }

    public function uploadResult($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.upload-result', compact('student'));
    }

    public function storeResult(Request $request, $id)
    {
        $request->validate([
            'session' => 'required',
            'level' => 'required',
            'total_score' => 'required|numeric',
            'courses' => 'required|array',
        ]);

        // Create the main result
        $result = StudentResult::create([
            'student_id' => $id,
            'session' => $request->session,
            'level' => $request->level,
            'assignment_score' => $request->assignment_score ?? 0,
            'assignment_grade' => $request->assignment_grade ?? 'N/A',
            'test_score' => $request->test_score ?? 0,
            'test_grade' => $request->test_grade ?? 'N/A',
            'total_score' => $request->total_score,
            'total_grade' => $request->total_grade,
            'total_remark' => $request->total_remark,
        ]);

        // Create the course items
        foreach ($request->courses as $course) {
            if (!empty($course['name'])) {
                ResultItem::create([
                    'student_result_id' => $result->id,
                    'course_name' => $course['name'],
                    'score' => $course['score'],
                    'grade' => $course['grade'],
                    'remark' => $course['remark'],
                ]);
            }
        }

        return redirect()->route('admin.view.student', $id)->with('message', 'Result Uploaded Successfully!');
    }
}
