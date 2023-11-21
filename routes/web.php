<?php

use config\auth;
use App\Providers;
use GuzzleHttp\Middleware;
use App\Http\Middleware\LogIn;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Unit\UnitController;
use App\Http\Controllers\Landing\LandController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Authenticate\RegController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Authenticate\LoginController;
use App\Http\Controllers\User_List\UserListController;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Customer\CustomerRegController;
use App\Http\Controllers\Raw_Material\RawMaterialController;

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

//Route::get('/', [LandController::class, 'land'])->name('land');

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/admin/login', [LoginController::class, 'adminlogin'])->name('admin_login');
Route::post('/admin/post/login', [LoginController::class, 'admin_post_login'])->name('admin_post_login');

Route::get('/registration', [RegController::class, 'register'])->name('reg');

Route::post('/registration', [RegController::class, 'register1'])->name('reg1');




// Role and permission

Route::get('/role_list', [RoleController::class, 'role_list'])->name('role_list');
Route::get('/role_form', [RoleController::class, 'role_form'])->name('role_form');

Route::post('/role_create', [RoleController::class, 'role_create'])->name('role_create');

Route::put('/role_edit/{id}', [RoleController::class, 'role_edit'])->name('role_edit');
Route::delete('/role_delete/{id}', [RoleController::class, 'role_delete'])->name('role_delete');


// User List
Route::get('/user_list', [UserListController::class, 'user_list'])->name('user_list');
Route::get('/user_form', [UserListController::class, 'user_form'])->name('user_form');

Route::post('/user_create', [UserListController::class, 'user_create'])->name('user_create');

Route::put('/user_edit/{id}', [UserListController::class, 'user_edit'])->name('user_edit');
Route::delete('/user_delete/{id}', [UserListController::class, 'user_delete'])->name('user_delete');






// Customer Registration and Logg in

Route::get('/customer_registration_form', [CustomerRegController::class, 'customer_registration_form'])->name('customer_registration_form');

Route::post('/customer_registration', [CustomerRegController::class, 'customer_registration'])->name('customer_registration');

Route::get('/customer_login_page', [CustomerRegController::class, 'customer_login_page'])->name('customer_login_page');

Route::post('/customer_login', [CustomerRegController::class, 'customer_login'])->name('customer_login');

Route::get('/customer_logout', [CustomerRegController::class, 'customer_logout'])->name('customer_logout');




// Middleware
Route::group(['middleware' => 'auth'], function () {



    Route::get('/admin/logout', [LoginController::class, 'adminlogout'])->name('admin_logout');


   

    Route::group(['middleware' => 'auth'], function () {
    });

    Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('dash');


    Route::post('/datastore', [DashboardController::class, 'store'])->name('store.data');

    Route::get('/master', [DashboardController::class, 'Master'])->name('master.data');



    //  Product  
    Route::get('/product_list', [ProductController::class, 'product_list'])->name('product_list');

    Route::get('/add_product', [ProductController::class, 'add_product'])->name('add_product');

    Route::post("/product_store", [ProductController::class, 'product_store'])->name('product_store');

    Route::get('/view-product/{id}', [ProductController::class, 'view_product'])->name('view_product');

    Route::get('/edit_product/{id}', [ProductController::class, 'edit_product'])->name('edit_product');
   
    Route::put('/edit_product/{id}', [ProductController::class, 'update_product'])->name('update_product');
    
    Route::DELETE('/delete_product/{id}', [ProductController::class, 'delete_product'])->name('delete_product');


    // Raw Materials

    Route::get('/raw_material_list', [RawMaterialController::class, 'raw_material_list'])->name('raw_material_list');

    Route::get('/add_raw_materials', [RawMaterialController::class, 'add_raw_material'])->name('add_raw_material');

    Route::post('/material_store', [RawMaterialController::class, 'material_store'])->name('material_store');


    // Category

    Route::get('/category_list', [CategoryController::class, 'category_list'])->name('category_list');

    Route::get('/add_category', [CategoryController::class, 'add_category'])->name('add_category');

    Route::post('/store/category', [CategoryController::class, 'store_category'])->name('store_category');

    Route::PUT('/edit/category/{id}', [CategoryController::class, 'edit_category'])->name('edit_category');

    Route::DELETE('/delete/category/{id}', [CategoryController::class, 'delete_category'])->name('delete_category');

    // Unit
    Route::get('/unit_list', [UnitController::class, 'unit_list'])->name('unit_list');

    Route::get('/add_unit', [UnitController::class, 'add_unit'])->name('add_unit');

    Route::post('/store/unit', [UnitController::class, 'store_unit'])->name('store_unit');

    Route::PUT('/edit/unit/{id}', [UnitController::class, 'edit_unit'])->name('edit_unit');

    Route::DELETE('/delete/unit/{id}', [UnitController::class, 'delete_unit'])->name('delete_unit');




});

