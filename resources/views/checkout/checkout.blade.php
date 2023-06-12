@extends('layouts.layout')

@section('content')
<div class="grid grid-cols-2 gap-4 ml-10">
    <div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table id="cart" class="min-w-full divide-y divide-gray-200 my-4 ">
                <thead class=" text-xs text-gray-700 uppercase dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                            Product</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                            Price</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                            Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($cart); $i++) <tr data-id="" class="border-b border-gray-200 dark:border-gray-700">

                        <td data-th="Product" scope="row" class="px-6 py-4 whitespace-nowrap dark:text-white">
                            <div class="flex items-center justify-center">{{ $cart[$i]['nombre'] }}</div>
                        </td>
                        <td data-th="Price" class="px-6 py-4 whitespace-nowrap dark:text-white">
                            <div class="flex items-center justify-center">{{ $cart[$i]['precio'] }}</div>
                        </td>
                        <td data-th="Quantity" class="px-6 py-4 whitespace-nowrap dark:text-white">
                            <div class="flex items-center justify-center">{{ $cart[$i]['cantidad'] }}</div>
                        </td>

                        </tr>
                        @endfor
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                            Total</th>
                        <td class="px-6 py-4 whitespace-nowrap dark:text-white" data-th="total">
                            <div class="flex items-center justify-center">{{ $total }}€</div>
                        </td>

                </tbody>
            </table>
        </div>
    </div>
    <div>
        <div class="flex justify-center">
            <div class="w-full max-w-sm">
                <h3 class="text-3xl font-bold text-gray-900 dark:text-white">Card Details</h3>
                <form action="{{ route('checkout.pay') }}" method="POST" class="px-8 py-6">
                    @csrf
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="cardtype" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Card Type *</label>
                        <select name="cardtype" id="cardtype" class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            <option value="visa">Visa</option>
                            <option value="mastercard">Mastercard</option>
                        </select>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="card_number" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Card
                            Number *</label>
                        <input type="text" name="card_number" id="card_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="expiration_date" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Expiration
                            Date *</label>
                        <input type="month" name="expiration_date" id="expiration_date" class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " min="{{ now()->format('Y-m') }}" pattern="\d{4}-\d{2}" />
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name
                            *</label>
                        <input type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                    </div>

                    <div class="relative z-0 w-full mb-6 group">
                        <label for="cvv" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">CVV
                        </label>
                        <input type="number" name="cvv" id="cvv" class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                    </div>
                    <div>
                        <button type="submit" class="text-white bg-blue-400 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                </path>
                            </svg>
                            Pay Now
                        </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    //controlar la longitud maxima de 3
    document.getElementById('cvv').addEventListener('input', function(e) {
        var value = this.value;
        if (value.length > 3) {
            this.value = value.slice(0, 3);
        }
    });

    //Controlar los numeros que mete y la cantidad , poniendo espacios cada 4 numeros
    document.getElementById('card_number').addEventListener('input', function(e) {
        var value = this.value.replace(/\s+/g, '').replace(/[^0-9]/gi, '');
        var formattedValue = '';
        for (var i = 0; i < value.length; i++) {
            if (i > 0 && i % 4 === 0) {
                formattedValue += ' ';
            }
            formattedValue += value.charAt(i);
        }
        if (formattedValue.length > 19) {
            formattedValue = formattedValue.substr(0, 19);
        }
        this.value = formattedValue;
    });
</script>
@endsection