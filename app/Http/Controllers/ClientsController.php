<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {

        $clients = Clients::paginate(10);
        return view('adminhtml.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('adminhtml.clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'access_code' => 'required',
        ]);

        Clients::create($request->all());
        return redirect()->route('clients.index')->with('success', 'Client created successfully');
    }

    public function edit(Clients $client)
    {
        return view('adminhtml.clients.edit', compact('client'));
    }

    public function update(Request $request, Clients $client)
    {

        $request->validate([
            'name' => 'required',
            'access_code' => 'required',
        ]);

        $client->update($request->all());
        return redirect()->route('clients.index')->with('success', 'Client updated successfully');
    }

    public function destroy(Clients $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully');
    }
}
