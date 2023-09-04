<?php

use App\Http\Controllers\api\ClientsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/check-client', [ClientsController::class, 'index']);
Route::post('/help', [ClientsController::class, 'help']);
Route::post('/clarification', [ClientsController::class, 'clarification']);

Route::post('/check-map', [ClientsController::class, 'checkmap']);

Route::post('/unknowns', [ClientsController::class, 'unknowns']);
