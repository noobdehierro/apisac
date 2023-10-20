<?php

namespace App\Http\Controllers;

use App\Models\Recuperation;
use Illuminate\Http\Request;

class RecuperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recuperations = Recuperation::paginate(15);
        return view('adminhtml.recuperations.index', compact('recuperations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recuperation  $recuperation
     * @return \Illuminate\Http\Response
     */
    public function show(Recuperation $recuperation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recuperation  $recuperation
     * @return \Illuminate\Http\Response
     */
    public function edit(Recuperation $recuperation)
    {
        return view('adminhtml.recuperations.edit', compact('recuperation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Recuperation  $recuperation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recuperation $recuperation)
    {
        $request->validate([
            'status' => 'required',
        ]);

        $recuperation->status = $request->status;
        $recuperation->save();

        return redirect()->route('recuperations.index')->with('success', 'Recovery updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recuperation  $recuperation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recuperation $recuperation)
    {
        $recuperation->delete();

        return redirect()->route('recuperations.index')->with('success', 'Recovery updated successfully');
    }
}
