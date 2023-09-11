<?php

namespace App\Http\Controllers;

use App\Models\Agreements;
use App\Models\Clients;
use App\Models\Debts;
use Illuminate\Http\Request;

class AgreementsController extends Controller
{
    public function index()
    {

        $agreements = Agreements::paginate(10);
        return view('adminhtml.agreements.index', compact('agreements'));
    }

    public function create()
    {

        $agreementClientIds = Agreements::pluck('client_id');

        $clients = Clients::whereNotIn('id', $agreementClientIds)->get();

        return view('adminhtml.agreements.create', compact('clients'));
    }

    public function store(Request $request)
    {


        $request->validate([
            'client_id' => 'required:exists:clients,id',
            'status' => 'required',
            'agreement_type' => 'required',
            'number_installments' => 'nullable',
            'unit_time' => 'nullable',
            'amount_per_installment' => 'nullable',

        ]);

        Agreements::create($request->all());

        return redirect()->route('agreements.index')->with('success', 'Contrato creado exitosamente');
    }

    public function edit(Agreements $agreements)
    {

        $clients = Clients::all();


        return view('adminhtml.agreements.edit', compact('clients', 'agreements'));
    }

    public function update(Request $request, Agreements $agreements)
    {

        $request->validate([
            'status' => 'required',
            'agreement_type' => 'required',
            'number_installments' => 'nullable',
            'unit_time' => 'nullable',
            'amount_per_installment' => 'nullable',
        ]);

        $agreements->update($request->all());
        return redirect()->route('agreements.index')->with('success', 'Client updated successfully');
    }

    public function destroy(Agreements $agreements)
    {
        $agreements->delete();
        return redirect()->route('agreements.index')->with('success', 'Client deleted successfully');
    }
}
