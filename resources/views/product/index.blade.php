@extends('layouts.layout')
@section('content')
    <table class="min-w-full divide-y divide-gray-200 my-4 ">
        <thead>
            <tr>
                <th scope="col"
                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                    Nombre</th>
                <th scope="col"
                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                    Descripción</th>
                <th scope="col"
                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                    Categoría</th>
                <th scope="col"
                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                    Precio</th>
                <th scope="col"
                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                    Comprar</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900 dark:divide-gray-700">

            @foreach ($products as $product)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                        <div class="flex items-center justify-center">
                            {{ $product->nombre }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                        <div class="flex items-center justify-center">
                            {{ $product->descripcion }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                        <div class="flex items-center justify-center">
                            {{ $product->categoria }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                        <div class="flex items-center justify-center">
                            {{ $product->precio }}
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                        <div class="flex items-center justify-center">
                            <form action="{{ route('cart.addToCart', $product->id) }}">
                                <button type="submit" class="dark:text-white bg-emerald-500">
                                    <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
