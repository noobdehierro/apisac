<?php

namespace App\Http\Controllers;

use App\Models\Debtor;
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
        $dataDebts = Debtor::all();

        return view('adminhtml.payments.create', compact('dataDebts'));
    }

    public function store(Request $request)
    {


        $request->validate([
            'debtor_id' => 'required:exists:debtors,id',
            'payment_date' => 'required',
            'paid_amount' => 'required',
            'status' => 'required',
        ]);

        Payments::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Client created successfully');
    }

    public function edit(Payments $payments)
    {

        return view('adminhtml.payments.edit', compact('payments'));
    }

    public function update(Request $request, Payments $payments)
    {

        $request->validate([
            'payment_date' => 'required',
            'paid_amount' => 'required',
            'status' => 'required',
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
