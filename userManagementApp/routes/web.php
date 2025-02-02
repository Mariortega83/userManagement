<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;

Auth::routes(['verify' => true]);


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'home'])->name('home')->middleware(['auth', 'verified']);
Route::get('/verificado', [HomeController::class, 'verificado'])->name('verificado');

Route::get('/superAdmin', [SuperAdminController::class, 'index'])->name('superAdmin'); 
                            

Route::get('/admin', [AdminController::class, 'index'])->middleware('role:admin')->name('admin');
Route::get('/user', [UserController::class, 'index'])->middleware('role:user')->name('user');