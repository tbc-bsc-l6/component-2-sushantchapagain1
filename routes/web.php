<?php

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
})->middleware(['auth'])->name('dashboard');

//route for products view
Route::get('/products', function () {
    return view('products');
})->middleware(['auth'])->name('products');

// route for add product view
Route::get('/addProduct', function () {
    return view('addProduct');
})->middleware(['auth'])->name('addProducts');

// create a new product 
Route::get('product',[ProductController::class,'create']);
Route::post('product',[ProductController::class,'store']);

// show all products
Route::get('/products',[ProductController::class,'show'])->middleware(['auth'])->name('products');

// edit product view route 
Route::get('product/edit/{id}',[ProductController::class,'edit'])->middleware(['auth'])->name('productedit');

// del product
Route::delete('/products/{products}',[ProductController::class,'destroy'])->middleware(['auth'])->name('productdelete');

// edit product POST or submit data route
Route::post('editproduct',[ProductController::class,'update'])->middleware(['auth'])->name('productedit');


require __DIR__.'/auth.php';
?>