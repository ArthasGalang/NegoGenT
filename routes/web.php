<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController; // Add this line
use Illuminate\Support\Facades\Session;

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
Route::get('/home', function () {
    return view('index'); 
});
Route::get('/index', function () {
    return view('index'); 
});

//General
Route::get('/about', function () {
    return view('about');  
});
Route::get('/faq', function () {
    return view('faq');  
});
Route::get('/shipping', function () {
    return view('shipping');  
});
Route::get('/privacy', function () {
    return view('privacy');  
});
Route::get('/terms', function () {
    return view('terms');  
});
Route::get('/about', function () {
    return view('about');  
});
Route::get('/returns', function () {
    return view('returns');  
});

//Buyer
Route::get('/buyerdb', function () {
    return view('buyer.dashboard');  
});
Route::get('/wishlist', function () {
    return view('buyer.wishlist');  
});
Route::get('/cart', function () {
    return view('buyer.cart');  
});
Route::get('/shop', function () {
    return view('shop'); 
});

//Seller
Route::get('/sellerdb', function () {
    return view('seller.dashboard');  
});


Route::get('/admin/dashboard', function () {
    $buyers = DB::table('tbl_buyer')->get();
    $sellers = DB::table('tbl_seller')->get();
    $products = DB::table('tbl_products')->get(); // Fetch products
    return view('admin.admin-dashboard', compact('buyers', 'sellers', 'products'));
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
        foreach ($tables as $table) { // Fixed the space issue
            $tableName = array_values((array)$table)[0];
            DB::statement("TRUNCATE TABLE `$tableName`");
        }
        return response()->json(['message' => 'All table entries cleared successfully.']);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Error clearing table entries: ' . $e->getMessage()], 500);
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

Route::post('/admin/dashboard/insert-product', function (Illuminate\Http\Request $request) {
    try {
        \Log::info('Insert Product Request Received', $request->all()); // Log the incoming request data

        $validatedData = $request->validate([
            'Category' => 'required|string',
            'Product_Name' => 'required|string|max:250',
            'Price' => 'required|numeric|min:0',
            'Description' => 'required|string|max:1000',
            'Stock' => 'required|integer|min:1',
            'Product_Image' => 'nullable|image|max:2048', // Allow nullable Product_Image
        ]);

        \Log::info('Validated Data:', $validatedData); // Log validated data

        $categoryPrefixes = [
            'Electronics' => '401',
            'Fashion' => '402',
            'Home & Garden' => '403',
            'Beauty & Health' => '404',
            'Toys & Games' => '405',
            'Sports & Outdoors' => '406',
            'Books & Media' => '407',
            'Food & Beverages' => '408',
            'Automotive' => '409',
            'Pet Supplies' => '410',
            'Arts & Crafts' => '411',
            'Office Supplies' => '412',
        ];

        $categoryPrefix = $categoryPrefixes[$validatedData['Category']] ?? '999';
        $productId = $categoryPrefix . str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);
        $sellerId = '5' . str_pad(rand(0, 999999999), 9, '0', STR_PAD_LEFT);

        $imagePath = $request->file('Product_Image') 
            ? $request->file('Product_Image')->store('product_images', 'public') 
            : null;

        \Log::info('Generated Product ID:', ['Product_Id' => $productId]);
        \Log::info('Generated Seller ID:', ['Seller_Id' => $sellerId]);
        \Log::info('Image Path:', ['Product_Image' => $imagePath]);

        DB::table('tbl_products')->insert([
            'Product_Id' => $productId,
            'Seller_Id' => $sellerId,
            'Category' => $validatedData['Category'],
            'Product_Name' => $validatedData['Product_Name'],
            'Price' => $validatedData['Price'],
            'Description' => $validatedData['Description'],
            'Stock' => $validatedData['Stock'],
            'Product_Image' => $imagePath,
            'Verified' => false,
        ]);

        \Log::info('Product added successfully.');

        return redirect()->back()->with('success', 'Product added successfully.');
    } catch (\Illuminate\Validation\ValidationException $e) {
        \Log::error('Validation Error:', $e->errors());
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        \Log::error('Error adding product:', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'Failed to add product. Please try again.');
    }
});

Route::post('/admin/dashboard/insert-sample-product', function () {
    try {
        $categories = [
            'Electronics', 'Fashion', 'Home & Garden', 'Beauty & Health', 'Toys & Games',
            'Sports & Outdoors', 'Books & Media', 'Food & Beverages', 'Automotive',
            'Pet Supplies', 'Arts & Crafts', 'Office Supplies'
        ];

        $categoryPrefixes = [
            'Electronics' => '401',
            'Fashion' => '402',
            'Home & Garden' => '403',
            'Beauty & Health' => '404',
            'Toys & Games' => '405',
            'Sports & Outdoors' => '406',
            'Books & Media' => '407',
            'Food & Beverages' => '408',
            'Automotive' => '409',
            'Pet Supplies' => '410',
            'Arts & Crafts' => '411',
            'Office Supplies' => '412',
        ];

        $randomCategory = $categories[array_rand($categories)];
        $categoryPrefix = $categoryPrefixes[$randomCategory];
        $productId = $categoryPrefix . str_pad(rand(0, 9999999), 7, '0', STR_PAD_LEFT);
        $sellerId = '5' . str_pad(rand(0, 999999999), 9, '0', STR_PAD_LEFT);

        \Log::info('Inserting sample product', [
            'Product_Id' => $productId,
            'Seller_Id' => $sellerId,
            'Category' => $randomCategory
        ]);

        DB::table('tbl_products')->insert([
            'Product_Id' => $productId,
            'Seller_Id' => $sellerId,
            'Category' => $randomCategory,
            'Product_Name' => 'Sample ' . $randomCategory . ' Product',
            'Price' => rand(100, 1000),
            'Description' => 'This is a sample description for a ' . $randomCategory . ' product.',
            'Stock' => rand(1, 100),
            'Product_Image' => null,
            'Verified' => false,
        ]);

        return response()->json(['message' => 'Sample product added successfully.']);
    } catch (\Exception $e) {
        \Log::error('Error adding sample product:', ['error' => $e->getMessage()]);
        return response()->json(['message' => 'Error adding sample product: ' . $e->getMessage()], 500);
    }
});

Route::post('/admin/dashboard/insert-sample-buyer', function () {
    try {
        $buyerId = '8' . str_pad(rand(0, 999999999), 9, '0', STR_PAD_LEFT);

        \Log::info('Inserting sample buyer', ['Buyer_Id' => $buyerId]);

        DB::table('tbl_buyer')->insert([
            'Buyer_Id' => $buyerId,
            'FirstName' => 'Sample',
            'LastName' => 'Buyer',
            'Age' => rand(18, 60),
            'ContactNo' => '09123456789',
            'Email' => 'sample.buyer' . rand(1, 1000) . '@example.com',
            'Barangay' => 'Sample Barangay',
            'Municipality' => 'Sample Municipality',
            'Street' => 'Sample Street',
            'ZIP' => '1234',
            'Verified' => false,
            'Password' => bcrypt('password123'),
        ]);

        return response()->json(['message' => 'Sample buyer added successfully.']);
    } catch (\Exception $e) {
        \Log::error('Error adding sample buyer:', ['error' => $e->getMessage()]);
        return response()->json(['message' => 'Error adding sample buyer: ' . $e->getMessage()], 500);
    }
});

Route::post('/admin/dashboard/insert-sample-seller', function () {
    try {
        $sellerId = '5' . str_pad(rand(0, 999999999), 9, '0', STR_PAD_LEFT);

        \Log::info('Inserting sample seller', ['Seller_Id' => $sellerId]);

        DB::table('tbl_seller')->insert([
            'Seller_Id' => $sellerId,
            'FirstName' => 'Sample',
            'LastName' => 'Seller',
            'ContactNo' => '09123456789',
            'BusinessName' => 'Sample Business',
            'Email' => 'sample.seller' . rand(1, 1000) . '@example.com',
            'Barangay' => 'Sample Barangay',
            'Municipality' => 'Sample Municipality',
            'Street' => 'Sample Street',
            'ZIP' => '1234',
            'Verified' => false,
            'BusinessPermit' => null,
            'Password' => bcrypt('password123'),
        ]);

        return response()->json(['message' => 'Sample seller added successfully.']);
    } catch (\Exception $e) {
        \Log::error('Error adding sample seller:', ['error' => $e->getMessage()]);
        return response()->json(['message' => 'Error adding sample seller: ' . $e->getMessage()], 500);
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

Route::get('/register-seller', function () {
    return view('register-seller');
});

Route::get('/register-buyer', function () {
    return view('register-buyer');
});

Route::post('/register/buyer', [BuyerController::class, 'register'])->name('buyer.register');
Route::post('/register/seller', [SellerController::class, 'register'])->name('seller.register');

Route::post('/admin/verify/buyer/{id}', function ($id) {
    DB::table('tbl_buyer')->where('Buyer_Id', $id)->update(['Verified' => true]);
    return redirect()->back()->with('success', 'Buyer verified successfully.');
})->name('admin.verify.buyer');

Route::post('/admin/verify/seller/{id}', function ($id) {
    DB::table('tbl_seller')->where('Seller_Id', $id)->update(['Verified' => true]);
    return redirect()->back()->with('success', 'Seller verified successfully.');
})->name('admin.verify.seller');

Route::post('/admin/verify/product/{id}', [AdminController::class, 'verifyProduct'])->name('admin.verify.product');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Illuminate\Http\Request $request) {
    $validatedData = $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    $buyer = DB::table('tbl_buyer')->where('Email', $validatedData['email'])->first();
    if ($buyer && Hash::check($validatedData['password'], $buyer->Password)) {
        if (!$buyer->Verified) {
            return response()->json(['status' => 'not_verified'], 403); // Return JSON response
        }

        Session::put('buyer_id', $buyer->Buyer_Id); // Store buyer_id in session
        Session::save(); // Ensure session is saved
        return response()->json(['status' => 'success', 'user_type' => 'buyer']); // Return JSON response
    }

    return response()->json(['status' => 'error', 'message' => 'Invalid email or password.'], 401); // Return JSON response
});

Route::get('/categories', [ProductController::class, 'showCategories']);

Route::get('/products', function () {
    $category = request('category');
    $products = DB::table('tbl_products')->where('category', $category)->get();
    return view('products', ['products' => $products, 'category' => $category]);
});
Route::get('/debug-session', function () {
    \Log::info('Debugging session: ', ['buyer_id' => Session::get('buyer_id')]); // Log session data
    return Session::get('buyer_id', 'No buyer_id found in session'); // Return buyer_id from session
});

Route::get('/logout', function () {
    Session::flush(); // Clear all session data
    return redirect('/');
});