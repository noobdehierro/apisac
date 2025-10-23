@component('mail::message')
# Recuperación de Código de Acceso

Estimado/a **{{ $debtor->full_name }}**,

Es un placer ayudarte con la recuperación de tu código de acceso. A continuación, encontrarás tu nuevo código de acceso:


**<center>{{ $debtor->access_code }}</center>**


Te sugerimos guardar este correo electrónico en un lugar seguro.

Si no has solicitado este cambio de código de acceso o tienes alguna pregunta, no dudes en ponerte en contacto con nosotros de inmediato a través de los siguientes medios:

- Correo Electrónico: [arreglatudeuda@trantus.mx](mailto:arreglatudeuda@trantus.mx)
- Teléfono: [55 9874 9910](tel:5598749910)
- WhatsApp: [56 4930 8736](https://wa.me/5649308736)

Agradecemos tu confianza.

<center>Atentamente</center>

**<center>ADYGCMEX</center>**
@endcomponent
