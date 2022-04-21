<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\AuthController;
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
Route::get('/', [TodoController::class, 'index'])->middleware('auth');

Route::post('/create', [TodoController::class, 'create']);
Route::delete('/destroy/{id}', [TodoController::class, 'destroy']);
Route::patch('/update', [TodoController::class, 'update']);

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register/create', [AuthController::class, 'register_insert']);

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login/create', [AuthController::class, 'login_insert']);
Route::post('/logout', [AuthController::class, 'logout']);
