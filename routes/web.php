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
Route::get('/showroom/detail/{id}', [App\Http\Controllers\Site\ShowroomController::class, 'detail']);

Auth::routes();
Route::post('auth/dealer', [\App\Http\Controllers\RegisterController::class, 'dealer']);
Route::post('auth/private', [\App\Http\Controllers\RegisterController::class, 'private']);

Route::middleware(['auth', 'web'])->prefix('admin')->group(function(){
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('website/banners', [\App\Http\Controllers\Admin\Website\BannersController::class, 'index']);
    Route::resource('boats', \App\Http\Controllers\Admin\BoatsController::class);
    Route::get('categories', [\App\Http\Controllers\Admin\BoatCategoriesController::class, 'index']);
    Route::get('manufacturers', [\App\Http\Controllers\Admin\ManufacturersController::class, 'index']);
    Route::get('counters', [\App\Http\Controllers\Admin\CountersController::class, 'index']);
    Route::get('dealers', [\App\Http\Controllers\Admin\DealersController::class, 'index']);
    Route::get('dealers/info/{id}', [\App\Http\Controllers\Admin\DealersController::class, 'info']);
    Route::get('boats/images/{id}', [\App\Http\Controllers\Admin\BoatsController::class, 'images']);
    Route::get('boats/additional/{id}', [\App\Http\Controllers\Admin\BoatsController::class, 'additional']);
    Route::get('users', [\App\Http\Controllers\Admin\UsersController::class, 'index']);
    // Stock
    Route::resource('stock/items', \App\Http\Controllers\Admin\StockItemsController::class);
    //Search
    Route::post('/search/manufacturers', [\App\Http\Controllers\Admin\SearchController::class, 'manufacturers']);
    Route::post('/search/models', [\App\Http\Controllers\Admin\SearchController::class, 'models']);
    Route::post('/search/city', [\App\Http\Controllers\Admin\SearchController::class, 'city']);
    Route::post('/search/categories/{id?}', [\App\Http\Controllers\Admin\SearchController::class, 'categories']);
});

Route::any('/{any}', [App\Http\Controllers\Site\MainController::class, 'index']);
