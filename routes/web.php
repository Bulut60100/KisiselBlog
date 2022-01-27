<?php

use App\Http\Controllers\admin\articleController;
use App\Http\Controllers\admin\authController;
use App\Http\Controllers\admin\categoryController;
use App\Http\Controllers\admin\indexController as AdminIndexController;
use App\Http\Controllers\admin\pagesController;
use App\Http\Controllers\front\indexController;
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

Route::get('/',[indexController::class, 'index'])->name('index');
Route::get('/blog/{slug}',[indexController::class, 'single'])->name('single');
Route::get('/kategori/{category}', [indexController::class, 'category'])->name('category');
Route::get('/hakkimizda', [indexController::class, 'aboutus'])->name('aboutus');
Route::get('/iletisim',[indexController::class, 'contact'])->name('contact');
Route::post('/iletisim',[indexController::class, 'contactpost'])->name('contact.post');


Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function(){
Route::get('/login',[authController::class, 'login'])->name('login');
Route::post('/login',[authController::class, 'loginpost'])->name('login.post');
});
Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function(){
    Route::get('/',[AdminIndexController::class, 'index'])->name('index');
    Route::get('/logout',[authController::class, 'logout'])->name('logout');
    //Makaleler
    Route::get('makaleler/silinenler',[articleController::class, 'trashed'])->name('trashed.article');
    Route::resource('makaleler',articleController::class);
    Route::get('/switch',[articleController::class, 'switch'])->name('switch');
    Route::get('/deletearticle/{id}',[articleController::class, 'delete'])->name('delete.article');
    Route::get('/destroyedarticle/{id}',[articleController::class, 'destroyed'])->name('destroyed.article');
    Route::get('/recoverarticle/{id}',[articleController::class, 'recover'])->name('recover.article');
    //Kategoriler
    Route::get('/kategoriler',[categoryController::class, 'index'])->name('category.index');
    Route::post('/kategoriler/olustur',[categoryController::class, 'store'])->name('category.store');
    Route::get('/deletecategory/{id}',[categoryController::class, 'delete'])->name('delete.category');
    Route::get('/editcategory/{id}',[categoryController::class, 'edit'])->name('category.edit');
    Route::post('/updatecategory/{id}',[categoryController::class, 'update'])->name('category.update');
    //pages
    Route::get('/sayfalar/iletisim',[pagesController::class, 'indexcontact'])->name('pages.contact');
    Route::get('/sayfalar/iletisim/sil/{id}',[pagesController::class, 'contactdelete'])->name('contact.delete');
    Route::get('/sayfalar/hakkimizda',[pagesController::class, 'indexaboutus'])->name('pages.aboutus');
    Route::get('/sayfalar/hakkimizda/sil/{id}',[pagesController::class, 'aboutusdelete'])->name('aboutus.delete');

});
