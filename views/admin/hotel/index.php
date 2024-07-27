<?php
include_once __DIR__ . "/../../../config/connection.php";
include_once __DIR__ . "/../../../controllers/HotelController.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!$_SESSION['username']) {
    header("Location: /views/auth/login.php");
    exit();
}
$hotelController = new HotelController($conn);

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';



switch ($action) {
    case 'create':
        $hotelController->create();
        break;
    case 'edit':
        $hotelController->edit($id);
        break;
    case 'delete':
        $hotelController->delete($id);
        break;
    case 'delete_image':
        $id_image = isset($_GET['id_image']) ? intval($_GET['id_image']) : 0;
        $hotelController->deleteImage($id_image);
        break;
    case 'update_promotion':
        $hotelId = $_POST['hotel_id'];
        $promotion = $_POST['promotion'];
        $hotelController->updatePromotion($hotelId, $promotion);
        break;
    case 'update_hot':
        $hotelId = $_POST['hotel_id'];
        $hot = $_POST['hot'];
        $hotelController->updateHot($hotelId, $hot);
        break;
    default:
        $hotelController->index();
        break;
}
