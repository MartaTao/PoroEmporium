@extends('layouts.layout')
@section('content')
    @foreach ($orders as $order)
        <p>Orden ID: {{ $order->id }}</p>
    @endforeach
@endsection
@section('scripts')
@endsection