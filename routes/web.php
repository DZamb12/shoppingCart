<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

//index
Route::middleware(['user'])->group(function(){
Route::get('/userproducts', [ProductController::class, 'indexusers'])->name('user.user'); 
Route::get('/cart', [CartController::class, 'shoppingCart'])->middleware('auth');
Route::delete('/cart/{product}/remove',[CartController::class, 'remove'])->middleware('auth');
Route::get('/cart/{product}', [CartController::class, 'ProductCart']);
Route::delete('/cart/{product}/destroyall', [CartController::class, 'destroyall']);
});


Route::middleware(['admin'])->group(function(){

//show products
Route::get('/', [ProductController::class, 'index'])->name('admin.admin');

//manage products
Route::get('/index2', [ProductController::class, 'index2']);

//create products
Route::get('/create',[ProductController::class, 'create'])->middleware('auth');

//delete products
Route::delete('/products/{product}/delete',[ProductController::class,'destroy'])->middleware('auth');

//store products
Route::post('/product', [ProductController::class, 'store'])->middleware('auth');

//edit products
Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->middleware('auth');

//update products
Route::put('/products/{product}', [ProductController::class,'update']);

//manage users
Route::get('/usertable', [UserController::class, 'manageusers'])->middleware('auth');   

//deactivate users
Route::put('/user/{user}/edit',[UserController::class,'deactivateUser'])->middleware('auth');
Route::delete('/user/{user}/delete',[UserController::class,'deleteUser'])->middleware('auth');
});


Route::get('/product/{product}',[ProductController::class, 'show']);

Route::get('/register',[UserController::class,'create'])->middleware('guest');

Route::post('/users', [UserController::class, 'store'])->middleware('guest');
    
Route::post('/logoutsss', [UserController::class, 'logout']);

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/authenticate', [UserController::class, 'authenticate']);
