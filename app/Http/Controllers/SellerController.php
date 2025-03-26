<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use DB;

class SellerController extends Controller
{
    public function register(Request $request)
    {
        \Log::info('Form Input:', $request->all()); 

        try {
            $validatedData = $request->validate([
                'FirstName' => 'required|string|max:255',
                'LastName' => 'required|string|max:255',
                'Email' => 'required|email|unique:tbl_seller,Email|unique:tbl_buyer,Email',
                'Password' => 'required|string|min:8|confirmed',
                'ContactNo' => 'required|string|max:15',
                'Barangay' => 'required|string|max:255',
                'Municipality' => 'required|string|max:255',
                'Street' => 'required|string|max:255',
                'ZIP' => 'required|string|size:4',
                'BusinessName' => 'required|string|max:255|unique:tbl_seller,BusinessName',
                'BusinessPermit' => 'required|file|mimes:png,jpg|max:25600',
            ], [
                'Email.unique' => 'Email is already registered.',
                'BusinessName.unique' => 'Business is already registered.',
                'Password.min' => 'Must be 8 characters long.',
                'Password.confirmed' => 'Password does not match.',
                'ZIP.size' => 'Must be 4 characters long.',
                'BusinessPermit.mimes' => 'Only PNG or JPG files are allowed.',
                'BusinessPermit.max' => 'File size must not exceed 25MB.',
            ]);

            \Log::info('Validation Passed:', $validatedData); 

            $businessPermit = $request->file('BusinessPermit')->store('business_permits', 'public');

            $sellerId = null;

            // Ensure unique Seller_Id
            do {
                $sellerId = '5' . str_pad(mt_rand(1, 999999999), 9, '0', STR_PAD_LEFT);
                $exists = DB::table('tbl_seller')->where('Seller_Id', $sellerId)->exists();
            } while ($exists);

            DB::table('tbl_seller')->insert([
                'Seller_Id' => $sellerId,
                'FirstName' => $validatedData['FirstName'],
                'LastName' => $validatedData['LastName'],
                'Email' => $validatedData['Email'],
                'Password' => Hash::make($validatedData['Password']),
                'ContactNo' => $validatedData['ContactNo'],
                'Barangay' => $validatedData['Barangay'],
                'Municipality' => $validatedData['Municipality'],
                'Street' => $validatedData['Street'],
                'ZIP' => $validatedData['ZIP'],
                'BusinessName' => $validatedData['BusinessName'],
                'BusinessPermit' => $businessPermit,
                'Verified' => false,
            ]);

            return redirect('/login')->with('success', 'Seller account created successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation Error:', $e->errors()); 
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Database Insert Error:', ['error' => $e->getMessage()]); 
            return redirect()->back()->with('error', 'Failed to create seller account. Please try again.');
        }
    }
}
