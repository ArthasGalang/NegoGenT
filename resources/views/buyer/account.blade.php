@extends('layouts.app')

@section('content')
<div class="account-page">
    <h1>Buyer Account</h1>
    <p>Welcome to your account page, {{ DB::table('tbl_buyer')->where('Buyer_Id', Session::get('buyer_id'))->value('FirstName') }}!</p>
    <ul>
        <li><a href="{{ url('/wishlist') }}">Wishlist</a></li>
        <li><a href="{{ url('/cart') }}">Cart</a></li>
        <li><a href="{{ url('/logout') }}">Log Out</a></li>
    </ul>
</div>
@endsection
