@extends('layouts.layout')
@section('content')
    <div
        class="relative flex items-top justify-center min-h-screen  py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('configuration.changePass') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Cambiar
                contraseña</a>
                <a href="{{ route('configuration.changeEmail') }}"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Cambiar
                correo</a>
        </div>
    </div>
@endsection
