<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\DanhmucController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SachController;
use App\Http\Controllers\SupplieresController;
use App\Http\Controllers\TheloaiController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ActiveController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [IndexController::class, 'home'])->name('homePage');

//admin 
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth', 'checkAccount']], function () {
    Route::resource('/cart', CartController::class);
    Route::resource('/chapter', ChapterController::class);
    Route::resource('/danhmuc', DanhmucController::class);
    Route::resource('/products', ProductsController::class);
    Route::resource('/sach', SachController::class);
    Route::resource('/supplieres', SupplieresController::class);
    Route::resource('/theloai', TheloaiController::class);
    Route::resource('/truyen', TruyenController::class);
});

Route::get('/theo-doi', [ActiveController::class, 'theodoi'])->name('theodoi');
Route::get('/yeu-thich/{slug}/{id}', [ActiveController::class, 'yeuthich']);
Route::get('/huy-bo/{slug}/{id}', [ActiveController::class, 'huybo']);
Route::get('/history', [ActiveController::class, 'lichsu'])->name('lichsu');
Route::get('/xoa-lich-su/{mangaId}/{usesId}', [ActiveController::class, 'removelichsu']);


Route::get('/danh-muc/{slug}', [IndexController::class, 'danhmuc']);
Route::get('/xem-truyen/{slug}', [IndexController::class, 'xemtruyen']);
Route::get('/xem-chapter/{slug}', [IndexController::class, 'xemchapter']);
Route::get('/the-loai/{slug}', [IndexController::class, 'theloai']);
Route::get('/doc-truyen', [IndexController::class, 'doctruyen']);
Route::get('/doc-sach', [IndexController::class, 'docsach']);
Route::post('/xemsachnhanh', [IndexController::class, 'xemsachnhanh']);
Route::post('/vnpay_payment', [IndexController::class, 'vnpay_payment']);

Route::get('/mua-sam', [IndexController::class, 'muasam']);
Route::get('/product-detail/{slug}', [IndexController::class, 'productdetail']);

Route::get('/tim-kiem', [IndexController::class, 'timkiem']);
// Route::post('/timkiem-ajax', [IndexController::class, 'timkiem_ajax']);

Route::post('/truyennoibat', [TruyenController::class, 'truyennoibat']);

Auth::routes();


// Cart
Route::post('/save-cart', [CartController::class, 'save_cart']);
