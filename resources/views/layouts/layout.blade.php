<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
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

<body class="antialiased bg-white dark:bg-gray-900">

    <!--Nav-->
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-8xl flex-wrap items-center justify-between mx-auto p-4 grid grid-cols-12">
            <div>
                <a href="/" class="flex items-center">
                    <img src="/images/PoroEmporium.png" class="h-8 mr-3" alt="Flowbite Logo" />
                    <span
                        class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">PoroEmporium</span>
                </a>
            </div>
            <div class="flex items-center justify-center dark:text-white">
                <a href="{{ route('cart.index') }}" class="relative inline-flex items-center p-3">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z">
                        </path>
                    </svg>
                    <span class="sr-only">Carrito</span>
                    <div
                        class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-blue-400 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">
                        {{ count((array) session('cart')) }}</div>
                </a>
            </div>
        <div class="col-span-8">
            <!--Buscador-->
            <form action="{{ route('product.index') }}">
                @csrf
                <div class="grid grid-cols-12">
                    <div class="relative z-0 w-full mb-6 group">
                        <select id="categoria" name="categoria" autocomplete="role-name"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:bg-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                            <option class="dark:text-white" value="Categoria" selected>Categorías</option>
                            @foreach ($categorias as $categoria)
                                <option class="dark:text-white" value="{{ $categoria->nombre }}">
                                    {{ $categoria->nombre }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="relative z-0 w-full mb-6 group col-span-11">
                        <input type="search" name="buscador" id="floating_user_search"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <button type="submit" class="text-white absolute right-2.5 bottom-2.5  text-sm px-4 py-te">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                        <label for="floating_user_search"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Search</label>
                    </div>
                </div>
            </form>
        </div>
        <!--Botones-->
        <div class="col-span-2 items-center justify-center flex ">
            <button id="theme-toggle" type="button"
                class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        fill-rule="evenodd" clip-rule="evenodd"></path>
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
    <hr class="h-px  bg-gray-200 border-0 dark:bg-gray-700">

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
                <p class="ml-3 font-medium text-white truncate">
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

    <footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="/" class="flex items-center mb-4 sm:mb-0">
                    <span
                        class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">PoroEmporium</span>
                </a>
                <ul
                    class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
                    </li>
                    <li>
                        <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="mr-4 hover:underline md:mr-6 ">Licensing</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
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
    @yield('scripts')
</body>

</html>
