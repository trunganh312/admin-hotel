<?php
include_once __DIR__ . "/../../../config/connection.php";
include_once __DIR__ . "/../../../controllers/AmenityController.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!$_SESSION['username']) {
    header("Location: /views/auth/login.php");
    exit();
}
$amenityController = new AmenityController($conn);

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

switch ($action) {
    case 'create':
        $amenityController->create();
        break;
    case 'edit':
        $amenityController->edit($id);
        break;
    case 'delete':
        $amenityController->delete($id);
        break;
    default:
        $amenityController->getAll();
        break;
}
