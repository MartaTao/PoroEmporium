@extends('layouts.layout')
@section('content')
    <div class="relative flex items-top min-h-screen py-4 sm:pt-0">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                    data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg " id="users-tab" data-tabs-target="#users"
                            type="button" role="tab" aria-controls="users"
                            aria-selected="{{ Session::get('tab') === 'users' ? 'true' : 'false' }}">Usuarios</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="product-tab" data-tabs-target="#product" type="button" role="tab"
                            aria-controls="product"
                            aria-selected="{{ Session::get('tab') === 'products' ? 'true' : 'false' }}">Productos</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="seller-tab" data-tabs-target="#seller" type="button" role="tab" aria-controls="seller"
                            aria-selected="{{ Session::get('tab') === 'sellers' ? 'true' : 'false' }}">Proveedores</button>
                    </li>
                </ul>
            </div>

            <div id="myTabContent">
                <!--Users-->
                <div class="{{ Session::get('tab') === 'users' ? '' : 'hidden' }} max-w-10xl  p-4" id="users"
                    role="tabpanel" aria-labelledby="users-tab">

                    <!--Buscador-->
                    <form class="flex items-center justify-center" action="#">
                        @csrf
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="search" name="email" id="floating_user_search"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <label for="floating_user_search"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Search
                                by email
                            </label>
                        </div>
                        <button type="submit"
                            class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </form>

                    <!--Botones-->
                    <div class="grid grid-cols-2">
                        <div class="flex justify-s p-2">
                            <a href="#"
                                class="text-white bg-rose-500 hover:bg-rose-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Usuarios
                                eliminados</a>
                        </div>
                        <div class="flex justify-end p-2">
                            <button data-modal-target="create-user-modal" data-modal-toggle="create-user-modal"
                                class="px-4 py-2 bg-green-600 hover:bg-green-700 rounded-md text-white">Create user</button>
                        </div>
                    </div>

                    <!--Tabla de usuarios-->
                    <table class="min-w-full divide-y divide-gray-200 my-4 ">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                    Id</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                    Imagen</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                    Username</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                    Nombre</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                    Primer apellido</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                    Segundo apellido</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                    Email</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                    Manage
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-gray-200">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $user->id }}
                                        </div>
                                    </td>
                                    @if (!is_null($user->userProfile->getMedia('users_avatar')->first()))
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center justify-center">
                                                <img class="rounded-full w-20 h-20"
                                                    src="{{ $user->userProfile->getMedia('users_avatar')->first()->getUrl() }}">
                                            </div>
                                        </td>
                                    @else
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div
                                                class="relative inline-flex items-center justify-center  w-20 h-20 overflow-hidden bg-blue-300 rounded-full">
                                                <span
                                                    class="font-medium text-3xl text-gray-900 uppercase">{{ $fisrtLetter = substr($user->userProfile->name, 0, 1) }}{{ $secondtLetter = substr($user->userProfile->first_surname, 0, 1) }}</span>
                                            </div>
                                        </td>
                                    @endif
                                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $user->username }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $user->userProfile->name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $user->userProfile->first_surname }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $user->userProfile->second_surname }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $user->email }}
                                        </div>
                                    </td>
                                    <td class="px-8 py-8 whitespace-nowrap items-center">
                                        <div class="flex items-center justify-center">
                                            <a href="#" id="dropdownDefaultButton"
                                                data-dropdown-toggle="dropdownUser{{ $user->id }}"><svg
                                                    class="w-8 h-8 dark:text-white text-center" fill="none"
                                                    stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg></a>
                                        </div>
                                        <!-- Dropdown menu -->
                                        <div id="dropdownUser{{ $user->id }}"
                                            class="z-10 hidden bg-transparent divide-y divide-gray-100 rounded-lg shadow w-44">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdownDefaultButton">
                                                <li>
                                                    <a href="{{ route('profile.show', $user->userProfile->id) }}"
                                                        class="block px-4 py-2 bg-blue-300 hover:bg-blue-400 text-white">
                                                        <div class="grid grid-cols-4">
                                                            <div>
                                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                                    stroke-width="1.5" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                            <div class="w-6 h-6 text-start col-span-3 text-base">
                                                                Ver perfil
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="edit-user-btn block px-4 py-2 bg-pink-300 hover:bg-pink-400 text-white"
                                                        data-id="{{ $user->id }}" data-email="{{ $user->email }}"
                                                        data-username="{{ $user->username }}"
                                                        data-name="{{ $user->userProfile->name }}"
                                                        data-first_surname="{{ $user->userProfile->first_surname }}"
                                                        data-second_surname="{{ $user->userProfile->second_surname }}"
                                                        data-birthdate="{{ $user->userProfile->birthdate }}"
                                                        data-mobile="{{ $user->userProfile->mobile }}"
                                                        data-adress="{{ $user->userProfile->adress }}">
                                                        <div class="grid grid-cols-4">
                                                            <div>
                                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                                    stroke-width="1.5" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                            <div class="w-6 h-6 text-start col-span-3 text-base">
                                                                Editar
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="delete-user_btn block px-4 py-2 bg-red-500 hover:bg-red-800 text-white"
                                                        data-id="{{ $user->id }}">
                                                        <div class="grid grid-cols-4">
                                                            <div>
                                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                                    stroke-width="1.5" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                            <div class="w-6 h-6 text-start col-span-3 text-base">
                                                                Eliminar
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!--Pagination-->
                    <div class="my-7">
                        {{ $users->links('pagination::simple-tailwind') }}
                    </div>
                </div>
                <!--Prodcutos-->
                <div class="{{ Session::get('tab') === 'products' ? '' : 'hidden' }} max-w-10xl  p-4" id="product"
                    role="tabpanel" aria-labelledby="product-tab">

                    <!--Botones-->
                    <div class="flex justify-end p-2">
                        <button data-modal-target="create_product_modal" data-modal-toggle="create_product_modal"
                            class="px-4 py-2 bg-green-600 hover:bg-green-700 rounded-md text-white">Añadir
                            producto</button>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200 my-4 ">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                    Id</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                    Imagen</th>
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
                                    Cantidad</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                    Proveedor</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                    Manage
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($productos as $producto)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $producto->id }}
                                        </div>
                                    </td>
                                    @if (!is_null($producto->getMedia('products_avatar')->first()))
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center justify-center">
                                                <img class=" w-20 h-20"
                                                    src="{{ $producto->getMedia('products_avatar')->first()->getUrl() }}">
                                            </div>
                                        </td>
                                    @else
                                        <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                            <div class="flex items-center justify-center">
                                                <svg class="w-20 h-20" fill="none" stroke="currentColor"
                                                    stroke-width="1.5" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </td>
                                    @endif
                                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $producto->nombre }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $producto->descripcion }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $producto->categoria }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $producto->precio }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $producto->cantidad }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                        @if (!is_null($producto->seller))
                                            <div class="flex items-center justify-center">
                                                {{ $producto->seller->nombre }}
                                            </div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap items-center">
                                        <div class="flex items-center justify-center">
                                            <a href="#" id="dropdownDefaultButton"
                                                data-dropdown-toggle="dropdownproducto{{ $producto->id }}"><svg
                                                    class="w-8 h-8 dark:text-white text-center" fill="none"
                                                    stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg></a>
                                        </div>
                                        <!-- Dropdown menu -->
                                        <div id="dropdownproducto{{ $producto->id }}"
                                            class="z-10 hidden bg-transparent divide-y divide-gray-100 rounded-lg shadow w-44">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdownDefaultButton">
                                                <li>
                                                    <a href="{{ route('product.show', $producto->id) }}"
                                                        class="block px-4 py-2 bg-blue-300 hover:bg-blue-400 text-white">
                                                        <div class="grid grid-cols-4">
                                                            <div>
                                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                                    stroke-width="1.5" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z">
                                                                    </path>
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                                </svg>
                                                            </div>
                                                            <div class="w-6 h-6 text-start col-span-3 text-base">
                                                                Ver producto
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-id="{{ $producto->id }}"
                                                        data-nombre="{{ $producto->nombre }}"
                                                        data-categoria="{{ $producto->categoria }}"
                                                        data-descripcion="{{ $producto->descripcion }}"
                                                        data-precio="{{ $producto->precio }}"
                                                        class="edit-product-btn block px-4 py-2 bg-pink-300 hover:bg-pink-400 text-white">
                                                        <div class="grid grid-cols-4">
                                                            <div>
                                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                                    stroke-width="1.5" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                            <div class="w-6 h-6 text-start col-span-3 text-base">
                                                                Editar
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                @if ($producto->cantidad < 1 && !is_null($producto->seller))
                                                    <li>
                                                        <a href="#"
                                                            class="block px-4 py-2 bg-emerald-400 hover:bg-emerald-500 text-white restock"
                                                            data-id="{{ $producto->id }}">
                                                            <div class="grid grid-cols-4">
                                                                <div>
                                                                    <svg class="w-6 h-6" fill="none"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        viewBox="0 0 24 24"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        aria-hidden="true">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125c.621 0 1.129-.504 1.09-1.124a17.902 17.902 0 00-3.213-9.193 2.056 2.056 0 00-1.58-.86H14.25M16.5 18.75h-2.25m0-11.177v-.958c0-.568-.422-1.048-.987-1.106a48.554 48.554 0 00-10.026 0 1.106 1.106 0 00-.987 1.106v7.635m12-6.677v6.677m0 4.5v-4.5m0 0h-12">
                                                                        </path>
                                                                    </svg>
                                                                </div>
                                                                <div class="w-6 h-6 text-start col-span-3 text-base">
                                                                    Reponer
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @endif
                                                <li>
                                                    <a href="#"
                                                        class="block px-4 py-2 bg-purple-400 hover:bg-purple-500 text-white">
                                                        <div class="grid grid-cols-4">
                                                            <div>
                                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                                    stroke-width="1.5" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M9 14.25l6-6m4.5-3.493V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0c1.1.128 1.907 1.077 1.907 2.185zM9.75 9h.008v.008H9.75V9zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm4.125 4.5h.008v.008h-.008V13.5zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                            <div class="w-6 h-6 text-start col-span-3 text-base">
                                                                Hacer descuento
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-id="{{ $producto->id }}"
                                                        class="delete-product_btn block px-4 py-2 bg-red-500 hover:bg-red-600 text-white">
                                                        <div class="grid grid-cols-4">
                                                            <div>
                                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                                    stroke-width="1.5" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                            <div class="w-6 h-6 text-start col-span-3 text-base">
                                                                Eliminar
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!--Proveedores-->
                <div class="{{ Session::get('tab') === 'sellers' ? '' : 'hidden' }} max-w-10xl  p-4" id="seller"
                    role="tabpanel" aria-labelledby="seller-tab">

                    <!--Botones-->
                    <div class="flex justify-end p-2">
                        <button data-modal-target="create-seller-modal" data-modal-toggle="create-seller-modal"
                            class="px-4 py-2 bg-green-600 hover:bg-green-700 rounded-md text-white">Añadir
                            proveedor</button>
                    </div>

                    <table class="min-w-full divide-y divide-gray-200 my-4 ">
                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                    Id</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                    Nombre</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                    Email</th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 dark:text-white uppercase tracking-wider">
                                    Manage
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($sellers as $seller)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $seller->id }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $seller->nombre }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $seller->email }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap items-center">
                                        <div class="flex items-center justify-center">
                                            <a href="#" id="dropdownDefaultButton"
                                                data-dropdown-toggle="dropdownseller{{ $seller->id }}"><svg
                                                    class="w-8 h-8 dark:text-white text-center" fill="none"
                                                    stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z">
                                                    </path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                </svg></a>
                                        </div>
                                        <!-- Dropdown menu -->
                                        <div id="dropdownseller{{ $seller->id }}"
                                            class="z-10 hidden bg-transparent divide-y divide-gray-100 rounded-lg shadow w-44">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdownDefaultButton">
                                                <li>
                                                    <a href="#" data-id="{{ $seller->id }}"
                                                        data-nombre="{{ $seller->nombre }}"
                                                        data-email="{{ $seller->email }}"
                                                        class="edit-seller-btn block px-4 py-2 bg-pink-300 hover:bg-pink-400 text-white">
                                                        <div class="grid grid-cols-4">
                                                            <div>
                                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                                    stroke-width="1.5" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                            <div class="w-6 h-6 text-start col-span-3 text-base">
                                                                Editar
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" data-id="{{ $seller->id }}"
                                                        class="delete-seller-btn block px-4 py-2 bg-red-500 hover:bg-red-600 text-white">
                                                        <div class="grid grid-cols-4">
                                                            <div>
                                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                                    stroke-width="1.5" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                                                                    </path>
                                                                </svg>
                                                            </div>
                                                            <div class="w-6 h-6 text-start col-span-3 text-base">
                                                                Eliminar
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Modals-->

            <!-- Create-->

            <!--Users-->
            <div id="create-user-modal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <div
                        class="w-full bg-white dark:bg-gray-900 dark:border dark:border-gray-700 rounded-lg md:mt-0 sm:max-w-md xl:p-0">
                        <button type="button" data-modal-hide="create-user-modal"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center justify-center dark:hover:bg-gray-800 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h1
                                class="text-xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white md:text-2xl">
                                New user
                            </h1>
                            <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="text" name="email" id="floating_email"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_email"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                                        @error('email')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="text" name="username" id="floating_username"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_username"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
                                        @error('username')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="password" name="password" id="floating_password"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_password"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contraseña</label>
                                        @error('password')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="password" name="password_confirmation" id="floating_repeat_password"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_repeat_password"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirmar
                                            contraseña</label>
                                        @error('password_confirmation')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="string" name="name" id="floating_name"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_name"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                                        @error('name')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="string" name="first_surname" id="floating_first_surname"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_first_surname"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First
                                            surname</label>
                                        @error('first_surname')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="string" name="second_surname" id="floating_second_surname"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_second_surname"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Second
                                            surname</label>
                                        @error('second_surname')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="date" name="birthdate" id="floating_birthdate"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_birthdate"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">birthdate</label>
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="text" name="adress" id="floating_adress"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" ">
                                        <label for="floating_adress"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Dirección</label>
                                        @error('adress')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="text" name="mobile" id="floating_mobile"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" ">
                                        <label for="floating_mobile"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Mobile</label>
                                        @error('mobile')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <label class="text-gray-500" for="file_user_input">Imagen de perfil</label>
                                    <input
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer dropify"
                                        data-height="50" data-width="50" aria-describedby="file_input_help"
                                        id="file_user_input" type="file" name="users_avatar">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG
                                        or JPG .</p>
                                </div>
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!--Products-->
            <div id="create_product_modal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <div
                        class="w-full bg-white dark:bg-gray-900 dark:border dark:border-gray-700 rounded-lg md:mt-0 sm:max-w-md xl:p-0">
                        <button type="button" data-modal-hide="create_product_modal"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center justify-center dark:hover:bg-gray-800 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h1
                                class="text-xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white md:text-2xl">
                                Nuevo producto
                            </h1>
                            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="text" name="nombre" id="floating_prod_name"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_prod_name"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
                                        @error('name')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="relative z-0 w-full mb-6 group">
                                        <label for="categoria_prod"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Categoria</label>
                                        <select id="categoria_prod" name="categoria" autocomplete="role-name"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                            @foreach ($categorias as $categoria)
                                                <option class="dark:bg-gray-900" value="{{ $categoria->nombre }}">
                                                    {{ $categoria->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('categoria')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="text" name="precio" id="floating_precio"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_precio"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Precio</label>
                                        @error('precio')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="text" name="cantidad" id="floating_cantidad"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_cantidad"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cantidad</label>
                                        @error('cantidad')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <label for="proveedor"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Proveedor</label>
                                    <select id="proveedor" name="proveedor" autocomplete="role-name"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                        @foreach ($proveedores as $proveedor)
                                            <option class="dark:bg-gray-900" value="{{ $proveedor->id }}">
                                                {{ $proveedor->nombre }}</option>
                                        @endforeach
                                    </select>
                                    @error('categoria')
                                        <div class="text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <textarea type="text" name="descripcion" id="floating_descripcion"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" "></textarea>
                                    <label for="floating_descripcion"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Descripcion</label>
                                    @error('descripcion')
                                        <div class="text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <label class=" text-gray-500 " for="file_avatar_input">Imagen principal del
                                        producto</label>
                                    <input
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600  dropify"
                                        aria-describedby="file_input_help" id="file_avatar_input" type="file"
                                        name="product_avatar">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG or
                                        JPG
                                        .</p>
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <label class=" text-gray-500 " for="file_input">Imagenes del producto</label>
                                    <input
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600  dropify"
                                        aria-describedby="file_input_help" id="file_input" type="file"
                                        name="product_images[]" multiple>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG or
                                        JPG (solo se puede añadir un máximo de 5 imágenes).</p>
                                </div>
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!--Sellers-->
            <div id="create-seller-modal" tabindex="-1" aria-hidden="true" data-modal-backdrop="static"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <div
                        class="w-full bg-white dark:bg-gray-900 dark:border dark:border-gray-700 rounded-lg md:mt-0 sm:max-w-md xl:p-0">
                        <button type="button" data-modal-hide="create-seller-modal"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center justify-center dark:hover:bg-gray-800 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h1
                                class="text-xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white md:text-2xl">
                                Nuevo proveedor
                            </h1>
                            <form method="POST" action="{{ route('seller.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="text" name="email" id="floating_email_seller"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_email_seller"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                                        @error('email')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="text" name="nombre" id="floating_name_seller"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_name_seller"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
                                        @error('nombre')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script>
        //Editar

        //Usuario
        $('.edit-user-btn').click(function() {
            var id = $(this).data('id');
            var email = $(this).data('email');
            var username = $(this).data('username');
            var name = $(this).data('name');
            var first_surname = $(this).data('first_surname');
            var second_surname = $(this).data('second_surname');
            var birthdate = $(this).data('birthdate');
            var mobile = $(this).data('mobile');
            var adress = $(this).data('adress');
            var url = "{{ route('user.update', ':id') }}";
            url = url.replace(':id', id);
            Swal.fire({
                background: "#111827",
                color: "#fff",
                title: "Editar usario",
                text: "Editar usuario",
                html: `<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <form method="POST" action="${url}" id="editar_user_form" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="text" name="email" id="floating_email_edit"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" "  value="${email}"/>
                                        <label for="floating_email"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                                        @error('email')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="text" name="username" id="floating_username_edit"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" "  value="${username}"/>
                                        <label for="floating_username_edit"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
                                        @error('username')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="password" name="password" id="floating_password_edit"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_password_edit"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Contraseña</label>
                                        @error('password')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="password" name="password_confirmation"
                                            id="floating_repeat_password_edit"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_repeat_password_edit"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirmar
                                            contraseña</label>
                                        @error('password_confirmation')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="string" name="name" id="floating_name_edit"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " value="${name}"/>
                                        <label for="floating_name_edit"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                                        @error('name')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="string" name="first_surname" id="floating_first_surname_edit"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " value="${first_surname}"/>
                                        <label for="floating_first_surname_edit"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First
                                            surname</label>
                                        @error('first_surname')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="string" name="second_surname" id="floating_second_surname_edit"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " value="${second_surname}"/>
                                        <label for="floating_second_surname_edit"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Second
                                            surname</label>
                                        @error('second_surname')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="date" name="birthdate" id="floating_birthdate_edit"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " value="${birthdate}"/>
                                        <label for="floating_birthdate_edit"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">birthdate</label>
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="text" name="adress" id="floating_adress_edit"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " value="${adress}"/>
                                        <label for="floating_adress_edit"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Dirección</label>
                                        @error('adress')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="text" name="mobile" id="floating_mobile_edit"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " value="${mobile}"/>
                                        <label for="floating_mobile_edit"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Mobile</label>
                                        @error('mobile')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <label
                                        class="text-gray-500"
                                        for="file_input">Imagen de perfil</label>
                                    <input
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer dropify"
                                        data-height="50" data-width="50" aria-describedby="file_input_help"
                                        id="file_input" type="file" name="users_avatar">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG
                                        or JPG .</p>
                                </div>
                            </from>
                        </div>`,
                confirmButtonText: "Guardar",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                reverseButtons: true,
            }).then(function(result) {
                if (result.isConfirmed) {
                    $('#editar_user_form').submit();
                }
            });
        });

        //Product
        $('.edit-product-btn').click(function() {
            var id = $(this).data('id');
            var nombre = $(this).data('nombre');
            var categoria = $(this).data('categoria');
            var descripcion = $(this).data('descripcion');
            var precio = $(this).data('precio');
            var url = "{{ route('product.update', ':id') }}";
            url = url.replace(':id', id);
            Swal.fire({
                background: "#111827",
                color: "#fff",
                title: "Editar producto",
                text: "Editar producto",
                html: `<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <form method="POST" action="${url}" enctype="multipart/form-data" id="editar_prodcuto_form">
                                @csrf
                                @method('PUT')
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="text" name="nombre" id="floating_prod_name_edit"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " value="${nombre}"/>
                                        <label for="floating_prod_name_edit"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
                                        @error('name')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="relative z-0 w-full mb-6 group">
                                        <label for="categoria_edit"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Categoria</label>
                                        <select id="categoria_edit" name="categoria" autocomplete="role-name"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" value="${categoria}">
                                            @foreach ($categorias as $categoria)
                                                <option class="dark:bg-gray-900" value="{{ $categoria->nombre }}">
                                                    {{ $categoria->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('categoria')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="text" name="precio" id="floating_precio_edit"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " value="${precio}"/>
                                        <label for="floating_precio_edit"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Precio</label>
                                        @error('precio')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <textarea type="text" name="descripcion" id="floating_descripcion_edit"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" ">${descripcion}</textarea>
                                    <label for="floating_descripcion_edit"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Descripcion</label>
                                    @error('descripcion')
                                        <div class="text-red-500 text-xs">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <label class=" text-gray-500 " for="file_input_edit">Imagen principal del
                                        producto</label>
                                    <input
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600  dropify"
                                        aria-describedby="file_input_help" id="file_input_edit" type="file"
                                        name="product_avatar">
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG or
                                        JPG
                                        .</p>
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <label class=" text-gray-500 " for="file_input_edit">Imagenes del producto</label>
                                    <input
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600  dropify"
                                        aria-describedby="file_input_help" id="file_input_edit" type="file"
                                        name="product_images[]" multiple>
                                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG or
                                        JPG (solo se puede añadir un máximo de 5 imágenes).</p>
                                </div>
                            </form>
                        </div>`,
                confirmButtonText: "Guardar",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                reverseButtons: true,
            }).then(function(result) {
                if (result.isConfirmed) {
                    $('#editar_prodcuto_form').submit();
                }
            });
        });

        //Provevor
        $('.edit-seller-btn').click(function() {
            var id = $(this).data('id');
            var email = $(this).data('email');
            var nombre = $(this).data('nombre');
            var url = "{{ route('seller.update', ':id') }}";
            url = url.replace(':id', id);
            Swal.fire({
                background: "#111827",
                color: "#fff",
                title: "Editar proveedor",
                text: "Editar proveedor",
                html: `<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <form method="POST" action="${url}" id="editar_user_form" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="text" name="email" id="floating_email_seller"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " value="${email}"/>
                                        <label for="floating_email_seller"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                                        @error('email')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="text" name="nombre" id="floating_name_seller"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " value="${nombre}"/>
                                        <label for="floating_name_seller"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Username</label>
                                        @error('nombre')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </from>
                        </div>`,
                confirmButtonText: "Guardar",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                reverseButtons: true,
            }).then(function(result) {
                if (result.isConfirmed) {
                    $('#editar_user_form').submit();
                }
            });
        });

        //Eliminar

        //User
        $('.delete-user_btn').click(function() {
            var id = $(this).data('id');
            var url = "{{ route('user.destroy', ':id') }}";
            url = url.replace(':id', id);
            Swal.fire({
                background: "#111827",
                color: "#fff",
                title: "Eliminar usuario",
                text: "Eliminar usuario",
                icon: 'warning',
                iconColor: '#E02424',
                html: `<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Seguro que desea
                                        elimianar a este usuario? Si lo desea puede recuperarlo de ser necesario en el futuro.
                                    </h3>
                                    <form method="POST" action="${url}" id="eliminar_usuario_form">
                                        @csrf
                                        @method('DELETE')
                                    </form
                            </div>`,
                confirmButtonText: "Eliminar",
                confirmButtonColor: '#F05252',
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                reverseButtons: true,
            }).then(function(result) {
                if (result.isConfirmed) {
                    $('#eliminar_usuario_form').submit();
                }
            });


        });

        //Producto
        $('.delete-product_btn').click(function() {
            var id = $(this).data('id');
            var url = "{{ route('product.destroy', ':id') }}";
            url = url.replace(':id', id);
            Swal.fire({
                background: "#111827",
                color: "#fff",
                title: "Eliminar producto",
                text: "Eliminar producto",
                icon: 'warning',
                iconColor: '#E02424',
                html: `<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Seguro que desea
                                        elimianar a este producto?
                                    </h3>
                                    <form method="POST" action="${url}" id="eliminar_prodcuto_form">
                                        @csrf
                                        @method('DELETE')
                                    </form
                            </div>`,
                confirmButtonText: "Eliminar",
                confirmButtonColor: '#F05252',
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                reverseButtons: true,
            }).then(function(result) {
                if (result.isConfirmed) {
                    $('#eliminar_prodcuto_form').submit();
                }
            });


        });
        //Proveedor
        $('.delete-seller-btn').click(function() {
            var id = $(this).data('id');
            var url = "{{ route('seller.destroy', ':id') }}";
            url = url.replace(':id', id);
            Swal.fire({
                background: "#111827",
                color: "#fff",
                title: "Eliminar proveedor",
                text: "Eliminar proveedor",
                icon: 'warning',
                iconColor: '#E02424',
                html: `<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">¿Seguro que desea
                                        elimianar a este proveedor?
                                    </h3>
                                    <form method="POST" action="${url}" id="eliminar_proveedor_form">
                                        @csrf
                                        @method('DELETE')
                                    </form
                            </div>`,
                confirmButtonText: "Eliminar",
                confirmButtonColor: '#F05252',
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                reverseButtons: true,
            }).then(function(result) {
                if (result.isConfirmed) {
                    $('#eliminar_proveedor_form').submit();
                }
            });


        });

        //Reponer
        $('.restock').click(function() {
            var id = $(this).data('id');
            var url = "{{ route('product.restockRequest', ':id') }}";
            url = url.replace(':id', id);
            Swal.fire({
                background: "#111827",
                color: "#fff",
                title: "Reponer producto",
                text: "Eliminar producto",
                html: `<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                                    <form method="POST" action="${url}" id="reponer_producto">
                                        @csrf
                                        <div class="relative z-0 w-full mb-6 group">
                                        <input type="text" name="cantidad" id="floating_cantidad_reponer"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " />
                                        <label for="floating_cantidad_reponer"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cantidad</label>
                                        @error('cantidad')
                                            <div class="text-red-500 text-xs">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    </form
                            </div>`,
                confirmButtonText: "Reponer",
                showCancelButton: true,
                cancelButtonText: "Cancelar",
                reverseButtons: true,
            }).then(function(result) {
                if (result.isConfirmed) {
                    $('#reponer_producto').submit();
                }

            });
        });
    </script>
@endsection
