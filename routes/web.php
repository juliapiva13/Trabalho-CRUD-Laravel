<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\VeiculoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Comprador\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MarcaController;
use App\Http\Controllers\Admin\ModeloController;
use App\Http\Controllers\Admin\CorController;
use App\Http\Controllers\Admin\VeiculoController as AdminVeiculoController;

// Rotas Públicas
Route::get('/', [VeiculoController::class, 'index'])->name('veiculos.index');
Route::get('/veiculos/{id}', [VeiculoController::class, 'show'])->name('veiculos.show');

// Rotas de Registro e Login para Compradores
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rotas do Perfil do Comprador (protegidas por autenticação)
Route::middleware('auth')->prefix('comprador')->name('comprador.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/change-password', [ProfileController::class, 'showChangePasswordForm'])->name('profile.change-password');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
    Route::get('/profile/delete', [ProfileController::class, 'showDeleteForm'])->name('profile.delete');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rotas de Login para Administradores
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// Rotas Administrativas (protegidas por autenticação e middleware admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // CRUD Marcas
    Route::resource('marcas', MarcaController::class);
    
    // CRUD Modelos
    Route::resource('modelos', ModeloController::class);
    
    // CRUD Cores
    Route::resource('cores', CorController::class);
    
    // CRUD Veículos
    Route::resource('veiculos', AdminVeiculoController::class);
});
