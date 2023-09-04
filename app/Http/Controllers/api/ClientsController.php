<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Clarification;
use App\Models\Clients;
use App\Models\Debts;
use App\Models\Help;
use App\Models\Maps;
use App\Models\Payments;
use App\Models\Unknowns;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'access_code' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $access_code = $request->input('access_code');
        $client = Clients::where('access_code', $access_code)->first();

        if (!$client) {
            return response()->json([
                'status' => 'error',
                'message' => 'Client not found',
                'data' => []
            ], 404);
        }


        if ($client->status == 'activated') {

            $clienteActivo = Clients::where('id', $client->id)->first();

            $debtActive = Debts::where('client_id', $client->id)->first();

            $paymentsActive = Payments::where('debt_id', $debtActive->id)->get();

            return response()->json([
                'status' => 'success',
                'message' => 'Client found',
                'data' => [
                    'client' => $clienteActivo,
                    'payments' => $paymentsActive,
                    'debt' => $debtActive
                ]
            ], 200);
        }


        $client->update([
            'status' => 'accessed'
        ]);

        $result = DB::table('clients AS c')
            ->select('c.id AS id', 'c.name AS name', 'c.status AS status', 'd.debt_amount AS debt_amount', 'd.payment_reference AS payment_reference', 'd.payment_bank AS payment_bank')
            ->join('debts AS d', 'c.id', '=', 'd.client_id')
            ->where('c.id', '=', $client->id)
            ->first();
        return response()->json([
            'status' => 'success',
            'message' => 'Client found',
            'data' => $result

        ], 200);
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
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return $request;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function edit(Clients $clients)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clients $clients)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $clients)
    {
        //
    }

    public function help(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'required',
            'cel' => 'nullable',
            'telephone' => 'nullable',
            'email' => ['nullable', 'email'],
            'telephoneContact' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $client_id = $request->input('client_id');
        $cel = $request->input('cel') ?? '';
        $telephone = $request->input('telephone') ?? '';
        $email = $request->input('email') ?? '';
        $telephoneContact = $request->input('telephoneContact') ?? '';

        $client = Clients::where('id', $client_id)->first();

        if (!$client) {
            return response()->json([
                'status' => 'error',
                'message' => 'Client not found',
                'data' => []
            ], 404);
        }

        $res = Help::create([
            'client_id' => $client_id,
            'cel' => $cel,
            'telephone' => $telephone,
            'email' => $email,
            'telephoneContact' => $telephoneContact
        ]);



        return response()->json([
            'status' => 'success',
            'message' => 'Client found',
            'data' => $res
        ]);
    }

    public function checkmap(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'required',
            'route' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $client_id = $request->input('client_id');
        $route = $request->input('route');

        $client = Clients::where('id', $client_id)->first();

        if (!$client) {
            return response()->json([
                'status' => 'error',
                'message' => 'Client not found',
                'data' => []
            ], 404);
        }


        $map = Maps::where('client_id', $client_id)->first();

        if ($map) {

            $help = $route == 'help' ? 1 : $map->help;
            $clarification = $route == 'clarification' ? 1 : $map->clarification;
            $imNot = $route == 'imNot' ? 1 : $map->imNot;
            $interested = $route == 'interested' ? 1 : $map->interested;
            $exhibition = $route == 'exhibition' ? 1 : $map->exhibition;
            $Installments = $route == 'Installments' ? 1 : $map->Installments;

            $map->update([
                'help' => $help,
                'clarification' => $clarification,
                'imNot' => $imNot,
                'interested' => $interested,
                'exhibition' => $exhibition,
                'Installments' => $Installments
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Client found',
                'data' => $map
            ], 200);
        }

        $help = $route == 'help' ? 1 : 0;
        $clarification = $route == 'clarification' ? 1 : 0;
        $imNot = $route == 'imNot' ? 1 : 0;
        $interested = $route == 'interested' ? 1 : 0;
        $exhibition = $route == 'exhibition' ? 1 : 0;
        $Installments = $route == 'Installments' ? 1 : 0;



        $res = Maps::create([
            'client_id' => $client_id,
            'help' => $help,
            'clarification' => $clarification,
            'imNot' => $imNot,
            'interested' => $interested,
            'exhibition' => $exhibition,
            'Installments' => $Installments

        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Client found',
            'data' => $res
        ]);
    }

    public function clarification(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'required',
            'cel' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $client_id = $request->input('client_id');
        $cel = $request->input('cel');
        $telephone = $request->input('telephone');
        $email = $request->input('email');
        $path = $request->file('image')->store('public/images');
        $validator['image'] = $path;



        $client = Clients::where('id', $client_id)->first();

        if (!$client) {
            return response()->json([
                'status' => 'error',
                'message' => 'Client not found',
                'data' => []
            ], 404);
        }

        $data = Clarification::create([
            'client_id' => $client_id,
            'cel' => $cel,
            'telephone' => $telephone,
            'email' => $email,
            'image' => $validator['image']
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Client found',
            'data' => $data
        ]);
    }

    public function unknowns(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'required',
            'response' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $client_id = $request->input('client_id');
        $response = $request->input('response');

        $client = Clients::where('id', $client_id)->first();

        if (!$client) {
            return response()->json([
                'status' => 'error',
                'message' => 'Client not found',
                'data' => []
            ], 404);
        }

        $data = Unknowns::create([
            'client_id' => $client_id,
            'response' => $response
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Client found',
            'data' => $data
        ]);
    }
}
