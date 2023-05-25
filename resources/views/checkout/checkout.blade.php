@extends('layouts.layout')

@section('content')
    <h2>Order Summary</h2>

    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
            </tr>
        </thead>
        <tbody>
        @for ($i=0;$i< count($cart);$i++) <tr data-id="">
            <tr>
            <td data-th="Product">{{$cart[$i]['nombre']}}</td>
            <td data-th="Price">{{$cart[$i]['precio']}}</td>
            <td data-th="Quantity">{{$cart[$i]['cantidad']}}</td>
            </tr>
            @endfor
            <tr>
                <td>Total</td>
                <td colspan="2">${{ $total }}</td>
            </tr>
        </tbody>
    </table>

    <h2>Payment</h2>

    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="card_number">Card Number</label>
            <input type="text" class="form-control" id="card_number" name="card_number" required>
        </div>
        <div class="form-group">
            <label for="expiration_date">Expiration Date</label>
            <input type="text" class="form-control" id="expiration_date" name="expiration_date" required>
        </div>
        <div class="form-group">
            <label for="cvv">CVV</label>
            <input type="text" class="form-control" id="cvv" name="cvv" required>
        </div>
        <button type="submit" class="btn btn-success">Pay Now</button>
    </form>
@endsection