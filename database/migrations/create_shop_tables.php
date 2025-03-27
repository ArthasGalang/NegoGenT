<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {

        // Create tbl_seller
        Schema::create('tbl_seller', function (Blueprint $table) {
            $table->bigIncrements('Seller_Id')->unique();
            $table->string('FirstName', 250);
            $table->string('LastName', 250);
            $table->string('ContactNo', 250);
            $table->string('BusinessName', 250);
            $table->string('Email', 250)->unique();
            $table->string('Barangay', 250);
            $table->string('Municipality', 250);
            $table->string('Street', 250);
            $table->string('ZIP', 250);
            $table->boolean('Verified')->default(false);
            $table->string('BusinessPermit', 250)->nullable();
            $table->string('Password', 250);
        });
        // Create tbl_buyer
        Schema::create('tbl_buyer', function (Blueprint $table) {
            $table->bigIncrements('Buyer_Id')->unique();
            $table->string('FirstName', 250);
            $table->string('LastName', 250);
            $table->integer('Age');
            $table->string('ContactNo', 250);
            $table->string('Email', 250)->unique();
            $table->string('Barangay', 250);
            $table->string('Municipality', 250);
            $table->string('Street', 250);
            $table->string('ZIP', 250);
            $table->boolean('Verified')->default(false);
            $table->string('Password', 250);
        });


        // Create tbl_products
        Schema::create('tbl_products', function (Blueprint $table) {
            $table->bigIncrements('Product_Id')->unique();
            $table->unsignedBigInteger('Seller_Id');
            $table->string('Category', 250); // Store category as a string directly
            $table->string('Product_Name', 250);
            $table->decimal('Price', 10, 2);
            $table->string('Description', 1000);
            $table->integer('Stock');
            $table->boolean('Verified')->default(false);
            $table->string('Product_Image', 250)->nullable(); // Make this column nullable
            $table->foreign('Seller_Id')->references('Seller_Id')->on('tbl_seller')->onDelete('cascade');
        });

        // Create tbl_orders
        Schema::create('tbl_orders', function (Blueprint $table) {
            $table->bigIncrements('Order_Id')->unique();
            $table->timestamp('Order_Date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->decimal('Total_Price', 10, 2);
            $table->unsignedBigInteger('Buyer_Id');
            $table->foreign('Buyer_Id')->references('Buyer_Id')->on('tbl_buyer')->onDelete('cascade');
        });

        // Create tbl_order_items
        Schema::create('tbl_order_items', function (Blueprint $table) {
            $table->bigIncrements('Order_Item_Id')->unique();
            $table->unsignedBigInteger('Order_Id');
            $table->unsignedBigInteger('Product_Id');
            $table->integer('Quantity');
            $table->decimal('Price', 10, 2);
            $table->foreign('Order_Id')->references('Order_Id')->on('tbl_orders')->onDelete('cascade');
            $table->foreign('Product_Id')->references('Product_Id')->on('tbl_products')->onDelete('cascade');
        });

        // Create tbl_reviews
        Schema::create('tbl_reviews', function (Blueprint $table) {
            $table->bigIncrements('Review_Id')->unique();
            $table->unsignedBigInteger('Product_Id');
            $table->unsignedBigInteger('Buyer_Id');
            $table->integer('Rating')->check('Rating >= 1 AND Rating <= 5');
            $table->string('Review_Text', 1000)->nullable();
            $table->timestamp('Review_Date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->foreign('Product_Id')->references('Product_Id')->on('tbl_products')->onDelete('cascade');
            $table->foreign('Buyer_Id')->references('Buyer_Id')->on('tbl_buyer')->onDelete('cascade');
        });

        // Create tbl_emails
        Schema::create('tbl_emails', function (Blueprint $table) {
            $table->id('Email_Id');
            $table->string('Email', 250)->unique();
        });

        // Create tbl_coupons
        Schema::create('tbl_coupons', function (Blueprint $table) {
            $table->id('Coupon_Id');
            $table->string('Coupon_Code', 100);
            $table->decimal('Discount_Amount', 10, 2);
            $table->timestamp('Valid_From')->nullable();
            $table->timestamp('Valid_To')->nullable();
            $table->boolean('Active')->default(true);
        });

    }

    public function down()
    {
        Schema::dropIfExists('tbl_reviews');
        Schema::dropIfExists('tbl_order_items');
        Schema::dropIfExists('tbl_orders');
        Schema::dropIfExists('tbl_buyer');
        Schema::dropIfExists('tbl_products');
        Schema::dropIfExists('tbl_seller');
        Schema::dropIfExists('tbl_coupons');
        Schema::dropIfExists('tbl_emails');
    }
}
;