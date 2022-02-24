<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\TheraphistController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::view('/home','user.home')->name('home');
Route::get('/index',[UserController::class, 'index'])->name('index');
Route::post('/status', [UserController::class, 'update'])->name('update');
Route::get('delete-appointment/{id}', [AppointmentController::class, 'destroy']);
Route::post('filter-appointment', [AppointmentController::class, 'filterAppointments']);

Route::prefix('admin')->group(function(){
    Route::middleware(['guest:admin'])->group(function(){
        Route::view('/login', 'admin.login')->name('admin.login');
        Route::post('/dologin', [AdminController::class, 'dologin'])->name('dologin');
    });
    Route::middleware(['auth:admin'])->group(function(){
        Route::view('/home', 'admin.home')->name('admin.home');
        Route::get('/index', [AppointmentController::class, 'index'])->name('appointment.index');
        Route::get('/create', [AppointmentController::class, 'create'])->name('appointment.create');
        Route::post('/store', [AppointmentController::class, 'store'])->name('appointment.store');
        Route::get('/theraphist-index', [TheraphistController::class, 'index'])->name('theraphist.index');
        Route::get('/theraphist-create', [TheraphistController::class, 'create'])->name('theraphist.create');
        Route::post('/theraphist-store', [TheraphistController::class, 'store'])->name('theraphist.store');
        Route::get('/client-index', [ClientController::class, 'index'])->name('client.index');
        Route::get('/client-create', [ClientController::class, 'create'])->name('client.create');
        Route::post('/client-store', [ClientController::class, 'store'])->name('client.store');
        Route::get('/room-index', [RoomController::class, 'index'])->name('room.index');
        Route::get('/room-create', [RoomController::class, 'create'])->name('room.create');
        Route::post('/room-store', [RoomController::class, 'store'])->name('room.store');
    });
});