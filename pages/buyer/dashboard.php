<?php
session_start();
if (!isset($_SESSION['buyer'])) {
    header('Location: ../login-register/login.php');
    exit();
}

include '../../database/connection.php';

// Fetch the customer name based on the session's Customer_Id
$customerName = '';
if (isset($_SESSION['buyer'])) {
    $customerId = $_SESSION['buyer'];
    $stmt = $conn->prepare("SELECT Customer_Name FROM tbl_customer WHERE Customer_Id = ?");
    $stmt->bind_param("i", $customerId);
    $stmt->execute();
    $stmt->bind_result($customerName);
    $stmt->fetch();
    $stmt->close();
}

// Fetch all shops from the database
$shops = [];
$sql = "SELECT Shop_Id, Shop_Name FROM tbl_shop";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $shops[] = $row;
}
?>
<?php
include '../../header.php';
?>
<link rel="stylesheet" type="text/css" href="../../css/styles.css">

<div class="buyer-dashboard">
    <div class="sidebar">
        <div class="sidebar-header">
            <p>Welcome, <?php echo htmlspecialchars($customerName); ?></p>
            <hr>
        </div>
        <button class="tab-button active" onclick="openTab(event, 'shops')">Shops</button>
        <button class="tab-button" onclick="openTab(event, 'orders')">Orders</button>
        <button class="tab-button" onclick="openTab(event, 'account')">Account</button>
    </div>
    <div class="content">
        <div id="shops" class="tab-content active">
            <h2 class="section-heading">Shops</h2>
            <div class="shop-list">
                <?php foreach ($shops as $shop): ?>
                    <div class="shop-item">
                        <img src="../../images/placeholder-shop.png" alt="Shop Image" class="shop-image">
                        <p class="shop-name"><?php echo htmlspecialchars($shop['Shop_Name']); ?></p>
                        <a href="../shop/shop_page.php?shop_id=<?php echo $shop['Shop_Id']; ?>" class="shop-button">View Shop</a>
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
.buyer-dashboard {
    display: flex;
    font-family: Arial, sans-serif;
    min-height: 100vh; /* Ensure the dashboard takes the full height of the viewport */
}

.sidebar {
    width: 250px; /* Updated width to match the seller dashboard */
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

.shop-list {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 20px;
}

.shop-item {
    width: 200px;
    text-align: center;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 15px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.shop-image {
    width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 5px;
    margin-bottom: 10px;
}

.shop-name {
    font-size: 16px;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.shop-button {
    display: inline-block;
    background-color: #4CAF50;
    color: white;
    text-decoration: none;
    padding: 10px 15px;
    border-radius: 5px;
    font-size: 14px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.shop-button:hover {
    background-color: #45a049;
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
</style>
