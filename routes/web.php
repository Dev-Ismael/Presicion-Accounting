<?php

use Illuminate\Support\Facades\Auth;
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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class, 'post'])->name('post');
Route::get('/resources', [App\Http\Controllers\ResourceController::class, 'index'])->name('resources');
Route::get('/service/{slug}', [App\Http\Controllers\ServiceController::class, 'index'])->name('service');
Route::get('/tax_center/{slug}', [App\Http\Controllers\TaxcenterController::class, 'index'])->name('tax_center');

/*===========================================================================
========== Admin Routes =====================================================
===========================================================================*/

Route::group([ "prefix" => "admin" , 'middleware'=> 'admin' , "as" => "admin." ] , function(){


    // Posts
    Route::get('posts/perPage/{num}' , [App\Http\Controllers\Admin\PostController::class, 'perPage'])->name("posts.perPage");
    Route::post('posts/search' , [App\Http\Controllers\Admin\PostController::class, 'search'])->name("posts.search");
    Route::post('posts/multiAction' , [App\Http\Controllers\Admin\PostController::class, 'multiAction'])->name("posts.multiAction");
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class);
    Route::get('posts/destroy/{id}' , [App\Http\Controllers\Admin\PostController::class, 'destroy'] )->name("posts.destroy");


});
