@component('mail::message')
# Recuperación de Código de Acceso

Estimado/a **{{ $debtor->full_name }}**,

Es un placer ayudarte con la recuperación de tu código de acceso. A continuación, encontrarás tu nuevo código de acceso:


**<center>{{ $debtor->access_code }}</center>**


Te sugerimos guardar este correo electrónico en un lugar seguro.

Si no has solicitado este cambio de código de acceso o tienes alguna pregunta, no dudes en ponerte en contacto con nosotros de inmediato a través de los siguientes medios:

- Correo Electrónico: [atencioncc@ibkan.com.mx](mailto:atencioncc@ibkan.com.mx)
- Teléfono: [55 6270 0471](tel:5562700471)
- WhatsApp: [56 3188 5034](https://wa.me/5631885034)

Agradecemos tu confianza.

<center>Atentamente</center>

**<center>IBKAN Capital</center>**
@endcomponent
