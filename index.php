<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(!$_SESSION['username']) {
        header("Location: views/auth/login.php");
        exit(); 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>
<body>
    <h1>Welcome: <?php echo $_SESSION["username"] ?></h1>
    <form method="post" action="views/auth/index.php?action=logout">
        <button type="submit">Đăng xuất</button>
    </form>
</body>
</html>