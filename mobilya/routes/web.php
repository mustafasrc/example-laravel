<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Back\DashboardController;
use App\Http\Controllers\Back\ProductCategoryController;
use App\Http\Controllers\Back\ProductController;
use App\Http\Controllers\Back\CorparatePagesController;
use App\Http\Controllers\Back\ServicePageController;
use App\Http\Controllers\Back\PostController;
use App\Http\Controllers\Back\AlbumCategoryController;
use App\Http\Controllers\Back\PhotoController;
use App\Http\Controllers\Back\SliderController;
use App\Http\Controllers\Back\AdminAuthController;
use App\Http\Controllers\Back\ConfigController;


//Admın Route

Route::prefix('admin')->name('admin.')->middleware('İsadminlogout')->group(function (){
    Route::get('giris', [AdminAuthController::class , 'index'])->name('index');
    Route::post('giris' , [AdminAuthController::class , 'adminAuth'])->name('login');
});

Route::prefix('admin')->name('admin.')->middleware('İsadmin')->group(function () {
    Route::get('panel', [DashboardController::class ,'dashboard'])->name('dashboard');
    Route::resource('kategori' , ProductCategoryController::class);
    Route::resource('urunler' , ProductController::class);
    Route::resource('pages' , CorparatePagesController::class);
    Route::resource('services-pages' , ServicePageController::class);
    Route::resource('posts' , PostController::class);
    Route::resource('album-category' , AlbumCategoryController::class);
    Route::resource('photos' , PhotoController::class);
    Route::resource('slider' , SliderController::class);
    Route::get('cikis' , [AdminAuthController::class , 'logout'])->name('logout');
    Route::get('ayarlar' , [ConfigController::class , 'index'])->name('config');
    Route::post('ayarlar/iletisim' , [ConfigController::class , 'informationPost'])->name('information.post');
    Route::post('ayarlar' , [ConfigController::class , 'configPost'])->name('config.post');
});
