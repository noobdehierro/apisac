<?php

namespace App\Http\Controllers;

use App\Models\Debtor;
use Illuminate\Http\Request;

class DebtorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $debtors = Debtor::all();
        return view('adminhtml.debtors.index', compact('debtors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminhtml.debtors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'access_code' => 'required',
            'credit_number' => 'required',
            'full_name' => 'required',
            'status' => 'required',
            'remainingDebt' => 'nullable',
            'nextPayday' => 'nullable',
            'capital' => 'required',
            'sce' => 'required',
            'minimum_to_collect' => 'required',
            'cash' => 'required',
            'nameInCash' => 'required',
            '1_3_months' => 'required',
            'nameIn1_3' => 'nullable',
            '4_6_months' => 'required',
            'nameIn4_6' => 'nullable',
            '7_12_months' => 'required',
            'nameIn7_12' => 'nullable',
            '13_18_months' => 'required',
            'nameIn13_18' => 'nullable',
            '19_24_months' => 'required',
            'nameIn19_24' => 'nullable',
            'payment_reference' => 'required',
            'agreement' => 'required',
            'payment_bank' => 'required',
            'interbank_key' => 'required',
            'product' => 'required',
            'phone' => 'required',
            'email' => 'nullable',
            'portfolio' => 'required',
            'phone_1' => 'nullable',
            'phone_2' => 'nullable',
        ]);

        Debtor::create($request->all());

        return redirect()->route('debtors.index')->with('success', 'Debtor created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Debtor  $debtor
     * @return \Illuminate\Http\Response
     */
    public function show(Debtor $debtor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Debtor  $debtor
     * @return \Illuminate\Http\Response
     */
    public function edit(Debtor $debtor)
    {
        return view('adminhtml.debtors.edit', compact('debtor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Debtor  $debtor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Debtor $debtor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Debtor  $debtor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Debtor $debtor)
    {
        //
    }
}
