@extends('layouts.layout')

@section('content')
<div class="container mx-auto py-10 flex justify-center items-center">
    <div class="flowbite-card flowbite-card-bordered flowbite-shadow-xl">
        <div class="flowbite-card-content">
            <h1 class="flowbite-heading flowbite-h2">Mis órdenes</h1>
            <hr class="flowbite-hr my-4">
            @if ($orders->isEmpty())
                <p>No se encontraron órdenes.</p>
            @else
                <ul>
                    @foreach ($orders as $order)
                        <dl class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <div class="flowbite-card-content">
                                <dt class="mb-2  font-bold tracking-tight text-gray-900 dark:text-white">Número de orden:</dt>
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