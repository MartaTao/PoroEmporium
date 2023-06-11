@extends('layouts.layout')

@section('content')
<div class="container mx-auto py-10 flex justify-center items-center">
    <div class="flowbite-card flowbite-card-bordered flowbite-shadow-xl">
        <div class="flowbite-card-content">
            <h1 class="items-center text-sm font-medium text-center dark:text-white">Mis órdenes</h1>
            <hr class="my-4">
            @if ($orders->isEmpty())
                <p>No se encontraron órdenes.</p>
            @else
                <ul>
                    @foreach ($orders as $order)
                            <div class="flowbite-card-content mt-2">
                                <p class="flowbite-text-gray-600 flowbite-text-lg dark:text-gray-200">Número de orden: {{ $order->id }}</p>
                            </div>
                            <div class="flowbite-card-content mt-2">
                                <p class="flowbite-text-gray-600 flowbite-text-lg dark:text-gray-200">Total: {{ $order->total }}</p>
                            </div>
                            <div class="flowbite-card-content mt-2">
                                <p class="flowbite-text-gray-600 flowbite-text-lg dark:text-gray-200">Fecha: {{ $order->created_at }}</p>
                            </div>
                            @foreach ($order->products as $product)
                                <div class="flowbite-card-content mt-2">
                                    <p class="flowbite-text-gray-600 flowbite-text-lg dark:text-gray-200">{{ $product->nombre }} x{{ $product->pivot->cantidad }}</p>
                                </div>
                            @endforeach
                            <hr class="my-4">
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>

@endsection
