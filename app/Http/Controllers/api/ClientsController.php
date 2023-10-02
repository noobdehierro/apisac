<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Agreements;
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
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

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

        if ($client->status != 'activo') {
            $client->update([
                'status' => 'ingreso'
            ]);
        }


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

    public function checkagreements(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'required',
            'number_installments' => 'required',
            'unit_time' => 'required',
            'amount_per_installment' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $client_id = $request->input('client_id');
        $number_installments = $request->input('number_installments');
        $unit_time = $request->input('unit_time');
        $amount_per_installment = $request->input('amount_per_installment');

        $client = Clients::where('id', $client_id)->first();

        if (!$client) {
            return response()->json([
                'status' => 'error',
                'message' => 'Client not found',
                'data' => []
            ], 404);
        }

        $agreement = Agreements::where('client_id', $client_id)->first();

        if ($agreement) {

            $agreement->update([
                'number_installments' => $number_installments,
                'unit_time' => $unit_time,
                'amount_per_installment' => $amount_per_installment
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Contrato actualizado',
                'data' => $agreement

            ]);
        }



        try {
            $data = Agreements::create([
                'client_id' => $client_id,
                'status' => 'pendiente',
                'agreement_type' => 'ajuste',
                'number_installments' => $number_installments,
                'unit_time' => $unit_time,
                'amount_per_installment' => $amount_per_installment
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Contrato creado',
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => []
            ], 500);
        }
    }

    public function pdf(  $client)
    {

        $client = Clients::where('access_code', $client)->first();

        if (!$client) {
            return response()->json([
                'status' => 'error',
                'message' => 'Client not found',
                'data' => []
            ], 404);
        }

        $fecha = Carbon::now();

        $dia = $fecha->format('d');
        $mes = $fecha->format('m');
        $ano = $fecha->format('Y');
        $name = $client->name;

        $deuda = Debts::where('client_id', $client->id)->first();

        $pdf = Pdf::loadView('pdf.pdf', [
            'dia' => $dia,
            'mes' => $mes,
            'ano' => $ano,
            'name' => $name,
            'deuda' => $deuda->debt_amount

        ]);

        // return $pdf->stream();
        return $pdf->download('contract.pdf');
    }

    public function pdfplazos(  $client )
    {

        $client = Clients::where('access_code', $client)->first();

        if (!$client) {
            return response()->json([
                'status' => 'error',
                'message' => 'Client not found',
                'data' => []
            ], 404);
        }

        $fecha = Carbon::now();

        $dia = $fecha->format('d');
        $mes = $fecha->format('m');
        $ano = $fecha->format('Y');
        $name = $client->name;

        $deuda = Debts::where('client_id', $client->id)->first();

        $pdf = Pdf::loadView('pdf.pdfplazos', [
            'dia' => $dia,
            'mes' => $mes,
            'ano' => $ano,
            'name' => $name,
            'deuda' => $deuda->debt_amount

        ]);

        // return $pdf->stream();
        return $pdf->download('contract.pdf');
    }


}
