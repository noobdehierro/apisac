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

Route::post('/check-agreements', [ClientsController::class, 'checkagreements']);

Route::get('/pdf/{access_code}', [ClientsController::class, 'pdf']);
Route::get('/pdfplazos/{access_code}', [ClientsController::class, 'pdfplazos']);

Route::post('/addagreements/{client}', [ClientsController::class, 'addagreements']);

Route::post('/set_agreements', [ClientsController::class, 'setagreements']);


Route::post('/addagreementscuotas', [ClientsController::class, 'addagreementsCuotas']);




// Route::get('/pdf', function () {
//     $pdf = Pdf::loadView('pdf.pdf', [
//         'name' => 'John Doe',
//         'age' => 50,
//     ]);
//     return $pdf->stream();
// })->name('pdf');