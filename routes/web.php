<?php

use App\Http\Controllers\CampeonatoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerfilController;
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


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Rotas de login e cadastro
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::prefix('campeonatos')
    ->controller(CampeonatoController::class)
    ->name('campeonatos.')
    ->group(function (){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{campeonato}/edit', 'edit')->name('edit');
        Route::put('/{campeonato}', 'update')->name('update');
    });

    Route::prefix('perfil')
    ->controller(PerfilController::class)
    ->name('perfil.')
    ->group(function (){
        Route::get('/{perfil}/edit', 'edit')->name('edit');
        Route::post('/{perfil}', 'update')->name('update');
    });
});

require __DIR__.'/auth.php';
