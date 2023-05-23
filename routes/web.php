<?php

use App\Models\Product;
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
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

//save form
Route::post('/product', [ProductController::class, 'store']);

//delete record
Route::delete('/products/{product}', [ProductController::class, 'destroy']);

//update form
Route::get('/product/{product}/edit', [ProductController::class, 'edit']);

//save update form
Route::put('/products/{product}', [ProductController::class, 'update']);

//register here
Route::get('/register', [UserController::class, 'create']);

//save registration
Route::post('/users', [UserController::class, 'store']);

//logout
Route::post('/logout', [UserController::class, 'logout']);

//show login form
Route::get('/login', [UserController::class, 'login']);

//autenticate users login
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//manage products
Route::get('/products/manage', [ProductController::class, 'manage'])->name('products.manage');

//cart components
Route::get('/cart', [CartController::class,'shoppingCart']);

Route::delete('/cart/{product}/remove',[CartController::class, 'remove']);

Route::get('/cart/{product}', [CartController::class, 'ProductCart']);

Route::delete('/cart/{product}/destroyall', [CartController::class, 'destroyall']);