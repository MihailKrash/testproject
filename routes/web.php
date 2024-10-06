<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\AutoPageController;
use App\Http\Controllers\AdminController;

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


Route::get('/', [MainPageController::class, 'main'])->name('main');
Route::get('/admin', [AdminController::class, 'index'])->name('admin');
Route::get('/parse', [AdminController::class, 'parse'])->name('parse');
Route::get('/select', [MainPageController::class, 'select'])->name('select');

Route::delete('/dellcity/name', [AdminController::class, 'dellCityApi'])->name('dellCityApi');
Route::post('/addcity', [AdminController::class, 'addCityApi'])->name('addCityApi');

Route::get('{city}', [AutoPageController::class, 'cityMainPage']);
Route::get('{city}/about', [AutoPageController::class, 'cityAboutPage']);
Route::get('{city}/news', [AutoPageController::class, 'cityNewsPage']);


