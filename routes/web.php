<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ActivityController;
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

Route::resource('member', MemberController::class);
// Route::get('member', [MemberController::class, 'index']);
// Route::get('member/create', [MemberController::class, 'create']);
// Route::get('member/{id}', [MemberController::class, 'show']);
// Route::post('member', [MemberController::class, 'store']);
// Route::get('member/{id}/edit', [MemberController::class, 'edit']);
// Route::put('member/{id}', [MemberController::class, 'update']);
// Route::delete('member/{id}', [MemberController::class, 'destroy']);

Route::resource('activity', ActivityController::class);
// Route::get('activity', [ActivityController::class, 'index']);
// Route::get('activity/create', [ActivityController::class, 'create']);
// Route::get('activity/{id}', [ActivityController::class, 'show']);
// Route::post('activity', [ActivityController::class, 'store']);
// Route::get('activity/{id}/edit', [ActivityController::class, 'edit']);
// Route::put('activity/{id}', [ActivityController::class, 'update']);
// Route::delete('activity/{id}', [ActivityController::class, 'destroy']);