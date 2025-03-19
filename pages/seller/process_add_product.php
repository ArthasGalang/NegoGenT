<?php
session_start();
if (!isset($_SESSION['seller'])) {
    header('Location: ../login-register/login.php');
    exit();
}

include '../../database/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $shopId = $_SESSION['seller'];
    $productName = $_POST['product_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];

    // Check for duplicate product name
    $checkNameSql = "SELECT 1 FROM tbl_products WHERE Product_Name = ? AND Shop_Id = ?";
    $stmt = $conn->prepare($checkNameSql);
    $stmt->bind_param("si", $productName, $shopId);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $_SESSION['error'] = 'duplicate_name';
        $_SESSION['form_data'] = $_POST; // Preserve form data
        header("Location: ../seller/dashboard.php#add-product");
        exit();
    }
    $stmt->close();

    // Generate Product_Id and ensure it's unique
    do {
        $shopIdPrefix = substr($shopId, 0, 5); // Take the first 5 digits of Shop_Id
        $randomSuffix = rand(10000, 99999); // Generate 5 random numbers
        $productId = $shopIdPrefix . $randomSuffix;

        $checkIdSql = "SELECT 1 FROM tbl_products WHERE Product_Id = ?";
        $stmt = $conn->prepare($checkIdSql);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $stmt->store_result();
        $idExists = $stmt->num_rows > 0;
        $stmt->close();
    } while ($idExists);

    // Insert product into the database
    $sql = "INSERT INTO tbl_products (Product_Id, Shop_Id, Product_Name, Price, Description, Stock, Verified) 
            VALUES (?, ?, ?, ?, ?, ?, 0)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iisdsi", $productId, $shopId, $productName, $price, $description, $stock);
    if ($stmt->execute()) {
        unset($_SESSION['error']); // Clear any previous error
        unset($_SESSION['form_data']); // Clear preserved form data
        header("Location: ../seller/dashboard.php#products"); // Redirect to products page
        exit();
    } else {
        $_SESSION['error'] = 'insert_error';
        $_SESSION['form_data'] = $_POST; // Preserve form data
        header("Location: ../seller/dashboard.php#add-product");
        exit();
    }
    $stmt->close();
    $conn->close();
}
?>
