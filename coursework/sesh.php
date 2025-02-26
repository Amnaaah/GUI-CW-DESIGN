<?php
session_start();

// Check if user is logged in
if (isset($_SESSION['username'])) 
{
    $username = $_SESSION['username'];
} else 
{
    $username = 'Guest';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User Page</title>
    <link rel="stylesheet" href="sesh.css">
</head>
<body>

    <div class="container">
        <h1 id="greeting">Hello, <?php echo $username; ?></h1>

        <div class="user-options">
            <button id="login-btn" onclick="login()">Login</button>
            <form action="logout.php" method="POST" id="logout-form" style="display: none;">
                <button type="submit">Logout</button>
            </form>
            <button id="admin-btn" onclick="adminLogin()">Admin</button>
        </div>
    </div>

    <script>

        // Show/Hide login/logout buttons based on session
        window.onload = function() 
        {
            const loginBtn = document.getElementById("login-btn");
            const logoutForm = document.getElementById("logout-form");

            <?php if (isset($_SESSION['username'])): ?>
                loginBtn.style.display = 'none';  // Hide login button if logged in
                logoutForm.style.display = 'inline-block';  // Show logout form
            <?php endif; ?>
        }

        function login() 
        {
            window.location.href = "login.php";
        }

        function adminLogin() {
            const adminUsername = prompt("Enter Admin username:");
            const adminPassword = prompt("Enter Admin password:");

            if (adminUsername === 'admin' && adminPassword === 'admin123') 
            {
                window.location.href = "admin.html";
            }
             else 
            {
                alert("Incorrect admin credentials!");
            }
        }
    
    </script>
</body>
</html>

