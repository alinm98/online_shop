<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyGroupController;
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
    return view('welcome');
});

Route::get('panelAdmin' , function (){
    return view('Admin.index');
});

Route::get('/gallery/{product}' , [GalleryController::class,'create'])->name('gallery.create');
Route::post('/gallery/{product}/store' , [GalleryController::class,'store'])->name('gallery.store');
Route::delete('/gallery/{gallery}/destroy' , [GalleryController::class,'destroy'])->name('gallery.destroy');


Route::resource('/categories' , CategoryController::class);
Route::resource('/brands' , BrandController::class);
Route::resource('/products',ProductController::class);
Route::resource('/products.discounts',DiscountController::class);
Route::resource('/propertyGroups',PropertyGroupController::class);
Route::resource('/properties',PropertyController::class);


