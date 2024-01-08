<?php

use config\auth;
use App\Providers;
use GuzzleHttp\Middleware;
use App\Http\Middleware\LogIn;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Extra\Extra;
use App\Http\Controllers\Role\RoleController;
use App\Http\Controllers\Unit\UnitController;
use App\Http\Controllers\Landing\LandController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Authenticate\RegController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Authenticate\LoginController;
use App\Http\Controllers\Chat\ChatController;
use App\Http\Controllers\User_List\UserListController;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Customer\CustomerRegController;
use App\Http\Controllers\Raw_Material\RawMaterialController;
use App\Http\Controllers\Cart_and_payment\CartController;
use App\Http\Controllers\UserCart\UserCartController;
use App\Http\Controllers\CustomerCart\CustomerCartController;
use App\Http\Controllers\Retailer_Show\RetailerController;
use App\Notifications\UserNofication;

// Payment for 
use App\Http\Controllers\SslCommerzPaymentController;




Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/login', [LoginController::class, 'adminlogin'])->name('admin_login');

Route::post('/loggedin', [LoginController::class, 'admin_post_login'])->name('admin_post_login');




// Dashboard User Middlewaresub
Route::group(['middleware' => 'auth'], function ()
 {

    //User log in 

    Route::get('/admin/logout', [LoginController::class, 'adminlogout'])->name('admin_logout');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dash');


    


    //  Product  
    Route::get('/product_list', [ProductController::class, 'product_list'])->name('product_list');

    Route::get('/add_product', [ProductController::class, 'add_product'])->name('add_product');

    Route::post("/product_store", [ProductController::class, 'product_store'])->name('product_store');

    Route::get('/edit_product/{id}', [ProductController::class, 'edit_product'])->name('edit_product');
   
    Route::put('/edit_product/{id}', [ProductController::class, 'update_product'])->name('update_product');
    
    Route::DELETE('/delete_product/{id}', [ProductController::class, 'delete_product'])->name('delete_product');





     // Add to card database for for distributor

     Route::post('/add_cart1/{id}', [ProductController::class, 'add_cart1'])->name('add_cart1');

     Route::get('/cart_show1', [ProductController::class, 'cart_show1'])->name('cart_show1');
 
     Route::get('/remove_cart1/{id}', [ProductController::class, 'remove_cart1'])->name('remove_cart1');
 
     Route::PUT('/quantity_update1/{id}', [ProductController::class, 'quantity_update1'])->name('quantity_update1');

     Route::get('/request_product', [ProductController::class, 'request_product'])->name('request_product');

     Route::get('/all_request', [ProductController::class, 'all_request'])->name('all_request');

     Route::get('/approve_request/{id}', [ProductController::class, 'approve_request'])->name('approve_request');

     Route::get('/cancel_request/{id}', [ProductController::class, 'cancel_request'])->name('cancel_request');

     Route::get('/available_product', [ProductController::class, 'available_product'])->name('available_product');
     
     Route::post('/manu_report/generate', [ProductController::class, 'manu_report'])->name('manu_report');

 



    // Raw Materials

    Route::get('/raw_material_list', [RawMaterialController::class, 'raw_material_list'])->name('raw_material_list');

    Route::get('/add_raw_materials', [RawMaterialController::class, 'add_raw_material'])->name('add_raw_material');

    Route::post('/material_store', [RawMaterialController::class, 'material_store'])->name('material_store');

    Route::PUT('/edit_material/{id}', [RawMaterialController::class, 'edit_material'])->name('edit_material');

    Route::get('/delete_material/{id}', [RawMaterialController::class, 'delete_material'])->name('delete_material');



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

  // Add to card database for manufacturer

    Route::post('/add_cart/{id}', [UserCartController::class, 'add_cart'])->name('add_cart');

    Route::get('/cart_show', [UserCartController::class, 'cart_show'])->name('cart_show');

    Route::get('/remove_cart/{id}', [UserCartController::class, 'remove_cart'])->name('remove_cart');

    Route::PUT('/quantity_update/{id}', [UserCartController::class, 'quantity_update'])->name('quantity_update');

    Route::get('/chechout', [UserCartController::class, 'chechout'])->name('chechout');
    Route::post('/place_order', [UserCartController::class, 'place_order'])->name('place_order');

  // see customer order in admin panel
  Route::get('/customer_order', [UserCartController::class, 'customer_order'])->name('customer_order');
  Route::PUT('/cus_status_change/{id}', [UserCartController::class, 'cus_status_change'])->name('cus_status_change');


  // see manufacturer order in supplier panel
  Route::get('/manufacturer_order', [UserCartController::class, 'manufacturer_order'])->name('manufacturer_order');
  Route::PUT('/manufacturer_status_change/{id}', [UserCartController::class, 'manufacturer_status_change'])->name('manufacturer_status_change');
  
  Route::PUT('/delivery_status_change/{id}', [UserCartController::class, 'delivery_status_change'])->name('delivery_status_change');


  // see manufacturer profile ( My Order)

  Route::get('/manufacturer_profile', [UserCartController::class, 'manufacturer_profile'])->name('manufacturer_profile');
  Route::get('/manu_cancel_order/{id}', [UserCartController::class, 'manu_cancel_order'])->name('manu_cancel_order');
  Route::get('/manu_invoice/{id}/generate', [UserCartController::class, 'manu_invoice'])->name('manu_invoice');


//  Customer order report for Retailer

Route::post('/retailer_report', [UserCartController::class, 'retailer_report'])->name('retailer_report');


//  Manufacturer order report for Supplier

Route::post('/supplier_report', [UserCartController::class, 'supplier_report'])->name('supplier_report');


//  Retailer show

Route::get('/retailer_show', [RetailerController::class, 'retailer_show'])->name('retailer_show');

Route::post('/retailer_request/{id}', [RetailerController::class, 'retailer_request'])->name('retailer_request');

Route::get('/ret_request', [RetailerController::class, 'ret_request'])->name('ret_request');

Route::get('/retailer_approve/{id}', [RetailerController::class, 'retailer_approve'])->name('retailer_approve');

Route::get('/retailer_cancel/{id}', [RetailerController::class, 'retailer_cancel'])->name('retailer_cancel');

Route::get('/my_product', [RetailerController::class, 'my_product'])->name('my_product');





// chat system 

Route::post('/submit_chat', [ChatController::class,'submit_chat'])->name('chat');

Route::get('/get_chat', [ChatController::class, 'getChat'])->name('getchat');

Route::delete('/delete_sms/{id}', [ChatController::class, 'delete_sms'])->name('delete_sms');



//extra
Route::post('/ajax-example/change-page', [Extra::class,'newPage'])->name('extra');


//search

Route::get('/matetial_search',[DashboardController::class,'matetial_search'])->name('matetial_search');
Route::get('/product_search',[DashboardController::class,'product_search'])->name('product_search');


  // /Customer list

  Route::get('/customer_list',[ChatController::class,'customer_list'])->name('customer_list');
  
  Route::delete('/customer_delete/{id}',[ChatController::class,'customer_delete'])->name('customer_delete');


  // Manual Request

  Route::post('/manual_request',[ChatController::class,'manual_request'])->name('manual_request');

  Route::get('/manual_request1',[ChatController::class,'manual_request1'])->name('manual_request1');




});


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END



//   Customer Registration

Route::get('/customer_registration_form', [CustomerRegController::class, 'customer_registration_form'])->name('customer_registration_form');

Route::post('/customer_registration', [CustomerRegController::class, 'customer_registration'])->name('customer_registration');

Route::get('/customer_login_page', [CustomerRegController::class, 'customer_login_page'])->name('customer_login_page');

Route::post('/customer_login', [CustomerRegController::class, 'customer_login'])->name('customer_login');

Route::get('/cus_otp', [CustomerRegController::class, 'cus_otp'])->name('cus_otp');
    
Route::post('/post_otp', [CustomerRegController::class, 'post_otp'])->name('post_otp');

Route::get('/resend', [CustomerRegController::class, 'resend'])->name('resend');

Route::get('/forgetpassword', [CustomerRegController::class, 'forgetpassword'])->name('forgetpassword');

Route::post('/take_email', [CustomerRegController::class, 'take_email'])->name('take_email');

Route::post('/forget_otp', [CustomerRegController::class, 'forget_otp'])->name('forget_otp');

Route::post('/reset_password', [CustomerRegController::class, 'reset_password'])->name('reset_password');

Route::get('/forget_resend', [CustomerRegController::class, 'forget_resend'])->name('forget_resend');




Route::group(['middleware' => 'customer'], function ()
{

    // Customer and Logg in

  

    Route::get('/customer_logout', [CustomerRegController::class, 'customer_logout'])->name('customer_logout');

    Route::get('/customer_profile_edit_page', [CustomerRegController::class, 'customer_profile_edit_page'])->name('customer_profile_edit_page');

    Route::put('/customer_profile_edit/{id}', [CustomerRegController::class, 'customer_profile_edit'])->name('customer_profile_edit');
    
    Route::get('/profile_view', [CustomerRegController::class, 'profile_view'])->name('profile_view');

    Route::get('/cus_download/{id}/generate', [CustomerRegController::class, 'cus_download'])->name('cus_download');



    // Cart

    Route::post('/cus_add_cart/{id}', [CustomerCartController::class, 'cus_add_cart'])->name('cus_add_cart');

    Route::get('/cus_cart_show', [CustomerCartController::class, 'cus_cart_show'])->name('cus_cart_show');

    Route::get('/cus_remove_cart/{id}', [CustomerCartController::class, 'cus_remove_cart'])->name('cus_remove_cart');

    Route::PUT('/cus_quantity_update/{id}', [CustomerCartController::class, 'cus_quantity_update'])->name('cus_quantity_update');

    Route::get('/cus_checkout', [CustomerCartController::class, 'cus_checkout'])->name('cus_checkout');
    
    Route::post('/cus_place_order', [CustomerCartController::class, 'cus_place_order'])->name('cus_place_order');

    
    Route::get('/cus_cancel_order/{id}', [CustomerCartController::class, 'cus_cancel_order'])->name('cus_cancel_order');

  Route::PUT('/cus_delivery_change/{id}', [CustomerCartController::class, 'cus_delivery_change'])->name('cus_delivery_change');
    
});




//Category wise page

Route::get('/bakery_category/{categoryId}', [HomeController::class, 'bakery_category'])->name('bakery_category');
Route::get('/popular_items', [HomeController::class, 'popular_items'])->name('popular_items');
Route::get('/new_arrivals', [HomeController::class, 'new_arrivals'])->name('new_arrivals');

//  Customr search

Route::get('/cus_search',[HomeController::class,'cus_search'])->name('cus_search');
