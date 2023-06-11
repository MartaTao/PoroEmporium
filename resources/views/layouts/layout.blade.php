<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.10/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
    @yield('style')
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    <title> @yield('title')</title>
</head>

<body class="antialiased bg-white dark:bg-gray-950">

    <!--Nav-->
    <nav class="border-gray-200">
        <div
            class="max-w-screen-8xl flex-wrap items-center justify-between mx-auto p-4 grid lg:grid-cols-12 md:grid-cols-6 sm:grid-cols-3">
            <div class="col-span-2">
                <div class="grid grid-cols-3 col-span-2">
                    <div class="col-span-2 justify-center items-center">
                        <a href="/" class="flex  items-center">
                            <img src="/images/PoroEmporium.png" class="h-8 mr-3" alt="PoroEmporium Logo" />
                            <span
                                class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">PoroEmporium</span>
                        </a>
                    </div>
                    <div class="col-span-1 text-center justify-center">
                        <a href="{{ route('cart.index') }}"
                            class="relative inline-flex items-center p-3 dark:text-white">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path
                                    d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5ZM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1Zm0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z" />
                            </svg>
                            <span class="sr-only">Carrito</span>
                            <div
                                class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-blue-400 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">
                                {{ count((array) session('cart')) }}
                            </div>
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-span-8">
                <!--Buscador-->
                <form action="{{ route('product.index') }}">
                    @csrf
                    <div class="grid lg:grid-cols-12 md:grid-6 sm:grid-cols-3">
                        <div class="relative z-0 w-full mb-6 group">
                            <select id="categoria" name="categoria"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-white dark:bg-gray-950 border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                <option class="dark:text-white" value="Categoria">Categorías</option>
                                @foreach ($categorias as $categoria)
                                    <option class="dark:text-white" value="{{ $categoria->nombre }}">
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="relative z-0 w-full mb-6 group col-span-11">
                            <input type="search" name="buscador" id="floating_search"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " />
                            <button type="submit" class="text-white absolute right-2.5 bottom-2.5  text-sm px-4 py-te">
                                <svg class="w-5 h-5 text-gray-200" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                            <label for="floating_search"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Search</label>
                        </div>
                    </div>
                </form>
            </div>
            <!--Botones-->
            <div class="col-span-2 items-center justify-center flex ">
                <button id="theme-toggle" type="button"
                    class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="hidden w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278zM4.858 1.311A7.269 7.269 0 0 0 1.025 7.71c0 4.02 3.279 7.276 7.319 7.276a7.316 7.316 0 0 0 5.205-2.162c-.337.042-.68.063-1.029.063-4.61 0-8.343-3.714-8.343-8.29 0-1.167.242-2.278.681-3.286z" />
                        <path
                            d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-7 h-7" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                    </svg>
                </button>
                @auth
                    <button type="button"
                        class="flex mr-3 text-sm rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                        data-dropdown-placement="bottom">
                        <span class="sr-only">Open user menu</span>
                        @if (!is_null(auth()->user()->userProfile))
                            <div class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 font-bold">
                                {{ auth()->user()->userProfile->name }} {{ auth()->user()->userProfile->first_surname }}
                                {{ auth()->user()->userProfile->second_surname }}
                            </div>
                            @if (!is_null(auth()->user()->userProfile->getMedia('users_avatar')->first()))
                                <img class="w-8 h-8 rounded-full"
                                    src="{{ auth()->user()->userProfile->getMedia('users_avatar')->first()->getUrl() }}"
                                    alt="user photo">
                            @else
                                <div
                                    class="relative inline-flex items-center justify-center  w-8 h-8 overflow-hidden bg-blue-200 rounded-full">
                                    <span
                                        class="font-medium text-base text-gray-900 uppercase">{{ $fisrtLetter = substr(auth()->user()->userProfile->name, 0, 1) }}{{ $secondtLetter = substr(auth()->user()->userProfile->first_surname, 0, 1) }}</span></span>
                                </div>
                            @endif
                        @else
                            <div class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 font-bold">
                                Usuario/a/e
                            </div>
                            <div
                                class="relative inline-flex items-center justify-center  w-8 h-8 overflow-hidden bg-blue-200 rounded-full">
                                <span
                                    class="font-medium text-base text-gray-900 uppercase">{{ $fisrtLetter = substr(auth()->user()->email, 0, 2) }}</span>
                            </div>
                        @endif


                    </button>
                    <!-- Dropdown menu -->

                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                        id="user-dropdown">
                        <div class="px-4 py-3">
                            @if (!is_null(auth()->user()->userProfile))
                                <span
                                    class="block text-sm text-gray-900 dark:text-white font-semibold">{{ auth()->user()->userProfile->name }}
                                    {{ auth()->user()->userProfile->first_surname }}
                                    {{ auth()->user()->userProfile->second_surname }}</span>
                            @endif
                            <span
                                class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
                        </div>
                        <ul class="py-2" aria-labelledby="user-menu-button">
                            @if (!is_null(auth()->user()->userProfile))
                                <li>
                                    <a href="{{ route('profile.show', auth()->user()->userProfile->id) }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Perfil</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ route('profile.create') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Crear
                                        perfil</a>
                                </li>
                            @endif

                            <li>
                                <a href="{{ route('order.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Orders</a>
                            </li>
                            <li>
                                <a href="{{ route('configuration.create') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Settings</a>
                            </li>
                            @role('Admin')
                                <li>
                                    <a href="{{ route('admin.index') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Administrar</a>
                                </li>
                            @endrole
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Log
                                        out</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
                @guest
                    <div class="grid grid-cols-2 justify-between">
                        <div class="border-r-2 border-gray-700 justify-center items-center flex px-5">
                            <a href="{{ route('login') }}"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Sign
                                in</a>
                        </div>
                        <div class="px-5">
                            <a href="{{ route('register') }}"
                                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Register</a>
                        </div>
                    </div>

                @endguest
            </div>
    </nav>
    <hr class="h-px  bg-gray-200 border-0 dark:bg-gray-700 my-4">

    <!--Mensajes-->
    @if (Session::has('message'))
        <div id="alert-1"
            class="flex p-4 mb-4 text-blue-800 rounded-lg bg-blue-1 dark:bg-gray-800 dark:text-blue-400"
            role="alert">
            <div class="w-0 flex-1 flex items-center">
                <span class="flex p-2 rounded-lg bg-sky-300/60">
                    <!-- Heroicon name: outline/speakerphone -->
                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>
                </span>
                <p class="ml-3 font-medium text-gray-200 truncate">
                    <span class="md:hidden"> {{ Session::get('message') }} </span>
                    <span class="hidden md:inline"> {{ Session::get('message') }} </span>
                </p>
            </div>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-blue-400 dark:hover:bg-gray-700"
                data-dismiss-target="#alert-1" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    @endif

    <div class="container-fluid">
        @yield('content')
    </div>

    <footer class="bg-white rounded-lg shadow dark:bg-gray-950 m-4">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="flex justify-center items-center">
                <a href="/" class="flex items-center mb-4 sm:mb-0">
                    <span
                        class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">PoroEmporium</span>
                </a>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 PoroEmporium™</a>. All
                Rights Reserved.</span>
        </div>
    </footer>
    <!--Dropify scripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $('.dropify').dropify();
    </script>

    <!--Dark mode script-->
    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {

            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

                // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }

        });
    </script>

    <script src=" https://cdn.jsdelivr.net/npm/sweetalert2@11.7.10/dist/sweetalert2.all.min.js"></script>
    @yield('scripts')
</body>

</html>
