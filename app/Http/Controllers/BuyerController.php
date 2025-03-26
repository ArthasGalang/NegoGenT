<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;

class BuyerController extends Controller
{
    public function register(Request $request)
    {
        \Log::info('Form Input:', $request->all()); 

        try {
            $validatedData = $request->validate([
                'FirstName' => 'required|string|max:255',
                'LastName' => 'required|string|max:255',
                'Age' => 'required|integer',
                'ContactNo' => 'required|string|max:15',
                'Email' => 'required|email|unique:tbl_buyer,Email|unique:tbl_seller,Email',
                'Password' => 'required|string|min:8|confirmed',
                'Barangay' => 'required|string|max:255',
                'Municipality' => 'required|string|max:255',
                'Street' => 'required|string|max:255',
                'ZIP' => 'required|string|size:4',
            ], [
                'Email.unique' => 'Email is already registered.',
                'Password.min' => 'Must be 8 characters long.',
                'Password.confirmed' => 'Password does not match.',
                'ZIP.size' => 'Must be 4 characters long.',
            ]);

            \Log::info('Validation Passed:', $validatedData); 

            $buyerId = null;

            // Ensure unique Buyer_Id
            do {
                $buyerId = '8' . str_pad(mt_rand(1, 999999999), 9, '0', STR_PAD_LEFT);
                $exists = DB::table('tbl_buyer')->where('Buyer_Id', $buyerId)->exists();
            } while ($exists);

            DB::table('tbl_buyer')->insert([
                'Buyer_Id' => $buyerId,
                'FirstName' => $validatedData['FirstName'],
                'LastName' => $validatedData['LastName'],
                'Age' => $validatedData['Age'],
                'ContactNo' => $validatedData['ContactNo'],
                'Email' => $validatedData['Email'],
                'Password' => Hash::make($validatedData['Password']),
                'Barangay' => $validatedData['Barangay'],
                'Municipality' => $validatedData['Municipality'],
                'Street' => $validatedData['Street'],
                'ZIP' => $validatedData['ZIP'],
                'Verified' => false,
            ]);

            return redirect('/login')->with('success', 'Account created successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation Error:', $e->errors()); 
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            \Log::error('Database Insert Error:', ['error' => $e->getMessage()]); 
            return redirect()->back()->with('error', 'Failed to create account. Please try again.');
        }
    }
}

