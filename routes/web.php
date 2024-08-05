<?php

use App\Http\Controllers;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

Route::post('/users/create', [UserController::class, 'save']) ->name('users.save');

Route::GET('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');

Route::POST('/users/edit/{id}', [UserController::class, 'update'])->name('users.update');

Route::get('/users', [UserController::class, 'index']) -> name('users.index');

Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::get('users/search/username', [UserController::class, 'searchByUsername'])->name('users.searchByUsername');
Route::get('/', function (){
    return view('welcome');
});
