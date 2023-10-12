<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Debtor;
use App\Models\Debts;
use App\Models\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function index()
    {

        $payments = Payments::paginate(10);
        return view('adminhtml.payments.index', compact('payments'));
    }

    public function create()
    {

        // $dataDebts = Debts::select('debts.id as debt_id', 'clients.name as client_name')
        //     ->join('clients', 'debts.client_id', '=', 'clients.id')
        //     ->get();

        $dataDebts = Debtor::all();



        return view('adminhtml.payments.create', compact('dataDebts'));
    }

    public function store(Request $request)
    {


        $request->validate([
            'debtor_id' => 'required:exists:debtors,id',
            'payment_date' => 'required',
            'paid_amount' => 'required',
        ]);

        Payments::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Client created successfully');
    }

    public function edit(Payments $payments)
    {

        $dataDebts = Debts::select('debts.id as debt_id', 'clients.name as client_name')
            ->join('clients', 'debts.client_id', '=', 'clients.id')
            ->get();

        return view('adminhtml.payments.edit', compact('dataDebts', 'payments'));
    }

    public function update(Request $request, Payments $payments)
    {

        $request->validate([
            'debt_id' => 'required:exists:debts,id',
            'payment_date' => 'required',
            'paid_amount' => 'required',
        ]);

        $payments->update($request->all());
        return redirect()->route('payments.index')->with('success', 'Client updated successfully');
    }

    public function destroy(Payments $payments)
    {
        $payments->delete();
        return redirect()->route('debts.index')->with('success', 'Client deleted successfully');
    }
}
