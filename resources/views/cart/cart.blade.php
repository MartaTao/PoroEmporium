@extends('layouts.layout')

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg ml-20 mr-20">
    <table id="cart" class="min-w-full divide-y divide-gray-200 my-4 ">
        <thead class=" text-xs text-gray-700 uppercase dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                    Product</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                    Price</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                    Quantity</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                    Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $cart as $producto)
            <tr data-id="" class="border-b border-gray-200 dark:border-gray-700">
                <td data-th="Product" scope="row" class="px-6 py-4 whitespace-nowrap dark:text-white">
                    <div class="flex items-center justify-center">{{ $producto['nombre'] }}</div>
                </td>
                <td data-th="Price" class="px-6 py-4 whitespace-nowrap dark:text-white">
                    <div class="flex items-center justify-center">{{ $producto['precio'] }}</div>
                </td>
                <td data-th="Quantity" class="px-6 py-4 whitespace-nowrap dark:text-white">
                    <div class="flex items-center justify-center">{{ $producto['cantidad'] }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap dark:text-white" data-th="">
                    <div class="flex items-center justify-center">
                        <form action="{{ route('cart.destroy', $producto['nombre']) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm cart_remove px-6 py-3">
                                <i class="fa fa-trash-o"></i> Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                Total</th>
            <td class="px-6 py-4 whitespace-nowrap dark:text-white" data-th="total">
                <div class="flex items-center justify-center">{{ $total }}€</div>
            </td>
        </tbody>
    </table>

    <div class="flex justify-end mt-4 mr-10">
        <button type="button" class="text-gray-200 bg-blue-700 hover:bg-blue-800 border border-blue-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2">
            <a href="{{ route('product.index') }}"> <i class="fa fa-arrow-left"></i> Continue
                Shopping</a>
        </button>

        <a href="{{ count($cart) > 0 && Auth::check() ? route('checkout') : (Auth::check() ? route('product.index') : route('login')) }}" class="text-gray-200 bg-emerald-700 hover:bg-emerald-800 border border-emerald-900 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2 ml-4">
            <svg class="dark:text-gray-200" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z">
                </path>
            </svg> Checkout
        </a>
        <form action="{{ route('cart.destroyAll') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                <i class="fa fa-trash-o"></i> Delete All
            </button>
        </form>
    </div>
    @endsection

    @section('scripts')
    @endsection