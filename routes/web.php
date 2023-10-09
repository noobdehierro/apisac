<?php

use App\Http\Controllers\AgreementsController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\DebtorController;
use App\Http\Controllers\DebtsController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProfileController;
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
    return view('adminhtml.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('adminhtml.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/clients', [ClientsController::class, 'index'])->name('clients.index');
    Route::get('/clients/Create', [ClientsController::class, 'create'])->name('clients.create');
    Route::post('/clients', [ClientsController::class, 'store'])->name('clients.store');
    Route::get('/clients/{client}/Edit', [ClientsController::class, 'edit'])->name('clients.edit');
    Route::put('/clients/{client}', [ClientsController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{client}', [ClientsController::class, 'destroy'])->name('clients.destroy');

    Route::get('/debts', [DebtsController::class, 'index'])->name('debts.index');
    Route::get('/debts/Create', [DebtsController::class, 'create'])->name('debts.create');
    Route::post('/debts', [DebtsController::class, 'store'])->name('debts.store');
    Route::get('/debts/{debts}/Edit', [DebtsController::class, 'edit'])->name('debts.edit');
    Route::put('/debts/{debts}', [DebtsController::class, 'update'])->name('debts.update');
    Route::delete('/debts/{debts}', [DebtsController::class, 'destroy'])->name('debts.destroy');

    Route::get('/payments', [PaymentsController::class, 'index'])->name('payments.index');
    Route::get('/payments/Create', [PaymentsController::class, 'create'])->name('payments.create');
    Route::post('/payments', [PaymentsController::class, 'store'])->name('payments.store');
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
});

require __DIR__ . '/auth.php';
