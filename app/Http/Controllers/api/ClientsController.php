<?php

namespace App\Http\Controllers\api;

use Carbon\Carbon;
use App\Models\Help;
use App\Models\Maps;
use App\Models\Debts;
use App\Models\Clients;
use App\Models\Payments;
use App\Models\Unknowns;
use App\Models\Agreements;
use Illuminate\Http\Request;
use App\Models\Clarification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
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

        if ($client->status != 'pagando') {
            $client->update([
                'status' => 'activo'
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
            'clarification' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $client_id = $request->input('client_id');
        $cel = $request->input('cel');
        $telephone = $request->input('telephone');
        $email = $request->input('email');
        $clarification = $request->input('clarification');


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
            'clarification' => $clarification
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
                'agreement_type' => 'contado',
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

    public function pdf($client)
    {

        $client = Clients::where('access_code', $client)->first();

        $client->update([
            'status' => 'pagando'
        ]);

        $client->save();

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

        $porsentaje = 80;

        $descuento = ($deuda->debt_amount / 100) * $porsentaje;

        $deudaConDescuento = $deuda->debt_amount - $descuento;

        $pdf = Pdf::loadView('pdf.pdf', [
            'dia' => $dia,
            'mes' => $mes,
            'ano' => $ano,
            'name' => $name,
            'deuda' => $deudaConDescuento

        ]);

        // return $pdf->stream();
        return $pdf->download('contract_' . $client->name . '_' . $fecha->format('Y-m-d') . '.pdf');
    }

    public function addagreements(Clients $client, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'amount_per_installment' => 'required',
            'date_pay' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $clientId = $client->id;
        $amount_per_installment = $request->input('amount_per_installment');
        $date_pay = $request->input('date_pay');

        try {
            Agreements::create([
                "client_id" => $clientId,
                "status" => "activo",
                "agreement_type" => "contado",
                "number_installments" => 1,
                "unit_time" => "contado",
                "amount_per_installment" => $amount_per_installment,

            ]);

            $clientDebt = Debts::where('client_id', $clientId)->first();
            $clientDebt->update([
                "remaining_debt_amount" => $amount_per_installment,
                "next_payment_date" => $date_pay
            ]);
            $clientDebt->save();

            Payments::create([
                "debt_id" => $clientDebt->id,
                "client_id" => $clientId,
                "quota_number" => 1,
                "payment_date" => $date_pay,
                "paid_amount" => $amount_per_installment,
                "status" => "pendiente",
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Contrato creado',

            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => []
            ], 500);
        }
    }





    public function pdfplazos($client)
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

        $payments = Payments::where('debt_id', $deuda->id)->get();


        $pdf = Pdf::loadView('pdf.pdfplazos', [
            'dia' => $dia,
            'mes' => $mes,
            'ano' => $ano,
            'name' => $name,
            'deuda' => $deuda->debt_amount,
            'payments' => $payments

        ]);

        // return $pdf->stream();
        return $pdf->download('contract_' . $client->name . '_' . $fecha->format('Y-m-d') . '.pdf');
    }

    public function addagreementsCuotas(Request $request)
    {

        $client = Clients::where('access_code', $request->input('access_code'))->first();

        $client->update([
            'status' => 'pagando'
        ]);

        if (!$client) {
            return response()->json([
                'status' => 'error',
                'message' => 'Client not found',
                'data' => $request->all()
            ], 404);
        }

        $plazos = $request->input('plazoFinal');
        $unit_time = $request->input('tipoFinal');
        $pago = $request->input('pagoFinal');


        Agreements::create([
            "client_id" => $client->id,
            "status" => "activo",
            "agreement_type" => "plazos",
            "number_installments" => $plazos,
            "unit_time" => $unit_time,
            "amount_per_installment" => $pago,

        ]);

        $clientDebt = Debts::where('client_id', $client->id)->first();
        $clientDebt->update([
            "remaining_debt_amount" => $clientDebt->debt_amount,
            "next_payment_date" => Carbon::now()->addDays(1),
        ]);
        $clientDebt->save();

        try {
            $fecha = null;

            for ($i = 0; $i < $plazos; $i++) {
                $numeroInicial = $i + 1;

                if ($unit_time == 'semanal') { // Sin comillas dobles
                    $fecha = Carbon::now()->addDays($numeroInicial * 7);
                } elseif ($unit_time == 'quincenal') { // Sin comillas dobles
                    $fecha = Carbon::now()->addDays($numeroInicial * 15);
                } elseif ($unit_time == 'mensual') { // Sin comillas dobles
                    $fecha = Carbon::now()->addMonths($numeroInicial);
                }
                Payments::create([
                    "debt_id" => $clientDebt->id,
                    "client_id" => $client->id,
                    "quota_number" => $i + 1,
                    "payment_date" => $fecha,
                    "paid_amount" => $pago,
                    "status" => "pendiente",
                ]);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Contrato creado',
            ]);
        } catch (\Throwable $th) {


            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage(),
                'data' => $request->all()
            ], 400);
        }
    }

    public function setagreements(Request $request)
    {
        $cantidadPago = $request->input('cantidadPago');
        $tipoCuonta = $request->input('tipoCuonta');

        $oneToThree = 11360.52;
        $fourToSix = 12622.80;
        $sevenToTwelve = 14516.22;
        $thirteenToEighteen = 15778.50;
        $nineteenToTwentyFour = 17671.92;


        $fases = [
            "primera fase" => [
                "meses" => $oneToThree,
                "rango" => [1, 3],
            ],
            "segunda fase" => [
                "meses" => $fourToSix,
                "rango" => [4, 6],
            ],
            "tercera fase" => [
                "meses" => $sevenToTwelve,
                "rango" => [7, 12],
            ],
            "cuarta fase" => [
                "meses" => $thirteenToEighteen,
                "rango" => [13, 18],
            ],
            "quinta fase" => [
                "meses" => $nineteenToTwentyFour,
                "rango" => [19, 24],
            ]
        ];

        $rangos = array();


        foreach ($fases as $fase => $faseData) {
            $rangos[$fase] = array();

            for ($i = $faseData["rango"][0]; $i <= $faseData["rango"][1]; $i++) {
                $numeroSemanas = $i * 4;

                if ($tipoCuonta == "semanal") {
                    $valorSemanal = $faseData["meses"] / $numeroSemanas;
                    array_push($rangos[$fase], $valorSemanal);
                } else if ($tipoCuonta == "quincenal") {
                    $valorQuincenal = $faseData["meses"] / ($numeroSemanas / 2);
                    array_push($rangos[$fase], $valorQuincenal);
                } else if ($tipoCuonta == "mensual") {
                    $valorMensual = $faseData["meses"] / ($i);
                    array_push($rangos[$fase], $valorMensual);
                }
            }
        }

        // return $rangos;

        // echo json_encode($rangos);


        $valor_a_buscar = $cantidadPago;
        $valor_mas_cercano = null;
        $ultimo_valor = null;
        $repeticiones = 0;

        // Recorre la matriz multidimensional
        foreach ($rangos as $fase => $valores) {

            foreach ($valores as $clave => $valor) {
                $repeticiones++;
                // Comprueba si el valor actual es menor o igual a $valor_a_buscar
                if ($valor <= $valor_a_buscar) {
                    // Si es así, actualiza $valor_mas_cercano y rompe el bucle
                    $valor_mas_cercano = $valor;
                    break 2; // Rompe dos niveles de bucles (el bucle externo y el bucle interno)
                }
                // Si no se encuentra un valor menor o igual, actualiza $ultimo_valor
                $ultimo_valor = $valor;
            }
        }

        $numeroCuotas = $tipoCuonta == "mensual" ? $repeticiones : ($tipoCuonta == "quincenal" ? $repeticiones * 2 : $repeticiones * 4);

        $valor_a_pagar = $valor_mas_cercano ? $valor_mas_cercano * $numeroCuotas : $ultimo_valor * $numeroCuotas;

        return response()->json([
            'status' => 'success',
            'message' => 'Contrato actualizado',
            'data' => [
                'valor_a_pagar' => $valor_a_pagar,
                'numeroCuotas' => $numeroCuotas,
                'valor_mas_cercano' => $valor_mas_cercano ?? $ultimo_valor,
                'ultimo_valor' => $ultimo_valor
            ]
        ]);
    }
}
