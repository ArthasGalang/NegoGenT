<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\SellerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/', function () {
    return view('index'); 
});

Route::get('/shop', function () {
    return view('shop'); 
});

Route::get('/categories', function () {
    return view('categories');  
});

Route::get('/about', function () {
    return view('about');  
});

Route::get('/admin/dashboard', function () {
    return view('admin.admin-dashboard'); 
});

Route::post('/admin/dashboard/delete-database', function () {
    try {
        DB::statement('DROP DATABASE IF EXISTS negogent');
        return response()->json(['message' => 'Database deleted successfully.']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error deleting database: ' . $e->getMessage()], 500);
    }
});

Route::post('/admin/dashboard/remove-tables', function () {
    try {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            $tableName = array_values((array)$table)[0];
            DB::statement("DROP TABLE IF EXISTS `$tableName`");
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        return response()->json(['message' => 'All tables removed successfully.']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error removing tables: ' . $e->getMessage()], 500);
    }
});

Route::post('/admin/dashboard/clear-tables', function () {
    try {
        $tables = DB::select('SHOW TABLES');
        foreach ($tables as $table) {
            $tableName = array_values((array)$table)[0];
            DB::statement("TRUNCATE TABLE `$tableName`");
        }
        return response()->json(['message' => 'All table entries cleared successfully.']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error clearing table entries: ' . $e->getMessage()], 500);
    }
});

Route::post('/admin/dashboard/insert-sample-buyers', function () {
    try {
        $sampleBuyers = [
            [
                'Buyer_Id' => '8000000001',
                'FirstName' => 'John',
                'LastName' => 'Doe',
                'Age' => 30,
                'ContactNo' => '09123456789',
                'Email' => 'john.doe@example.com',
                'Password' => Hash::make('password123'),
                'Barangay' => 'Barangay 1',
                'Municipality' => 'Municipality 1',
                'Street' => 'Street 1',
                'ZIP' => '1234',
                'Verified' => false,
            ],
            [
                'Buyer_Id' => '8000000002',
                'FirstName' => 'Jane',
                'LastName' => 'Smith',
                'Age' => 25,
                'ContactNo' => '09198765432',
                'Email' => 'jane.smith@example.com',
                'Password' => Hash::make('password456'),
                'Barangay' => 'Barangay 2',
                'Municipality' => 'Municipality 2',
                'Street' => 'Street 2',
                'ZIP' => '5678',
                'Verified' => false,
            ],
        ];

        DB::table('tbl_buyer')->insert($sampleBuyers);

        return response()->json(['message' => 'Sample buyers inserted successfully.']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error inserting sample buyers: ' . $e->getMessage()], 500);
    }
});

Route::post('/admin/dashboard/insert-buyer', function (Illuminate\Http\Request $request) {
    \Log::info('Form Input:', $request->all()); 

    try {
        $validatedData = $request->validate([
            'FirstName' => 'required|string|max:255',
            'LastName' => 'required|string|max:255',
            'Age' => 'required|integer',
            'ContactNo' => 'required|string|max:15',
            'Email' => 'required|email|unique:tbl_buyer,Email',
            'Password' => 'required|string|min:8',
            'Barangay' => 'required|string|max:255',
            'Municipality' => 'required|string|max:255',
            'Street' => 'required|string|max:255',
            'ZIP' => 'required|string|max:10',
        ]);

        \Log::info('Validation Passed:', $validatedData); 

        $buyerId = '8' . Str::random(9);

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

        return redirect()->back()->with('success', 'Buyer inserted successfully.');
    } catch (\Illuminate\Validation\ValidationException $e) {
        \Log::error('Validation Error:', $e->errors()); 
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        \Log::error('Database Insert Error:', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Failed to insert buyer. Please try again.');
    }
});

Route::get('/register', function (Illuminate\Http\Request $request) {
    $role = $request->query('role');
    if ($role === 'seller') {
        return view('register-seller');
    } elseif ($role === 'buyer') {
        return view('register-buyer'); 
    } else {
        return view('register');
    }
});

Route::post('/register/buyer', [BuyerController::class, 'register'])->name('buyer.register');
Route::post('/register/seller', [SellerController::class, 'register'])->name('seller.register');