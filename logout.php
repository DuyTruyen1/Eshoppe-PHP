<?php
// Khởi động session
session_start();

// Xóa tất cả các biến session
$_SESSION = array();

// Hủy session
session_destroy();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
    <header>
        <ul id="menu">
            <?php
            if (isset($_SESSION['email']) && $_SESSION['password'] === true) {
                echo '<li><a href="logout.php">Logout</a></li>';
            }else {
                echo '<li><a href="login.php">Login</a></li>';
                echo '<li><a href="register.php">Register</a></li>';
            }
            ?>
        </ul>
    </header>
</body>
</html>
