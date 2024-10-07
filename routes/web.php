<?php

use App\Http\Middleware\ValidUser;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;

Route::get('/', [BlogController::class, 'showBlogs'])->name('home');
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::post('/contact', [UserController::class, 'userQueries'])->middleware(ValidUser::class)->name('contact');
Route::controller(BlogController::class)->group(function(){
    Route::get('/blogs/search-blog', 'searchBlogs')->name('searchblog');
    Route::get('/blogs/search','search')->name('search');
    // Route::get('/blogs/search/{query}', [BlogController::class, 'search'])->name('search');
    
    Route::get('/blogs/{id}', 'viewSingleBlog')->name('singleView');
    
    Route::get('/create-blog', 'createBlog')->name('createblog')->middleware(ValidUser::class);
    // Route::get('/blogs/create', [BlogController::class, 'createBlog'])->name('blog');
    Route::post('/blogs/create', 'addBlog')->name('createBlog');
    
    Route::get('/blogs/edit/{id}', 'editPage')->name('editPage')->middleware(Authenticate::class);
    Route::post('/blogs/update{id}',  'updateBlog')->name('updateblog')->middleware(Authenticate::class);
    
    
    Route::delete('/blogs/delete{id}', 'deleteBlog')->name('deleteblog')->middleware(Authenticate::class);
});

Route::get('/login', function(){
    return view('auth.login');
})->name('login');
Route::get('/signup', function(){
    return view('auth.register');
})->name('signup');
Route::post('/signup', [UserController::class, 'register'])->name('registerSave');
Route::post('/login', [UserController::class, 'login'])->name('loginMatch');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [UserController::class, 'forgot'])->name('forgot');
Route::post('/forgot-password', [UserController::class, 'forgotPassword'])->name('forgot');
// Route::get('/set-password/{query}', [UserController::class, 'setPassword'])->name('setPassword');
// Route::post('/set-password/{query}', [UserController::class, 'resetPassword'])->name('resetPassword');

Route::get('/set-password/{token}', [UserController::class, 'setPassword'])->name('setPassword');
Route::post('/set-password/{token}', [UserController::class, 'resetPassword'])->name('resetPassword');

Route::post('/blogs/{blog}/comments', [CommentController::class, 'store'])->name('comments.store');