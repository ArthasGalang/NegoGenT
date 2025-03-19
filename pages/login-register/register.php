<?php
include '../../header.php';
?>
<link rel="stylesheet" type="text/css" href="../../css/styles.css">

<div class="login-container">
    <form action="process_register.php" method="POST" class="login-form" onsubmit="return showPopupAndSubmit()">
        <h2>Register</h2>
        <div class="tabs">
            <button type="button" class="tab-button active" onclick="openTab(event, 'entrepreneur')">Entrepreneur</button>
            <button type="button" class="tab-button" onclick="openTab(event, 'consumer')">Consumer</button>
        </div>
        <div id="entrepreneur" class="tab-content active">
            <label for="business_name">Business Name:</label>
            <input type="text" id="business_name" name="business_name" required>
            
            <label for="business_owner">Business Owner:</label>
            <input type="text" id="business_owner" name="business_owner" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="contact_no">Contact No.:</label>
            <input type="text" id="contact_no" name="contact_no" required>
            
            <label for="business_location">Business Location:</label>
            <input type="text" id="business_location" name="business_location" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="hidden" name="user_type" value="entrepreneur">
        </div>
        <div id="consumer" class="tab-content">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="contact_no">Contact No.:</label>
            <input type="text" id="contact_no" name="contact_no" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            
            <input type="hidden" name="user_type" value="consumer">
        </div>
        <button type="submit">Register</button>
        <p class="register-link">
            Already have an account? <a href="login.php">Login here</a>
        </p>
    </form>
</div>

<script>
function openTab(event, tabName) {
    const tabContents = document.querySelectorAll('.tab-content');
    const tabButtons = document.querySelectorAll('.tab-button');
    
    tabContents.forEach(content => {
        content.classList.remove('active');
        const inputs = content.querySelectorAll('input');
        inputs.forEach(input => input.disabled = true); // Disable inputs in inactive tabs
    });
    tabButtons.forEach(button => button.classList.remove('active'));
    
    const activeTab = document.getElementById(tabName);
    activeTab.classList.add('active');
    const activeInputs = activeTab.querySelectorAll('input');
    activeInputs.forEach(input => input.disabled = false); // Enable inputs in the active tab
    
    event.currentTarget.classList.add('active');
}

function showPopupAndSubmit() {
    alert("Registering complete. Please wait for your account to be verified.");
    return true; // Allow form submission to proceed
}

// Disable inputs in the inactive tab on page load
document.addEventListener('DOMContentLoaded', () => {
    const activeTab = document.querySelector('.tab-content.active');
    const inactiveTabs = document.querySelectorAll('.tab-content:not(.active)');
    inactiveTabs.forEach(tab => {
        const inputs = tab.querySelectorAll('input');
        inputs.forEach(input => input.disabled = true);
    });
});
</script>
