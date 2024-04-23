<?php

use App\Http\Controllers\AgreementsController;
use App\Http\Controllers\ClarificationController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DebtorController;
use App\Http\Controllers\DebtsController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecuperationController;
use App\Http\Controllers\StatusNotificationController;
use App\Http\Controllers\UnknownsController;
use App\Models\Clarification;
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

// Route::get('/', function () {
//     return view('adminhtml.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('adminhtml.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/payments', [PaymentsController::class, 'index'])->name('payments.index');
    Route::get('/payments/Create', [PaymentsController::class, 'create'])->name('payments.create');
    Route::post('/payments', [PaymentsController::class, 'store'])->name('payments.store');
    Route::get('/payments/{debtor}', [PaymentsController::class, 'show'])->name('payments.show');
    Route::get('/payments/{payments}/Edit', [PaymentsController::class, 'edit'])->name('payments.edit');
    Route::put('/payments/{payments}', [PaymentsController::class, 'update'])->name('payments.update');
    Route::delete('/payments/{payments}', [PaymentsController::class, 'destroy'])->name('payments.destroy');

    Route::get('/agreements', [AgreementsController::class, 'index'])->name('agreements.index');
    Route::get('/agreements/Create', [AgreementsController::class, 'create'])->name('agreements.create');
    Route::post('/agreements', [AgreementsController::class, 'store'])->name('agreements.store');
    Route::get('/agreements/{agreements}/Edit', [AgreementsController::class, 'edit'])->name('agreements.edit');
    Route::put('/agreements/{agreements}', [AgreementsController::class, 'update'])->name('agreements.update');
    Route::delete('/agreements/{agreements}', [AgreementsController::class, 'destroy'])->name('agreements.destroy');

    Route::get('/debtors', [DebtorController::class, 'index'])->name('debtors.index');
    Route::get('/debtors/create', [DebtorController::class, 'create'])->name('debtors.create');
    Route::post('/debtors', [DebtorController::class, 'store'])->name('debtors.store');
    Route::get('/debtors/{debtor}', [DebtorController::class, 'show'])->name('debtors.show');
    Route::get('/debtors/{debtor}/edit', [DebtorController::class, 'edit'])->name('debtors.edit');
    Route::put('/debtors/{debtor}', [DebtorController::class, 'update'])->name('debtors.update');
    Route::delete('/debtors/{debtor}', [DebtorController::class, 'destroy'])->name('debtors.destroy');

    Route::get('/maps', [MapsController::class, 'index'])->name('maps.index');

    Route::get('/clarifications', [ClarificationController::class, 'index'])->name('clarification.index');
    Route::get('/clarifications/{clarification}', [ClarificationController::class, 'show'])->name('clarification.show');

    Route::get('/helps', [HelpController::class, 'index'])->name('helps.index');

    Route::get('/unknowns', [UnknownsController::class, 'index'])->name('unknowns.index');

    Route::get('/recuperations', [RecuperationController::class, 'index'])->name('recuperations.index');
    Route::get('/recuperations/{recuperation}/edit', [RecuperationController::class, 'edit'])->name('recuperations.edit');
    Route::put('/recuperations/{recuperation}', [RecuperationController::class, 'update'])->name('recuperations.update');
    Route::delete('/recuperations/{recuperation}', [RecuperationController::class, 'destroy'])->name('recuperations.destroy');

    Route::get('/statusNotifications', [StatusNotificationController::class,'index'])->name('statusNotifications.index');
    Route::get('/statusNotifications/create', [StatusNotificationController::class,'create'])->name('statusNotifications.create');
    Route::post('/statusNotifications', [StatusNotificationController::class,'store'])->name('statusNotifications.store');
});

require __DIR__ . '/auth.php';
