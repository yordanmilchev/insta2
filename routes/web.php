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
    Route::post('/check',[MainController::class, 'check'])->name('auth.check');
    Route::post('/save',[MainController::class, 'save'])->name('auth.save');
    Route::get('/logout',[MainController::class, 'logout'])->name('auth.logout');
    Route::get('/delete_pic/{id}',[ImageController::class, 'delete_pic']);
    Route::get('/user_id/{id}',[ImageController::class, 'user_id']);
    Route::get('/search',[MainController::class, 'action'])->name('action');
    Route::get('/follow/{id}',[MainController::class, 'follow']);
    Route::get('/unfollow/{id}',[MainController::class, 'unfollow']);
    Route::get('/followersrecords/{id}',[MainController::class, 'followersrecords']);
    Route::get('/followingrecords/{id}',[MainController::class, 'followingrecords']);
    Route::get('/showcomments/{id}',[ImageController::class, 'showcomments']);
    Route::get('/addcoment/',[ImageController::class, 'addcomment']);
    Route::get('/login',[MainController::class, 'login'])->middleware(['AuthCheck'])->name('auth.login');
    Route::get('/register',[MainController::class, 'register'])->middleware(['AuthCheck'])->name('auth.register');
});

Route::group(['prefix' => 'admin'], function (){
    Route::post('changepass',[MainController::class, 'changepasspost'])->name('changepasspost');
    Route::post('changename',[MainController::class, 'changenamepost'])->name('changenamepost');
    Route::post('addimage',[ImageController::class, 'imagesave'])->name('image_save');
    Route::post('addprofilepic',[ImageController::class, 'profile_pic_save'])->name('profile_pic_save');
});


Route::middleware(['AuthCheck'])->group(function () {
    Route::get('/admin/profile/',[MainController::class, 'profile']);
    Route::get('/admin/profiles/{id}',[MainController::class, 'profiles']);
    Route::get('/admin/test',[MainController::class, 'test']);
    Route::get('/admin/settings',[MainController::class, 'settings']);
    Route::get('/admin/addimage',[MainController::class, 'addimage']);
    Route::get('/admin/news',[MainController::class, 'news']);
    Route::get('/auth/delete',[MainController::class, 'delete'])->name('delete');
    Route::get('/admin/changepass',[MainController::class, 'changepass'])->name('changepass');
    Route::get('/admin/changename',[MainController::class, 'changename'])->name('changename');
});
