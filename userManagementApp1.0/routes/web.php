<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\SuperAdminMiddleware;

Auth::routes(['verify' => true]);

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('auth.login');
});

Route::get('/home', [HomeController::class, 'home'])->middleware('verified')->name('home');

Route::get('/superAdmin', [SuperAdminController::class, 'home'])->middleware('verified', SuperAdminMiddleware::class)->name('superAdmin.index');
Route::get('/admin', [AdminController::class, 'home'])->middleware([ 'verified', AdminMiddleware::class])->name('admin.index');


Route::patch('superAdmin/edit/{id}', [SuperAdminController::class, 'update'])->name('superAdmin.update');
Route::delete('/superAdmin/delete/{id}', [SuperAdminController::class, 'destroy'])->name('superAdmin.destroy');
Route::patch('superAdmin/verify/{id}', [SuperAdminController::class, 'verify'])->name('superAdmin.verify');







Route::post('/superadmin/store', [SuperAdminController::class, 'store'])->name('superAdmin.store');





