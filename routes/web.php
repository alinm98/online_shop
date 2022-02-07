<?php

use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DiscountController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductPropertyController;
use App\Http\Controllers\admin\PropertyController;
use App\Http\Controllers\admin\PropertyGroupController;
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
Route::get('/product/{product}/properties',[ProductPropertyController::class,'index'])->name('product.property.index');
Route::post('/product/{product}/properties',[ProductPropertyController::class,'store'])->name('product.property.store');


Route::resource('/categories' , CategoryController::class);
Route::resource('/brands' , BrandController::class);
Route::resource('/products',ProductController::class);
Route::resource('/products.discounts',DiscountController::class);
Route::resource('/propertyGroups',PropertyGroupController::class);
Route::resource('/properties',PropertyController::class);


