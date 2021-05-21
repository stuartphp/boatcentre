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

Route::middleware(['auth', 'web'])->prefix('admin')->group(function(){
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('website/banners', [\App\Http\Controllers\Admin\Website\BannersController::class, 'index']);
    Route::get('boats', [\App\Http\Controllers\Admin\BoatsController::class, 'index']);
    Route::get('categories', [\App\Http\Controllers\Admin\BoatCategoriesController::class, 'index']);
    Route::get('manufacturers', [\App\Http\Controllers\Admin\ManufacturersController::class, 'index']);
    Route::get('counters', [\App\Http\Controllers\Admin\CountersController::class, 'index']);
    Route::get('dealers', [\App\Http\Controllers\Admin\DealersController::class, 'index']);
    Route::get('dealers/info/{id}', [\App\Http\Controllers\Admin\DealersController::class, 'info']);

});

Route::any('/{any}', [App\Http\Controllers\Site\MainController::class, 'index']);
