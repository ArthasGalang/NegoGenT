<?php
include '../../header.php';
include '../../database/connection.php';

// Determine the active tab from the query parameter
$activeTab = isset($_GET['tab']) ? $_GET['tab'] : 'entrepreneur';

// Fetch all verified shops
$verifiedShops = [];
$sql = "SELECT Shop_Id, Shop_Name FROM tbl_shop WHERE Verified = 1";
$result = $conn->query($sql);
while ($row = $result->fetch_assoc()) {
    $verifiedShops[] = $row;
}
?>
<link rel="stylesheet" type="text/css" href="../../css/styles.css">

<div class="admin-dashboard">
    <div class="sidebar">
        <div class="sidebar-header">
            <p>Admin Dashboard</p>
            <hr>
        </div>
        <button class="tab-button <?php echo $activeTab === 'entrepreneur' ? 'active' : ''; ?>" onclick="openTab(event, 'entrepreneur')">Entrepreneur</button>
        <button class="tab-button <?php echo $activeTab === 'consumer' ? 'active' : ''; ?>" onclick="openTab(event, 'consumer')">Consumer</button>
        <button class="tab-button <?php echo $activeTab === 'products' ? 'active' : ''; ?>" onclick="openTab(event, 'products')">Products</button>
        <?php foreach ($verifiedShops as $shop): ?>
            <button class="tab-button <?php echo $activeTab === 'shop_' . $shop['Shop_Id'] ? 'active' : ''; ?>" onclick="openTab(event, 'shop_<?php echo $shop['Shop_Id']; ?>')">
                <?php echo htmlspecialchars($shop['Shop_Name']); ?>
            </button>
        <?php endforeach; ?>
    </div>
    <div class="content">
        <div id="entrepreneur" class="tab-content <?php echo $activeTab === 'entrepreneur' ? 'active' : ''; ?>">
            <h2 class="section-heading">Entrepreneur</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Owner</th>
                        <th>Contact</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT Shop_Id, Shop_Name, Shop_Location, Shop_Owner, Shop_Contact, Verified FROM tbl_shop";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['Shop_Id']}</td>
                                <td>" . ucwords(strtolower($row['Shop_Name'])) . "</td>
                                <td>" . ucwords(strtolower($row['Shop_Location'])) . "</td>
                                <td>" . ucwords(strtolower($row['Shop_Owner'])) . "</td>
                                <td>{$row['Shop_Contact']}</td>
                                <td>";
                        if ($row['Verified'] == 0) {
                            echo "<form method='POST' action='verify_entry.php?tab=entrepreneur'>
                                    <input type='hidden' name='type' value='shop'>
                                    <input type='hidden' name='id' value='{$row['Shop_Id']}'>
                                    <button class='verify-button' type='submit'>Verify</button>
                                  </form>";
                        } else {
                            echo "<span class='verified-badge'>Verified</span>";
                        }
                        echo "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="consumer" class="tab-content <?php echo $activeTab === 'consumer' ? 'active' : ''; ?>">
            <h2 class="section-heading">Consumer</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT Customer_Id, Customer_Name, Customer_Address, Verified FROM tbl_customer";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['Customer_Id']}</td>
                                <td>" . ucwords(strtolower($row['Customer_Name'])) . "</td>
                                <td>" . ucwords(strtolower($row['Customer_Address'])) . "</td>
                                <td>";
                        if ($row['Verified'] == 0) {
                            echo "<form method='POST' action='verify_entry.php?tab=consumer'>
                                    <input type='hidden' name='type' value='customer'>
                                    <input type='hidden' name='id' value='{$row['Customer_Id']}'>
                                    <button class='verify-button' type='submit'>Verify</button>
                                  </form>";
                        } else {
                            echo "<span class='verified-badge'>Verified</span>";
                        }
                        echo "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="products" class="tab-content <?php echo $activeTab === 'products' ? 'active' : ''; ?>">
            <h2 class="section-heading">Products</h2>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Shop ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Stock</th>
                        <th>Image</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT Product_Id, Shop_Id, Product_Name, Price, Description, Stock, Product_Image, Verified FROM tbl_products";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['Product_Id']}</td>
                                <td>{$row['Shop_Id']}</td>
                                <td>" . ucwords(strtolower($row['Product_Name'])) . "</td>
                                <td>{$row['Price']}</td>
                                <td>" . ucfirst(strtolower($row['Description'])) . "</td>
                                <td>{$row['Stock']}</td>
                                <td><img src='{$row['Product_Image']}' alt='Product Image' class='product-image'></td>
                                <td>";
                        if ($row['Verified'] == 0) {
                            echo "<form method='POST' action='verify_entry.php?tab=products'>
                                    <input type='hidden' name='type' value='product'>
                                    <input type='hidden' name='id' value='{$row['Product_Id']}'>
                                    <button class='verify-button' type='submit'>Verify</button>
                                  </form>";
                        } else {
                            echo "<span class='verified-badge'>Verified</span>";
                        }
                        echo "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php foreach ($verifiedShops as $shop): ?>
            <div id="shop_<?php echo $shop['Shop_Id']; ?>" class="tab-content <?php echo $activeTab === 'shop_' . $shop['Shop_Id'] ? 'active' : ''; ?>">
                <h2 class="section-heading"><?php echo htmlspecialchars($shop['Shop_Name']); ?></h2>
                <p>Details and management for shop ID: <?php echo $shop['Shop_Id']; ?></p>
                <!-- Add shop-specific content here -->
            </div>
        <?php endforeach; ?>
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
    const url = new URL(window.location.href);
    url.searchParams.set('tab', tabName);
    window.history.pushState({}, '', url);
}
</script>

<style>
.admin-dashboard {
    display: flex;
    font-family: Arial, sans-serif;
    min-height: 100vh; /* Ensure the dashboard takes the full height of the viewport */
}

.sidebar {
    width: 250px; /* Sidebar width */
    background-color: rgb(43, 44, 44); /* Dark background color */
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
    padding: 15px;
    margin-bottom: 10px;
    background-color: rgb(70, 148, 88);
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
    background-color: #555;
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
}

.tab-button.active {
    background-color: #3e8e41;
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
    color: #3d8f50;
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

.styled-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    font-size: 16px;
    text-align: left;
    border-radius: 8px;
    overflow: hidden;
}

.styled-table th, .styled-table td {
    padding: 12px 15px;
    border: 1px solid #ddd;
}

.styled-table th {
    background-color: #3d8f50;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
}

.styled-table tr {
    transition: background-color 0.3s;
}

.styled-table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.styled-table tr:hover {
    background-color: #f1f1f1;
}

.styled-table td img.product-image {
    max-width: 50px;
    height: auto;
    border-radius: 5px;
}

.verify-button {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    border-radius: 3px;
    transition: background-color 0.3s;
}

.verify-button:hover {
    background-color: #218838;
}

.verified-badge {
    display: inline-block;
    padding: 5px 10px;
    background-color: #17a2b8;
    color: #fff;
    border-radius: 3px;
    font-size: 12px;
}
</style>
