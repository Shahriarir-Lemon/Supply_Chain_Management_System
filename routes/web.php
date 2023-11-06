<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\LandController;
use App\Http\Controllers\Authenticate\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Authenticate\RegController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Raw_Material\RawMaterialController;
use App\Http\Controllers\Manage\ManageController;
use GuzzleHttp\Middleware;
use App\Http\Middleware\LogIn;
use config\auth;
use App\Providers;
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

Route::get('/', [LandController::class, 'land'])->name('land');

Route::get('/admin/login', [LoginController::class, 'adminlogin'])->name('admin_login');
Route::post('/admin/post/login', [LoginController::class, 'admin_post_login'])->name('admin_post_login');

// Middleware
Route::group(['middleware' => 'auth'], function () {



    Route::get('/admin/logout', [LoginController::class, 'adminlogout'])->name('admin_logout');


    Route::get('/registration', [RegController::class, 'register'])->name('reg');

    Route::post('/registration', [RegController::class, 'register1'])->name('reg1');

    Route::group(['middleware' => 'auth'], function () {
    });

    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('dash');


    Route::post('/datastore', [DashboardController::class, 'store'])->name('store.data');

    Route::get('/master', [DashboardController::class, 'Master'])->name('master.data');



    //  Product  
    Route::get('/product_list', [ProductController::class, 'product_list'])->name('product_list');

    Route::get('/add_product', [ProductController::class, 'add_product'])->name('add_product');

    Route::post('/product_store', [ProductController::class, 'product_store'])->name('product_store');

    Route::get('/view-product/{id}', [ProductController::class, 'view_product'])->name('view_product');

    Route::get('/edit_product/{id}', [ProductController::class, 'edit_product'])->name('edit_product');

    Route::put('/edit_product/{id}', [ProductController::class, 'update_product'])->name('update_product');
    Route::delete('/delete_product/{id}', [ProductController::class, 'delete_product'])->name('delete_product');


    // Raw Materials

    Route::get('/raw_material_list', [RawMaterialController::class, 'raw_material_list'])->name('raw_material_list');

    Route::get('/add_raw_materials', [RawMaterialController::class, 'add_raw_material'])->name('add_raw_material');

    Route::post('/material_store', [RawMaterialController::class, 'material_store'])->name('material_store');


    // Manage Category

    Route::get('/manage_category', [ManageController::class, 'manage_category'])->name('manage_category');
});

