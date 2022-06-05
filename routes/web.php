<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\admin\TeamController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\PortopolioController;

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
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware("guest");
Route::post('/clientdestroy', [ClientController::class, 'clientdestroy'])->name('clientdestroy')->middleware("auth");
Route::post('/login', [LoginController::class, 'authenticate']);
Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [DashboardController::class, 'index']);
});    
Route::middleware(['auth'])->prefix('client')->group(function () {
	Route::get('/list', [ClientController::class, 'index'])->name('client');
    Route::post('/destroy', [ClientController::class, 'clientdestroy'])->name('clientdestroy');
    Route::get('/create', [ClientController::class, 'create'])->name('clientcreate');
    Route::get('/edit/{ref}', [ClientController::class, 'edit'])->name('clientedit');
    Route::post('/store', [ClientController::class, 'store'])->name('clientstore');
    Route::post('update/{ref}', [ClientController::class, 'update'])->name('clientupdate');
});
Route::middleware(['auth'])->prefix('teams')->group(function () {
	Route::get('/list', [TeamController::class, 'index'])->name('team');
    Route::post('/destroy', [TeamController::class, 'teamdestroy'])->name('team.destroy');
    Route::get('/create', [TeamController::class, 'create'])->name('team.create');
    Route::get('/edit/{ref}', [TeamController::class, 'edit'])->name('team.edit');
    Route::post('/store', [TeamController::class, 'store'])->name('team.store');
    Route::post('update/{ref}', [TeamController::class, 'update'])->name('team.update');
});
Route::middleware(['auth'])->prefix('portpolio')->group(function () {
	Route::get('/list', [PortopolioController::class, 'index'])->name('portopolio');
    Route::post('/destroy', [PortopolioController::class, 'portopoliodestroy'])->name('portopolio.destroy');
    Route::get('/create', [PortopolioController::class, 'create'])->name('portopolio.create');
    Route::get('/edit/{ref}', [PortopolioController::class, 'edit'])->name('portopolio.edit');
    Route::post('/store', [PortopolioController::class, 'store'])->name('portopolio.store');
    Route::post('update/{ref}', [PortopolioController::class, 'update'])->name('portopolio.update');
});

