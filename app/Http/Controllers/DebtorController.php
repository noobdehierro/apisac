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
            'one_three_months' => 'required',
            'nameInOne_threeMonths' => 'nullable',
            'four_six_months' => 'required',
            'nameInFour_sixMonths' => 'nullable',
            'seven_twelve_months' => 'required',
            'nameInSeven_twelveMonths' => 'nullable',
            'thirteen_eighteen_months' => 'required',
            'nameInThirteen_eighteenMonths' => 'nullable',
            'nineteen_twentyfour_months' => 'required',
            'nameInNineteen_twentyfourMonths' => 'nullable',
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
            'one_three_months' => 'required',
            'nameInOne_threeMonths' => 'nullable',
            'four_six_months' => 'required',
            'nameInFour_sixMonths' => 'nullable',
            'seven_twelve_months' => 'required',
            'nameInSeven_twelveMonths' => 'nullable',
            'thirteen_eighteen_months' => 'required',
            'nameInThirteen_eighteenMonths' => 'nullable',
            'nineteen_twentyfour_months' => 'required',
            'nameInNineteen_twentyfourMonths' => 'nullable',
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

        $debtor->update($request->all());

        return redirect()->route('debtors.index')->with('success', 'Debtor updated successfully');
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
