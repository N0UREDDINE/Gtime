<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ConsulterController;
use App\Http\Controllers\ParJourController;
use App\Http\Controllers\USerController;

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

Route::get('/time', function () {return view('time');})->middleware(['auth', 'verified'])->name('time');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//USER
Route::get('/user', [UserController::class, 'index'])->name('user');

Route::get('/user/ajouter', [UserController::class, 'create'])->name('createUser');
Route::post('/user/ajouter', [UserController::class, 'store']);

Route::get('/user/{user}/edit', [UserController::class, 'edit']);
Route::put('/user/{user}/edit', [UserController::class, 'update']);

Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('destroyUser');

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

//Time
Route::get('/time', [TimeController::class, 'index'])->name('time');


//MIDDLEWARE
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Your admin routes here
});

Route::middleware(['auth', 'role:employe'])->group(function () {
    // Your employee routes here
});






Route::get('/admin', function () {
    // Uses CheckRole middleware with 'admin' as the required role
})->middleware('role:admin');

require __DIR__.'/auth.php';
