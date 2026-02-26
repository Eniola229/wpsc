<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\EnrollController;

// ADMIN CONTROLLERS
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SermonController;
use App\Http\Controllers\Admin\ImagesController;

// STUDENT PORTAL CONTROLLER
use App\Http\Controllers\StudentAuthController;

use App\Models\Sermon;
use App\Models\Image;

/*
|--------------------------------------------------------------------------
| Public Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sermons', function () {
    $sermons = Sermon::orderBy('created_at', 'desc')->get();
    return view('sermons', compact('sermons'));
});

Route::get('/ministry', function () {
    return view('ministry');
});

Route::get('/events', function () {
    return view('events');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/EDBTI', function () {
    return view('EDBTI');
});

Route::get('/give', function () {
    return view('give');
});

Route::get('/thanks', function () {
    return view('thanks');
});

Route::get('/gallery', function () {
    $Anniversarys = Image::orderBy('created_at', 'desc')->where('category', 'Anniversary')->get();
    $Sundays = Image::orderBy('created_at', 'desc')->where('category', 'Sunday School')->get();
    $Couples = Image::orderBy('created_at', 'desc')->where('category', 'Couples Dinner')->get();
    $EDBTIs = Image::orderBy('created_at', 'desc')->where('category', 'EDBTI')->get();
    return view('gallary', compact('Anniversarys', 'Sundays', 'Couples', 'EDBTIs'));
});

Route::get('/sermon-single', function () {
    return view('sermon-single');
});


/*
|--------------------------------------------------------------------------
| Student Enrollment (Public)
|--------------------------------------------------------------------------
*/

Route::get('/admission', [EnrollController::class, 'create'])->name('admissions.create');
Route::post('/admission', [EnrollController::class, 'store'])->name('admissions.store');


/*
|--------------------------------------------------------------------------
| Student Portal Routes (Frontend)
|--------------------------------------------------------------------------
*/

// Student Login
Route::get('student/login', [StudentAuthController::class, 'showLogin'])->name('student.login');
Route::post('student/login', [StudentAuthController::class, 'login'])->name('student.login.post');

// Student Protected Routes
Route::prefix('student')->group(function () {
    Route::get('/dashboard', [StudentAuthController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/result/{id}', [StudentAuthController::class, 'viewResult'])->name('student.result');
    Route::get('/certificate/{id}', [StudentAuthController::class, 'printCertificate'])->name('student.certificate');
    Route::get('/logout', [StudentAuthController::class, 'logout'])->name('student.logout');
});


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

// Admin Login (Unprotected)
Route::get('admin/login', [AdminAuthController::class, 'index'])->name('admin-login');
Route::get('login', [AdminAuthController::class, 'index'])->name('login');
Route::post('post/login', [AdminAuthController::class, 'postLogin'])->name('admin-login.post'); 
Route::get('admin/logout', [AdminAuthController::class, 'logout'])->name('admin-logout');

// Admin Protected Routes
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    
    // Dashboard & Main Views
    Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin-dashboard');
    
    // Sermons Management
    Route::get('/sermons', [SermonController::class, 'index'])->name('admin-sermons');
    Route::post('/audio/upload', [SermonController::class, 'upload'])->name('audio.upload');
    Route::get('/audio/{id}', [SermonController::class, 'delete'])->name('audio.delete');
    
    // Images Management
    Route::get('/images', [ImagesController::class, 'index'])->name('admin-images');
    Route::post('/upload', [ImagesController::class, 'store'])->name('upload.submit');

    // Student Management & Results
    
    // Student Management
    Route::get('/view/student/{id}', [StudentController::class, 'viewStudent'])->name('admin.view.student');
    Route::get('/admit-student/{id}', [StudentController::class, 'admitStudent'])->name('admit.student');
    
    // NEW: Result Upload Routes
    Route::get('/upload-result/{id}', [StudentController::class, 'uploadResult'])->name('admin.upload.result');
    Route::post('/store-result/{id}', [StudentController::class, 'storeResult'])->name('admin.store.result');

});