@php
    use App\Models\Carrito\Carrito;
@endphp
@extends('layouts.layout')

@section('content')
<table id="cart" class="table table-hover table-condensed">
    <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%">Price</th>
            <th style="width:8%">Quantity</th>
        </tr>
    </thead>
    <tbody>
                <tr data-id="">
                        <td data-th="Product">{{auth()->user()->carrito->nombre}}</td>
                        <div class="row">
                            <div class="col-sm-9">
                                <h4 class="nomargin"></h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{auth()->user()->carrito->total}}</td>
                    <td data-th="Quantity">{{auth()->user()->carrito->cantidad}}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm cart_remove"><i class="fa fa-trash-o"></i> Delete</button>
                    </td>
                </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right"><h3><strong></strong></h3></td>
        </tr>
        <tr>
            <td colspan="5" class="text-right">
                <a href="{{ route('product.index')}}" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                <button class="btn btn-success"><i class="fa fa-money"></i> Checkout</button>
            </td>
        </tr>
    </tfoot>
</table>
@endsection

@section('scripts')

@endsection
