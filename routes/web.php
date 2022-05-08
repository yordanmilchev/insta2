<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ImageController;

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
    return redirect('/auth/login');
});

Route::get('/portfolio',[MainController::class, 'portfolio'])->name('portfolio');
Route::get('/learningpage',[MainController::class, 'learningpage'])->name('learningpage');

Route::prefix('auth')->group(function () {
    Route::get('/delete_pic/{id}',[ImageController::class, 'delete_pic']);
    Route::get('/user_id/{id}',[ImageController::class, 'user_id']);
    Route::get('/search',[MainController::class, 'action'])->name('action');
    Route::get('/follow/{id}',[MainController::class, 'follow']);
    Route::get('/unfollow/{id}',[MainController::class, 'unfollow']);
    Route::get('/followersrecords/{id}',[MainController::class, 'followersrecords']);
    Route::get('/followingrecords/{id}',[MainController::class, 'followingrecords']);
    Route::get('/showcomments/{id}',[ImageController::class, 'showcomments']);
    Route::get('/addcoment/',[ImageController::class, 'addcomment']);
    Route::get('/delete',[MainController::class, 'delete'])->name('delete');
});

Route::name('auth.')->prefix('auth')->group(function () {
    Route::post('/check',[MainController::class, 'check'])->name('check');
    Route::post('/save',[MainController::class, 'save'])->name('save');
    Route::get('/logout',[MainController::class, 'logout'])->name('logout');
    Route::get('/login',[MainController::class, 'login'])->middleware(['AuthCheck'])->name('login');
    Route::get('/register',[MainController::class, 'register'])->middleware(['AuthCheck'])->name('register');
});

Route::prefix('admin')->group(function () {
    Route::post('changepass',[MainController::class, 'changepasspost'])->name('changepasspost');
    Route::post('changename',[MainController::class, 'changenamepost'])->name('changenamepost');
    Route::post('addimage',[ImageController::class, 'imagesave'])->name('image_save');
    Route::post('addprofilepic',[ImageController::class, 'profile_pic_save'])->name('profile_pic_save');
});

Route::middleware(['AuthCheck'])->prefix('admin')->group(function () {
    Route::get('/profile/',[MainController::class, 'profile']);
    Route::get('/profiles/{id}',[MainController::class, 'profiles']);
    Route::get('/test',[MainController::class, 'test']);
    Route::get('/settings',[MainController::class, 'settings']);
    Route::get('/addimage',[MainController::class, 'addimage']);
    Route::get('/news',[MainController::class, 'news']);
    Route::get('/changepass',[MainController::class, 'changepass'])->name('changepass');
    Route::get('/changename',[MainController::class, 'changename'])->name('changename');
});
