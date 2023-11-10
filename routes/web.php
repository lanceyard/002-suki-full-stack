<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Artisan;
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

/* Route::get('/', [UserController::class, 'show']); */

Route::get('/', function () {
  return view('customerSide/index');
});

Route::get('/produk', function () {
  return view('customerSide/produk');
});

Route::get('/tentang', function () {
  return view('customerSide/about');
});

Route::get('/kontak', function () {
  return view('customerSide/contact');
});

# ========================== AUTH =========================
Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

# ========================== DASHBOARD =========================
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

# ========================== ORDER =========================
Route::get('/order', [OrderController::class, 'index'])->middleware('auth');
Route::put('/order-confirm/{id}', [OrderController::class, 'confirm'])->middleware('auth');
Route::put('/order-send/{id}', [OrderController::class, 'send'])->middleware('auth');
Route::put('/order-confirm-custom/{id}', [OrderController::class, 'confirmCustom'])->middleware('auth');
Route::put('/order-tolak-custom/{id}', [OrderController::class, 'tolakCustom'])->middleware('auth');
Route::put('/order-custom-confirm/{id}', [OrderController::class, 'customConfirm'])->middleware('auth');
Route::put('/order-custom-send/{id}', [OrderController::class, 'customSend'])->middleware('auth');
Route::delete('/order-custom-delete/{id}', [OrderController::class, 'customDelete'])->middleware('auth');
Route::get('/order-pending', [OrderController::class, 'pending'])->middleware('auth');
Route::get('/order-belumBayar', [OrderController::class, 'belumBayar'])->middleware('auth');
Route::get('/order-mKonfirmasi', [OrderController::class, 'mKonfirmasi'])->middleware('auth');
Route::get('/order-terkonfirmasi', [OrderController::class, 'terkonfirmasi'])->middleware('auth');
Route::get('/order-dikirim', [OrderController::class, 'dikirim'])->middleware('auth');
Route::get('/order-selesai', [OrderController::class, 'selesai'])->middleware('auth');

# ========================== PRODUCT =========================
Route::get('/product', [ProductController::class, 'index'])->middleware('auth');
Route::put('/product/{id}', [ProductController::class, 'update'])->middleware('auth');
Route::post('/product', [ProductController::class, 'store'])->middleware('auth');
Route::post('/product-destroy', [ProductController::class, 'destroy'])->middleware('auth');
Route::get('/product-pdf', [ProductController::class, 'pdf'])->middleware('auth');
Route::get('/product-excel', [ProductController::class, 'excel'])->middleware('auth');

# ========================== USER =========================
Route::get('/user', [UserController::class, 'index'])->middleware('auth');
Route::put('/profile/{id}', [UserController::class, 'profile'])->middleware('auth');
Route::get('/user-pdf', [UserController::class, 'pdf'])->middleware('auth');
Route::get('/user-excel', [UserController::class, 'excel'])->middleware('auth');

# ========================== CUSTOM =========================
Route::get('/custom', [CustomController::class, 'index'])->middleware('auth');

# ======================== REPORT ========================
Route::get('/report', [ReportController::class, 'index'])->middleware('auth');
Route::get('/report-date', [ReportController::class, 'date'])->middleware('auth');
Route::get('/report-pdf', [ReportController::class, 'pdf'])->middleware('auth');
Route::get('/report-excel', [ReportController::class, 'excel'])->middleware('auth');

# ======================== LISTING ========================
# to register
Route::get('/register', [UserController::class, 'create'])->middleware('guest');
# register
Route::post('/users/create', [UserController::class, 'store']);

Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
});
