<?php
include "../../config/connection.php";
include "../../controllers/UserController.php";

// Xử lý yêu cầu
$action = $_GET['action'] ?? 'login';

$controller = new UserController($conn);

switch ($action) {
    case 'register':
        $controller->register();
        break;
    case 'login':
        $controller->login();
        break;
    case 'logout':
        $controller->logout();
        break;
    default:
        $controller->login();
        break;
}
?>
