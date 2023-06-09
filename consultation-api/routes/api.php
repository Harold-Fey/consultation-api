<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PredictionController;
use App\Http\Controllers\DonneesMedicalController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////
Route::resource('patients', PatientController::class)->only([
    'index', 'show', 'store', 'update', 'destroy'
]);

Route::resource('users', UserController::class)->only([
    'index', 'show', 'store', 'update', 'destroy'
]);

Route::resource('predictions', PredictionController::class)->only([
    'index', 'show', 'store', 'destroy'
]);

Route::resource('donnees', DonneesMedicalController::class)->only([
    'index', 'show', 'store', 'update', 'destroy'
]);

Route::middleware('auth:api')->group(function() {
    Route::delete('logout', [LogoutController::class, 'delete']);
    Route::get('roles', [LogoutController::class, 'displayRoles']);

});

Route::post('log-in', [LoginController::class, 'store']);

