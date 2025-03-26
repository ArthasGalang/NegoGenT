<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tbl_products'; // Map to the correct table
    protected $primaryKey = 'Product_Id'; // Set the primary key
    public $timestamps = false; // Disable timestamps if not used

    protected $fillable = [
        'Seller_Id',
        'Product_Name',
        'Category', // Adjusted to store category as a string
        'Price',
        'Description',
        'Stock',
        'Verified',
        'Product_Image',
    ];

    // Remove category relationship
}
