<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Landing\LandController;
use App\Http\Controllers\Authenticate\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Authenticate\RegController;
use GuzzleHttp\Middleware;
use App\Http\Middleware\LogIn;
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


Route::post('/', [LoginController::class, 'adminlogin1'])->name('postlogin');


Route::get('/registration', [RegController::class, 'register'])->name('reg');

Route::post('/registration', [RegController::class, 'register1'])->name('reg1');

Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->middleware('auth.login')->name('dash');
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth.login')->name('logout');


Route::post('/datastore', [DashboardController::class, 'store'])->middleware('auth')->name('store.data');

Route::get('/master', [DashboardController::class, 'Master'])->name('master.data');
