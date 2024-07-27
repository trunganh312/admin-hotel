<?php
include_once __DIR__ . "/../../../config/connection.php";
include_once __DIR__ . "/../../../controllers/UserController.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!$_SESSION['username']) {
    header("Location: /views/auth/login.php");
    exit();
}
$userController = new UserController($conn);

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

switch ($action) {
    case 'create':
        $userController->create();
        break;
    case 'edit':
        $userController->edit($id);
        break;
    case 'delete':
        $userController->delete($id);
        break;
        // case 'delete_image':
        //     $id_image = isset($_GET['id_image']) ? intval($_GET['id_image']) : 0;
        //     $hotelController->deleteImage($id_image);
        //     break;
    default:
        $userController->getAllUsers();
        break;
}
