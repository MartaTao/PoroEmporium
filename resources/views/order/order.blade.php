@extends('layouts.layout')

@section('content')
    <h1>Mis órdenes</h1>

    @if ($orders->isEmpty())
        <p>No se encontraron órdenes.</p>
    @else
        <ul>
            @foreach ($orders as $order)
                <li>
                    <p>Número de orden: {{ $order->id }}</p>
                    <p>Total: {{ $order->total }}</p>
                    <p>Fecha: {{ $order->created_at }}</p>

                    <h2>Productos:</h2>
                    <ul>
                        @foreach ($order->products as $product)
                            <li>{{ $product->nombre }} - Cantidad = {{ $product->pivot->cantidad }}</li>
                        @endforeach
                    </ul>
                </li>
                <hr>
            @endforeach
        </ul>
    @endif
@endsection

