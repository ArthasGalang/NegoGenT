<?php
$connectionFile = '../../database/connection.php';
if (!file_exists($connectionFile)) {
    die("<script>alert('Error: Database connection file not found.');</script>");
}
include $connectionFile; // Ensure this file connects to the database

if (!isset($conn) || $conn->connect_error) {
    die("<script>alert('Error: Unable to establish a database connection.');</script>");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_type = $_POST['user_type'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypt password

    // Generate a unique 10-digit ID
    do {
        $id = rand(1000000000, 9999999999);
        $checkIdSql = "SELECT 1 FROM tbl_shop WHERE Shop_Id = ? UNION SELECT 1 FROM tbl_customer WHERE Customer_Id = ?";
        $stmt = $conn->prepare($checkIdSql);
        $stmt->bind_param("ii", $id, $id);
        $stmt->execute();
        $stmt->store_result();
        $idExists = $stmt->num_rows > 0;
        $stmt->close();
    } while ($idExists);

    $email = $_POST['email']; // Common email field for both user types

    // Check if the email already exists in tbl_emails
    $checkEmailSql = "SELECT Email_Id FROM tbl_emails WHERE Email = ?";
    $stmt = $conn->prepare($checkEmailSql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        echo "<script>alert('Error: This email is already registered.'); window.location.href='register.php';</script>";
        exit; // Stop further execution
    }
    $stmt->close();

    // Insert the email into tbl_emails
    $insertEmailSql = "INSERT INTO tbl_emails (Email) VALUES (?)";
    $stmt = $conn->prepare($insertEmailSql);
    $stmt->bind_param("s", $email);
    if (!$stmt->execute()) {
        echo "<script>alert('Error: Unable to register email.'); window.location.href='register.php';</script>";
        exit; // Stop further execution
    }
    $emailId = $stmt->insert_id; // Get the Email_Id for reference
    $stmt->close();

    if ($user_type === 'entrepreneur') {
        $business_name = $_POST['business_name'];
        $business_owner = $_POST['business_owner'];
        $contact_no = $_POST['contact_no'];
        $business_location = $_POST['business_location'];

        $sql = "INSERT INTO tbl_shop (Shop_Id, Shop_Name, Shop_Location, Shop_Owner, Shop_Contact, Email_Id, Shop_Password, Verified) 
                VALUES (?, ?, ?, ?, ?, ?, ?, 0)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("issssis", $id, $business_name, $business_location, $business_owner, $contact_no, $emailId, $password);
            if ($stmt->execute()) {
                echo "<script>alert('Entrepreneur registration successful!'); window.location.href='login.php';</script>";
                exit; // Redirect to login page
            } else {
                echo "<script>alert('Error executing query: " . $stmt->error . "'); window.location.href='register.php';</script>";
                exit; // Stop further execution
            }
            $stmt->close();
        } else {
            echo "<script>alert('Error preparing statement: " . $conn->error . "'); window.location.href='register.php';</script>";
            exit; // Stop further execution
        }
    } elseif ($user_type === 'consumer') {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $contact_no = $_POST['contact_no'];

        $sql = "INSERT INTO tbl_customer (Customer_Id, Customer_Name, Customer_Address, Customer_Contact, Email_Id, Customer_Password, Verified) 
                VALUES (?, ?, ?, ?, ?, ?, 0)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("isssis", $id, $name, $address, $contact_no, $emailId, $password);
            if ($stmt->execute()) {
                echo "<script>alert('Consumer registration successful!'); window.location.href='login.php';</script>";
                exit; // Redirect to login page
            } else {
                echo "<script>alert('Error executing query: " . $stmt->error . "'); window.location.href='register.php';</script>";
                exit; // Stop further execution
            }
            $stmt->close();
        } else {
            echo "<script>alert('Error preparing statement: " . $conn->error . "'); window.location.href='register.php';</script>";
            exit; // Stop further execution
        }
    }

    $conn->close();
}
?>
