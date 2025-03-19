<?php
session_start();
include '../../database/connection.php';

// Get the Shop_Id from the query parameter
if (!isset($_GET['shop_id'])) {
    echo "Shop not found.";
    exit();
}

$shopId = intval($_GET['shop_id']);

// Fetch shop details
$shopDetails = [];
$stmt = $conn->prepare("SELECT Shop_Name FROM tbl_shop WHERE Shop_Id = ?");
$stmt->bind_param("i", $shopId);
$stmt->execute();
$stmt->bind_result($shopName);
if ($stmt->fetch()) {
    $shopDetails['Shop_Name'] = $shopName;
} else {
    echo "Shop not found.";
    exit();
}
$stmt->close();

// Fetch products for the shop
$products = [];
$stmt = $conn->prepare("SELECT Product_Id, Product_Name, Price, Description, Stock, Verified FROM tbl_products WHERE Shop_Id = ?");
$stmt->bind_param("i", $shopId);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($shopDetails['Shop_Name']); ?> - Shop</title>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css">
    <style>
        .shop-page {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .shop-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .product-list {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .product-item {
            width: 200px;
            text-align: center;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .product-name {
            font-size: 16px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .product-price {
            font-size: 14px;
            color: #555;
            margin-bottom: 10px;
        }
        .product-description {
            font-size: 12px;
            color: #777;
            margin-bottom: 10px;
        }
        .product-stock {
            font-size: 12px;
            color: #333;
            margin-bottom: 10px;
        }
        .product-status {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
            color: #fff;
            text-align: center;
        }
        .product-status.verified {
            background-color: #4CAF50;
        }
        .product-status.pending {
            background-color: #f8d7da;
        }
    </style>
</head>
<body>
    <div class="shop-page">
        <div class="shop-header">
            <h1><?php echo htmlspecialchars($shopDetails['Shop_Name']); ?></h1>
            <p>Explore the products available in this shop.</p>
        </div>
        <div class="product-list">
            <?php foreach ($products as $product): ?>
                <div class="product-item">
                    <p class="product-name"><?php echo htmlspecialchars($product['Product_Name']); ?></p>
                    <p class="product-price">Price: $<?php echo number_format($product['Price'], 2); ?></p>
                    <p class="product-description"><?php echo htmlspecialchars($product['Description']); ?></p>
                    <p class="product-stock">Stock: <?php echo $product['Stock']; ?></p>
                    <p class="product-status <?php echo $product['Verified'] ? 'verified' : 'pending'; ?>">
                        <?php echo $product['Verified'] ? 'Verified' : 'Pending'; ?>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
