<?php
include_once __DIR__ . "/../../../config/connection.php";
include_once __DIR__ . "/../../../controllers/ConfigController.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!$_SESSION['username']) {
    header("Location: /views/auth/login.php");
    exit();
}

$configController = new ConfigController($conn);

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

switch ($action) {
    case 'create':
        $configController->create();
        break;
    case 'edit':
        $configController->edit($id);
        break;
    case 'delete':
        $configController->delete($id);
        break;
    case 'change_config':
        $configId = $_POST['config_id'];
        $isVisible = $_POST['isVisible'];
        $configController->changeVisible($configId, $isVisible);
        break;
    default:
        $configController->getAll();
        break;
}
