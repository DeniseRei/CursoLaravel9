<?php

use App\Http\Controllers\{
    UserController
};
use Illuminate\Support\Facades\Route;

/*As sequências das rotas tem que ser da seguinte forma*/

Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users',[UserController::class, 'store'])->name('users.store');
Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/{id}', [UserController::class, 'update'])->name('users.update');

Route::get('/', function () {
    return view('welcome');
});
