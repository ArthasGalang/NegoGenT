<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', function (Illuminate\Http\Request $request) {
    $validatedData = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Check if the email exists in the seller table
    $seller = DB::table('tbl_seller')->where('Email', $validatedData['email'])->first();
    if ($seller) {
        if (!$seller->Verified) {
            return response()->json(['status' => 'not_verified']);
        }

        if (Hash::check($validatedData['password'], $seller->Password)) {
            return response()->json(['status' => 'success', 'user_type' => 'seller', 'user_id' => $seller->Seller_Id]);
        }
    }

    // Check if the email exists in the buyer table
    $buyer = DB::table('tbl_buyer')->where('Email', $validatedData['email'])->first();
    if ($buyer) {
        if (!$buyer->Verified) {
            return response()->json(['status' => 'not_verified']);
        }

        if (Hash::check($validatedData['password'], $buyer->Password)) {
            return response()->json(['status' => 'success', 'user_type' => 'buyer', 'user_id' => $buyer->Buyer_Id]);
        }
    }

    return response()->json(['status' => 'error', 'message' => 'Invalid email or password.'], 401);
});
