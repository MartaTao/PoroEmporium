@extends('layouts.layout')
@section('content')
    <div class=" relative flex items-top min-h-screen  py-4 my-7 sm:pt-0">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <h1 class="mb-2 text-3xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $product->nombre }}</h1>
            <div class="grid grid-cols-3 gap-5">
                <div>
                    <div class="grid gap-4">
                        <div>
                            @if (!is_null($product->getMedia('products_avatar')->first()))
                                <img class="h-auto max-w-full rounded-lg product_images " id="imagen_principal" data-src="{{ $product->getMedia('products_avatar')->first()->getUrl() }}"
                                    src="{{ $product->getMedia('products_avatar')->first()->getUrl() }}"
                                    alt="Imagen principal del producto">
                            @else
                                <img class="h-auto max-w-full rounded-lg"
                                    src="https://flowbite.s3.amazonaws.com/docs/gallery/featured/image.jpg" alt="">
                            @endif
                        </div>
                        <div class="grid grid-cols-5 gap-4">
                                @foreach ($images as $media)
                                    <div>
                                        <img class="h-auto max-w-full rounded-lg  product_images" data-src="{{ $media->getUrl() }}" src="{{ $media->getUrl() }}"
                                            alt="Imagenes del producto">
                                            <div class="lupa"></div>
                                    </div>
                                @endforeach
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
                        @if ($product->valoracion==0)
                            @for ($i = 1; $i <= 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor"
                                    stroke-width="0.5" class="bi bi-snow3 text-blue-300 dark:text-blue-400 w-5 h-5"
                                    viewBox="0 0 16 16">
                                    <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                                    <path
                                        d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                                </svg>
                            @endfor
                        @else
                            @for ($i = 1; $i < $mediaTruncada; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor"
                                    stroke-width="0.5" class="bi bi-snow3 text-blue-400 dark:text-blue-200 w-5 h-5"
                                    viewBox="0 0 16 16">
                                    <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                                    <path
                                        d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                                </svg>
                            @endfor
                            @if ($mediaTruncada < $product->valoracion)
                                <svg xmlns="http://www.w3.org/2000/svg" stroke-width="0.5"
                                    class="bi bi-snow3 text-blue-400 dark:text-blue-200 w-5 h-5" viewBox="0 0 16 16">
                                    <path d="M 8 7.5 a 0.5 0.5 0 1 0 0 1 z" fill="#C3DDFD" stroke="#C3DDFD" />
                                    <path d="M 8 7.5 a 0.5 0.5 0 0 1 0 1 z" fill="#76A9FA" stroke="#76A9FA" />
                                    <path
                                        d="M 8 16 a 0.5 0.5 0 0 1 -0.5 -0.5 v -1.293 l -0.646 0.647 a 0.5 0.5 0 0 1 -0.707 -0.708 L 7.5 12.793 v -1.51 l -2.053 -1.232 l -1.348 0.778 l -0.495 1.85 a 0.5 0.5 0 1 1 -0.966 -0.26 l 0.237 -0.882 l -1.12 0.646 a 0.5 0.5 0 0 1 -0.5 -0.866 l 1.12 -0.646 l -0.883 -0.237 a 0.5 0.5 0 1 1 0.258 -0.966 l 1.85 0.495 L 5 9.155 v -2.31 l -1.4 -0.808 l -1.85 0.495 a 0.5 0.5 0 1 1 -0.259 -0.966 l 0.884 -0.237 l -1.12 -0.646 a 0.5 0.5 0 0 1 0.5 -0.866 l 1.12 0.646 l -0.237 -0.883 a 0.5 0.5 0 1 1 0.966 -0.258 l 0.495 1.849 l 1.348 0.778 L 7.5 4.717 v -1.51 L 6.147 1.854 a 0.5 0.5 0 1 1 0.707 -0.708 l 0.646 0.647 V 0.5 a 0.5 0.5 0 0 1 0.5 -0.5 L 7.955 5.479 L 5.999 6.816 L 5.999 9.291 L 8.004 10.578z "
                                        fill="#C3DDFD" stroke="#C3DDFD" />
                                    <path
                                        d="M 7.991 10.431 L 9.948 9.465 V 6.814 L 8.016 5.501 V 5.424 a 0 0.5 0 0 0 -0.013 -5.424 A 2 -9 0 0 1 8.457 0.505 v 1.293 l 0.647 -0.647 a 0.5 0.5 0 1 1 0.707 0.708 L 8.5 3.207 v 1.51 l 2.053 1.232 l 1.348 -0.778 l 0.495 -1.85 a 0.5 0.5 0 1 1 0.966 0.26 l -0.236 0.882 l 1.12 -0.646 a 0.5 0.5 0 0 1 0.5 0.866 l -1.12 0.646 l 0.883 0.237 a 0.5 0.5 0 1 1 -0.26 0.966 l -1.848 -0.495 l -1.4 0.808 v 2.31 l 1.4 0.808 l 1.849 -0.495 a 0.5 0.5 0 1 1 0.259 0.966 l -0.883 0.237 l 1.12 0.646 a 0.5 0.5 0 0 1 -0.5 0.866 l -1.12 -0.646 l 0.236 0.883 a 0.5 0.5 0 1 1 -0.966 0.258 l -0.495 -1.849 l -1.348 -0.778 L 8.5 11.283 v 1.51 l 1.354 1.353 a 0.5 0.5 0 0 1 -0.707 0.708 l -0.647 -0.647 V 15.512 a 0.5 0.5 0 0 1 -0.5 0.5 z"
                                        fill="#76A9FA" stroke="#76A9FA" />
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor"
                                    stroke-width="0.5" class="bi bi-snow3 text-blue-400 dark:text-blue-200 w-5 h-5"
                                    viewBox="0 0 16 16">
                                    <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                                    <path
                                        d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                                </svg>
                            @endif
                            @for ($i = $mediaTruncada; $i < 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor"
                                    stroke-width="0.5" class="bi bi-snow3 text-blue-300 dark:text-blue-400 w-5 h-5"
                                    viewBox="0 0 16 16">
                                    <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                                    <path
                                        d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                                </svg>
                            @endfor
                        @endif
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{ !is_null($product->valoracion) ? $product->valoracion : '0.0' }}</span>
                    </div>
                </div>

                <!--Añadir al carrito-->
                <div>
                    <div class="flex items-center justify-center">
                        <form method="get" action="{{ route('cart.addToCart', $product->id) }}">
                            <div class="grid grid-cols-3">
                                <a href="#" class="flex items-center justify-center quitar">
                                    <svg class="dark:text-white w-8 h-8" fill="none" stroke="currentColor"
                                        stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </a>
                                <div class="flex items-center justify-center">
                                    <input type="number" name="cantidad"
                                        class="bg-transparent w-[55px] text-gray-300 border-0 cantidad" readonly
                                        value="1">
                                </div>

                                <a href="#" class="flex items-center justify-center aniadir" data-cantidad="{{ $product->cantidad }}">
                                    <svg class="dark:text-white w-8 h-8" fill="none" stroke="currentColor"
                                        stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </a>
                            </div>
                            <div class="flex items-center justify-center">
                                <button href="{{ route('cart.addToCart', $product->id) }}"
                                    onclick="this.parentNode.submit();"
                                    {{ $product->cantidad > 0 ? '' : 'disabled' }}
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
            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
            <div>
                <h1 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Especificaciones</h1>
                <ul>
                    @foreach ($product->especificaciones as $especificacion )
                     <li class="text-gray-500 dark:text-gray-400">
                        {{$especificacion->descripcion}}
                     </li>
                @endforeach
                </ul>

            </div>
            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

            <!--Valoración-->
            <div>
                <h1 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">Comentarios y valoraciones</h1>
                <div class="grid grid-cols-3">
                    <div class="col-span-1 border-r-2 border-gray-700">
                        <form action="{{ route('comment.store') }}" method="POST">
                            @csrf
                            <input type="hidden" id="id_product" name="id_product" class="hidden-input"
                                value="{{ $product->id }}" />
                            <div class="flex items-center mt-2.5 mb-5">
                                @for ($i = 1; $i <= 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor"
                                        stroke-width="0.5"
                                        class="bi bi-snow3 text-blue-200 dark:text-blue-400 w-5 h-5 snowflake"
                                        viewBox="0 0 16 16" data-value="{{ $i }}">
                                        <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                                        <path
                                            d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                                    </svg>
                                @endfor
                            </div>
                            <input type="hidden" id="rating" name="rating" class="hidden-input" value="0" />
                            @error('rating')
                                <div class="text-red-500 text-xs">{{ $message }}</div>
                            @enderror
                            <div class="relative z-0 w-full mb-6 group">
                                <textarea name="comment" id="floating_comment"
                                    class="block w-[500px] py-2.5 px-0  text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" "></textarea>
                                <label for="floating_comment"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Comentario</label>
                            </div>
                            <button type="submit"
                                class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Comentar</button>
                        </form>
                    </div>

                    <!--Comentarios-->
                    <div class="col-span-2">
                        @foreach ($comentarios as $comentario)
                            <div class="p-6 flex space-x-2">
                                @if (!is_null($comentario->user->userProfile->getMedia('users_avatar')->first()))
                                    <img class="w-8 h-8 rounded-full"
                                        src="{{ $comentario->user->userProfile->getMedia('users_avatar')->first()->getUrl() }}"
                                        alt="user photo">
                                @else
                                    <div
                                        class="relative inline-flex items-center justify-center  w-8 h-8 overflow-hidden bg-blue-200 rounded-full">
                                        <span
                                            class="font-medium text-base text-gray-900 uppercase">{{ $fisrtLetter = substr($comentario->user->userProfile->name, 0, 1) }}{{ $secondtLetter = substr($comentario->user->userProfile->first_surname, 0, 1) }}</span></span>
                                    </div>
                                @endif
                                <div class="flex-1">
                                    <div class="flex justify-between items-center">
                                        <div class="flex">
                                            <span class="text-gray-200">{{ $comentario->user->username }}</span>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="h-6 w-6 text-gray-600 -scale-x-100" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                            </svg>
                                            <small
                                                class="ml-2 text-sm text-gray-400">{{ $comentario->created_at->format('j M Y, g:i a') }}</small>
                                        </div>
                                    </div>
                                    <div class="flex items-center mt-2.5 mb-5">
                                        @for ($i = 1; $i <= $comentario->valoracion; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                stroke="currentColor" stroke-width="0.5"
                                                class="bi bi-snow3 text-blue-400 dark:text-blue-200 w-5 h-5"
                                                viewBox="0 0 16 16">
                                                <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                                                <path
                                                    d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                                            </svg>
                                        @endfor
                                        @for ($i = $comentario->valoracion; $i < 5; $i++)
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                stroke="currentColor" stroke-width="0.5"
                                                class="bi bi-snow3 text-blue-300 dark:text-blue-400 w-5 h-5"
                                                viewBox="0 0 16 16">
                                                <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                                                <path
                                                    d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                                            </svg>
                                        @endfor
                                    </div>
                                    <p class="mt-4 text-lg text-gray-200">{{ $comentario->comentario }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.aniadir').click(function() {
            var cant = parseInt($('.cantidad').val());
            var cantProd = $(this).data('cantidad');
            var suma = cant + 1;
            if(suma <= cantProd){
                $('.cantidad').val(suma);
            }

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
            $('.snowflake').removeClass('text-blue-400 dark:text-blue-200').addClass(
                'text-blue-300 dark:text-blue-400');
            for (var i = 1; i <= value; i++) {
                $('.snowflake[data-value="' + i + '"]').removeClass('text-blue-300 dark:text-blue-400').addClass(
                    'text-blue-400 dark:text-blue-200');
            }
        });

        $('.snowflake').on('mouseout', function() {
            if (selectedValue === 0) {
                $('.snowflake').removeClass('text-blue-400 dark:text-blue-200').addClass(
                    'text-blue-300 dark:text-blue-400');
            } else {
                for (var i = 1; i <= selectedValue; i++) {
                    $('.snowflake[data-value="' + i + '"]').removeClass('text-blue-300 dark:text-blue-400')
                        .addClass(
                            'text-blue-400 dark:text-blue-200');
                }
            }
        });

        $('.snowflake').on('click', function() {
            var value = $(this).data('value');
            selectedValue = value;
            $('.snowflake').removeClass('text-blue-400 dark:text-blue-200').addClass(
                'text-blue-300 dark:text-blue-400');
            for (var i = 1; i <= value; i++) {
                $('.snowflake[data-value="' + i + '"]').removeClass('text-blue-300 dark:text-blue-400').addClass(
                    'text-blue-400 dark:text-blue-200');
            }
            $('#rating').val(value);
        });

        $('.product_images').on('click',function(){
            var src= $(this).data('src');
            var imagen_principal=$('#imagen_principal').data('src');
            $('#imagen_principal').attr('src',src);
            $('#imagen_principal').data('src', src);
            $(this).attr('src',imagen_principal);
            $(this).data('src', imagen_principal);
        });

    </script>
@endsection
