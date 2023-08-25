<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\StatusController;
use App\Http\Controllers\API\VisitController;
use App\Http\Controllers\API\VisitorController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(CompanyController::class)->group(function () {
    Route::get('companies', 'index');
    Route::get('companies/{company}', 'show');
    Route::post('companies', 'store');
    Route::patch('companies/{company}', 'update');
    Route::delete('companies/{compay}', 'destroy');
});
Route::controller(StatusController::class)->group(function () {
    Route::get('status', 'index');
    Route::get('status/{status}', 'show');
    Route::post('status', 'store');
    Route::patch('status/{statut}', 'update');
    Route::delete('status/{statut}', 'destroy');
});

Route::controller(VisitController::class)->group(function () {
    Route::get('visits', 'index');
    Route::get('visits/{visit}', 'show');
    Route::post('visits', 'store');
    Route::patch('visits/{visit}', 'update');
    Route::delete('visits/{visit}', 'destroy');
});

Route::controller(VisitorController::class)->group(function () {
    Route::get('visitors', 'index');
    Route::get('visitors/{visitor}', 'show');
    Route::post('visitors', 'store');
    Route::patch('visitors/{visiort}', 'update');
    Route::delete('visitors/{visitor}', 'destroy');
});

