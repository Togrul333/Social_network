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

Route::get('/',[\App\Http\Controllers\HomeController::class,'index'])->name('home');


// User
Route::get('/users',[\App\Http\Controllers\AuthController::class,'users'])->middleware('auth');
Route::post('/register',[\App\Http\Controllers\AuthController::class,'registerPost'])->middleware('guest')->name('registerPost');

Route::post('/loginPost',[\App\Http\Controllers\AuthController::class,'loginPost'])->middleware('guest')->name('loginPost');

Route::get('/logout',[\App\Http\Controllers\AuthController::class,'logout'])->name('logout');

//search
Route::get('/search',[\App\Http\Controllers\SearchController::class,'index'])->name('search');
Route::get('/user/{name}',[\App\Http\Controllers\ProfileController::class,'profile'])->name('profile');


//friends
Route::get('/friends/add/{name}',[\App\Http\Controllers\FriendController::class,'index'])->name('addFriend');
Route::get('/friends/accept/{name}',[\App\Http\Controllers\FriendController::class,'accept'])->name('acceptFriend');
Route::get('/friends/delete/{name}',[\App\Http\Controllers\FriendController::class,'delete'])->name('deleteFriend');


//stena
Route::post('/status',[\App\Http\Controllers\StatusController::class,'index'])->name('status');
Route::get('/statuses',[\App\Http\Controllers\StatusController::class,'statuses'])->name('statuses');

Route::post('/comment/{statusId}',[\App\Http\Controllers\StatusController::class,'comment'])->name('comment');

Route::get('/statuses/{statusId}',[\App\Http\Controllers\StatusController::class,'Liked'])->name('like');
