<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
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


Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::get('/thanks',[ContactController::class,'store']);

// Route::middleware('auth')->group(function () {
  // Route::get('/register', [AuthController::class, 'index']);
  // Route::post('/register',[AuthController::class,'store']);
  // Route::post('/login',[AuthController::class,'store']);

  Route::get('/admin', [AdminController::class, 'index']);
  Route::get('/search', [AdminController::class, 'search']);
  // });

