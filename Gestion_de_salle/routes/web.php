<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MealsController;
use App\Http\Controllers\OffersController;


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
Route::get('/', [PagesController::class, 'login']);
Route::get('register', [PagesController::class, 'register']);
Route::get('login', [PagesController::class, 'login'])->name('login');
Route::get('home', [PagesController::class, 'home'])->middleware(['auth', 'auth:web']);
Route::get('about', [PagesController::class, 'about']);
Route::get('meals', [PagesController::class, 'meals'])->middleware(['auth', 'auth:web']);
Route::get('offers', [PagesController::class, 'offers']);
Route::post('signup', [UserController::class, 'signup']);
Route::post('signin', [UserController::class, 'signin']);
Route::get('logout', [UserController::class, 'logout']);



Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('dash', [PagesController::class, 'dash']);
    Route::post('addmeal', [MealsController::class, 'addmeal']);
    Route::post('addcatmeal', [MealsController::class, 'addcatmeal']);
    Route::post('addoffer', [OffersController::class, 'addoffer']);
    Route::post('addcatoffer', [OffersController::class, 'addcatoffer']);
    Route::GET('deletecatmeal/{id}', [MealsController::class, 'deletecatmeal']);
    Route::GET('deletecatoffer/{id}', [OffersController::class, 'deletecatoffer']);
});



Route::get('checkout', 'App\Http\Controllers\StripeController@checkout')->name('checkout');
Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');