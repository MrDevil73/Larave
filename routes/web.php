<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstCnt;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\LessonController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fst', function () {
    return view('myfirstpage');
});


//Route::get('/a', 'FirstCnt@home');
//Route::get('/about', 'FirstCnt@about');
//Route::get('/contact', 'FirstCnt@contact');
Route::get('/about',[FirstCnt::class,'about'])->name('home.about');
Route::get('/home',[FirstCnt::class,'home'])->middleware('auth')->name('home.home');
Route::get('/register',[FirstCnt::class,'register'])->name('register');
Route::post('/register', [FirstCnt::class, 'store']);

Route::get('/login',[FirstCnt::class,'auth_get'])->name('login');
Route::post('/login', [FirstCnt::class, 'auth_post']);

Route::get('/logout', [FirstCnt::class, 'destroy'])->name('logout');


Route::get('/dbconn',function (){
    return view('dbconn');
});


Route::get('/courses', [CourseController::class, 'index'])->middleware('auth')->name('courses.index');
Route::get('/courses/{course}', [CourseController::class, 'show'])->middleware('auth')->name('courses.show');
Route::post('/courses/{course}/complete', [CourseController::class, 'complete'])->middleware('auth')->name('courses.complete');
Route::get('/lessons/{lesson}', [LessonController::class, 'show'])->middleware('auth')->name('lessons.show');





