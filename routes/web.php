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
    return redirect('/auth/login');
});

Route::get('/portfolio','App\Http\Controllers\\MainController@portfolio')->name('portfolio');
Route::get('/learningpage','App\Http\Controllers\\MainController@learningpage')->name('learningpage');

Route::group(['prefix' => 'auth'], function (){
    Route::post('check','App\Http\Controllers\\MainController@check')->name('auth.check');
    Route::post('save','App\Http\Controllers\\MainController@save')->name('auth.save');
    Route::get('logout','App\Http\Controllers\\MainController@logout')->name('auth.logout');
    Route::get('delete_pic/{id}','App\Http\Controllers\\ImageController@delete_pic');
    Route::get('user_id/{id}','App\Http\Controllers\\ImageController@user_id');
    Route::get('search','App\Http\Controllers\\MainController@action')->name('action');
    Route::get('follow/{id}','App\Http\Controllers\\MainController@follow');
    Route::get('unfollow/{id}','App\Http\Controllers\\MainController@unfollow');
    Route::get('followersrecords/{id}','App\Http\Controllers\\MainController@followersrecords');
    Route::get('followingrecords/{id}','App\Http\Controllers\\MainController@followingrecords');
    Route::get('showcomments/{id}','App\Http\Controllers\\ImageController@showcomments');
    Route::get('addcoment/','App\Http\Controllers\\ImageController@addcomment');
});

Route::group(['prefix' => 'admin'], function (){
    Route::post('changepass','App\Http\Controllers\\MainController@changepasspost')->name('changepasspost');
    Route::post('changename','App\Http\Controllers\\MainController@changenamepost')->name('changenamepost');
    Route::post('addimage','App\Http\Controllers\\ImageController@imagesave')->name('image_save');
    Route::post('addprofilepic','App\Http\Controllers\\ImageController@profile_pic_save')->name('profile_pic_save');
});

Route::group(['middleware'=>['AuthCheck']], function()
{
    Route::get('/auth/login','App\Http\Controllers\\MainController@login')->name('auth.login');
    Route::get('/auth/register','App\Http\Controllers\\MainController@register')->name('auth.register');
    Route::get('/admin/profile/','App\Http\Controllers\\MainController@profile');
    Route::get('/admin/profiles/{id}','App\Http\Controllers\\MainController@profiles');
    Route::get('/admin/test','App\Http\Controllers\\MainController@test');
    Route::get('/admin/settings','App\Http\Controllers\\MainController@settings');
    Route::get('/admin/addimage','App\Http\Controllers\\MainController@addimage');
    Route::get('/admin/news','App\Http\Controllers\\MainController@news');
    Route::get('/auth/delete','App\Http\Controllers\\MainController@delete')->name('delete');
    Route::get('/admin/changepass','App\Http\Controllers\\MainController@changepass')->name('changepass');
    Route::get('/admin/changename','App\Http\Controllers\\MainController@changename')->name('changename');
});
