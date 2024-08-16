@component('mail::message')
# Recuperación de Código de Acceso

Estimado/a **{{ $debtor->full_name }}**,

Es un placer ayudarte con la recuperación de tu código de acceso. A continuación, encontrarás tu nuevo código de acceso:


**<center>{{ $debtor->access_code }}</center>**


Te sugerimos guardar este correo electrónico en un lugar seguro.

Si no has solicitado este cambio de código de acceso o tienes alguna pregunta, no dudes en ponerte en contacto con
nosotros de inmediato a través de los siguientes medios:

- Correo Electrónico: [atencion@trantus.com](mailto:atencion@trantus.com)
- Teléfono: [55 9657 7258](tel:5596577258)
- WhatsApp: [56 3199 0006](https://wa.me/5215631990006)

Agradecemos tu confianza.

<center>Atentamente</center>

**<center>Soluciones Administrativas</center>**
@endcomponent