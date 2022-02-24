<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\SesionController;
use Illuminate\Support\Facades\DB;

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



Route::resource('users', UserController::class)->middleware('role');;
// Route::resource('users', UserController::class);
//Route::get('user', [UserController::class, 'index']);
// Route::get('user/create', [UserController::class, 'create']);
// Route::get('user/{id}', [UserController::class, 'show']);
// Route::post('user', [UserController::class, 'store']);
// Route::get('user/{id}/edit', [UserController::class, 'edit']);
// Route::put('user/{id}', [UserController::class, 'update']);
// Route::delete('user/{id}', [UserController::class, 'destroy']);

// Route::get('/users', function(){
//     return view('home');
// })

Route::resource('activities', ActivityController::class);
// Route::get('activity', [ActivityController::class, 'index']);
// Route::get('activity/create', [ActivityController::class, 'create']);
// Route::get('activity/{id}', [ActivityController::class, 'show']);
// Route::post('activity', [ActivityController::class, 'store']);
// Route::get('activity/{id}/edit', [ActivityController::class, 'edit']);
// Route::put('activity/{id}', [ActivityController::class, 'update']);
// Route::delete('activity/{id}', [ActivityController::class, 'destroy']);

Route::get('/sesions/filter', [SesionController::class, 'filter']);

Route::get('/sesions/search/{id}', [SesionController::class, 'search']);

// Route::get('/sesions/sign', [SesionController::class, 'sign']);
Route::get('/sesions/sign/{id}', [SesionController::class, 'sign']);
Route::get('/sesions/filterView', [SesionController::class, 'filterView']);
Route::get('/sesions/filtrado', [SesionController::class, 'filtrado']);
Route::get('/users/show/{id}', [UserController::class, 'show']);
Route::resource('sesions', SesionController::class);
Route::get('/activities/edit/{id}', [ActivityController::class, 'edit']);


Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
