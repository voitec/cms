<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\ContactMailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\UserController;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
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

Route::get('/',[SectionController::class, 'index'])->name('home');

Route::middleware(['auth','verified','can:isWriter','can:isActive'])->group(function () {
    Route::get('/user/passwordReset', [UserController::class, 'passwordReset'])->name('user.passwordReset');
    Route::post('/user/passwordStore', [UserController::class, 'passwordStore'])->name('user.passwordStore');
    Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.image-upload');
    Route::resource('section',SectionController::class)->except(['index', 'show']);
    Route::name('section.')->group(function () {
        Route::get('/section/confirm/{section}',[SectionController::class, 'confirm'])->name('confirm');
        Route::get('/section/up/{section}',[SectionController::class, 'up'])->name('up');
        Route::get('/section/down/{section}',[SectionController::class, 'down'])->name('down');
        Route::get('/section/changeStatus/{section}',[SectionController::class, 'changeStatus'])->name('changeStatus');
    });
    Route::resource('post', PostController::class)->except(['index', 'show']);
    Route::name('post.')->group(function () {
        Route::get('/post/confirm/{post}',[PostController::class, 'confirm'])->name('confirm');
        //Route::get('/post/changeStatus/{post}',[PostController::class, 'changeStatus'])->name('changeStatus');
    });
    Route::middleware(['can:isAdmin'])->group(function (){
        Route::resource('user', UserController::class)->except('show', 'destroy');
        Route::get('/user/changeStatus/{user}',[UserController::class, 'changeStatus'])->name('user.changeStatus');
        Route::resource('category', CategoryController::class)->except('show');
        Route::name('category.')->group(function () {
            Route::get('/category/confirm/{category}',[CategoryController::class, 'confirm'])->name('confirm');
            Route::get('/category/changeStatus/{category}',[CategoryController::class, 'changeStatus'])->name('changeStatus');
        });
    });
});

Route::name('post.')->group(function () {
    Route::get('/post/category/{category}', [PostController::class, 'index'])->name('index');
    Route::get('/post', [PostController::class, 'indexAll'])->name('indexAll');
    Route::get('/post/{post}', [PostController::class, 'show'])->name('show');
});
Route::post('/email', [ContactMailController::class, 'store'])->name('email');
