<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/course', [CourseController::class, 'index']);
Route::get('/course/{slug}', [CourseController::class, 'detail']);
Route::post('/course/{slug}', [CourseController::class, 'enroll']);

Route::post('/review/{course_id}', [ReviewController::class, 'store'])->name('review.post');

Route::get('/profile/{nim}', [ProfileController::class, 'index'])->name('profile.index');
Route::post('/profile/{nim}', [ProfileController::class, 'changeProfile']);

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
    Route::post('/register', [RegisterController::class, 'registerProcess'])->name('register.process');

    Route::get("/login", [LoginController::class, 'index']);
    Route::post("/login", [LoginController::class, 'authenticate']);
});

Route::get("/logout", [LoginController::class, 'logout'])->middleware('auth');

// Route::get('/about', function () {
//     return view('pages.')
// });

// Route::get('/admin', function () {
//     return redirect(route('filament.admin.auth.login'));
// })->name('login');
