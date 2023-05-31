@extends('layouts.layout')

@section('content')
    <h1>Detalles de la orden</h1>
    
    @if ($order)
        <h2>Orden #{{ $order->id }}</h2>
        <p>Fecha: {{ $order->created_at }}</p>
        <p>Total: {{ $order->total }}</p>
        <h3>Productos:</h3>
        <ul>
            @foreach ($order->products as $product)
                <li>{{ $product->name }}</li>
            @endforeach
        </ul>
    @else
        <p>No se encontró la orden.</p>
    @endif

@endsection

@section('scripts')
@endsection
