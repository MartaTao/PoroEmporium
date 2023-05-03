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
                            id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                            aria-controls="dashboard" aria-selected="false">Dashboard</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="settings-tab" data-tabs-target="#settings" type="button" role="tab"
                            aria-controls="settings" aria-selected="false">Settings</button>
                    </li>
                    <li role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab"
                            aria-controls="contacts" aria-selected="false">Contacts</button>
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
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-900">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center justify-center">
                                            {{ $user->id }}
                                        </div>
                                    </td>
                                    @if (!is_null($user->userProfile))
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
                                                    class="relative inline-flex items-center justify-center  w-20 h-20 overflow-hidden bg-blue-1 rounded-full">
                                                    <span
                                                        class="font-medium text-3xl text-gray-900 uppercase">{{ $fisrtLetter = substr($user->userProfile->name, 0, 1) }}{{ $secondtLetter = substr($user->userProfile->first_surname, 0, 1) }}</span>
                                                </div>
                                            </td>
                                        @endif
                                        <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                            <div class="flex items-center justify-center">
                                                {{ $user->userProfile->name }}
                                            </div>
                                        </td>

                                        @if (!is_null($user->userProfile->second_surname))
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
                                        @else
                                            <td class="px-6 py-4 whitespace-nowrap dark:text-white" colspan="2">
                                                <div class="flex items-center justify-center">
                                                    {{ $user->userProfile->first_surname }}
                                                </div>
                                            </td>
                                        @endif
                                    @else
                                        <td class="px-6 py-4 whitespace-nowrap dark:text-white">
                                            <div
                                                class="relative inline-flex items-center justify-center  w-20 h-20 overflow-hidden bg-blue-1 rounded-full">
                                                <span
                                                    class="font-medium text-3xl text-gray-900 uppercase">{{ $fisrtLetter = substr($user->email, 0, 2) }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap dark:text-white" colspan="3">
                                            <div class="flex items-center">
                                                Usuario
                                            </div>
                                        </td>
                                    @endif
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
                                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-900">
                                            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdownDefaultButton">
                                                <li>
                                                    <a href="#"
                                                        class="edit-user-btn block px-4 py-2 bg-blue-2 hover:bg-blue-900 text-white"
                                                        data-id="{{ $user->id }}" data-email="{{ $user->email }}"
                                                        data-role="{{ $user->roles }}">
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
                                                    @if (!is_null($user->userProfile))
                                                        <a href="#"
                                                            class="block px-4 py-2 bg-blue-1 hover:bg-blue-2 text-white">
                                                            <div class="grid grid-cols-4">
                                                                <div>
                                                                    <svg class="w-6 h-6" fill="none"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        viewBox="0 0 24 24"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        aria-hidden="true">
                                                                        <path stroke-linecap="round"
                                                                            stroke-linejoin="round"
                                                                            d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z">
                                                                        </path>
                                                                    </svg>
                                                                </div>
                                                                <div class="w-6 h-6 text-start col-span-3 text-base">
                                                                    Ver perfil
                                                                </div>
                                                            </div>
                                                        </a>
                                                    @endif
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="delete-user-btn block px-4 py-2 bg-red-500 hover:bg-red-800 text-white"
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
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                    aria-labelledby="dashboard-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                            class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>.
                        Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                        classes to control the content visibility and styling.</p>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel"
                    aria-labelledby="settings-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                            class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>.
                        Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                        classes to control the content visibility and styling.</p>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel"
                    aria-labelledby="contacts-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                            class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>.
                        Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                        classes to control the content visibility and styling.</p>
                </div>
            </div>


        </div>
    </div>
@endsection
@section('scripts')
    <script></script>
@endsection
