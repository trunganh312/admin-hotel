<?php
include_once __DIR__ . "/../../../config/connection.php";
include_once __DIR__ . "/../../../controllers/DistrictController.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!$_SESSION['username']) {
    header("Location: /views/auth/login.php");
    exit();
}
$districtController = new DistrictController($conn);

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

switch ($action) {
    case 'create':
        $districtController->create();
        break;
    case 'edit':
        $districtController->edit($id);
        break;
    case 'delete':
        $districtController->delete($id);
        break;
    default:
        $districtController->getAllDistricts();
        break;
}
