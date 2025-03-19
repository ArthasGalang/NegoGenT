<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop_database";

try {
    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Drop database if it exists
    $sql = "DROP DATABASE IF EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
        echo "Database dropped successfully<br>";
    } else {
        die("Error dropping database: " . $conn->error);
    }

    // Create database
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully<br>";
    } else {
        die("Error creating database: " . $conn->error);
    }

    // Select the database
    $conn->select_db($dbname);

    // Create tbl_emails to enforce unique emails across tbl_shop and tbl_customer
    $sql = "CREATE TABLE IF NOT EXISTS tbl_emails (
        Email_Id BIGINT(10) AUTO_INCREMENT PRIMARY KEY,
        Email VARCHAR(250) UNIQUE -- Enforce unique emails globally
    )";
    $conn->query($sql);

    // Create tbl_shop
    $sql = "CREATE TABLE IF NOT EXISTS tbl_shop (
        Shop_Id BIGINT(10) AUTO_INCREMENT PRIMARY KEY,
        Shop_Name VARCHAR(250) UNIQUE,
        Shop_Location VARCHAR(250),
        Shop_Owner VARCHAR(250),
        Shop_Contact VARCHAR(250),
        Email_Id BIGINT(10), -- Reference to tbl_emails
        Shop_Password VARCHAR(250),
        Verified BOOLEAN,
        Shop_Image VARCHAR(250),
        FOREIGN KEY (Email_Id) REFERENCES tbl_emails(Email_Id)
    )";
    $conn->query($sql);

    // Create tbl_products
    $sql = "CREATE TABLE IF NOT EXISTS tbl_products (
        Product_Id BIGINT(10) AUTO_INCREMENT PRIMARY KEY,
        Shop_Id BIGINT(10),
        Product_Name VARCHAR(250),
        Price DECIMAL(10,2),
        Description VARCHAR(1000),
        Stock INT,
        Verified BOOLEAN,
        Product_Image VARCHAR(250),
        FOREIGN KEY (Shop_Id) REFERENCES tbl_shop(Shop_Id)
    )";
    $conn->query($sql);

    // Create tbl_customer
    $sql = "CREATE TABLE IF NOT EXISTS tbl_customer (
        Customer_Id BIGINT(10) AUTO_INCREMENT PRIMARY KEY,
        Customer_Name VARCHAR(250) UNIQUE,
        Customer_Address VARCHAR(250),
        Customer_Contact VARCHAR(250),
        Email_Id BIGINT(10), -- Reference to tbl_emails
        Customer_Password VARCHAR(250),
        Verified BOOLEAN,
        FOREIGN KEY (Email_Id) REFERENCES tbl_emails(Email_Id)
    )";
    $conn->query($sql);

    // Create tbl_orders
    $sql = "CREATE TABLE IF NOT EXISTS tbl_orders (
        Order_Id BIGINT(10) AUTO_INCREMENT PRIMARY KEY,
        Order_Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        Total_Price DECIMAL(10,2),
        Customer_Id BIGINT(10),
        FOREIGN KEY (Customer_Id) REFERENCES tbl_customer(Customer_Id)
    )";
    $conn->query($sql);

    // Create tbl_order_items
    $sql = "CREATE TABLE IF NOT EXISTS tbl_order_items (
        Order_Item_Id BIGINT(10) AUTO_INCREMENT PRIMARY KEY,
        Order_Id BIGINT(10),
        Product_Id BIGINT(10),
        Quantity INT,
        Price DECIMAL(10,2),
        FOREIGN KEY (Order_Id) REFERENCES tbl_orders(Order_Id),
        FOREIGN KEY (Product_Id) REFERENCES tbl_products(Product_Id)
    )";
    $conn->query($sql);

    echo "Tables created successfully";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $conn->close();
}
?>
