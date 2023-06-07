@extends('layouts.layout')

@section('content')
<div class="container mx-auto py-10 flex justify-center items-center">
    <div class="flowbite-card flowbite-card-bordered flowbite-shadow-xl">
        <div class="flowbite-card-content">
            <h1 class="items-center text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Mis órdenes</h1>
            <hr class="flowbite-hr my-4">
            @if ($orders->isEmpty())
                <p>No se encontraron órdenes.</p>
            @else
                <ul>
                    @foreach ($orders as $order)
                        <dl class=" items-center text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <div class="flowbite-card-content mt-2">
                                <dt class="flowbite-text-gray-600 flowbite-text-lg">Número de orden:</dt>
                                <dd class="flowbite-text-lg flowbite-font-semibold">{{ $order->id }}</dd>
                            </div>
                            <div class="flowbite-card-content mt-2">
                                <dt class="flowbite-text-gray-600 flowbite-text-lg">Total:</dt>
                                <dd class="flowbite-text-lg flowbite-font-semibold">{{ $order->total }}</dd>
                            </div>
                            <div class="flowbite-card-content mt-2">
                                <dt class="flowbite-text-gray-600 flowbite-text-lg">Fecha:</dt>
                                <dd class="flowbite-text-lg flowbite-font-semibold">{{ $order->created_at }}</dd>
                            </div>
                            @foreach ($order->products as $product)
                                <div class="flowbite-card-content mt-2">
                                    <dt class="flowbite-text-gray-600 flowbite-text-lg">{{ $product->nombre }}</dt>
                                    <dd class="flowbite-text-lg flowbite-font-semibold">Cantidad = {{ $product->pivot->cantidad }}</dd>
                                </div>
                            @endforeach
                        </dl>
                        <hr class="flowbite-hr">
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</div>

@endsection