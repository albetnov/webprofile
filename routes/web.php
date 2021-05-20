<?php

use App\Http\Controllers\ManageLogin;
use Illuminate\Support\Facades\Route;
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

Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/service', [UserController::class, 'service'])->name('service');
Route::get('/team', [UserController::class, 'team'])->name('team');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');
Route::post('/send_contact', [UserController::class, 'send_contact'])->name('scontact');
Route::view('/login', 'auth.login')->name('login');
Route::post('/otwmasuk', [ManageLogin::class, 'proses_login'])->name('login_akun');
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_level:admin']], function () {
        Route::view('/admin/dashboard', 'admin.test');
    });
    Route::group(['middleware' => ['cek_level:staff']], function () {
        Route::view('/staff/dashboard', 'admin.test');
    });
    Route::get('/logout', [ManageLogin::class, 'logout'])->name('logout');
});
