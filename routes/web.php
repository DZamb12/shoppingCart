<?php

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//list all products
Route::get('/', [ProductController::class, 'index']);

//show single product
Route::get('/product/{product}', [ProductController::class, 'show']);

//show create form
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create')->middleware('auth');

//save form
Route::post('/product', [ProductController::class, 'store'])->middleware('auth');

//delete record
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->middleware('auth');

//update form
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->middleware('auth');

//save update form
Route::put('/products/{product}', [ProductController::class, 'update'])->middleware('auth');

//register here
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

//save registration
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

//logout
Route::post('/logout', [UserController::class, 'logout']);

//show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//autenticate users login
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//manage products
Route::get('/products/manage', [ProductController::class, 'manage'])->name('products.manage')->middleware('auth');

//cart components
Route::get('/cart', [CartController::class, 'shoppingCart'])->name('products.cart')->middleware('auth');

//cart remove item
Route::delete('/cart/{product}/remove', [CartController::class, 'remove'])->middleware('auth');

//cart get
Route::get('/cart/{product}', [CartController::class, 'ProductCart']);

//cart destroy everything
Route::delete('/cart/{product}/destroyall', [CartController::class, 'destroyall'])->middleware('auth');

//addtocart
// Route::post('/cart/{id}', 'ProductController@addProducttoCart')->name('addToCart');\


Auth::routes();

//route for user
Route::get('/user', function(){
   return response ("Welcome User!");
})->middleware('user');

//route for admin
Route::get('/admin', function(){
    return response ("Welcome Admin!");
 })->middleware('admin');

 //List of user routes

 Route::middleware(['user'])->group(function(){
    Route::get('/home', [UserController::class, 'index']);
    //other routes for any user type
 });

 Route::middleware(['admin'])->group(function(){
    Route::get('/dashboard', [AdminController::class, 'index']);
    //other routes for admin only
 });