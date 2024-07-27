<?php
include_once __DIR__ . "/../../../config/connection.php";
include_once __DIR__ . "/../../../controllers/PostController.php";
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!$_SESSION['username']) {
    header("Location: /views/auth/login.php");
    exit();
}

$postController = new PostController($conn);

$action = isset($_GET['action']) ? $_GET['action'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';

switch ($action) {
    case 'create':
        $postController->create();
        break;
    case 'edit':
        $postController->edit($id);
        break;
    case 'delete':
        $postController->delete($id);
        break;
    case 'change_post':
        $postId = $_POST['post_id'];
        $isShow = $_POST['isShow'];
        $postController->changeStatus($postId, $isShow);
        break;
    default:
        $postController->getAllPosts();
        break;
}
