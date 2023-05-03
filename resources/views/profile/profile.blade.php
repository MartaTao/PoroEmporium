@extends('layouts.layout')
@section('content')
    <div class=" relative flex items-top min-h-screen  py-4 my-7 sm:pt-0">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            @if (!is_null($profile))
                <div class="grid md:grid-cols-3 md:gap-6">
                    <div class="max-w-2lg p-6">
                        <div class="grid md:grid-cols-3 md:gap-3">
                            <div>
                                @if (!is_null($profilePhoto))
                                    <img class="rounded-full w-36 h-36" src="{{ $profilePhoto->getUrl() }}"
                                        alt="Extra large avatar">
                                @else
                                    <div
                                        class="relative inline-flex items-center justify-center  w-36 h-36 overflow-hidden bg-blue-1 rounded-full">
                                        <span
                                            class="font-medium text-5xl text-gray-900 uppercase">{{ $fisrtLetter = substr($profile->name, 0, 1) }}{{ $secondtLetter = substr($profile->first_surname, 0, 1) }}</span>
                                    </div>
                                @endif

                            </div>
                            <div class="col-span-2">
                                <div class="grid md:grid-cols-4">
                                    <div class="max-w-lg text-2xl font-bold dark:text-white col-span-3">
                                        {{ $profile->name }}
                                        {{ $profile->first_surname }}
                                        @isset($profile->second_surname)
                                            {{ $profile->second_surname }}
                                        @endisset
                                    </div>
                                    <div class="items-start">
                                        <!--Modal button-->
                                        <button data-modal-target="edit-profile-modal"
                                            data-modal-toggle="edit-profile-modal">
                                            <svg class="w-6 h-6 dark:text-gray-300" fill="none" stroke="currentColor"
                                                stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125">
                                                </path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex-1 flex items-center dark:text-gray-300">
                                        <span class="flex p-2 rounded-lg">
                                            <svg fill="none" stroke="currentColor" stroke-width="1.5" class="w-6 h-6"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5">
                                                </path>
                                            </svg>
                                        </span>
                                        <p>{{ date('d-m-Y', strtotime($profile->birthdate)) }}</p>
                                    </div>
                                    <div class="flex-1 flex items-center dark:text-gray-300">
                                        <span class="flex p-2 rounded-lg">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z">
                                                </path>
                                            </svg>
                                        </span>
                                    </div>
                                    <div class="flex-1 flex items-center dark:text-gray-300">
                                        <span class="flex p-2 rounded-lg">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75">
                                                </path>
                                            </svg>
                                        </span>
                                        <p>{{ $profile->user->email }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-2 max-w-2lg p-6">
                        <div class="max-w-lg text-2xl font-bold dark:text-white col-span-3">
                            <p>Bio</p>
                        </div>
                        <p class="dark:text-gray-300">{{ $profile->bio }}</p>
                    </div>

                </div>
            @else
                <a href="{{ route('profile.create') }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Crear
                    perfil</a>
            @endif

            <!-- Modal content -->
            <div id="edit-profile-modal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <div
                        class="w-full bg-white dark:bg-gray-900 dark:border dark:border-gray-700 rounded-lg md:mt-0 sm:max-w-md xl:p-0">
                        <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                            <h1
                                class="text-xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white md:text-2xl">
                                Edit profile
                            </h1>
                            <form method="POST" action="{{ route('profile.update', $profile->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="string" name="name" id="floating_name"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " value="{{ $profile->name }}" />
                                        <label for="floating_name"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Name</label>
                                        @error('name')
                                            <div class="text-red-500 text-xs">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="string" name="first_surname" id="floating_first_surname"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " value="{{ $profile->first_surname }}" />
                                        <label for="floating_first_surname"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First
                                            surname</label>
                                        @error('first_surname')
                                            <div class="text-red-500 text-xs">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="grid md:grid-cols-2 md:gap-6">
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="string" name="second_surname" id="floating_second_surname"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                            placeholder=" " value="{{ $profile->second_surname }}" />
                                        <label for="floating_second_surname"
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Second
                                            surname</label>
                                        @error('second_surname')
                                            <div class="text-red-500 text-xs">{{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="relative z-0 w-full mb-6 group">
                                        <label
                                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                                            for="file_input">Imagen de perfil</label>
                                        <input
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer dropify"
                                            data-height="50" data-width="50" aria-describedby="file_input_help"
                                            id="file_input" type="file" name="users_avatar">
                                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">PNG
                                            or JPG .</p>
                                    </div>
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <textarea name="bio" id="floating_bio"
                                        class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                        placeholder=" ">{{ $profile->bio }}</textarea>
                                    <label for="floating_bio"
                                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Bio</label>
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
