<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
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
// Categories section route from here 
// Categories section route from here 
Route::get('categories',[CategoryController::class,'index']);
Route::get('categories/create',[CategoryController::class,'create']);
Route::post('categories/create',[CategoryController::class,'store']);
Route::get('categories/{id}/edit',[CategoryController::class,'edit']);
Route::put('categories/{id}/edit',[CategoryController::class,'update']);
Route::get('categories/{id}/delete',[CategoryController::class,'destroy']);

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('products', function () {
    return Product::get();
});

// Products section route from here 
// Products section route from here 
Route::get('products',[ProductController::class,'index']);
Route::get('products/create',[ProductController::class,'create']);
Route::post('products/create',[ProductController::class,'store']);
Route::get('products/{id}/edit',[ProductController::class,'edit']);
Route::put('products/{id}/edit',[ProductController::class,'update']);
Route::get('products/{id}/delete',[ProductController::class,'destroy']);

// Upload multiple images in products section route from here
// Upload multiple images in products section route from here
Route::get('products/{productId}/upload',[ProductImageController::class,'index'])->name('product-image.index');
Route::post('products/{productId}/store',[ProductImageController::class,'store'])->name('product-image.store');
Route::get('product-image/{productImageId}/delete',[ProductImageController::class,'destroy'])->name('product-image.delete');


// Route::get('product-create', function () {
//         return Product::create([
//         'name' => 'man pant style',
//         'description' => 'man pant description',
//         'small_description' => 'man pant smail description',
//         'original_price' => 599,
//         'price' => 500,	
//         'stock' => 52,
//         'is_active' => 1,
//         ]);
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
