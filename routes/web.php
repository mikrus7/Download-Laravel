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


Route::group(array('namespace'=>'Backend','middleware'=>'auth'),function(){
   Route::resource('/ringtones','RingtoneController');
   Route::resource('/photos','PhotoController');
});
Route::group(array('namespace'=>'Frontend'),function(){
    Route::get('/','RingtoneController@index');
    Route::get('/ringtones/{id}/{slug}','RingtoneController@show')->name('ringtones.show');
    Route::post('/ringtones/download/{id}','RingtoneController@downloadRingtone')->name('ringtones.download');
    Route::get('/category/{id}','RingtoneController@category')->name('ringtones.category');
    Route::get('/wallpapers','PhotoController@wallpaper');
    Route::post('download1/{id}','PhotoController@download800x600')->name('download1');
    Route::post('download2/{id}','PhotoController@download1280x1024')->name('download2');
    Route::post('download3/{id}','PhotoController@download316x255')->name('download3');
    Route::post('download4/{id}','PhotoController@download118x95')->name('download4');
});

Auth::routes([
    'register'=>false
    ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
