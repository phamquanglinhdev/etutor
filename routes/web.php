<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('index');
Route::get('/tag/{slug}',[\App\Http\Controllers\TagFrontendController::class,'index','id'])->where(
    ['slug']
)->name('tag');
Route::get('/course/{slug}',[\App\Http\Controllers\CourseFrontendController::class,'index','id'])->where(
    ['slug']
)->name('course');
Route::get('/post/{slug}',[\App\Http\Controllers\PostFrondendController::class,'index','id'])->where(
    ['slug']
)->name('post');
Route::get('/teacher/{id}',[\App\Http\Controllers\TeacherFrontendController::class,'index','id'])->where(
    ['id']
)->name('teacher');
Route::get('/teachers/{type}',[\App\Http\Controllers\ListTeacherController::class,'makeData','type'])->where(
    ['type']
)->name('teachers');
Route::get('posts/{slug}',[\App\Http\Controllers\ListPostFrontendController::class,'index','id'])->where(
    ['slug']
)->name('posts');
Route::get('/booking/{key}',[\App\Http\Controllers\BookingController::class,'index','id'])->where(
    ['key']
)->name('booking');
Route::get('/preview/{url}',[\App\Http\Controllers\PreviewCourseController::class,'index','id'])->where(
    ['url']
)->name('preview');
Route::post('/',[\App\Http\Controllers\SaveCustomerController::class,'save'])->name('save.customer');
Route::post('/teacher/{id}',[\App\Http\Controllers\TeacherFrontendController::class,'save'])->name('save.comment');
Route::get('/teacher/{teacher}/delete/{id}',[\App\Http\Controllers\TeacherFrontendController::class,'delete',['teacher','id']])->where(['teacher','id'])->name('delete.comment');
Route::get('page/{type}',[\App\Http\Controllers\FrontendPageController::class,'getData','type'])->where(['data'])->name('page');
Route::any('/teachers/',[\App\Http\Controllers\Filter::class,'index'])->name('filter');
