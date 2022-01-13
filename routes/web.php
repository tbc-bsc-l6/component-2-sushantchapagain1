<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','admin'])->name('dashboard');

//route for products view
Route::get('/products', function () {
    return view('products');
})->middleware(['auth','admin'])->name('products');

// route for add product view
Route::get('/addProduct', function () {
    return view('addProduct');
})->middleware(['auth','admin'])->name('addProducts');

// create a new product 
Route::get('product',[ProductController::class,'create'])->middleware(['auth','admin'])->name('create');
Route::post('product',[ProductController::class,'store'])->middleware(['auth','admin'])->name('store');

// show products for admin for crud
Route::get('/products',[ProductController::class,'show'])->middleware(['auth','admin'])->name('products');

// edit product view route 
Route::get('product/edit/{id}',[ProductController::class,'edit'])->middleware(['auth','admin'])->name('productedit');

// edit product POST or submit data route
Route::post('editproduct/{id}',[ProductController::class,'update'])->middleware(['auth','admin'])->name('productedit');

// del product
Route::delete('/products/{products}',[ProductController::class,'destroy'])->middleware(['auth','admin'])->name('productdelete');

// show all products to homepage for user
Route::get('/',[ProductController::class,'showProduct']);

// mailchimp
Route::post('newsletter',[ProductController::class,'newsLetter']);

// dashboard Controller showing number of products

Route::get('/dashboard',[DashboardController::class,'count'])->middleware(['auth','admin'])->name('dashboard');


require __DIR__.'/auth.php';



?>