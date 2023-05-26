@extends('layouts.layout')

@section('content')
<div class="grid grid-cols-2 gap-4">
    <div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table id="cart" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
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
                        <td data-th="Quantity" class="px-6 py-3">{{$cart[$i]['cantidad']}}</td>
                        <td class="actions" data-th="">
                        </td>
                        </tr>
                        @endfor
                        <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">Total</th>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800" data-th="total">${{ $total }}</td>
                </tbody>
            </table>
        </div>
    </div>
    <div>
        <div class="flex justify-center">
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <h3 class="text-3xl font-bold text-gray-900 dark:text-white">Card Details</h3>
                <form action="{{ route('checkout.pay') }}" method="POST" class="px-8 py-6">
                    <div class="w-full max-w-md bg-white shadow-md rounded-lg px-8 py-6 xCPtuxM4_gihvpPwv9bX Nu4HUn5EQpnNJ1itNkrd Bcw8VuwRWYxPGjWjS6Ig EyjJPKD7jgGRBhaLpRVI AqVNvLG_H6VHhym2yKMp">
                        <div>
                            <label for="card_number" class="block text-sm font-medium text-gray-700 dark:text-white">Card Number *</label>
                            <input type="text" name="card_number" id="card_number" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm text-gray-900 dark:text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="1234 1234 1234 1234" autocomplete="cc-number" autocorrect="off" spellcheck="false" inputmode="numeric" aria-label="Card number" aria-invalid="true">
                        </div>
                        <div>
                            <label for="expiration_date" class="block text-sm font-medium text-gray-700 dark:text-white">Expiration Date *</label>
                            <input type="date" name="expiration_date" id="expiration_date" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm text-gray-900 dark:text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="full_name" class="block text-sm font-medium text-gray-700 dark:text-white">Name *</label>
                            <input type="text" name="full_name" id="full_name" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm text-gray-900 dark:text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Full name on card">
                        </div>

                        <div>
                            <label for="cvv" class="block text-sm font-medium text-gray-700 dark:text-white">CVC *</label>
                            <input type="number" name="cvv" id="cvv" class="mt-1 block w-full py-2 px-3 border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-md shadow-sm text-gray-900 dark:text-white focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="•••" required="">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-danger btn-sm cart_remove px-6 py-3">
                                Pay Now
                            </button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection