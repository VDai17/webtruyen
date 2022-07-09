<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\TheloaiController;
use App\Http\Controllers\SachController;
use App\Http\Controllers\UserController;

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

Route::get('/', [IndexController::class, 'home']);

Route::get('danh-muc/{slug}', [IndexController::class, 'danhmuc'])->name('danh-muc');

Route::get('the-loai/{slug}', [IndexController::class, 'theloai'])->name('the-loai');

Route::get('/xem-truyen/{slug}', [IndexController::class, 'xemtruyen'])->name('xem-truyen');

Route::get('/xem-chapter/{slug}', [IndexController::class, 'xemchapter'])->name('xem-chapter');

Route::get('/tags/{tag}', [IndexController::class, 'tags']);

// Route::post('/timkiem-ajax', [IndexController::class, 'timkiem_ajax']);

Route::get('/tim-kiem', [IndexController::class, 'timkiem'])->name('tim-kiem');

Route::get('/doc-sach', [IndexController::class, 'docsach']);

Route::get('/xem-sach/{slug_sach}', [IndexController::class, 'xemsach'])->name('xem-sach');

Route::post('/truyennoibat', [StoryController::class, 'truyennoibat']);

Route::post('/xemsachnhanh', [IndexController::class, 'xemsachnhanh']);







Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'role:admin']], function () {

    Route::resource('/danhmuc', CategoryController::class);

    Route::resource('/theloai', TheloaiController::class);

    Route::resource('/truyen', StoryController::class);

    Route::resource('/chapter', ChapterController::class);

    Route::resource('/sach', SachController::class);

    Route::resource('/user', UserController::class);

    Route::get('/phan-quyen/{id}', [UserController::class, 'phanquyen']);

    Route::get('/phan-vai-tro/{id}', [UserController::class, 'phanvaitro']);

    Route::post('/insert-roles/{id}', [UserController::class, 'insert_roles']);

    Route::post('/insert-roles', [UserController::class, 'insert_rol_roles']);

    Route::post('/insert-permission/{id}', [UserController::class, 'insert_permission']);

    Route::post('/insert-permission', [UserController::class, 'insert_per_permission']);

    Route::get('/impersonate/user/{id}', [UserController::class, 'impersonate']);


});




