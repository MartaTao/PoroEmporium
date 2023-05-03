@extends('layouts/layout')
@section('style')
@endsection
@section('content')
    <div class="relative flex items-top min-h-screen py-4 sm:pt-0">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab"
                    data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Inicio</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                            aria-controls="dashboard" aria-selected="false">Campeones</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="settings-tab" data-tabs-target="#settings" type="button" role="tab"
                            aria-controls="settings" aria-selected="false">Universos</button>
                    </li>
                    <li role="presentation">
                        <button
                            class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                            id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab"
                            aria-controls="contacts" aria-selected="false">Minileyendas</button>
                    </li>
                </ul>
            </div>
            <!--Buscador-->
            <form action="#">
                @csrf
                <div class="grid grid-cols-12">
                    <div class="relative z-0 w-full mb-6 group">
                        <select id="categoria" name="categoria" autocomplete="role-name"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:bg-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            <option class="dark:text-white" value="categoria">Categorías</option>
                            <option class="dark:text-white" value="sudaderas">Sudaderas</option>
                            <option class="dark:text-white" value="toallas">Toallas</option>
                            <option class="dark:text-white" value="camisetas">Camisetas</option>
                        </select>
                    </div>
                    <div class="relative z-0 w-full mb-6 group col-span-10">
                        <input type="search" name="buscador" id="floating_user_search"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label for="floating_user_search"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Search
                            by email
                        </label>
                    </div>
                    <div class="items-center justify-center flex">
                        <button type="submit"
                            class="p-2.5 ml-2 text-sm font-medium text-whitefocus:outline-none dark:text-white">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>
            <div id="myTabContent">
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                    aria-labelledby="profile-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                            class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>.
                        Clicking
                        another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to
                        control
                        the content visibility and styling.</p>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                    aria-labelledby="dashboard-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                            class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>.
                        Clicking
                        another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to
                        control
                        the content visibility and styling.</p>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel"
                    aria-labelledby="settings-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                            class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>.
                        Clicking
                        another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to
                        control
                        the content visibility and styling.</p>
                </div>
                <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel"
                    aria-labelledby="contacts-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                            class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>.
                        Clicking
                        another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to
                        control
                        the content visibility and styling.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
