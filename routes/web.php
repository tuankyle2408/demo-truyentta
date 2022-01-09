<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\TruyenController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserConTroller;
use App\Http\Controllers\TheLoaiConTroller;



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


Route::get('/all-truyen',[IndexController::class,'alltruyen']);

Route::get('/',[IndexController::class,'home']);
Route::get('/danh-muc/{slug}',[IndexController::class,'danhmuc']);

Route::get('/xem-truyen/{slug}',[IndexController::class,'xemtruyen']);
Route::get('/xem-chapter/{slug}',[IndexController::class,'xemchapter']);
Route::get('/the-loai/{slug}',[IndexController::class,'theloai']);
Route::get('/tim-kiem', [IndexController::class,'timkiem']);
Route::get('/tag/{tag}', [IndexController::class,'tag']);

Auth::routes();

Route::group(['middleware' => ['auth']], function () {



Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('/theloai', TheloaiController::class);
Route::resource('/danhmuc', DanhMucController::class);
Route::resource('/truyen',TruyenController::class);
Route::resource('/chapter',ChapterController::class);
Route::resource('/user',UserConTroller::class);
Route::get('/phan-vai-tro/{id}',[UserConTroller::class,'phanvaitro']);
Route::get('/phan-quyen/{id}',[UserConTroller::class,'phanquyen']);
Route::post('insert_roles/{id}',[UserConTroller::class,'insert_roles']);
Route::post('insert_permission/{id}',[UserConTroller::class,'insert_permission']);
Route::post('insert_permission',[UserConTroller::class,'insert_permission_x']);
Route::post('/impersonate/user/{id}',[UserConTroller::class,'impersonate']);

});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





