@extends('layouts.layout')
@section('style')
@endsection
@section('content')
<div class="relative flex items-top min-h-screen py-4 sm:pt-0">
    <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg" id="ofertas-tab" data-tabs-target="#ofertas" type="button" role="tab" aria-controls="ofertas" aria-selected="false">Inicio</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="productos-tab" data-tabs-target="#productos" type="button" role="tab" aria-controls="productos" aria-selected="false">Productos</button>
                </li>
                <li class="mr-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="n-productos" data-tabs-target="#nproductos" type="button" role="tab" aria-controls="nproductos" aria-selected="false">Nuevos productos</button>
                </li>
            </ul>
        </div>
        <div id="myTabContent">
            <div class="hidden p-4 rounded-lg" id="ofertas" role="tabpanel" aria-labelledby="ofertas-tab">
                <div class="my-3 grid lg:grid-cols-6 md:grid-cols-3 sm:grid-cols-1 gap-3">
                    @foreach ($descuentos as $descuento)
                    <div class="max-w-sm bg-sky-50 border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
                        @if (!is_null($descuento->product->getMedia('products_avatar')->first()))
                        <a href="{{route('product.show',$descuento->product->id)}}">
                            <img class="rounded-t-lg" src="{{ $descuento->product->getMedia('products_avatar')->first()->getUrl() }}" alt="Imagen del producto" />
                        </a>
                        @else
                        <a href="{{route('product.show',$descuento->product->id)}}">
                            <img class="rounded-t-lg" src="https://m.media-amazon.com/images/I/81fV-9eUG5L._AC_SL1500_.jpg" alt="" />
                        </a>
                        @endif
                        <div class="p-5">
                            <a href="{{route('product.show',$descuento->product->id)}}">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $descuento->product->nombre }}
                                </h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {{ $descuento->product->descripcion }}
                            </p>
                            <div>
                                @if ($descuento->product->cantidad > 0)
                                <span class="uppercase text-xs bg-green-50 p-0.5 border-green-500 border rounded text-green-700 font-medium select-none">
                                    Disponible
                                </span>
                                @else
                                <span class="uppercase text-xs bg-red-50 p-0.5 border-red-500 border rounded text-red-700 font-medium select-none">
                                    Agotado
                                </span>
                                @endif
                            </div>
                            <!--Rating-->
                            <div class="flex items-center mt-2.5 mb-5">
                                @if (is_null($descuento->product->valoracion))
                                @for ($i = 1; $i <= 5; $i++) <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="0.5" class="bi bi-snow3 text-blue-300 dark:text-blue-400 w-5 h-5" viewBox="0 0 16 16">
                                    <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                                    <path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                                    </svg>
                                    @endfor
                                    @else
                                    @for ($i = 1; $i < floor($descuento->product->valoracion); $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="0.5" class="bi bi-snow3 text-blue-400 dark:text-blue-200 w-5 h-5" viewBox="0 0 16 16">
                                            <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                                            <path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                                        </svg>
                                        @endfor
                                        @if (floor($descuento->product->valoracion) < $descuento->product->valoracion)
                                            <svg xmlns="http://www.w3.org/2000/svg" stroke-width="0.5" class="bi bi-snow3 text-blue-400 dark:text-blue-200 w-5 h-5" viewBox="0 0 16 16">
                                                <path d="M 8 7.5 a 0.5 0.5 0 1 0 0 1 z" fill="#C3DDFD" stroke="#C3DDFD" />
                                                <path d="M 8 7.5 a 0.5 0.5 0 0 1 0 1 z" fill="#76A9FA" stroke="#76A9FA" />
                                                <path d="M 8 16 a 0.5 0.5 0 0 1 -0.5 -0.5 v -1.293 l -0.646 0.647 a 0.5 0.5 0 0 1 -0.707 -0.708 L 7.5 12.793 v -1.51 l -2.053 -1.232 l -1.348 0.778 l -0.495 1.85 a 0.5 0.5 0 1 1 -0.966 -0.26 l 0.237 -0.882 l -1.12 0.646 a 0.5 0.5 0 0 1 -0.5 -0.866 l 1.12 -0.646 l -0.883 -0.237 a 0.5 0.5 0 1 1 0.258 -0.966 l 1.85 0.495 L 5 9.155 v -2.31 l -1.4 -0.808 l -1.85 0.495 a 0.5 0.5 0 1 1 -0.259 -0.966 l 0.884 -0.237 l -1.12 -0.646 a 0.5 0.5 0 0 1 0.5 -0.866 l 1.12 0.646 l -0.237 -0.883 a 0.5 0.5 0 1 1 0.966 -0.258 l 0.495 1.849 l 1.348 0.778 L 7.5 4.717 v -1.51 L 6.147 1.854 a 0.5 0.5 0 1 1 0.707 -0.708 l 0.646 0.647 V 0.5 a 0.5 0.5 0 0 1 0.5 -0.5 L 7.955 5.479 L 5.999 6.816 L 5.999 9.291 L 8.004 10.578z " fill="#C3DDFD" stroke="#C3DDFD" />
                                                <path d="M 7.991 10.431 L 9.948 9.465 V 6.814 L 8.016 5.501 V 5.424 a 0 0.5 0 0 0 -0.013 -5.424 A 2 -9 0 0 1 8.457 0.505 v 1.293 l 0.647 -0.647 a 0.5 0.5 0 1 1 0.707 0.708 L 8.5 3.207 v 1.51 l 2.053 1.232 l 1.348 -0.778 l 0.495 -1.85 a 0.5 0.5 0 1 1 0.966 0.26 l -0.236 0.882 l 1.12 -0.646 a 0.5 0.5 0 0 1 0.5 0.866 l -1.12 0.646 l 0.883 0.237 a 0.5 0.5 0 1 1 -0.26 0.966 l -1.848 -0.495 l -1.4 0.808 v 2.31 l 1.4 0.808 l 1.849 -0.495 a 0.5 0.5 0 1 1 0.259 0.966 l -0.883 0.237 l 1.12 0.646 a 0.5 0.5 0 0 1 -0.5 0.866 l -1.12 -0.646 l 0.236 0.883 a 0.5 0.5 0 1 1 -0.966 0.258 l -0.495 -1.849 l -1.348 -0.778 L 8.5 11.283 v 1.51 l 1.354 1.353 a 0.5 0.5 0 0 1 -0.707 0.708 l -0.647 -0.647 V 15.512 a 0.5 0.5 0 0 1 -0.5 0.5 z" fill="#76A9FA" stroke="#76A9FA" />
                                            </svg>
                                            @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="0.5" class="bi bi-snow3 text-blue-400 dark:text-blue-200 w-5 h-5" viewBox="0 0 16 16">
                                                <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                                                <path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                                            </svg>
                                            @endif
                                            @for ($i = floor($descuento->product->valoracion); $i < 5; $i++) <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="0.5" class="bi bi-snow3 text-blue-300 dark:text-blue-400 w-5 h-5" viewBox="0 0 16 16">
                                                <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                                                <path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                                                </svg>
                                                @endfor
                                                @endif
                                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{ !is_null($descuento->product->valoracion) ? $descuento->product->valoracion : '0.0' }}</span>
                            </div>
                            <p class="text-3xl font-bold text-gray-900 dark:text-white"><span class="line-through text-red-500">{{ $descuento->product->precio }}€
                                </span>{{ $descuento->precio }}€</p>
                            <a href="{{ route('product.show', $descuento->product->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Más información
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="hidden p-4 rounded-lg" id="productos" role="tabpanel" aria-labelledby="productos-tab">
                <div class="my-3 grid lg:grid-cols-6 md:grid-cols-3 sm:grid-cols-1 gap-3">
                    @foreach ($products as $product)
                    <div class="max-w-sm bg-sky-50 border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
                        @if (!is_null($product->getMedia('products_avatar')->first()))
                        <a href="{{route('product.show',$product->id)}}">
                            <img class="rounded-t-lg" src="{{ $product->getMedia('products_avatar')->first()->getUrl() }}" alt="Imagen del producto" />
                        </a>
                        @else
                        <a href="{{route('product.show',$product->id)}}">
                            <img class="rounded-t-lg" src="https://m.media-amazon.com/images/I/81fV-9eUG5L._AC_SL1500_.jpg" alt="" />
                        </a>
                        @endif
                        <div class="p-5">
                            <a href="{{route('product.show',$product->id)}}">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $product->nombre }}
                                </h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {{ $product->descripcion }}
                            </p>
                            <div>
                                @if ($product->cantidad > 0)
                                <span class="uppercase text-xs bg-green-50 p-0.5 border-green-500 border rounded text-green-700 font-medium select-none">
                                    Disponible
                                </span>
                                @else
                                <span class="uppercase text-xs bg-red-50 p-0.5 border-red-500 border rounded text-red-700 font-medium select-none">
                                    Agotado
                                </span>
                                @endif
                            </div>
                            <!--Rating-->
                            <div class="flex items-center mt-2.5 mb-5">
                                @if (is_null($product->valoracion))
                                @for ($i = 1; $i <= 5; $i++) <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="0.5" class="bi bi-snow3 text-blue-300 dark:text-blue-400 w-5 h-5" viewBox="0 0 16 16">
                                    <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                                    <path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                                    </svg>
                                    @endfor
                                    @else
                                    @for ($i = 1; $i < floor($product->valoracion); $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="0.5" class="bi bi-snow3 text-blue-400 dark:text-blue-200 w-5 h-5" viewBox="0 0 16 16">
                                            <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                                            <path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                                        </svg>
                                        @endfor
                                        @if (floor($product->valoracion) < $product->valoracion)
                                            <svg xmlns="http://www.w3.org/2000/svg" stroke-width="0.5" class="bi bi-snow3 text-blue-400 dark:text-blue-200 w-5 h-5" viewBox="0 0 16 16">
                                                <path d="M 8 7.5 a 0.5 0.5 0 1 0 0 1 z" fill="#C3DDFD" stroke="#C3DDFD" />
                                                <path d="M 8 7.5 a 0.5 0.5 0 0 1 0 1 z" fill="#76A9FA" stroke="#76A9FA" />
                                                <path d="M 8 16 a 0.5 0.5 0 0 1 -0.5 -0.5 v -1.293 l -0.646 0.647 a 0.5 0.5 0 0 1 -0.707 -0.708 L 7.5 12.793 v -1.51 l -2.053 -1.232 l -1.348 0.778 l -0.495 1.85 a 0.5 0.5 0 1 1 -0.966 -0.26 l 0.237 -0.882 l -1.12 0.646 a 0.5 0.5 0 0 1 -0.5 -0.866 l 1.12 -0.646 l -0.883 -0.237 a 0.5 0.5 0 1 1 0.258 -0.966 l 1.85 0.495 L 5 9.155 v -2.31 l -1.4 -0.808 l -1.85 0.495 a 0.5 0.5 0 1 1 -0.259 -0.966 l 0.884 -0.237 l -1.12 -0.646 a 0.5 0.5 0 0 1 0.5 -0.866 l 1.12 0.646 l -0.237 -0.883 a 0.5 0.5 0 1 1 0.966 -0.258 l 0.495 1.849 l 1.348 0.778 L 7.5 4.717 v -1.51 L 6.147 1.854 a 0.5 0.5 0 1 1 0.707 -0.708 l 0.646 0.647 V 0.5 a 0.5 0.5 0 0 1 0.5 -0.5 L 7.955 5.479 L 5.999 6.816 L 5.999 9.291 L 8.004 10.578z " fill="#C3DDFD" stroke="#C3DDFD" />
                                                <path d="M 7.991 10.431 L 9.948 9.465 V 6.814 L 8.016 5.501 V 5.424 a 0 0.5 0 0 0 -0.013 -5.424 A 2 -9 0 0 1 8.457 0.505 v 1.293 l 0.647 -0.647 a 0.5 0.5 0 1 1 0.707 0.708 L 8.5 3.207 v 1.51 l 2.053 1.232 l 1.348 -0.778 l 0.495 -1.85 a 0.5 0.5 0 1 1 0.966 0.26 l -0.236 0.882 l 1.12 -0.646 a 0.5 0.5 0 0 1 0.5 0.866 l -1.12 0.646 l 0.883 0.237 a 0.5 0.5 0 1 1 -0.26 0.966 l -1.848 -0.495 l -1.4 0.808 v 2.31 l 1.4 0.808 l 1.849 -0.495 a 0.5 0.5 0 1 1 0.259 0.966 l -0.883 0.237 l 1.12 0.646 a 0.5 0.5 0 0 1 -0.5 0.866 l -1.12 -0.646 l 0.236 0.883 a 0.5 0.5 0 1 1 -0.966 0.258 l -0.495 -1.849 l -1.348 -0.778 L 8.5 11.283 v 1.51 l 1.354 1.353 a 0.5 0.5 0 0 1 -0.707 0.708 l -0.647 -0.647 V 15.512 a 0.5 0.5 0 0 1 -0.5 0.5 z" fill="#76A9FA" stroke="#76A9FA" />
                                            </svg>
                                            @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="0.5" class="bi bi-snow3 text-blue-400 dark:text-blue-200 w-5 h-5" viewBox="0 0 16 16">
                                                <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                                                <path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                                            </svg>
                                            @endif
                                            @for ($i = floor($product->valoracion); $i < 5; $i++) <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="0.5" class="bi bi-snow3 text-blue-300 dark:text-blue-400 w-5 h-5" viewBox="0 0 16 16">
                                                <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                                                <path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                                                </svg>
                                                @endfor
                                                @endif
                                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{ !is_null($product->valoracion) ? $product->valoracion : '0.0' }}</span>
                            </div>
                            @if (!is_null($product->discount))
                            <p class="text-3xl font-bold text-gray-900 dark:text-white"><span class="line-through text-red-500">{{ $product->precio }}€
                                </span>{{ $product->precio-$product->discount->precio }}€</p>
                            @else
                            <p class="text-3xl font-bold text-gray-900 dark:text-white">
                                {{ $product->precio }}€
                            </p>
                            @endif
                            </p>
                            <a href="{{ route('product.show', $product->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Más información
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="hidden p-4 rounded-lg" id="nproductos" role="tabpanel" aria-labelledby="n-productos">
                <div class="my-3 grid lg:grid-cols-6 md:grid-cols-3 sm:grid-cols-1 gap-3">
                    @foreach ($products->take(5) as $product)
                    <div class="max-w-sm bg-sky-50 border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
                        @if (!is_null($product->getMedia('products_avatar')->first()))
                        <a href="{{route('product.show',$product->id)}}">
                            <img class="rounded-t-lg" src="{{ $product->getMedia('products_avatar')->first()->getUrl() }}" alt="Imagen del producto" />
                        </a>
                        @else
                        <a href="{{route('product.show',$product->id)}}">
                            <img class="rounded-t-lg" src="https://m.media-amazon.com/images/I/81fV-9eUG5L._AC_SL1500_.jpg" alt="" />
                        </a>
                        @endif
                        <div class="p-5">
                            <a href="{{route('product.show',$product->id)}}">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                    {{ $product->nombre }}
                                </h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {{ $product->descripcion }}
                            </p>
                            <div>
                                @if ($product->cantidad > 0)
                                <span class="uppercase text-xs bg-green-50 p-0.5 border-green-500 border rounded text-green-700 font-medium select-none">
                                    Disponible
                                </span>
                                @else
                                <span class="uppercase text-xs bg-red-50 p-0.5 border-red-500 border rounded text-red-700 font-medium select-none">
                                    Agotado
                                </span>
                                @endif
                            </div>
                            <!--Rating-->
                            <div class="flex items-center mt-2.5 mb-5">
                                @if (is_null($product->valoracion))
                                @for ($i = 1; $i <= 5; $i++) <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="0.5" class="bi bi-snow3 text-blue-300 dark:text-blue-400 w-5 h-5" viewBox="0 0 16 16">
                                    <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                                    <path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                                    </svg>
                                    @endfor
                                    @else
                                    @for ($i = 1; $i < floor($product->valoracion); $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="0.5" class="bi bi-snow3 text-blue-400 dark:text-blue-200 w-5 h-5" viewBox="0 0 16 16">
                                            <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                                            <path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                                        </svg>
                                        @endfor
                                        @if (floor($product->valoracion) < $product->valoracion)
                                            <svg xmlns="http://www.w3.org/2000/svg" stroke-width="0.5" class="bi bi-snow3 text-blue-400 dark:text-blue-200 w-5 h-5" viewBox="0 0 16 16">
                                                <path d="M 8 7.5 a 0.5 0.5 0 1 0 0 1 z" fill="#C3DDFD" stroke="#C3DDFD" />
                                                <path d="M 8 7.5 a 0.5 0.5 0 0 1 0 1 z" fill="#76A9FA" stroke="#76A9FA" />
                                                <path d="M 8 16 a 0.5 0.5 0 0 1 -0.5 -0.5 v -1.293 l -0.646 0.647 a 0.5 0.5 0 0 1 -0.707 -0.708 L 7.5 12.793 v -1.51 l -2.053 -1.232 l -1.348 0.778 l -0.495 1.85 a 0.5 0.5 0 1 1 -0.966 -0.26 l 0.237 -0.882 l -1.12 0.646 a 0.5 0.5 0 0 1 -0.5 -0.866 l 1.12 -0.646 l -0.883 -0.237 a 0.5 0.5 0 1 1 0.258 -0.966 l 1.85 0.495 L 5 9.155 v -2.31 l -1.4 -0.808 l -1.85 0.495 a 0.5 0.5 0 1 1 -0.259 -0.966 l 0.884 -0.237 l -1.12 -0.646 a 0.5 0.5 0 0 1 0.5 -0.866 l 1.12 0.646 l -0.237 -0.883 a 0.5 0.5 0 1 1 0.966 -0.258 l 0.495 1.849 l 1.348 0.778 L 7.5 4.717 v -1.51 L 6.147 1.854 a 0.5 0.5 0 1 1 0.707 -0.708 l 0.646 0.647 V 0.5 a 0.5 0.5 0 0 1 0.5 -0.5 L 7.955 5.479 L 5.999 6.816 L 5.999 9.291 L 8.004 10.578z " fill="#C3DDFD" stroke="#C3DDFD" />
                                                <path d="M 7.991 10.431 L 9.948 9.465 V 6.814 L 8.016 5.501 V 5.424 a 0 0.5 0 0 0 -0.013 -5.424 A 2 -9 0 0 1 8.457 0.505 v 1.293 l 0.647 -0.647 a 0.5 0.5 0 1 1 0.707 0.708 L 8.5 3.207 v 1.51 l 2.053 1.232 l 1.348 -0.778 l 0.495 -1.85 a 0.5 0.5 0 1 1 0.966 0.26 l -0.236 0.882 l 1.12 -0.646 a 0.5 0.5 0 0 1 0.5 0.866 l -1.12 0.646 l 0.883 0.237 a 0.5 0.5 0 1 1 -0.26 0.966 l -1.848 -0.495 l -1.4 0.808 v 2.31 l 1.4 0.808 l 1.849 -0.495 a 0.5 0.5 0 1 1 0.259 0.966 l -0.883 0.237 l 1.12 0.646 a 0.5 0.5 0 0 1 -0.5 0.866 l -1.12 -0.646 l 0.236 0.883 a 0.5 0.5 0 1 1 -0.966 0.258 l -0.495 -1.849 l -1.348 -0.778 L 8.5 11.283 v 1.51 l 1.354 1.353 a 0.5 0.5 0 0 1 -0.707 0.708 l -0.647 -0.647 V 15.512 a 0.5 0.5 0 0 1 -0.5 0.5 z" fill="#76A9FA" stroke="#76A9FA" />
                                            </svg>
                                            @else
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="0.5" class="bi bi-snow3 text-blue-400 dark:text-blue-200 w-5 h-5" viewBox="0 0 16 16">
                                                <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                                                <path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                                            </svg>
                                            @endif
                                            @for ($i = floor($product->valoracion); $i < 5; $i++) <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="0.5" class="bi bi-snow3 text-blue-300 dark:text-blue-400 w-5 h-5" viewBox="0 0 16 16">
                                                <path d="M8 7.5a.5.5 0 1 0 0 1 .5.5 0 0 0 0-1z" />
                                                <path d="M8 16a.5.5 0 0 1-.5-.5v-1.293l-.646.647a.5.5 0 0 1-.707-.708L7.5 12.793v-1.51l-2.053-1.232-1.348.778-.495 1.85a.5.5 0 1 1-.966-.26l.237-.882-1.12.646a.5.5 0 0 1-.5-.866l1.12-.646-.883-.237a.5.5 0 1 1 .258-.966l1.85.495L5 9.155v-2.31l-1.4-.808-1.85.495a.5.5 0 1 1-.259-.966l.884-.237-1.12-.646a.5.5 0 0 1 .5-.866l1.12.646-.237-.883a.5.5 0 1 1 .966-.258l.495 1.849 1.348.778L7.5 4.717v-1.51L6.147 1.854a.5.5 0 1 1 .707-.708l.646.647V.5a.5.5 0 0 1 1 0v1.293l.647-.647a.5.5 0 1 1 .707.708L8.5 3.207v1.51l2.053 1.232 1.348-.778.495-1.85a.5.5 0 1 1 .966.26l-.236.882 1.12-.646a.5.5 0 0 1 .5.866l-1.12.646.883.237a.5.5 0 1 1-.26.966l-1.848-.495-1.4.808v2.31l1.4.808 1.849-.495a.5.5 0 1 1 .259.966l-.883.237 1.12.646a.5.5 0 0 1-.5.866l-1.12-.646.236.883a.5.5 0 1 1-.966.258l-.495-1.849-1.348-.778L8.5 11.283v1.51l1.354 1.353a.5.5 0 0 1-.707.708l-.647-.647V15.5a.5.5 0 0 1-.5.5zm2-6.783V6.783l-2-1.2-2 1.2v2.434l2 1.2 2-1.2z" />
                                                </svg>
                                                @endfor
                                                @endif
                                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ml-3">{{ !is_null($product->valoracion) ? $product->valoracion : '0.0' }}</span>
                            </div>
                            @if (!is_null($product->discount))
                            <p class="text-3xl font-bold text-gray-900 dark:text-white"><span class="line-through text-red-500">{{ $product->precio }}€
                                </span>{{ $product->precio-$product->discount->precio }}€</p>
                            @else
                            <p class="text-3xl font-bold text-gray-900 dark:text-white">
                                {{ $product->precio }}€
                            </p>
                            @endif
                            </p>
                            <a href="{{ route('product.show', $product->id) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Más información
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection