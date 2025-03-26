<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categories = Product::select('Category')->distinct()->get(); // Fetch unique categories from tbl_products
        $products = Product::when($request->category, function ($query, $category) {
            return $query->where('Category', $category);
        })->get();

        return view('view-product', compact('categories', 'products'));
    }

    public function showCategories()
    {
        $categories = Product::select('Category')->distinct()->get(); // Fetch unique categories
        return view('categories', compact('categories'));
    }
}

class AdminController extends Controller
{
    public function verifyProduct($id)
    {
        DB::table('tbl_products')->where('Product_Id', $id)->update(['Verified' => true]);
        return redirect()->back()->with('success', 'Product verified successfully.');
    }
}