<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\OfficeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('index');
})->name('login');

Route::post('/login', [authController::class, 'login']);
Route::get('/logout', [authController::class, 'logout']);

Route::middleware(['authm'])->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/departments', DepartmentController::class);
    Route::resource('/offices', OfficeController::class);
});
