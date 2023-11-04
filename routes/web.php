<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\LandController;
use App\Http\Controllers\Authenticate\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Authenticate\RegController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Raw_Material\RawMaterialController;
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

Route::get('/login', [LoginController::class, 'adminlogin'])->name('getlogin');


Route::post('/postlogin', [LoginController::class, 'adminlogin1'])->name('postlogin');


Route::get('/registration', [RegController::class, 'register'])->name('reg');

Route::post('/registration', [RegController::class, 'register1'])->name('reg1');

Route::group(['middleware' => 'auth'], function () {});

    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('dash');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::post('/datastore', [DashboardController::class, 'store'])->name('store.data');

Route::get('/master', [DashboardController::class, 'Master'])->name('master.data');



//  Product  
Route::get('/product_list', [ProductController::class, 'product_list'])->name('product_list');

Route::get('/add_product', [ProductController::class, 'add_product'])->name('add_product');

Route::post('/product_store', [ProductController::class, 'product_store'])->name('product_store');


// Raw Materials

Route::get('/raw_material_list', [RawMaterialController::class, 'raw_material_list'])->name('raw_material_list');

Route::get('/add_raw_materials', [RawMaterialController::class, 'add_raw_material'])->name('add_raw_material');

Route::post('/material_store', [RawMaterialController::class, 'material_store'])->name('material_store');
