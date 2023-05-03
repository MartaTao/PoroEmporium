@extends('layouts.layout')
@section('content')
    <div class=" py-4 my-7 sm:pt-0">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col items-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900">
                    <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg"
                        alt="logo">
                    Flowbite
                </a>
                <div class="w-full rounded-lg md:mt-0 sm:max-w-md xl:p-0">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white md:text-2xl">
                            Profile
                        </h1>
                        <form method="POST" action="{{ route('profile.store') }}">
                            @csrf
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
                            <div class="relative z-0 w-full mb-6 group">
                                <textarea name="bio" id="floating_bio"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 dark:text-white bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" "></textarea>
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
@endsection
