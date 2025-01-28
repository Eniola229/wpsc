<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\EnrollController;

//ADMIN
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SermonController;
use App\Http\Controllers\Admin\ImagesController;
use App\Models\Sermon;
use App\Models\Image;

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
    return view('gallary', compact('Anniversarys', 'Sundays', 'Couples'));
});

Route::get('/sermon-single', function () {
    return view('sermon-single');
});


//ENROLL STUDENT 
Route::get('/admission', [EnrollController::class, 'create'])->name('admissions.create');
Route::post('/admission', [EnrollController::class, 'store'])->name('admissions.store');


//ADMIN
Route::get('admin/login', [AdminAuthController::class, 'index'])->name('admin-login');
Route::get('login', [AdminAuthController::class, 'index'])->name('login');
Route::post('post/login', [AdminAuthController::class, 'postLogin'])->name('admin-login.post'); 

Route::get('admin/logout', [AdminAuthController::class, 'logout'])->name('admin-logout');

Route::middleware('auth:admin')->prefix('admin')->group(function () {
 Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin-dashboard');
 Route::get('/sermons', [SermonController::class, 'index'])->name('admin-sermons');
 Route::get('/images', [ImagesController::class, 'index'])->name('admin-images');
 Route::get('/admit-student/{id}', [StudentController::class, 'admitStudent'])->name('admit.student');
 Route::get('/view/student/{id}', [StudentController::class, 'viewStudent'])->name('admit.view.student');
 Route::post('/audio/upload', [SermonController::class, 'upload'])->name('audio.upload');
 Route::get('/audio/{id}', [SermonController::class, 'delete'])->name('audio.delete');
 Route::post('/upload', [ImagesController::class, 'store'])->name('upload.submit');

});