<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\auth\LoginController;
use App\Http\Controllers\backend\BackupDatabaseController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ResultController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\SystemAdminController;
use App\Http\Controllers\DownloadPDFController;
use App\Http\Controllers\frontend\ContactController as FrontendContactController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ResultController as FrontendResultController;
use Illuminate\Support\Facades\Route;

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

Route::prefix('')->group(function () {

    /*home route*/
    Route::get('/', [HomeController::class, 'homepage'])->name('homepage');

    /*contact route*/
    Route::get('/contact', [FrontendContactController::class, 'contact'])->name('contact');
    Route::post('/contact', [FrontendContactController::class, 'contact_post'])->name('contact_post');

    /*result route*/
    Route::get('/result/{department}', [FrontendResultController::class, 'index'])->name('index.result');

});







/*backend routes */
Route::prefix('admin')->group(function () {

    /*login route */
    Route::get('login', [LoginController::class, 'loginPage'])->name('admin.loginPage');
    Route::post('login', [LoginController::class, 'login'])->name('admin.login');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

    /*change password route */
    Route::get('change-password', [AdminController::class, 'changePasswordPage'])->name('admin.changePasswordPage');
    Route::post('change-password', [AdminController::class, 'changePassword'])->name('admin.changePassword');

    /*admin profile route*/
    Route::get('my-profile', [AdminController::class, 'profilePage'])->name('admin.profilePage');
    Route::put('change-image', [AdminController::class, 'changeImage'])->name('admin.changeImage');
    Route::get('edit-profile', [AdminController::class, 'editProfilePage'])->name('admin.editProfilePage');
    Route::put('edit-profile', [AdminController::class, 'editProfile'])->name('admin.editProfile');

    /*dashboard route */
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    /*resource controller */
    Route::resource('role', RoleController::class);
    Route::resource('system/admin', SystemAdminController::class);
    Route::resource('backup', BackupDatabaseController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('contact', ContactController::class)->only(['index','destroy']);
    Route::resource('result', ResultController::class);

    /*Ajax call */
    Route::get('check/is_active/{id}', [SystemAdminController::class, 'changeStatus'])->name('admin.active.ajax');
    Route::get('slider/is_active/{id}', [SliderController::class, 'changeStatus'])->name('admin.active.ajax');
    Route::get('result/is_active/{id}', [ResultController::class, 'changeStatus'])->name('admin.active.ajax');


    /*download pdf route*/
    Route::get('download-result/{id}/{file_name}',[DownloadPDFController::class,'downloadResult'])->name('admin.downloadResult');

    /*System backup route*/
    Route::get('/backup/download/{file_name}', [BackupDatabaseController::class, 'download'])->name('admin.backupDownload');
});
