<?php
include_once __DIR__ . '/../models/PostModel.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class PostController
{
    private $postModel;

    public function __construct($mysqli)
    {
        $this->postModel = new Post($mysqli);
    }

    // Get all posts
    public function getAllPosts()
    {
        $posts = $this->postModel->getAllPost();
        require __DIR__ . '/../views/admin/post/list.php';
    }

    // Thêm mới
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postModel->title = $_POST['title'] ?? '';
            $this->postModel->content = $_POST['content'] ?? '';
            $this->postModel->is_visible = $_POST['show'] ?? 0;
            if (isset($_FILES['thumbnail'])) {
                $thumbnail_path = $this->uploadThumbnail($_FILES['thumbnail'], 'post_thumbnail');
                $this->postModel->thumbnail = $thumbnail_path;
                $this->postModel->create();
                header('Location: /views/admin/post/index.php');
                exit();
            }
        }
        require __DIR__ . '/../views/admin/post/create.php';
    }

    // Change status post
    public function changeStatus($postId, $status)
    {
        $this->postModel->changeStatus($postId, $status);
    }

    // Upload thumbnail
    private function uploadThumbnail($file, $folder = 'post_thumbnail')
    {
        // Đường dẫn thư mục tải lên
        $upload_dir = '../../../uploads/' . $folder . '/';

        // Tạo thư mục nếu chưa tồn tại
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Kiểm tra nếu có lỗi khi tải lên
        if ($file['error'] !== UPLOAD_ERR_OK) {
            throw new Exception('File upload error: ' . $file['error']);
        }

        // Đặt tên tệp duy nhất
        $current_timestamp = time();
        $file_name = basename($file['name']);
        $file_path = $current_timestamp . '_' . $file_name;
        $root_path = $upload_dir . $file_path;

        // Di chuyển tệp từ tạm thời đến thư mục tải lên
        if (move_uploaded_file($file['tmp_name'], $root_path)) {
            return $file_path; // Trả về tên tệp 
        } else {
            throw new Exception('Failed to move uploaded file.');
        }
    }

    // Edit
    public function edit($postId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->postModel->id = $postId;
            $this->postModel->title = $_POST['title'] ?? '';
            $this->postModel->content = $_POST['content'] ?? '';
            $this->postModel->is_visible = $_POST['show'] ?? 0;
            if (isset($_FILES['thumbnail'])) {
                $thumbnail_path = $this->uploadThumbnail($_FILES['thumbnail'], 'post_thumbnail');
                $this->postModel->thumbnail = $thumbnail_path;
                $this->postModel->update();
            }
            header('Location: /views/admin/post/index.php');

            exit();
        } else {

            $post = $this->postModel->getById($postId);

            require __DIR__ . '/../views/admin/post/edit.php';
        }
    }

    // Xóa
    public function delete($postId)
    {
        $this->postModel->delete($postId);
        header('Location: /views/admin/post/index.php');
        exit();
    }

    // Get 5 bài post được show
    public function getShowPost()
    {
        $posts = $this->postModel->getShowPost();
        return $posts;
    }

    // Get detail post
    public function getDetailPost($postId)
    {
        $post = $this->postModel->getById($postId);
        return $post;
    }
}
