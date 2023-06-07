@extends('layouts.email')
@section('content')
<div class="max-w-md mx-auto">
    <div class="bg-white rounded-md shadow-md p-8">
    <p>Estimado PoroEmporium,</p>

    <p>Agradecemos que se haya puesto en contacto con nosotros para seguir vendiendo nuestro producto. Su solicitud ha sido rechazada. Lamentablemente no quedan existencias del producto o es parte de una edición limitada</p>

    <p>Gracias por su atención.</p>
    <p>Saludos,</p>
    <p>{{ $product->seller->nombre }}</p>
</div>
<footer>
    <p class="sm:text-center">© {{ date('Y') }} {{ $product->seller->nombre }}. @lang('All rights reserved.')</p>
</footer>
</div>
@endsection
