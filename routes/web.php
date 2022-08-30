<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
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


// Frontend Controller
Route::get('/', [FrontendController::class, 'index']);
Route::post('/add/to/cart/{id}', [FrontendController::class, 'addToCart']);
Route::get('/cart/products', [FrontendController::class, 'cartProducts']);
Route::get('/delete/product/from/cart/{id}', [FrontendController::class, 'removeCartProducts']);Route::get('/registration', [FrontendController::class, 'registration']);
Route::get('/shipping', [FrontendController::class, 'shipping']);
Route::post('/shipping/store', [FrontendController::class, 'shippingStore']);
Route::get('/contact', [FrontendController::class, 'contact']);
//Frontend auth controller

// Vue search components
Route::get('/get/search/products', [FrontendController::class, 'searchProduct']);



// Admin Controller
Route::get('/admin/login', [AdminController::class, 'showLoginForm']);
Route::post('/admin/login', [AdminController::class, 'login']);


Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin/logout', [AdminController::class, 'logout']);

    //Category Controller
    Route::get('/category/addCategory', [CategoryController::class, 'showCategoryForm']);
    Route::post('/category/store', [CategoryController::class, 'categoryStore']);
    Route::get('/category/manageCategory', [CategoryController::class, 'manageCategoryList']);
    Route::get('/edit/category/{id}', [CategoryController::class, 'showEditCategoryForm']);
    Route::post('/category/edit/{id}', [CategoryController::class, 'editCategory']);
    Route::post('/delete/category', [CategoryController::class, 'deleteCategory']);

    //Brand Controller
    Route::get('/brand/addBrand', [BrandController::class, 'showBrandForm']);
    Route::post('/brand/store', [BrandController::class, 'brandStore']);
    Route::get('/brand/manageBrand', [BrandController::class, 'manageBrandList']);
    Route::get('/edit/brand/{id}', [BrandController::class, 'showEditBrandForm']);
    Route::post('/brand/edit/{id}', [BrandController::class, 'editBrand']);
    Route::post('/delete/brand', [BrandController::class, 'deleteBrand']);

    //Product Controller
    Route::get('/product/addProduct', [ProductController::class, 'showProductForm']);
    Route::post('/product/store', [ProductController::class, 'productStore']);
    Route::get('/manage/product', [ProductController::class, 'ManageProduct']);
    Route::get('/edit/product/{id}', [ProductController::class, 'showEditProductForm']);
    Route::post('/product/edit/{id}', [ProductController::class, 'editProduct']);

});








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
