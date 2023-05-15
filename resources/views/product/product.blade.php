@extends('layouts.layout')
@section('content')
<h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$product->nombre}}</h1>
    <div class="flex items-center justify-center">
        <form action="{{ route('cart.addToCart', $product->id) }}">
            <button type="submit" class="dark:text-white bg-emerald-500">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
            </button>
        </form>
    </div>
@endsection
