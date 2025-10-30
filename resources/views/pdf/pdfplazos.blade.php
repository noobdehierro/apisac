{{-- resources/views/pdf/pdf.blade.php --}}
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Carta Convenio de Pago</title>
    <style>
        /* ======= CONFIGURACIÓN DE PÁGINA ======= */
        @page {
            margin: 120px 50px 100px 50px;
            /* espacio para header y footer */
        }

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            line-height: 1.5;
            color: #000;
        }

        /* ======= ENCABEZADO (HEADER) ======= */
        header {
            position: fixed;
            top: -90px;
            left: 0;
            right: 0;
            text-align: center;
        }

        header img {
            width: 150px;
        }

        /* ======= PIE DE PÁGINA (FOOTER) ======= */
        footer {
            position: fixed;
            bottom: -80px;
            left: 0;
            right: 0;
            font-size: 9px;
            line-height: 1.4;
            text-align: left;
        }

        footer p {
            margin: 0;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .bold {
            font-weight: bold;
        }

        .underline {
            text-decoration: underline;
        }

        .section-title {
            margin-top: 20px;
            font-weight: bold;
            text-decoration: underline;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: center;
            font-size: 11px;
        }

        .signature {
            margin-top: 50px;
            text-align: center;
        }

        .footer {
            font-size: 9px;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    {{-- ======= ENCABEZADO (en todas las páginas) ======= --}}
    <header>
        <img src="{{ public_path('images/logo.png') }}" alt="Logo">
    </header>

    {{-- ======= PIE DE PÁGINA (en todas las páginas) ======= --}}
    <footer>
        <p>
            BLVD. ADOLFO LÓPEZ MATEOS 1936, INT. 502,<br>
            COL. TLACOPAC, ALC. ÁLVARO OBREGÓN,<br>
            CDMX, C.P. 01049<br>
            Tel. 55 9382 4865
        </p>
    </footer>

    {{-- ======= CONTENIDO PRINCIPAL ======= --}}
    <main>
        <p class="right">
            Ciudad de México a {{ $dia }} de {{ $mes }} de {{ $ano }}
        </p>

        <h3 class="center underline">CARTA CONVENIO DE PAGO</h3>

        <p>
            C. <span class="bold">{{ $name }}</span><br />
            Crédito: <span class="bold">{{ $credit_number }}</span>
        </p>

        <p>
            Trantus en su calidad de administrador del portafolio adquirido por
            <span class="bold">ADYGCMEX, S.A.P.I. de C.V.</span> por medio de la
            presente Carta Convenio de Pago le notifica a usted C.
            <span class="bold">{{ $name }}</span>, en cumplimiento a lo establecido en
            los artículos 2036, 2037, 2038 y 2041 del Código Civil Federal y sus
            correlativos en los Códigos Civiles de los estados, así como en el
            artículo 390 del Código de Comercio vigente, la Cesión Onerosa de Créditos
            y Derechos derivados de los mismos (venta de cartera) realizada entre NR
            Finance México, S.A. de C.V. en calidad de Cedente y <span class="bold">ADYGCMEX, S.A.P.I. de C.V.</span>
            en calidad de Cesionario donde, entre otros, se adquirió el crédito:
            <span class="bold">{{ $credit_number }}</span>, mismo que se encuentra a
            su nombre.
        </p>

        <p>
            Mediante el presente se hace constar, para todos los efectos legales, que
            el C.
            <span class="bold">{{ $name }}</span> con RFC
            <span class="bold">{{ $nvo_rfc ?? '______' }}</span>
            en este acto reconoce adeudar y se obliga a pagar conforme al convenio
            celebrado a
            <span class="bold">ADYGCMEX, S.A.P.I. de C.V.</span> con domicilio en
            Blvd. Adolfo López Mateos 1936 Int 502 Oficina 1, Col. Tlacopac, Álvaro
            Obregón, CDMX, 01049 con RFC ADY200403G70.
        </p>

        <h4 class="section-title">DECLARACIONES</h4>

        <p><span class="bold">I. Declara el C. </span><span class="bold">{{ $name }}</span></p>

        <p>
            a) Que tiene un contrato de crédito automotriz identificado con
            el número de contrato <span class="bold">{{ $credit_number }}</span>,
            respecto del vehículo marca
            <span class="bold">{{ $marca ?? '____' }}</span>, modelo
            <span class="bold">{{ $modelo ?? '____' }}</span>, año
            <span class="bold">{{ $vehicle_year ?? '____' }}</span>, número de serie
            (VIN): <span class="bold">{{ $vin ?? '____' }}</span>.
        </p>

        <p>
            b) Que reconoce adeudar a <span class="bold">ADYGCMEX, S.A.P.I. de C.V.</span> la cantidad de
            <span class="bold">${{ $sce }}</span> M.N. ({{ $minimum_to_collect }}) por
            concepto de capital insoluto, intereses ordinarios y moratorios generados
            hasta la fecha de firma del presente convenio.
        </p>

        <p>
            c) Que tiene la intención y capacidad de cubrir el adeudo bajo nuevas
            condiciones de pago.
        </p>
        <p>
            d) Que manifiesta su total conformidad con los términos de este convenio y se
            obliga a cumplir con lo estipulado en el mismo.
        </p>
        <p>
            e) Declara bajo protesta de decir verdad que los datos asentados en este
            convenio corresponden a su identidad y que reconoce haber sido plenamente
            informado del origen del crédito y de la cesión de derechos.
        </p>

        <h4 class="section-title">CLÁUSULAS</h4>

        <p><span class="bold">PRIMERA. - Objeto.</span> </p>
        <p>
            El presente convenio tiene
            por objeto la reestructuración del adeudo referido en las declaraciones
            anteriores, mediante un nuevo esquema de pagos pactado entre las partes.
        </p>
        <p>El presente convenio constituye reconocimiento de adeudo y promesa incondicional
            de pago conforme a los artículos 1391 fracción VI y 1392 del Código de Comercio,
            por lo que será exigible como título ejecutivo mercantil en caso de incumplimiento.
        </p>
        <p><span class="bold">SEGUNDA. - Esquema de Pago.</span> </p>
        <p>
            Mediante la presente se hace constar para todos los efectos legales, que el titular
            reconoce y se obliga a pagar la cantidad de <span class="bold">${{ $deudaConPlazos }}</span>
            (<span class="bold">{{ $deudaConPlazosLetter }}</span>)
            cantidad que liquidará totalmente el crédito señalado arriba siempre y cuando estén
            plenamente satisfechos por usted en tiempo y forma todos y cada uno de los pagos que
            se señalan en la siguiente tabla que refleja el Plan de Pagos:
        </p>

        <table>
            <thead>
                <tr>
                    <th>No. de Pago</th>
                    <th>Fecha de Pago</th>
                    <th>Monto</th>
                </tr>
            </thead>
           <tbody>
                @foreach ($payments as $payment)
                <tr>
                    <td>
                        {{ $payment->quota_number }}
                    </td>
                    <td>
                        {{ $payment->paid_amount }}
                    </td>
                    <td>
                        {{ $payment->payment_date }}
                    </td>
                    <td>
                        A MEX</td>

                </tr>
                @endforeach
            </tbody>
        </table>

        <p><span class="bold">TERCERA. – Forma de pago.</span></p>
        <p>
            El (los) pago (s) antes mencionado(s) se deberá(n) de
            realizar al beneficiario <span class="bold">ADYGCMEX, S.A.P.I. de C.V.</span> con
            RFC (<span class="bold">{{ $nvo_rfc ?? '______' }}</span>),
            conforme a los siguientes datos, dependiendo su opción de pago:
        </p>

        <p>
            Opción 1: Pago en sucursal Bancaria o practicaja<br />
            Banco: <span class="bold">{{ $payment_bank }}</span><br />
            Cuenta: <span class="bold">{{ $agreement }}</span><br />
            Referencia: <span class="bold">{{ $payment_reference }}</span>
        </p>

        <p>
            Opción 2: Transferencia<br />
            Clabe: <span class="bold">{{ $interbank_key }}</span><br />
            Referencia: <span class="bold">{{ $payment_reference }}</span>
        </p>

        <p>
            <strong>IMPORTANTE:</strong> Si alguien le solicita hacer un pago a una
            cuenta distinta a nuestra cuenta a nombre de <span class="bold">ADYGCMEX, S.A.P.I. de C.V.</span> puede tratarse de
            un fraude.
        </p>
        <p>
            Nuestro personal no está autorizado para recibir pagos, jamás realice un
            pago a una cuenta distinta a las opciones anteriormente señaladas, cualquier
            pago realizado a una cuenta distinta no será reconocido como parte de este
            Plan de Pagos y la deuda total permanecerá vigente en su totalidad. Esta
            carta convenio de pago no es válida para ningún trámite personal, laboral, o
            crediticio sin el (los) comprobante(s) de pago correspondiente(s).
        </p>

        <p><span class="bold">CUARTA. - Incumplimiento.</p>
        <p>
            </span> En caso de que el C.
            {{ $name }} no realice cualquiera de los pagos en las fechas y montos
            establecidosen este convenio, se considerará <span class="bold">incumplido el acuerdo y vencido
                anticipadamente el saldo total pendiente</span>, quedando <span class="bold">ADYGCMEX, S.A.P.I. de C.V.</span>
            facultada para dar por terminado el presente convenio y <span class="bold">exigir el pago total
                inmediato del adeudo.</span>
        </p>

        <p><span class="bold">QUINTA. - No Novación y Conservación de Garantías.</span></p>
        <p>
            Este convenio no implica la extinción del contrato original, sino la modificación
            parcial de sus términos relativos al esquema de pago. Las demás cláusulas del
            contrato original subsisten y conservan su validez.
        </p>
        <p>
            Las partes convienen expresamente que el presente acuerdo <span class="bold">no constituye novación</span>
            del crédito original, conservando la <span class="bold">ADYGCMEX, S.A.P.I. de C.V.</span> todos los derechos,
            acciones y garantías derivados del contrato, pagaré, y factura endosada.
        </p>

        <p><span class="bold">SEXTA. - Carta Finiquito.</span></p>
        <p>
            Una vez que el deudor haya realizado la totalidad de los pagos establecidos en este convenio y dichos
            pagos hayan sido confirmados por la institución bancaria, <span class="bold">ADYGCMEX, S.A.P.I. de C.V.</span> emitirá y enviará
            al correo electrónico proporcionado por el deudor la carta finiquito correspondiente, dentro de un plazo
            máximo de 15 días hábiles contados a partir de la fecha del último pago.
        </p>

        <p><span class="bold">SÉPTIMA. - Buró de Crédito.</span></p>
        <p>
            Una vez que el deudor haya cumplido con la totalidad de los pagos pactados y éstos hayan sido debidamente
            confirmados por la institución bancaria, <span class="bold">ADYGCMEX, S.A.P.I. de C.V.</span> procederá a actualizar el historial
            crediticio del deudor ante las Sociedades de Información Crediticia, dentro de un plazo máximo de 30 días
            naturales contados a partir del mes siguiente al último pago realizado, reflejando el crédito como MOP-01
            CC (semáforo verde) o su equivalente vigente en la normatividad aplicable.
        </p>

        <p><span class="bold">OCTAVA. - Entrega de Factura.</span> </p>
        <p>
            Una vez que el deudor haya realizado la totalidad de los pagos establecidos en el presente convenio y éstos
            hayan sido confirmados por la institución bancaria, <span class="bold">ADYGCMEX, S.A.P.I. de C.V.</span> procederá a la entrega de la
            factura original del vehículo descrito en las declaraciones.
        </p>
        <p>
            La entrega se realizará en las oficinas de <span class="bold">ADYGCMEX, S.A.P.I. de C.V.</span> ubicadas en la Ciudad de México,
            previa cita agendada con el deudor y/o podrá enviarse por paquetería especializada al domicilio indicado
            por el deudor, quien cubrirá el costo de envío correspondiente. Una vez proporcionado el número de guía o
            rastreo, <span class="bold">ADYGCMEX, S.A.P.I. de C.V.</span> no será responsable por demoras o incidencias imputables a la empresa de mensajería.
        </p>
        <p>
            La entrega de la factura quedará condicionada al cumplimiento total del convenio y a la verificación bancaria de todos los pagos.
        </p>

        <p><span class="bold">NOVENA. - Jurisdicción.</span> </p>
        <p>
            Para la interpretación, cumplimiento y ejecución del presente convenio, las partes se someten expresamente a
            las <span class="bold">leyes y tribunales competentes de la Ciudad de México</span>, renunciando al fuero que por razón de su domicilio
            presente o futuro pudiera corresponderles.
        </p>

        <p>
            Leído que fue el presente convenio y enteradas las partes de su contenido, alcance y efectos legales,
            lo firman por duplicado en la Ciudad de México, a los ___ días del mes de __________ de 20___.
        </p>

        <div class="signature" style="text-align: center; margin-top: 25px">
            <div style="display: inline-block; width: 45%; vertical-align: top">
                ______________________________<br />
                C. {{ $name }}<br />
                Acepto la carta convenio
            </div>

            <div style="display: inline-block; width: 45%; vertical-align: top">
                ______________________________<br />
                Representante “ACREEDOR”<br />
                <span class="bold">ADYGCMEX, S.A.P.I. de C.V.</span>
            </div>
        </div>

        <div class="footer-privacy">
            <p>
                Sus datos están protegidos de acuerdo con la Ley Federal de Protección
                de Datos Personales en Posesión de los Particulares. Consulte nuestro
                aviso de privacidad en: <br />
                <a href="http://www.adygcmex.mx">www.adygcmex.mx</a>
            </p>
        </div>
    </main>
</body>

</html>