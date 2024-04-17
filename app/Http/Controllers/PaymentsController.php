<?php

namespace App\Http\Controllers;

use App\Models\Debtor;
use App\Models\Payments;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    public function index()
    {

        $payments = Payments::select('debtor_id')
            ->selectRaw('COUNT(id) AS total_payments')
            ->selectRaw('SUM(paid_amount) AS total_paid_amount')
            ->groupBy('debtor_id')
            ->paginate(15);

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

    public function show($debtor)
    {

        // dd($debtor);

        $payments = Payments::where('debtor_id', $debtor)->paginate(15);


        return view('adminhtml.payments.show', compact('payments'));
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
        return redirect()->route('payments.index')->with('success', 'Client deleted successfully');
    }
}
