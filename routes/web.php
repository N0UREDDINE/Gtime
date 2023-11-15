<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ConsulterController;
use App\Http\Controllers\ParJourController;

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

Route::get('/', function () {return view('welcome');});

Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//EMPLOYE
Route::get('/employe', [employeController::class, 'index'])->name('employe');

Route::get('/employe/ajouter', [employeController::class, 'create'])->name('createEmploye');
Route::post('/employe/ajouter', [employeController::class, 'store']);

Route::get('/employe/{employe}/edit', [employeController::class, 'edit']);
Route::put('/employe/{employe}/edit', [employeController::class, 'update']);

Route::delete('/employe/{employe}', [employeController::class, 'destroy'])->name('destroyEmploye');

//ROLE

Route::get('/role', [RoleController::class, 'index'])->name('role');

Route::get('/role/ajouter', [RoleController::class, 'create'])->name('createRole');
Route::post('/role/ajouter', [RoleController::class, 'store']);

Route::get('/role/{role}/edit', [RoleController::class, 'edit']);
Route::put('/role/{role}/edit', [RoleController::class, 'update']);

Route::delete('/role/{role}', [RoleController::class, 'destroy'])->name('destroyRole');


// Consulter
Route::get('/consulter', [ConsulterController::class, 'index'])->name('consulter');

//ParJour
Route::get('/Parjour', [ParJourController::class, 'index'])->name('ParJour');


require __DIR__.'/auth.php';
