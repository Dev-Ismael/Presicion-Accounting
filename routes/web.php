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

Route::get('/test', [App\Http\Controllers\TestController::class, 'index'])->name('test');


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class, 'post'])->name('post');
Route::get('/service/{slug}', [App\Http\Controllers\ServiceController::class, 'index'])->name('service');


Route::get('/resources', [App\Http\Controllers\ResourceController::class, 'index'])->name('resources');
Route::get('/{slug}', [App\Http\Controllers\TaxcenterController::class, 'index'])->name('tax_center');

/*===========================================================================
========== Admin Routes =====================================================
===========================================================================*/

Route::group([ "prefix" => "admin" , 'middleware' => "admin" , "as" => "admin." ] , function(){


    // Dashboard
    Route::get('/dashboard' , [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');


    // profile
    Route::get('profile/edit' , [App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name("profile.edit");
    Route::put('profile/update' , [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name("profile.update");


    // articles
    Route::get('article/perPage/{num}' , [App\Http\Controllers\Admin\ArticleController::class, 'perPage'])->name("article.perPage");
    Route::post('article/search' , [App\Http\Controllers\Admin\ArticleController::class, 'search'])->name("article.search");
    Route::post('article/multiAction' , [App\Http\Controllers\Admin\ArticleController::class, 'multiAction'])->name("article.multiAction");
    Route::resource('article', App\Http\Controllers\Admin\ArticleController::class);
    Route::get('article/destroy/{id}' , [App\Http\Controllers\Admin\ArticleController::class, 'destroy'] )->name("article.destroy");



    // resources
    Route::get('resource/perPage/{num}' , [App\Http\Controllers\Admin\ResourceController::class, 'perPage'])->name("resource.perPage");
    Route::post('resource/search' , [App\Http\Controllers\Admin\ResourceController::class, 'search'])->name("resource.search");
    Route::post('resource/multiAction' , [App\Http\Controllers\Admin\ResourceController::class, 'multiAction'])->name("resource.multiAction");
    Route::resource('resource', App\Http\Controllers\Admin\ResourceController::class);
    Route::get('resource/destroy/{id}' , [App\Http\Controllers\Admin\ResourceController::class, 'destroy'] )->name("resource.destroy");



    // members
    Route::get('member/perPage/{num}' , [App\Http\Controllers\Admin\MemberController::class, 'perPage'])->name("member.perPage");
    Route::post('member/search' , [App\Http\Controllers\Admin\MemberController::class, 'search'])->name("member.search");
    Route::post('member/multiAction' , [App\Http\Controllers\Admin\MemberController::class, 'multiAction'])->name("member.multiAction");
    Route::resource('member', App\Http\Controllers\Admin\MemberController::class);
    Route::get('member/destroy/{id}' , [App\Http\Controllers\Admin\MemberController::class, 'destroy'] )->name("member.destroy");



    // tax_center
    Route::get('tax_center/perPage/{num}' , [App\Http\Controllers\Admin\TaxCenterController::class, 'perPage'])->name("tax_center.perPage");
    Route::post('tax_center/search' , [App\Http\Controllers\Admin\TaxCenterController::class, 'search'])->name("tax_center.search");
    Route::post('tax_center/multiAction' , [App\Http\Controllers\Admin\TaxCenterController::class, 'multiAction'])->name("tax_center.multiAction");
    Route::resource('tax_center', App\Http\Controllers\Admin\TaxCenterController::class);
    Route::get('tax_center/destroy/{id}' , [App\Http\Controllers\Admin\TaxCenterController::class, 'destroy'] )->name("tax_center.destroy");



    // service
    Route::get('service/perPage/{num}' , [App\Http\Controllers\Admin\ServiceController::class, 'perPage'])->name("service.perPage");
    Route::post('service/search' , [App\Http\Controllers\Admin\ServiceController::class, 'search'])->name("service.search");
    Route::post('service/multiAction' , [App\Http\Controllers\Admin\ServiceController::class, 'multiAction'])->name("service.multiAction");
    Route::resource('service', App\Http\Controllers\Admin\ServiceController::class);
    Route::get('service/destroy/{id}' , [App\Http\Controllers\Admin\ServiceController::class, 'destroy'] )->name("service.destroy");


    // testimonial
    Route::get('testimonial/perPage/{num}' , [App\Http\Controllers\Admin\TestimonialController::class, 'perPage'])->name("testimonial.perPage");
    Route::post('testimonial/search' , [App\Http\Controllers\Admin\TestimonialController::class, 'search'])->name("testimonial.search");
    Route::post('testimonial/multiAction' , [App\Http\Controllers\Admin\TestimonialController::class, 'multiAction'])->name("testimonial.multiAction");
    Route::resource('testimonial', App\Http\Controllers\Admin\TestimonialController::class);
    Route::get('testimonial/destroy/{id}' , [App\Http\Controllers\Admin\TestimonialController::class, 'destroy'] )->name("testimonial.destroy");


    // setting
    Route::get('setting/edit' , [App\Http\Controllers\Admin\SettingController::class, 'edit'])->name("setting.edit");
    Route::put('setting/update' , [App\Http\Controllers\Admin\SettingController::class, 'update'])->name("setting.update");

});
