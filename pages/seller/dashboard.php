<?php
session_start();
if (!isset($_SESSION['seller'])) {
    header('Location: ../login-register/login.php');
    exit();
}

include '../../database/connection.php';

// Fetch the shop name based on the session's Shop_Id
$shopName = '';
if (isset($_SESSION['seller'])) {
    $shopId = $_SESSION['seller'];
    $stmt = $conn->prepare("SELECT Shop_Name FROM tbl_shop WHERE Shop_Id = ?");
    $stmt->bind_param("i", $shopId);
    $stmt->execute();
    $stmt->bind_result($shopName);
    $stmt->fetch();
    $stmt->close();
}

// Fetch products for the logged-in seller
$products = [];
if (isset($_SESSION['seller'])) {
    $stmt = $conn->prepare("SELECT Product_Id, Product_Name, Verified FROM tbl_products WHERE Shop_Id = ?");
    $stmt->bind_param("i", $shopId);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
    $stmt->close();
}
?>
<?php
include '../../header.php';
?>
<link rel="stylesheet" type="text/css" href="../../css/styles.css">



<div class="seller-dashboard">
    <div class="sidebar">
        <div class="sidebar-header">
            <p><?php echo htmlspecialchars($shopName); ?></p>
            <hr>
        </div>
        <button class="tab-button active" onclick="openTab(event, 'products')">Products</button>
        <button class="tab-button" onclick="openTab(event, 'orders')">Orders</button>
        <button class="tab-button" onclick="openTab(event, 'account')">Account</button>
    </div>
    <div class="content">
        <div id="products" class="tab-content active">
            <h2 class="section-heading">Products</h2>
            <button class="add-product-button" onclick="openTab(event, 'add-product')">Add Product</button>
            <div class="product-list">
                <?php foreach ($products as $product): ?>
                    <div class="product-item">
                        <p class="product-name"><?php echo htmlspecialchars($product['Product_Name']); ?></p>
                        <div class="product-actions">
                            <a href="product_page.php?id=<?php echo $product['Product_Id']; ?>" class="view-button">View</a>
                            <span class="product-status" style="background-color: <?php echo $product['Verified'] ? '#d4edda' : '#f8d7da'; ?>;">
                                <?php echo $product['Verified'] ? 'Verified' : 'Pending'; ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div id="orders" class="tab-content">
            <h2 class="section-heading">Orders</h2>
        </div>
        <div id="account" class="tab-content">
            <h2 class="section-heading">Account</h2>
            <div class="logout-container">
                <form action="../login-register/logout.php" method="POST">
                    <button type="submit" class="logout-button">Logout</button>
                </form>
            </div>
        </div>
        <div id="add-product" class="tab-content">
            <div class="add-product-window">
                <h2>Add New Product</h2>
                <?php if (isset($_SESSION['error']) && $_SESSION['error'] === 'duplicate_name'): ?>
                    <p class="error-message">Error: Product already exists.</p>
                <?php elseif (isset($_SESSION['error']) && $_SESSION['error'] === 'insert_error'): ?>
                    <p class="error-message">Error: Unable to add product. Please try again.</p>
                <?php endif; ?>
                <form action="process_add_product.php" method="POST" enctype="multipart/form-data">
                    <label for="product_name">Product Name:</label>
                    <input type="text" id="product_name" name="product_name" value="<?php echo isset($_SESSION['form_data']['product_name']) ? htmlspecialchars($_SESSION['form_data']['product_name']) : ''; ?>" required>
                    
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" step="0.01" value="<?php echo isset($_SESSION['form_data']['price']) ? htmlspecialchars($_SESSION['form_data']['price']) : ''; ?>" required>
                    
                    <label for="description">Description:</label>
                    <textarea id="description" name="description" rows="4" required><?php echo isset($_SESSION['form_data']['description']) ? htmlspecialchars($_SESSION['form_data']['description']) : ''; ?></textarea>
                    
                    <label for="stock">Stock:</label>
                    <input type="number" id="stock" name="stock" value="<?php echo isset($_SESSION['form_data']['stock']) ? htmlspecialchars($_SESSION['form_data']['stock']) : ''; ?>" required>
                    
                    <button type="submit" class="submit-button">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function openTab(event, tabName) {
    const tabContents = document.querySelectorAll('.tab-content');
    const tabButtons = document.querySelectorAll('.tab-button');
    
    tabContents.forEach(content => content.classList.remove('active'));
    tabButtons.forEach(button => button.classList.remove('active'));
    
    document.getElementById(tabName).classList.add('active');
    event.currentTarget.classList.add('active');
}
</script>

<style>
.seller-dashboard {
    display: flex;
    font-family: Arial, sans-serif;
    min-height: 100vh; /* Ensure the dashboard takes the full height of the viewport */
}

.sidebar {
    width: 250px; /* Updated width to match the other file */
    background-color: rgb(43, 44, 44); /* Updated background color */
    color: #fff;
    padding: 20px;
    box-sizing: border-box;
    display: flex;
    flex-direction: column;
    gap: 10px;
    box-shadow: 10px 0 6px rgba(0, 0, 0, 0.1);
}

.sidebar-header {
    text-align: center;
    color: #fff;
    font-size: 16px;
    margin-bottom: 10px;
}

.sidebar-header hr {
    border: 0;
    height: 1px;
    background-color: #fff;
    margin: 10px 0;
}

.tab-button {
    padding: 15px; /* Updated padding */
    margin-bottom: 10px;
    background-color: rgb(70, 148, 88); /* Updated background color */
    border: none;
    text-align: left;
    cursor: pointer;
    transition: background-color 0.3s, box-shadow 0.3s;
    font-weight: bold;
    color: #fff;
    border-radius: 5px;
    width: 100%;
    flex: 0;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.tab-button:hover {
    background-color: #555; /* Updated hover background color */
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
}

.tab-button.active {
    background-color: #3e8e41; /* Updated active background color */
}

.content {
    flex: 1;
    padding: 20px;
    background-color: #f8f9fa;
}

.tab-content {
    display: none;
}

.tab-content.active {
    display: block;
}

.section-heading {
    color: #3d8f50; /* Set the color to #3d8f50 */
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: rgb(61, 143, 80);
    color: #fff;
    box-shadow: 0 10px 6px rgba(0, 0, 0, 0.1);
}

.logout-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100px; /* Adjust height as needed */
}

.logout-button {
    background-color: #d9534f; /* Red background */
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.logout-button:hover {
    background-color: #c9302c; /* Darker red on hover */
}

.add-product-button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin-top: 20px;
}

.add-product-button:hover {
    background-color: #45a049;
}

.add-product-window {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 400px;
    margin: 50px auto;
    text-align: center;
}

.add-product-window h2 {
    margin-bottom: 20px;
    font-size: 24px;
    color: #3d8f50;
}

.add-product-window label {
    display: block;
    margin: 10px 0 5px;
    font-size: 14px;
    color: #555;
}

.add-product-window input, .add-product-window textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

.add-product-window .submit-button {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.add-product-window .submit-button:hover {
    background-color: #45a049;
}

.product-list {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.product-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.product-name {
    font-size: 16px;
    font-weight: bold;
    color: #333;
}

.product-actions {
    display: flex;
    align-items: center;
    gap: 10px;
}

.view-button {
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 14px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.view-button:hover {
    background-color: #45a049;
}

.product-status {
    padding: 5px 10px;
    border-radius: 5px;
    font-size: 14px;
    font-weight: bold;
    color: #fff;
    text-align: center;
}

.error-message {
    color: #df5252;
    text-align: center;
    margin-bottom: 10px;
    font-weight: bold;
}
</style>
<?php
// Clear error and form data after displaying them
unset($_SESSION['error']);
unset($_SESSION['form_data']);
?>

