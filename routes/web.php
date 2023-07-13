<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OwnerController;

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

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('auth.login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('auth.register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

//Pets
Route::get('/pets', [PetController::class, 'index'])->name('pets');
Route::get('/pets/view', [PetController::class, 'view'])->name('pets.view')->middleware('admin');
Route::get('/pets/create', [PetController::class, 'create'])->name('pets.create')->middleware('user');
Route::post('/pets', [PetController::class, 'store'])->name('pets.store')->middleware('user');

Route::get('/pets/{pet}/edit', [PetController::class, 'edit'])->name('pets.edit')->middleware('admin');
Route::put('/pets/{pet}', [PetController::class, 'update'])->name('pets.update')->middleware('admin');

Route::delete('/pets/{pet}', [PetController::class, 'destroy'])->name('pets.destroy');

//Owner
Route::group(['middleware' => ['auth','admin']], function(){
    Route::get('/owners', [OwnerController::class, 'index'])->name('owners')->middleware('admin');
    Route::get('/owners/view', [OwnerController::class, 'view'])->name('owners.view')->middleware('admin');
    Route::get('/owners/create', [OwnerController::class, 'create'])->name('owners.create')->middleware('admin');
    Route::post('/owners', [OwnerController::class, 'store'])->name('owners.store')->middleware('admin');

    Route::get('/owners/{owner}/edit', [OwnerController::class, 'edit'])->name('owners.edit')->middleware('admin');
    Route::put('/owners/{owner}', [OwnerController::class, 'update'])->name('owners.update')->middleware('admin');

    Route::delete('/owners/{owner}', [OwnerController::class, 'destroy'])->name('owners.destroy')->middleware('admin');
});

//Users
Route::group(['middleware' => ['auth','admin']], function(){
    Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('admin');
    Route::get('/users/view', [UserController::class, 'view'])->name('users.view')->middleware('admin');
});