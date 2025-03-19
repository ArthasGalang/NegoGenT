<?php
include '../../database/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $type = $_POST['type'];
    $id = $_POST['id'];

    if ($type === 'shop') {
        $sql = "UPDATE tbl_shop SET Verified = 1 WHERE Shop_Id = ?";
    } elseif ($type === 'customer') {
        $sql = "UPDATE tbl_customer SET Verified = 1 WHERE Customer_Id = ?";
    } elseif ($type === 'product') {
        $sql = "UPDATE tbl_products SET Verified = 1 WHERE Product_Id = ?";
    } else {
        die("Invalid type.");
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        header("Location: dashboard.php");
        exit;
    } else {
        die("Error verifying entry: " . $stmt->error);
    }
}
?>
