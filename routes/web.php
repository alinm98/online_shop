<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DiscountController;
use App\Http\Controllers\admin\GalleryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ProductPropertyController;
use App\Http\Controllers\admin\PropertyController;
use App\Http\Controllers\admin\PropertyGroupController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\client\homeIndexController;
use App\Http\Controllers\client\homeProductController;
use App\Http\Controllers\client\homeUserController;
use App\Http\Controllers\client\ProfileController;
use App\Http\Controllers\OrderController;
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

Route::get('/',[homeIndexController::class,'home'])->name('home.index');

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
Route::resource('/roles',RoleController::class);
Route::resource('/users',UserController::class);

/*Client Routing*/
Route::prefix('/client')->name('home.')->group(function (){
    Route::get('/product/{product}' , [homeProductController::class,'show'])->name('product.show');
    Route::get('/signup',[homeUserController::class,'signup'])->name('user.signup');
    Route::post('/signup',[homeUserController::class,'signupStore'])->name('user.store');
    Route::get('/login',[homeUserController::class,'showLogin'])->name('user.showLogin');
    Route::post('/login',[homeUserController::class,'login'])->name('user.login');
    Route::get('/logout',[homeUserController::class,'logout'])->name('user.logout');
    Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
    Route::resource('/address' , AddressController::class);
    Route::post('/cart/{product}',[CartController::class,'store'])->name('cart.store');
    Route::get('/cart',[CartController::class,'index'])->name('cart.index');
    Route::delete('/cart/{cart}',[CartController::class,'destroy'])->name('cart.destroy');
    Route::get('/cart/confirming',[CartController::class,'confirmation'])->name('cart.confirming');
    Route::get('/order/{total}',[OrderController::class,'store'])->name('order.store');



});

Route::get('/order/payment/callback' ,[OrderController::class,'show'])->name('payment.callback');
