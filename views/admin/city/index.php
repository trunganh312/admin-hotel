<?php
include_once __DIR__ . "/../../../config/connection.php";
include_once __DIR__ . "/../../../controllers/CityController.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!$_SESSION['username']) {
    header("Location: /views/auth/login.php");
    exit();
}
$cityController = new CityController($conn);

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

switch ($action) {
    case 'create':
        $cityController->create();
        break;
    case 'edit':
        $cityController->edit($id);
        break;
    case 'delete':
        $cityController->delete($id);
        break;
        // case 'delete_image':
        //     $id_image = isset($_GET['id_image']) ? intval($_GET['id_image']) : 0;
        //     $hotelController->deleteImage($id_image);
        //     break;
    default:
        $cityController->getAllCities();
        break;
}
