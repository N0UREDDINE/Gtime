<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ConsulterController;
use App\Http\Controllers\ParJourController;
use App\Http\Controllers\USerController;



Route::get('/', function () {return view('welcome'); });

Route::get('/time', function () {
return view('time'); })->middleware(['auth', 'verified'])->name('time');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});









//MIDDLEWARE///////////////////////////////////////////////////////////////////////////////


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/ajouter', [UserController::class, 'create'])->name('createUser');
    Route::post('/user/ajouter', [UserController::class, 'store']);

    Route::get('/user/{user}/edit', [UserController::class, 'edit']);
    Route::put('/user/{user}/edit', [UserController::class, 'update']);

    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('destroyUser');

    //ROLE///////////////////////////////////////////////////////////////////////////////

    Route::get('/role', [RoleController::class, 'index'])->name('role');

    Route::get('/role/ajouter', [RoleController::class, 'create'])->name('createRole');
    Route::post('/role/ajouter', [RoleController::class, 'store']);

    Route::get('/role/{role}/edit', [RoleController::class, 'edit']);
    Route::put('/role/{role}/edit', [RoleController::class, 'update']);

    Route::delete('/role/{role}', [RoleController::class, 'destroy'])->name('destroyRole');


    // Consulter///////////////////////////////////////////////////////////////////////////////
    Route::get('/consulter', [ConsulterController::class, 'index'])->name('consulter');

    //ParJour///////////////////////////////////////////////////////////////////////////////
    Route::get('/ParJour', [ParJourController::class, 'index'])->name('ParJour');


    Route::get('/time', [TimeController::class, 'index'])->name('time');

});

//Time///////////////////////////////////////////////////////////////////////////////
Route::get('/time', [TimeController::class, 'index'])->name('time');


Route::middleware(['auth', 'role:employe'])->group(function () {
    //Route::get('/time', function () {return view('time');})->middleware(['auth', 'verified'])->name('time');

});



// Route::get('/time/fetch-timer', [TimeController::class, 'fetchTimer'])->middleware('auth');
// Route::post('/time/update-timer', [TimeController::class, 'updateTimer'])->middleware('auth');
// Route::post('/time/save-timer', [TimeController::class, 'saveTimer'])->middleware('auth');


require __DIR__ . '/auth.php';
