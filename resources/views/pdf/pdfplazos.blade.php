<!DOCTYPE html>
<html lang="en">

<head>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <style>
        * {
            font-family: 'Courier New', Courier, monospace;
            font-size: 14px;
            /* text-align: justify; */
        }

        .fecha {
            text-align: right;
            margin-top: 10px;

        }

        .title-conteiner {
            text-align: center;
            font-weight: bold;
        }

        .titleFirst {
            text-decoration: underline;
            letter-spacing: 10px;
        }

        .parrafo {
            text-align: justify;
        }

        .red {
            color: red;
        }



        .left-column {
            text-align: center;
            float: left;
            width: 50%;
            padding: 20px;
            margin-top: 50px;
        }

        .right-column {
            text-align: center;
            margin-top: 50px;

            float: left;
            width: 50%;
            padding: 20px;
        }
    </style>

</head>

<body>


    <div>

        <div>
            <img src="{{ asset('images/logo.png') }}" alt="logo" width="200px">
        </div>
        <div>
            <div class="fecha">
                <p>Ciudad de méxico {{ $dia }} de {{ $mes }} de {{ $ano }}</p>
            </div>
        </div>

        <div class="title-conteiner">
            <h1 class="titleFirst">CONVENIO DE PAGO</h1>
        </div>

        <div>
            <p class="parrafo">CONSTE POR EL PRESENTE DOCUMENTO, LAS CONDICIONES GENERALES Y RECONOCIMIENTO DE ADEUDO Y
                OFRECIMIENTO DE
                PAGO, QUE CELEBRAN POR UNA PARTE Soluciones Administrativas, S.A.P.I. DE C.V., COMO ACREEDOR DEL CRÉDITO
                EMITIDO POR {{ $portfolio }} Y POR LA
                OTRA
                PARTE EL C. {{ $name }} COMO LA PARTE TITULAR DEL CRÉDITO. AL TENOR DE LAS
                SIGUIENTES CLÁUSULAS:
            </p>
            <h2>CLAUSULAS</h2>
            <H3>CLAUSULA PRIMERA</H3>

            <P class="parrafo">EL TITULAR <span class="red">RECONOCE LA DEUDA CON</span> Soluciones Administrativas,
                S.A.P.I. DE
                C.V., <span class="red">POR</span> LA
                CANTIDAD DE
                ${{ $sce }} {{ $minimum_to_collect }} CANTIDAD DERIVADA DEL
                CRÉDITO NO.
                {{ $credit_number }} EMITIDO POR {{ $portfolio }}.
            </P>

            <h3>CLAUSULA SEGUNDA</h3>

            <p class="parrafo"><span class="red">EN ESTE SENTIDO,</span> EL TITULAR OFRECE LIQUIDAR EL ADEUDO
                MENCIONADO CON ANTERIORIDAD CON LA
                CANTIDAD DE
                ${{ $deudaConPlazos }} {{ $deudaConPlazosLetter }} PROPONIENDO
                EL SIGUIENTE ESQUEMA
                DE PAGOS</span>:
            </p>

            <table border="1" cellpadding="10" width="100%" style="font-size: 12px">
                <tr>
                    <th style="background-color: #4f81bd; color: white; font-size: 12px">NUMERO DE PAGO</th>
                    <th style="background-color: #4f81bd; color: white; font-size: 12px">MONTO DE PAGO</th>
                    <th style="background-color: #4f81bd; color: white; font-size: 12px">FECHA DE PAGO</th>
                    <th style="background-color: #4f81bd; color: white; font-size: 12px">CONCEPTO DE PAGO</th>
                </tr>

                @foreach ($payments as $payment)
                    <tr>
                        <td style="background-color: #4f81bd; color: white; font-size: 12px">
                            {{ $payment->quota_number }}</td>
                        <td style="background-color: #d0d8e7; color: black; font-size: 12px">
                            {{ $payment->paid_amount }}
                        </td>
                        <td style="background-color: #d0d8e7; color: black; font-size: 12px">
                            {{ $payment->payment_date }}
                        </td>
                        <td style="background-color: #d0d8e7; color: black; font-size: 12px">
                            A CAPITAL</td>

                    </tr>
                @endforeach
            </table>
        </div>

        <div>
            <p class="parrafo red">PROPUESTA ACEPTADA POR EL ACREEDOR.</p>

            <h3>CLAUSULA TERCERA</h3>

            <p class="parrafo">LOS PAGOS DEBERÁN REALIZARSE A LA CUENTA CONCENTRADORA DE Soluciones Administrativas,
                S.A.P.I. DE
                C.V.
                CUYOS DATOS BANCARIOS SON LOS SIGUIENTES:
            </p>
            <p class="parrafo">PAGO EN VENTANILLA/PRACTICAJA</p>
            <table style="border-spacing: 10px">
                <tr>
                    <th align="left">BANCO</th>
                    <th align="left">{{ $payment_bank }}</th>
                </tr>
                <tr>
                    <th align="left">CONVENIO</th>
                    <th align="left">{{ $agreement }}</th>
                </tr>
                <tr>
                    <th align="left">REFERENCIA</th>
                    <th align="left">{{ $payment_reference }}</th>
                </tr>
            </table>
            <p class="parrafo">
                PAGO POR TRANSFERENCIA INTERBANCARIA
            </p>
            <table style="border-spacing: 10px">
                <tr>
                    <th align="left">CLABE</th>
                    <th align="left">{{ $interbank_key }}</th>
                </tr>
                <tr>
                    <th align="left">REFERENCIA</th>
                    <th align="left">{{ $payment_reference }}</th>
                </tr>
            </table>
            <p class="parrafo">ES IMPORTANTE QUE VALIDE QUE EL PAGO SE EFECTUE A NOMBRE DE LA EMPRESA Y NO A NOMBRE DE
                UNA PERSONA
                FISICA.</p>
        </div>
        <br>
        <div>
            <h3>CLAUSULA CUARTA</h3>
            <p class="parrafo">EL TITULAR DEBERÁ REPORTAR AL ACREEDOR, EL PAGO AL TELEFONO 55-6270-0471 O NUESTRO
                WHATSAPP 56-3188-5034 Y
                ENVIAR POR VÍA
                CORREO ELECTRÓNICO A LA SIGUIENTE DIRECCIÓN atencioncc@adygcmex.mx EL COMPROBANTE DE PAGO
                CORRESPONDIENTE
                CON FINES DE CONSTATAR LA VERACIDAD DEL DEPÓSITO.</p>

            <h3>CLAUSULA QUINTA</h3>

            <p class="parrafo">UNA VEZ QUE EL TITULAR REALICE EL PAGO TOTAL DE LA DEUDA ESPECIFICADA EN LA SEGUNDA
                CLAUSULA DEL
                PRESENTE, Soluciones Administrativas, S.A.P.I. DE C.V. SE COMPROMETE A ENTREGAR LA CARTA FINIQUITO
                CORRESPONDIENTE A LA LIQUIDACIÓN DEL CRÉDITO ANTES MENCIONADO EN UN PERIODO NO MAYOR A 30 DÍAS HÁBILES A
                PARTIR DE LA CONFIRMACIÓN DE LIQUIDACIÓN Y APLICACIÓN DE PAGO.</p>

            <h3>CLAUSULA SEXTA</h3>

            <p class="parrafo">SE REALIZARÁ ACTUALIZACIÓN DE LA INFORMACIÓN CREDITICIA ANTE BURO NACIONAL DE CRÉDITO, EN
                EL REGISTRO
                CORRESPONDIENTE A Soluciones Administrativas, S.A.P.I. DE C.V. CON LA CLAVE DE OBSERVACIÓN MOP01 QUE
                SIGNIFICA PAGO PUNTUAL Y ADECUADO.</p>

            <h3>CLAUSULA SEPTIMA</h3>

            <p class="parrafo">UNA VEZ QUE Soluciones Administrativas, S.A.P.I. DE C.V. SE DÉ POR INFORMADO SOBRE EL
                PAGO
                TOTAL DEL
                PRESENTE CONVENIO, EN CASO DE QUE LAS PARTES ANTES MENCIONADAS LLEVEN EL TRAMITE DE LIQUIDACIÓN MEDIANTE
                UN JUZGADO COMPETENTE, GIRARÁ INSTRUCCIÓN AL ÁREA JURÍDICA</p>

            <h3>CLAUSULA OCTAVA</h3>

            <p>ANTE EL INCUMPLIMIENTO Y FALTA DE REPORTE DEL PAGO PARA LA LIQUIDACIÓN DEL CRÉDITO OFRECIDO POR PARTE DEL
                TITULAR, SE ENTENDERÁ RESCINDIDO EL PRESENTE CONVENIO, SUJETÁNDOSE A LA JURISDICCIÓN DE LOS JUZGADOS
                CIVILES COMPETENTES, DEJANDO A SALVO LOS DERECHOS DE Soluciones Administrativas, S.A.P.I. DE C.V. A
                RECLAMAR EL TOTAL DE LA DEUDA.</p>

            <p>ENTERADAS LAS PARTES DEL CONTENIDO Y ALCANCE LEGAL DEL PRESENTE CONVENIO, DE ACUERDO CON LO ESTABLECIDO
                EN EL MISMO AMBAS PARTES ESTAN DE ACUERDO PARA SU LEGITIMACIÓN EL DÍA {{ $dia }} DE
                {{ $mes }}
                DEL {{ $ano }} EN LA CIUDAD DE MÉXICO.</p>
        </div>



        <div style="text-align: center">
            <h1>PATRICIA RAMOS C.</h1>
            <h2>AREA ADMINISTRATIVA</h2>
            <p>Soluciones Administrativas S.A.P.I. DE C.V.</p>

        </div>
        <hr style="width: 50%; margin: 0 auto">
        <div style="text-align: center">
            <p>{{ $name }}</p>

            <h2>TITULAR</h2>
        </div>


    </div>
</body>

</html>
