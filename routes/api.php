<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CompanyController;

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
