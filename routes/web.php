<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'showBlogs'])->name('home');
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

Route::get('/blogs/search-blog', [BlogController::class, 'searchBlogs'])->name('searchblog');
Route::get('/blogs/search', [BlogController::class, 'search'])->name('search');
// Route::get('/blogs/search/{query}', [BlogController::class, 'search'])->name('search');

Route::get('/blogs/{id}', [BlogController::class, 'viewSingleBlog'])->name('singleView');

Route::get('/create-blog', [BlogController::class, 'createBlog'])->name('createblog');
// Route::get('/blogs/create', [BlogController::class, 'createBlog'])->name('blog');
Route::post('/blogs/create', [BlogController::class, 'addBlog'])->name('createBlog');

Route::get('/blogs/edit/{id}', [BlogController::class, 'editPage'])->name('editPage');
Route::post('/blogs/update{id}', [BlogController::class, 'updateBlog'])->name('updateblog');


Route::delete('/blogs/delete{id}', [BlogController::class, 'deleteBlog'])->name('deleteblog');
