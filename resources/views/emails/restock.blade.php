@extends('layouts.email')
@section('content')
    <div class="max-w-md mx-auto">
        <div class="bg-white rounded-md shadow-md p-8">
            <p>Estimado {{ $product->seller->nombre }},</p>

            <p>Solitamos reponer el siguiente producto:</p>

            <p><strong>Producto:</strong> {{ $product->nombre }}</p>
            <p><strong>Cantidad deseada:</strong> {{ $quantity }}</p>

            <p>Gracias por tu atención.</p>
            <div class="flex">
                <div>
                    <a class="block px-4 py-2 bg-red-500 hover:bg-red-600 text-white" href="{{route('product.restockRejected',$product->id)}}">
                        <div class="grid grid-cols-4">
                            <div>
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="w-6 h-6 text-start col-span-3 text-base">
                                Rechazar
                            </div>
                        </div>
                    </a>
                </div>
                <div class="justify-end ">
                    <a class="block px-4 py-2 bg-green-500 hover:bg-green-600 text-white" href="{{route('product.restock',[$product->id, $quantity])}}">
                        <div class="grid grid-cols-4">
                            <div>
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z">
                                    </path>
                                </svg>
                            </div>
                            <div class="w-6 h-6 text-start col-span-3 text-base">
                                Aceptar
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <p>Saludos,</p>
            <p>PoroEmporium</p>
        </div>
        <footer>
            <p class="sm:text-center">© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')</p>
        </footer>
    </div>
@endsection
