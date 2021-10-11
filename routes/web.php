<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/show/{id}', [HomeController::class, 'show']);

Route::get('/profile/{id}', [ProfileController::class, 'index']);

Route::get('/create', [HomeController::class, 'create']);

Route::post('/profile/{id}', [ProfileController::class, 'editProfile']);

Route::post('/create', [HomeController::class, 'createPost']);



Route::get('login', [CustomAuthController::class, 'login']);
Route::get('register', [CustomAuthController::class, 'register']);
Route::post('custom-registration', [CustomAuthController::class, 'store'])->name('register.custom');
Route::post('register', [CustomAuthController::class, 'store']);
Route::post('login', [CustomAuthController::class, 'loginPost']);
Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');