<?php

use App\Http\Controllers\API\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login',[AuthController::class,'login']);

Route::resource('/brand',BrandController::class);
Route::resource('/category',CategoryController::class);
Route::resource('/product',ProductController::class);

Route::post('admin/login',[AdminController::class,'login']);

Route::get('/test',function(){
    $category = Category::find(1);
    $product = Product::first();
    return $category->products;
    return $product->category->category_name;
});