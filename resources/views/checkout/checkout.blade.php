@extends('layouts.layout')

@section('content')
<h2>Payment</h2>
<div class="_wYiJGbRZyFZeCc8y7Sf _Ybd3WwuTVljUT4vEaM3 mveJTCIb2WII7J4sY22F mngKhi_Rv06PF57lblDI _YxZw_O8dWkTljptcO7z SWDELhWFjL8JxEtm91_o _1jTZ8KXRZul60S6czNi">
    <h3 class="hD0sTTDgbxakubcHVW2X vyo_A8gnQD1QWDPglr3h IOPhczRgtphv6NdNBDjj OyABRrnTV_kvHV7dJ0uE">Card Details</h3>
    <form action="{{ route('checkout.pay') }}" method="POST">
        <div class="xCPtuxM4_gihvpPwv9bX Nu4HUn5EQpnNJ1itNkrd Bcw8VuwRWYxPGjWjS6Ig EyjJPKD7jgGRBhaLpRVI AqVNvLG_H6VHhym2yKMp">
            <div>
                <label for="full_name" class="_Vb9igHms0hI1PQcvp_S TR_P65x9ie7j6uxFo_Cs c8dCx6gnV43hTOLV6ks5 ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">Name *</label>
                <input type="text" name="full_name" id="full_name" class="fzhbbDQ686T8arwvi_bJ jtAJHOc7mn7b4IKRO59D pXhVRBC8yaUNllmIWxln vpDN1VEJLu5FmLkr5WCk __9sbu0yrzdhGIkLWNXl gx_pYWtAG2cJIqhquLbx mveJTCIb2WII7J4sY22F GdTcGtoKP5_bET3syLDl LceKfSImrGKQrtDGkpBV _Vb9igHms0hI1PQcvp_S t6gkcSf0Bt4MLItXvDJ_ olxDi3yL6f0gpdsOFDhx jqg6J89cvxmDiFpnV56r Mmx5lX7HVdrWCgh3EpTP H7KQDhgKsqZaTUouEUQL OyABRrnTV_kvHV7dJ0uE KpCMWe32PQyrSFbZVput q6szSHqGtBufkToFe_s5" placeholder="Full name on card" required="">
            </div>
            
            <div>
                <label for="card_number" class="_Vb9igHms0hI1PQcvp_S TR_P65x9ie7j6uxFo_Cs c8dCx6gnV43hTOLV6ks5 ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">Card Number *</label>
                <input class="" autocomplete="cc-number" autocorrect="off" spellcheck="false" id="card_number" name="cardNumber" type="text" inputmode="numeric" aria-label="Card number" placeholder="1234 1234 1234 1234" aria-invalid="true" value="">
            </div>
            <div class="form-group">
                <label for="expiration_date" class="_Vb9igHms0hI1PQcvp_S TR_P65x9ie7j6uxFo_Cs c8dCx6gnV43hTOLV6ks5 ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">Expiration Date *</label>
                <input type="date" class="form-control fzhbbDQ686T8arwvi_bJ jtAJHOc7mn7b4IKRO59D pXhVRBC8yaUNllmIWxln vpDN1VEJLu5FmLkr5WCk __9sbu0yrzdhGIkLWNXl gx_pYWtAG2cJIqhquLbx mveJTCIb2WII7J4sY22F GdTcGtoKP5_bET3syLDl LceKfSImrGKQrtDGkpBV _Vb9igHms0hI1PQcvp_S t6gkcSf0Bt4MLItXvDJ_ olxDi3yL6f0gpdsOFDhx jqg6J89cvxmDiFpnV56r Mmx5lX7HVdrWCgh3EpTP H7KQDhgKsqZaTUouEUQL OyABRrnTV_kvHV7dJ0uE KpCMWe32PQyrSFbZVput q6szSHqGtBufkToFe_s5" id="expiration_date" name="expiration_date" required>
            </div>

            <div>
                <label for="cvv" class="_Vb9igHms0hI1PQcvp_S TR_P65x9ie7j6uxFo_Cs c8dCx6gnV43hTOLV6ks5 ezMFUVl744lvw6ht0lFe __9sbu0yrzdhGIkLWNXl OyABRrnTV_kvHV7dJ0uE">CVC *</label>
                <input type="number" name="cvv" id="cvv" class="fzhbbDQ686T8arwvi_bJ jtAJHOc7mn7b4IKRO59D pXhVRBC8yaUNllmIWxln vpDN1VEJLu5FmLkr5WCk __9sbu0yrzdhGIkLWNXl gx_pYWtAG2cJIqhquLbx mveJTCIb2WII7J4sY22F GdTcGtoKP5_bET3syLDl LceKfSImrGKQrtDGkpBV _Vb9igHms0hI1PQcvp_S t6gkcSf0Bt4MLItXvDJ_ olxDi3yL6f0gpdsOFDhx jqg6J89cvxmDiFpnV56r Mmx5lX7HVdrWCgh3EpTP H7KQDhgKsqZaTUouEUQL OyABRrnTV_kvHV7dJ0uE KpCMWe32PQyrSFbZVput q6szSHqGtBufkToFe_s5" placeholder="•••" required="">
            </div>
            <div>
                <button type="submit" class="btn btn-danger btn-sm cart_remove px-6 py-3">
                    Pay Now
                </button>
            </div>
    </form>
</div>
</div>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table id="cart" class="w-full text-sm text-left text-gray-500 dark:text-gray-400>
<thead class=" text-xs text-gray-700 uppercase dark:text-gray-400">
        <tr>
            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">Product</th>
            <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">Price</th>
            <th scope="col" class="px-6 py-3">Quantity</th>
        </tr>
        </thead>
        <tbody>
            @for ($i=0;$i< count($cart);$i++) <tr data-id="" class="border-b border-gray-200 dark:border-gray-700">
                <td data-th="Product" scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800">{{$cart[$i]['nombre']}}</td>
                <td data-th="Price" class="px-6 py-4 bg-gray-50 dark:bg-gray-800">{{$cart[$i]['precio']}}</td>
                <td data-th="Quantity" class="px-6 py-3">{{$cart[$i]['cantidad']}}</td>
                <td class="actions" data-th="">
                </td>
                </tr>
                @endfor
                <th scope="col" class="px-6 py-3 bg-gray-50 dark:bg-gray-800">Total</th>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap bg-gray-50 dark:text-white dark:bg-gray-800" data-th="total">${{ $total }}</td>
        </tbody>
        @endsection