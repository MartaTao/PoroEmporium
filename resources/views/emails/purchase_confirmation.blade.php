@extends('layouts.email')
@section('content')
<div class="max-w-md mx-auto">
    <div class="bg-white rounded-md shadow-md p-8">

        <body>
            <h1>Confirmación de Compra</h1>

            <p>Gracias por su compra</p>

            <p>Detalles de la Orden:</p>
            <ul class="sm:text-center">
                <li><strong>Orden ID:</strong> {{ $order->id }}</li>
                <li><strong>Total:</strong> ${{ $order->total }}</li>
                <li><strong>Estado:</strong> {{ $order->status }}</li>
            </ul>
            <p>PoroEmporium</p>
    </div>