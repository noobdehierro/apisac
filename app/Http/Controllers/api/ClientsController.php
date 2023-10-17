<?php

namespace App\Http\Controllers\api;

use Carbon\Carbon;
use App\Models\Help;
use App\Models\Maps;
use App\Models\Payments;
use App\Models\Unknowns;
use App\Models\Agreements;
use Illuminate\Http\Request;
use App\Models\Clarification;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use App\Models\Debtor;
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
        $debtors = Debtor::where('access_code', $access_code)->first();

        if (!$debtors) {
            return response()->json([
                'status' => 'error',
                'message' => 'Debtor not found',
                'data' => []
            ], 404);
        }

        if ($debtors->status != 'pagando') {
            $debtors->update([
                'status' => 'activo'
            ]);
        }

        $debtorsActivo = Debtor::where('id', $debtors->id)->first();
        $paymentsActive = Payments::where('debtor_id', $debtorsActivo->id)->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Debtor found',
            'data' => [
                'debtors' => $debtorsActivo,
                'payments' => $paymentsActive
            ]
        ], 200);
    }

    public function help(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'debtor_id' => 'required',
            'cel' => 'nullable',
            'telephone' => 'nullable',
            'email' => ['nullable', 'email'],
            'telephoneContact' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $debtor_id = $request->input('debtor_id');
        $cel = $request->input('cel') ?? '';
        $telephone = $request->input('telephone') ?? '';
        $email = $request->input('email') ?? '';
        $telephoneContact = $request->input('telephoneContact') ?? '';
        $debtor = Debtor::where('id', $debtor_id)->first();

        if (!$debtor) {
            return response()->json([
                'status' => 'error',
                'message' => 'Client not found',
                'data' => []
            ], 404);
        }

        $res = Help::create([
            'debtor_id' => $debtor->id,
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
            'debtor_id' => 'required',
            'route' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $debtor_id = $request->input('debtor_id');
        $route = $request->input('route');

        // $client = Clients::where('id', $client_id)->first();
        $deptor = Debtor::where('id', $debtor_id)->first();

        if (!$deptor) {
            return response()->json([
                'status' => 'error',
                'message' => 'Client not found',
                'data' => []
            ], 404);
        }


        $map = Maps::where('debtor_id', $deptor)->first();

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
            'debtor_id' => $debtor_id,
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
            'debtor_id' => 'required',
            'cel' => 'nullable',
            'telephone' => 'nullable',
            'email' => 'nullable|email',
            'clarification' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $debtor_id = $request->input('debtor_id');
        $cel = $request->input('cel');
        $telephone = $request->input('telephone');
        $email = $request->input('email');
        $clarification = $request->input('clarification');


        // $client = Clients::where('id', $client_id)->first();
        $debtor = Debtor::where('id', $debtor_id)->first();

        if (!$debtor) {
            return response()->json([
                'status' => 'error',
                'message' => 'Client not found',
                'data' => []
            ], 404);
        }

        $data = Clarification::create([
            'debtor_id' => $debtor->id,
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
            'debtor_id' => 'required',
            'response' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $debtor_id = $request->input('debtor_id');
        $response = $request->input('response');

        // $client = Clients::where('id', $client_id)->first();

        $debtor = Debtor::where('id', $debtor_id)->first();

        if (!$debtor) {
            return response()->json([
                'status' => 'error',
                'message' => 'Client not found',
                'data' => []
            ], 404);
        }

        $data = Unknowns::create([
            'debtor_id' => $debtor_id,
            'response' => $response
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Client found',
            'data' => $data
        ]);
    }

    // public function checkagreements(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'debtor_id' => 'required',
    //         'number_installments' => 'required',
    //         'unit_time' => 'required',
    //         'amount_per_installment' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->errors()], 400);
    //     }

    //     $debtor_id = $request->input('debtor_id');
    //     $number_installments = $request->input('number_installments');
    //     $unit_time = $request->input('unit_time');
    //     $amount_per_installment = $request->input('amount_per_installment');

    //     // $client = Clients::where('id', $client_id)->first();
    //     $debtor = Debtor::where('id', $debtor_id)->first();

    //     if (!$debtor) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => 'Client not found',
    //             'data' => []
    //         ], 404);
    //     }

    //     // $agreement = Agreements::where('client_id', $client_id)->first();
    //     $agreement = Agreements::where('debtor_id', $debtor_id)->first();

    //     if ($agreement) {

    //         $agreement->update([
    //             'number_installments' => $number_installments,
    //             'unit_time' => $unit_time,
    //             'amount_per_installment' => $amount_per_installment
    //         ]);

    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'Contrato actualizado',
    //             'data' => $agreement

    //         ]);
    //     }



    //     try {
    //         $data = Agreements::create([
    //             'client_id' => $client_id,
    //             'status' => 'pendiente',
    //             'agreement_type' => 'contado',
    //             'number_installments' => $number_installments,
    //             'unit_time' => $unit_time,
    //             'amount_per_installment' => $amount_per_installment
    //         ]);

    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'Contrato creado',
    //             'data' => $data
    //         ]);
    //     } catch (\Throwable $th) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => $th->getMessage(),
    //             'data' => []
    //         ], 500);
    //     }
    // }

    public function pdf(Request $request, $access_code)
    {

        // $client = Clients::where('access_code', $client)->first();


        $fechaOriginal = $request->input('datePay');
        $fechaConvertida = date('Y/m/d', strtotime($fechaOriginal));

        $debtor = Debtor::where('access_code', $access_code)->first();

        if (!$debtor) {
            return response()->json([
                'status' => 'error',
                'message' => 'Debtor not found',
                'data' => []
            ], 404);
        }

        $debtor->update([
            'status' => 'activo'
        ]);

        $debtor->save();

        $fecha = Carbon::now();

        $dia = $fecha->format('d');
        $mes = $fecha->format('m');
        $ano = $fecha->format('Y');

        $name = $debtor->full_name;
        $deudaConDescuento = $debtor->cash;
        $deudaLetter = $debtor->nameInCash;

        $sce = $debtor->sce;
        $minimum_to_collect = $debtor->minimum_to_collect;

        $portfolio = $debtor->portfolio;
        $credit_number = $debtor->credit_number;

        $payment_bank = $debtor->payment_bank;
        $payment_reference = $debtor->payment_reference;
        $agreement = $debtor->agreement;
        $interbank_key = $debtor->interbank_key;

        $pdf = Pdf::loadView('pdf.pdf', [
            'dia' => $dia,
            'mes' => $mes,
            'ano' => $ano,
            'name' => $name,
            'deuda' => $deudaConDescuento,
            'portfolio' => $portfolio,
            'deudaLetter' => $deudaLetter,
            'credit_number' => $credit_number,
            'sce' => $sce,
            'minimum_to_collect' => $minimum_to_collect,
            'date' => $fechaConvertida,
            'payment_bank' => $payment_bank,
            'payment_reference' => $payment_reference,
            'agreement' => $agreement,
            'interbank_key' => $interbank_key

        ]);

        // return $pdf->stream();
        return $pdf->download('contract_' . $debtor->full_name . '_' . $fecha->format('Y-m-d') . '.pdf');
    }

    public function addagreements(Debtor $debtor, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'date_pay' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }


        $date_pay = $request->input('date_pay');

        try {

            Agreements::create([
                "debtor_id" => $debtor->id,
                "status" => "pendiente",
                "agreement_type" => "contado",
                "number_installments" => 1,
                "unit_time" => "contado",
                "amount_per_installment" => $debtor->cash,
            ]);

            $debtor->update([
                "status" => "pagando",
                "nextPayday" => $date_pay,
                "remainingDebt" => $debtor->cash
            ]);

            $debtor->save();

            Payments::create([
                "debtor_id" => $debtor->id,
                "quota_number" => 1,
                "payment_date" => $date_pay,
                "paid_amount" => $debtor->cash,
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





    public function pdfplazos($access_code)
    {

        $debtor = Debtor::where('access_code', $access_code)->first();

        if (!$debtor) {
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
        $name = $debtor->full_name;
        $payments = Payments::where('debtor_id', $debtor->id)->get();

        $name = $debtor->full_name;


        $sce = $debtor->sce;
        $minimum_to_collect = $debtor->minimum_to_collect;
        $portfolio = $debtor->portfolio;
        $credit_number = $debtor->credit_number;

        $payment_bank = $debtor->payment_bank;
        $payment_reference = $debtor->payment_reference;
        $agreement = $debtor->agreement;
        $remainingDebt = $debtor->remainingDebt;

        $primeraCuota = $debtor->one_three_months;
        $segundaCuota = $debtor->four_six_months;
        $terceraCuota = $debtor->seven_twelve_months;
        $cuartaCuota = $debtor->thirteen_eighteen_months;
        $quintaCuota = $debtor->nineteen_twentyfour_months;

        // dd($debtor);
        $deudaConPlazos = null;
        $deudaConPlazosLetter = null;

        $dato = self::encontrarNumeroMasCercano($remainingDebt, [$primeraCuota, $segundaCuota, $terceraCuota, $cuartaCuota, $quintaCuota]);

        if ($dato == $primeraCuota) {
            $deudaConPlazos = $primeraCuota;
            $deudaConPlazosLetter = $debtor->nameInOne_threeMonths;
        } elseif ($dato == $segundaCuota) {
            $deudaConPlazos = $segundaCuota;
            $deudaConPlazosLetter = $debtor->nameInFour_sixMonths;
        } elseif ($dato == $terceraCuota) {
            $deudaConPlazos = $terceraCuota;
            $deudaConPlazosLetter = $debtor->nameInSeven_twelveMonths;
        } elseif ($dato == $cuartaCuota) {
            $deudaConPlazos = $cuartaCuota;
            $deudaConPlazosLetter = $debtor->nameInThirteen_eighteenMonths;
        } elseif ($dato == $quintaCuota) {
            $deudaConPlazos = $quintaCuota;
            $deudaConPlazosLetter = $debtor->nameInNineteen_twentyfourMonths;
        }

        // dd($deudaConPlazos, $deudaConPlazosLetter);


        $pdf = Pdf::loadView('pdf.pdfplazos', [
            'dia' => $dia,
            'mes' => $mes,
            'ano' => $ano,
            'name' => $name,
            'portfolio' => $portfolio,
            'credit_number' => $credit_number,
            'sce' => $sce,
            'minimum_to_collect' => $minimum_to_collect,
            'payments' => $payments,
            'payment_bank' => $payment_bank,
            'payment_reference' => $payment_reference,
            'agreement' => $agreement,
            'deudaConPlazos' => $deudaConPlazos,
            'deudaConPlazosLetter' => $deudaConPlazosLetter,
            'interbank_key' => $debtor->interbank_key
        ]);

        return $pdf->download('contract_' . $debtor->full_name . '_' . $fecha->format('Y-m-d') . '.pdf');
    }

    public function addagreementsCuotas(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'access_code' => 'required',
            'plazoFinal' => 'required',
            'pagoFinal' => 'required',
            'tipoFinal' => 'required',
            'deudaFinal' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'Contrato creado',
        //     'data' => $request->all()
        // ]);

        $access_code = $request->input('access_code');
        $plazoFinal = $request->input('plazoFinal');
        $pagoFinal = $request->input('pagoFinal');
        $tipoFinal = $request->input('tipoFinal');
        $deudaFinal = $request->input('deudaFinal');


        // $client = Clients::where('access_code', $request->input('access_code'))->first();
        $debtor = Debtor::where('access_code', $access_code)->first();

        if (!$debtor) {
            return response()->json([
                'status' => 'error',
                'message' => 'Debtor not found',
                'data' => $request->all()
            ], 404);
        }


        // $client->update([
        //     'status' => 'pagando'
        // ]);

        $debtor->update([
            'status' => 'pagando',
            'remainingDebt' => $deudaFinal,
            "nextPayday" => Carbon::now()->addDays(1)
        ]);

        $debtor->save();


        Agreements::create([
            "debtor_id" => $debtor->id,
            "status" => "pendiente",
            "agreement_type" => "credito",
            "number_installments" => $plazoFinal,
            "unit_time" => $tipoFinal,
            "amount_per_installment" => $pagoFinal

        ]);

        // $clientDebt = Debts::where('client_id', $client->id)->first();
        // $clientDebt->update([
        //     "remaining_debt_amount" => $clientDebt->debt_amount,
        //     "next_payment_date" => Carbon::now()->addDays(1),
        // ]);
        // $clientDebt->save();

        try {
            $fecha = null;

            for ($i = 0; $i < $plazoFinal; $i++) {
                $numeroInicial = $i + 1;

                if ($tipoFinal == 'semanal') { // Sin comillas dobles
                    $fecha = Carbon::now()->addDays($numeroInicial * 7);
                } elseif ($tipoFinal == 'quincenal') { // Sin comillas dobles
                    $fecha = Carbon::now()->addDays($numeroInicial * 15);
                } elseif ($tipoFinal == 'mensual') { // Sin comillas dobles
                    $fecha = Carbon::now()->addMonths($numeroInicial);
                }
                Payments::create([
                    "debtor_id" => $debtor->id,
                    "quota_number" => $i + 1,
                    "payment_date" => $fecha,
                    "paid_amount" => $pagoFinal,
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

    public function setagreements(Debtor $debtor, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'cantidadPago' => 'required',
            'tipoCuonta' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $cantidadPago = $request->input('cantidadPago');
        $tipoCuonta = $request->input('tipoCuonta');

        // $oneToThree = 11360.52;
        // $fourToSix = 12622.80;
        // $sevenToTwelve = 14516.22;
        // $thirteenToEighteen = 15778.50;
        // $nineteenToTwentyFour = 17671.92;

        $oneToThree = $debtor->one_three_months;
        $fourToSix = $debtor->four_six_months;
        $sevenToTwelve = $debtor->seven_twelve_months;
        $thirteenToEighteen = $debtor->thirteen_eighteen_months;
        $nineteenToTwentyFour = $debtor->nineteen_twentyfour_months;

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

        $buscarPago = $valor_mas_cercano ? $valor_mas_cercano * $numeroCuotas : $ultimo_valor * $numeroCuotas;

        $deudaPago = self::encontrarNumeroMasCercano($buscarPago, [$oneToThree, $fourToSix, $sevenToTwelve, $thirteenToEighteen, $nineteenToTwentyFour]);

        $pagoPorCuota = $valor_mas_cercano ?? $ultimo_valor;

        $tipoCuontaUpdate = $tipoCuonta == "mensual" ? "mensuales" : ($tipoCuonta == "quincenal" ? "quincenales" : "semanales");

        return response()->json([
            'status' => 'success',
            'message' => 'Contrato actualizado',
            'data' => [
                'deudaPago' => $deudaPago,
                'numeroCuotas' => $numeroCuotas,
                'pagoPorCuota' => $pagoPorCuota,
                'ultimo_valor' => $ultimo_valor,
                'message' => $pagoPorCuota == $ultimo_valor,
                'tipoCuonta' => $tipoCuontaUpdate
            ]
        ]);
    }

    private function encontrarNumeroMasCercano($valorDeseado, $numeros)
    {
        $numeroMasCercano = null;
        $diferenciaMasCercana = PHP_INT_MAX;

        foreach ($numeros as $numero) {
            $diferencia = abs($valorDeseado - $numero);

            if ($diferencia < $diferenciaMasCercana) {
                $diferenciaMasCercana = $diferencia;
                $numeroMasCercano = $numero;
            }
        }

        return $numeroMasCercano;
    }
}
