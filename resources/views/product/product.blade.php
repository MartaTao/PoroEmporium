@extends('layouts.layout')
@section('content')
    <div class=" relative flex items-top min-h-screen  py-4 my-7 sm:pt-0">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $product->nombre }}</h1>
            <div class="grid grid-cols-3 gap-5">
                <div>
                    <div class="grid gap-4">
                        <div>
                            <img class="h-auto max-w-full rounded-lg"
                                src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="">
                        </div>
                        <div class="grid grid-cols-5 gap-4">
                            <div>
                                <img class="h-auto max-w-full rounded-lg"
                                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-1.jpg" alt="">
                            </div>
                            <div>
                                <img class="h-auto max-w-full rounded-lg"
                                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-2.jpg" alt="">
                            </div>
                            <div>
                                <img class="h-auto max-w-full rounded-lg"
                                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-3.jpg" alt="">
                            </div>
                            <div>
                                <img class="h-auto max-w-full rounded-lg"
                                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-4.jpg" alt="">
                            </div>
                            <div>
                                <img class="h-auto max-w-full rounded-lg"
                                    src="https://flowbite.s3.amazonaws.com/docs/gallery/square/image-5.jpg" alt="">
                            </div>
                        </div>
                    </div>

                </div>
                <div>
                    <p class="text-left text-gray-500 dark:text-gray-400">{{ $product->descripcion }}</p>
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                    <p class="text-3xl font-bold text-gray-900 dark:text-white">{{ $product->precio }}€</p>
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

                    <!--Rating-->
                    <div class="flex items-center mt-2.5 mb-5">
                        @for ($i = 1; $i < 5; $i++)
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor"
                                stroke-width="0.5" class="bi bi-snow3 text-blue-400 dark:text-blue-200 w-5 h-5" viewBox="0 0 16 16">
                                <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                                <path
                                    d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                            </svg>
                        @endfor
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="0.5"
                            class="bi bi-snow3 text-blue-300 dark:text-blue-400 w-5 h-5" viewBox="0 0 16 16">
                            <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                            <path
                                d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                        </svg>
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">4.0</span>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-center">
                        <form action="{{ route('cart.addToCart', $product->id) }}">
                            <div class="grid grid-cols-3">
                                <a href="#" class="flex items-center justify-center">
                                    <svg class="dark:text-white w-8 h-8 quitar" fill="none" stroke="currentColor"
                                        stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </a>
                                <div class="flex items-center justify-center">
                                    <input type="number" class="bg-transparent text-gray-300 border-0 cantidad" readonly
                                        value="1">
                                </div>

                                <a href="#" class="flex items-center justify-center">
                                    <svg class="dark:text-white w-8 h-8 aniadir" fill="none" stroke="currentColor"
                                        stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="flex items-center justify-center">
                                <button type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg aria-hidden="true" class="w-5 h-5 mr-2 -ml-1" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                        </path>
                                    </svg>
                                    Buy now
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--Valoración-->
            <div class="flex items-center mt-2.5 mb-5">
                @for ($i = 1; $i <= 5; $i++)
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="0.5"
                        class="bi bi-snow3 text-blue-200 dark:text-blue-400 w-5 h-5 snowflake" viewBox="0 0 16 16"
                        data-value="{{ $i }}">
                        <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                        <path
                            d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                    </svg>
                @endfor
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.aniadir').click(function() {
            var cant = parseInt($('.cantidad').val());
            var suma = cant + 1;
            $('.cantidad').val(suma);
        })
        $('.quitar').click(function() {
            var cant = parseInt($('.cantidad').val());
            if (cant > 0) {
                var resta = cant - 1;
                $('.cantidad').val(resta);
            }

        })
        var selectedValue = 0;

        $('.snowflake').on('mouseover', function() {
            var value = $(this).data('value');
            $('.snowflake').removeClass('text-blue-400 dark:text-blue-200').addClass('text-blue-300 dark:text-blue-400');
            for (var i = 1; i <= value; i++) {
                $('.snowflake[data-value="' + i + '"]').removeClass('text-blue-300 dark:text-blue-400').addClass(
                    'text-blue-400 dark:text-blue-200');
            }
        });

        $('.snowflake').on('mouseout', function() {
            if (selectedValue === 0) {
                $('.snowflake').removeClass('text-blue-400 dark:text-blue-200').addClass('text-blue-300 dark:text-blue-400');
            } else {
                for (var i = 1; i <= selectedValue; i++) {
                    $('.snowflake[data-value="' + i + '"]').removeClass('text-blue-300 dark:text-blue-400').addClass(
                        'text-blue-400 dark:text-blue-200');
                }
            }
        });

        $('.snowflake').on('click', function() {
            var value = $(this).data('value');
            selectedValue = value;
            $('.snowflake').removeClass('text-blue-400 dark:text-blue-200').addClass('text-blue-300 dark:text-blue-400');
            for (var i = 1; i <= value; i++) {
                $('.snowflake[data-value="' + i + '"]').removeClass('text-blue-300 dark:text-blue-400').addClass(
                    'text-blue-400 dark:text-blue-200');
            }
        });
    </script>
@endsection
