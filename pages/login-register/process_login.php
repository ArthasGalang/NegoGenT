<?php
session_start();
include '../../database/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the email exists in tbl_emails
    $checkEmailSql = "SELECT Email_Id FROM tbl_emails WHERE Email = ?";
    $stmt = $conn->prepare($checkEmailSql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows === 0) {
        header("Location: login.php?error=email_not_found");
        exit;
    }
    $stmt->bind_result($emailId);
    $stmt->fetch();
    $stmt->close();

    // Check if the email belongs to a seller
    $checkSellerSql = "SELECT Shop_Id, Shop_Password, Verified FROM tbl_shop WHERE Email_Id = ?";
    $stmt = $conn->prepare($checkSellerSql);
    $stmt->bind_param("i", $emailId);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($shopId, $hashedPassword, $verified);
        $stmt->fetch();
        if ($verified == 0) {
            header("Location: login.php?error=email_not_verified");
            exit;
        }
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['seller'] = $shopId; // Store Shop_Id in session
            header("Location: ../seller/dashboard.php#products"); // Redirect to Products tab
            exit;
        } else {
            header("Location: login.php?error=incorrect_password");
            exit;
        }
    }
    $stmt->close();

    // Check if the email belongs to a buyer
    $checkBuyerSql = "SELECT Customer_Id, Customer_Password, Verified FROM tbl_customer WHERE Email_Id = ?";
    $stmt = $conn->prepare($checkBuyerSql);
    $stmt->bind_param("i", $emailId);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($customerId, $hashedPassword, $verified);
        $stmt->fetch();
        if ($verified == 0) {
            header("Location: login.php?error=email_not_verified");
            exit;
        }
        if (password_verify($password, $hashedPassword)) {
            $_SESSION['buyer'] = $customerId; // Store Customer_Id in session
            header("Location: ../buyer/dashboard.php#shops"); // Redirect to Shops tab
            exit;
        } else {
            header("Location: login.php?error=incorrect_password");
            exit;
        }
    }
    $stmt->close();

    // If no match is found
    header("Location: login.php?error=email_not_associated");
    exit;
}
?>
