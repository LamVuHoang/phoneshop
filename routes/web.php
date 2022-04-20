<?php

use App\Http\Controllers\AdminChartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminDonHangController;
use App\Http\Controllers\AdminSanPhamController;
use App\Http\Controllers\AjaxAdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChangeLanguageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\LienHeController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\TinTucController;

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

Route::group(['middleware' => 'locale'], function () {

    Route::get('change-language/{language}', [ChangeLanguageController::class, 'changeLanguage'])
        ->name('change-language')->where('language', '[a-zA-Z]+');

    Route::get('/', [HomeController::class, 'index']);

    Route::prefix('san-pham')->group(function () {
        Route::get('/', [SanPhamController::class, 'index']);
        Route::get('/chi-tiet-san-pham/{ten_url}', [SanPhamController::class, 'chi_tiet_san_pham'])
            ->where('ten_url', '[a-zA-Z0-9-]+');
        Route::post('tim-san-pham', [SanPhamController::class, 'tim_san_pham']);
        Route::get('ket-qua-tim-kiem/{keyword}', [SanPhamController::class, 'ket_qua_tim_kiem']);

        Route::get('loai-san-pham/{id}', [SanPhamController::class, 'loai_san_pham'])->where('id', '[0-9]+');
        Route::get('thuong-hieu/{id}', [SanPhamController::class, 'thuong_hieu'])->where('id', '[0-9]+');
        // Route::post('tim-san-pham', [SanPhamController::class, 'tim_san_pham']);
        //Đặt hàng
        Route::post('them-gio-hang', [SanPhamController::class, 'them_gio_hang']);
        Route::get('xem-gio-hang', [SanPhamController::class, 'show_gio_hang']);
    });

    Route::prefix('khach-hang')->group(function () {
        Route::get('login', [KhachHangController::class, 'login']);
        Route::post('login', [KhachHangController::class, 'authenticate_customer']);
        Route::get('logout', [KhachHangController::class, 'logout']);
    });

    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'index']);
        Route::post('add-to-cart', [CartController::class, 'add_to_cart']);
        Route::get('delete-item/{rowId}', [CartController::class, 'delete_item'])->where('rowId', '[0-9a-zA-Z]+');
        Route::get('dat-hang', [CartController::class, 'dat_hang']);
    });

    Route::prefix('tin-tuc')->group(function () {
        Route::get('/', [TinTucController::class, 'index']);
    });

    Route::prefix('lien-he')->group(function () {
        Route::get('/', [LienHeController::class, 'index']);
    });
});


Route::prefix('admin_ajax')->group(function () {
    //San Pham
    Route::post('view_san_pham', [AjaxAdminController::class, 'view_san_pham']);
    Route::post('destroy_san_pham', [AjaxAdminController::class, 'destroy_san_pham']);

    //Thoung hieu
    Route::post('show_thuong_hieu', [AjaxAdminController::class, 'show_thuong_hieu']);
    Route::post('thuong-hieu-co-sp', [AjaxAdminController::class, 'thuong_hieu_co_sp']);
    Route::post('them-thuong-hieu', [AjaxAdminController::class, 'add_thuong_hieu']);
    Route::delete('xoa-thuong-hieu', [AjaxAdminController::class, 'xoa_thuong_hieu']);
});




//LOGIN QUẢN TRỊ
Route::prefix('admin')->group(function () {
    Route::get('login', [AdminController::class, 'login'])->name('admin/login');
    Route::post('login', [AdminController::class, 'authenticate_login']);
    Route::get('logout', [AdminController::class, 'logout']);
});

//TRANG QUẢN TRỊ
Route::group(['prefix' => 'quan-ly', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index']);

    Route::get('/', [AdminChartController::class, 'index']);

    Route::prefix('sp-va-dh')->group(function () {
        Route::get('/', [AdminSanPhamController::class, 'index']);
        Route::get('chi-tiet-san-pham/{id}', [AdminSanPhamController::class, 'view_san_pham'])->where('id', '[0-9]+');
        Route::get('them-san-pham', [AdminSanPhamController::class, 'create']);
        Route::post('them-san-pham', [AdminSanPhamController::class, 'store']);
        Route::get('sua-san-pham/{id}', [AdminSanPhamController::class, 'modify'])->where('id', '[0-9]+');
        Route::put('sua-san-pham/{id}', [AdminSanPhamController::class, 'update'])->where('id', '[0-9]+');
        Route::delete('xoa-san-pham/{id}', [AdminSanPhamController::class, 'destroy'])->where('id', '[0-9]+')
        ->name('sp.xoa-san-pham');
    });

    Route::get('thong-ke', [AdminChartController::class, 'index']);

    Route::prefix('don-hang')->group(function() {
        Route::get('/', [AdminDonHangController::class, 'index']);
    });
});


Route::get('/editor', [TestController::class, 'editor']);

//Test
Route::get('/test', [TestController::class, 'index']);
