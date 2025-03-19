<?php
include '../../header.php';
?>
<link rel="stylesheet" type="text/css" href="../../css/styles.css">

<div class="login-container">
    <form action="process_login.php" method="POST" class="login-form">
        <h2>Login</h2>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <?php
        if (isset($_GET['error'])) {
            if ($_GET['error'] === 'email_not_found') {
                echo "<p style='color: #df5252; text-align: center; margin-bottom: 10px;'>Email is not registered.</p>";
            } elseif ($_GET['error'] === 'incorrect_password') {
                echo "<p style='color: #df5252; text-align: center; margin-bottom: 10px;'>Invalid password.</p>";
            } elseif ($_GET['error'] === 'email_not_verified') {
                echo "<p style='color: #df5252; text-align: center; margin-bottom: 10px;'>Email not yet verified.</p>";
            }
        }
        ?>
        
        <button type="submit">Login</button>
        <p class="register-link">
            Don't have an account? <a href="register.php">Register here</a>
        </p>
    </form>
</div>


