<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\SesionController;

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

Route::get('/', function () {
    return view('welcome');
});



Route::resource('user', UserController::class);
//Route::get('user', [UserController::class, 'index']);
// Route::get('user/create', [UserController::class, 'create']);
// Route::get('user/{id}', [UserController::class, 'show']);
// Route::post('user', [UserController::class, 'store']);
// Route::get('user/{id}/edit', [UserController::class, 'edit']);
// Route::put('user/{id}', [UserController::class, 'update']);
// Route::delete('user/{id}', [UserController::class, 'destroy']);

Route::resource('activity', ActivityController::class);
// Route::get('activity', [ActivityController::class, 'index']);
// Route::get('activity/create', [ActivityController::class, 'create']);
// Route::get('activity/{id}', [ActivityController::class, 'show']);
// Route::post('activity', [ActivityController::class, 'store']);
// Route::get('activity/{id}/edit', [ActivityController::class, 'edit']);
// Route::put('activity/{id}', [ActivityController::class, 'update']);
// Route::delete('activity/{id}', [ActivityController::class, 'destroy']);

Route::get('/sesions/filter', [SesionController::class, 'filter']);
Route::get('sesions/search', [SesionController::class, 'search']);
Route::resource('sesions', SesionController::class);



Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
