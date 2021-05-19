<?php

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

Route::get('/', [App\Http\Controllers\Site\MainController::class, 'index']);
Route::get('/contact-us', [App\Http\Controllers\Site\ContactController::class, 'index']);
Route::get('/showroom', [App\Http\Controllers\Site\ShowroomController::class, 'index']);
Route::post('/showroom', [App\Http\Controllers\Site\ShowroomController::class, 'search']);
Route::get('/showroom/detail', [App\Http\Controllers\Site\ShowroomController::class, 'detail']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
