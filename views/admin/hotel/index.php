<?php
include "../../../config/connection.php";
include "../../../controllers/HotelController.php";
include "../../../sesstion.php";
    if(!$_SESSION['username']) {
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
    default:
        $hotelController->index();
        break;
}
