<?php
include_once __DIR__ . "/../../../config/connection.php";
include_once __DIR__ . "/../../../controllers/GroupAmentityController.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!$_SESSION['username']) {
    header("Location: /views/auth/login.php");
    exit();
}
$groupAmenityController = new GroupAmentityController($conn);

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

switch ($action) {
    case 'create':
        $groupAmenityController->create();
        break;
    case 'edit':
        $groupAmenityController->edit($id);
        break;
    case 'delete':
        $groupAmenityController->delete($id);
        break;
        // case 'delete_image':
        //     $id_image = isset($_GET['id_image']) ? intval($_GET['id_image']) : 0;
        //     $hotelController->deleteImage($id_image);
        //     break;
    default:
        $groupAmenityController->getAll();
        break;
}
