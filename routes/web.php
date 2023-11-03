<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::middleware(['auth'])->group(function(){

    Route::controller(TopicController::class)->group(function()
    {
        Route::get('/', 'index')->name('topic.index');
        Route::post('topic/store', 'store')->name('topic.store');
        Route::delete('topic/{topic}/delete', 'delete')->name('topic.delete');
        Route::get('topic/{topic}/edit', 'edit')->name('topic.edit');
        Route::put('topic/{topic}/update', 'update')->name('topic.update');
        Route::get('topic/create', 'create')->name('topic.create');
    });

    Route::controller(PostController::class)->group(function()
    {
        Route::get('topic/{topic}/posts', 'index')->name('post.index');
        Route::get('post/{post}', 'show')->name('post.show');
        Route::post('topic/{topic}/post/store', 'store')->name('post.store');
        Route::delete('topic/{topic}/post/{post}/delete', 'delete')->name('post.delete');
        Route::get('topic/{topic}/post/{post}/edit', 'edit')->name('post.edit');
        Route::patch('topic/{topic}/post/{post}/update', 'update')->name('post.update');
        Route::get('topic/{topic}/post/{post}/show', 'show')->name('post.show');
        Route::get('topic/{topic}/post/create', 'create')->name('post.create');
    });

    Route::controller(CommentController::class)->group(function ()
    {
        Route::post('topic/{topic}/post/{post}/comment/store', 'store')->name('comment.store');
        Route::delete('topic/{topic}/post/{post}/comment/{comment}/delete', 'delete')->name('comment.delete');
    });

    Route::controller(UserController::class)->group(function()
    {
        Route::get('user/{user_id}', 'show')->name('user.show');
        Route::get('user/edit/profile', 'profile')->name('user.profile');
        Route::put('user/update/profile', 'update_profile')->name('user.update_profile');
        Route::get('user/edit/email', 'email')->name('user.email');
        Route::get('user/edit/password', 'password')->name('user.password');
    });

    Route::get('/logout',[AuthenticationController::class,'logout'])->name('logout');
});


Route::middleware(['guest'])->controller(AuthenticationController::class)->group(function()
{
    Route::get('login','showLogin')->name('login');
    Route::get('registration', 'showRegistration')->name('registration');
    Route::post('login/login','login')->name('loginAuth');
    Route::post('registration/reg','registration')->name('registrationAuth');
});

