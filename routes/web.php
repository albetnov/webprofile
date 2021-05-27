<?php

use App\Http\Controllers\ManageLogin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;

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
//Company Profile
Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/service', [UserController::class, 'service'])->name('service');
Route::get('/team', [UserController::class, 'team'])->name('team');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');
Route::post('/send_contact', [UserController::class, 'send_contact'])->name('scontact');
//Login
Route::view('/login', 'auth.login')->name('login');
Route::post('/otwmasuk', [ManageLogin::class, 'proses_login'])->name('login_akun');
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cek_level:admin']], function () {
        //Dashboard
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admdashboard');
        Route::post('/admin/modcuracc', [AdminController::class, 'modcuracc'])->name('modcuracc');
        Route::post('/admin/modcurpass', [AdminController::class, 'modcurpass'])->name('modcurpass');
        Route::post('/admin/modcurmail', [AdminController::class, 'modcurmail'])->name('modcurmail');
        //User Account
        Route::get('/admin/useracc', [AdminController::class, 'useracc'])->name('useracc');
        Route::view('/admin/user/add', 'admin.user.useradd')->name('adduser');
        Route::post('/admin/user/action_add', [AdminController::class, 'adduser'])->name('actaddusr');
        Route::get('/admin/user/detail/{id}', [AdminController::class, 'detuser']);
        Route::get('/admin/user/edit/{id}', [AdminController::class, 'moduser']);
        Route::post('/admin/user/act_edit/{id}', [AdminController::class, 'actmoduser']);
        Route::get('/admin/user/del/{id}', [AdminController::class, 'deluser']);
        Route::post('/admin/user/modpass/{id}', [AdminController::class, 'modpass']);
        //Contact
        Route::get('/admin/user/viscontact', [AdminController::class, 'getcontact'])->name('viscontact');
        Route::get('/admin/user/viscontact/detail/{id}', [AdminController::class, 'detcontact']);
        Route::get('/admin/user/viscontact/del/{id}', [AdminController::class, 'delcontact']);
        //Page Adjustments
        //Base
        Route::get('/admin/page/change_base', [AdminController::class, 'getbase'])->name('adjbase');
        Route::post('/admin/page/edit_base', [AdminController::class, 'base_edit'])->name('edtbase');
        //Home
        Route::get('/admin/page/change_home', [AdminController::class, 'gethome'])->name('adjhome');
        Route::post('/admin/page/edit_home', [AdminController::class, 'act_home'])->name('edthome');
        Route::post('/admin/page/ch_corousel', [AdminController::class, 'chbg_home'])->name('chchome');
        //About
        Route::get('/admin/page/change_about', [AdminController::class, 'getabout'])->name('adjabout');
        Route::post('/admin/page/edit_about', [AdminController::class, 'about_edit'])->name('edtabout');
        //Service
        Route::get('/admin/page/service', [AdminController::class, 'getservice'])->name('adjservice');
        Route::view('/admin/page/service/add', 'admin.pageadj.addservice')->name('addservice');
        Route::post('/admin/page/service/save', [AdminController::class, 'add_service'])->name('addsvc');
        Route::get('/admin/page/service/edit/{id}', [AdminController::class, 'editsvc']);
        Route::post('/admin/page/service/edit/save/{id}', [AdminController::class, 'act_editsvc']);
        Route::get('/admin/page/service/delete/{id}', [AdminController::class, 'delsvc']);
        //Staff Announcement
        Route::get('/admin/staff/staff_announcement', [AdminController::class, 'getstaff'])->name('staffanc');
        Route::view('/admin/staff/add', 'admin.staff.addstaffanc')->name('addstaffanc');
        Route::post('/admin/staff/save', [AdminController::class, 'savestaffanc'])->name('savestaffanc');
        Route::get('/admin/staff/edit/{id}', [AdminController::class, 'editstfanc']);
        Route::post('/admin/staff/save_edit/{id}', [AdminController::class, 'act_editstfanc']);
        Route::get('/admin/staff/delete/{id}', [AdminController::class, 'del_staffanc']);
    });
    Route::group(['middleware' => ['cek_level:staff']], function () {
        Route::get('/staff_announcement', [StaffController::class, 'index'])->name('index_staff');
    });
    Route::get('/logout', [ManageLogin::class, 'logout'])->name('logout');
});
