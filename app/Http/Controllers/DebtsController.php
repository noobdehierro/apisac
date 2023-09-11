<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use App\Models\Debts;
use Illuminate\Http\Request;

class DebtsController extends Controller
{
    public function index()
    {

        $debts = Debts::paginate(10);
        return view('adminhtml.debts.index', compact('debts'));
    }

    public function create()
    {
        $debtClientIds = Debts::pluck('client_id');

        $clients = Clients::whereNotIn('id', $debtClientIds)->get();


        return view('adminhtml.debts.create', compact('clients'));
    }

    public function store(Request $request)
    {


        $request->validate([
            'client_id' => 'required:exists:clients,id',
            'debt_amount' => 'required',
            'payment_reference' => 'required',
            'interbank_code' => 'required',
            'payment_bank' => 'required',
            'next_payment_date' => 'nullable',
            'remaining_debt_amount' => 'nullable',
        ]);

        Debts::create($request->all());

        return redirect()->route('debts.index')->with('success', 'Client created successfully');
    }

    public function edit(Debts $debts)
    {

        // dd($debts);

        $debtClientIds = Debts::pluck('client_id');

        $clients = Clients::whereNotIn('id', $debtClientIds)->get();

        return view('adminhtml.debts.edit', compact('debts', 'clients'));
    }

    public function update(Request $request, Debts $debts)
    {

        // dd($request->all());
        try {
            $request->validate([
                'debt_amount' => 'required',
                'payment_reference' => 'required',
                'interbank_code' => 'required',
                'payment_bank' => 'required',
                'next_payment_date' => 'nullable',
                'remaining_debt_amount' => 'nullable',
            ]);

            $debts->update($request->all());
            return redirect()->route('debts.index')->with('success', 'Client updated successfully');
        } catch (\Throwable $th) {

            return redirect()->back()->with('error', $th->getMessage());
        }
    }

    public function destroy(Debts $debts)
    {
        $debts->delete();
        return redirect()->route('debts.index')->with('success', 'Client deleted successfully');
    }
}
