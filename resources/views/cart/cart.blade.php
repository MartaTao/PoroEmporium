@php
use App\Models\Carrito\Carrito;
@endphp
@extends('layouts.layout')

@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table id="cart" class="w-full text-sm text-left text-gray-500 dark:text-gray-400>
<thead class=" text-xs text-gray-700 uppercase dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">Product</th>
            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">Price</th>
            <th scope="col" class="px-6 py-3">Quantity</th>
        </tr>
        </thead>
        <tbody>
            @for ($i=0;$i< count($cart);$i++) <tr data-id="" class="border-b border-gray-200 dark:border-gray-700">
                <td data-th="Product" scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">{{$cart[$i]['nombre']}}</td>
                <td data-th="Price" class="px-6 py-4 bg-gray-50 dark:bg-gray-800">{{$cart[$i]['precio']}}</td>
                <td data-th="Quantity" class="px-6 py-4">{{$cart[$i]['cantidad']}}</td>
                <td class="actions" data-th="">
                    <form action="{{ route('cart.destroy', $cart[$i]['nombre']) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm cart_remove px-6 py-4 bg-gray-50 dark:bg-gray-800">
                            <i class="fa fa-trash-o"></i> Delete
                        </button>
                    </form>
                </td>
                </tr>
                @endfor
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">Total</th>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800" data-th="total">${{ $total }}</td>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5" class="text-right">
                    <h3><strong></strong></h3>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="text-right">
                    <a href="{{ route('product.index')}}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                    <br>
                    <a href="{{ route('checkout') }}" class="btn btn-success"><i class="fa fa-money"></i> Checkout</a>

                </td>
            </tr>
        </tfoot>
    </table>

    @endsection

    @section('scripts')
    @endsection