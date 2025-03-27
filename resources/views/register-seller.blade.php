@extends('layouts.app')

@section('content')
<div class="register-page">
    <h1>Register as a Seller</h1>
    <form action="{{ route('seller.register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="business_name">Business Name</label>
            <input type="text" id="business_name" name="business_name" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Register</button>
    </form>
</div>
@endsection
