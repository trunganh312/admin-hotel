<?php
include_once __DIR__ . '/../models/UserModel.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class UserController
{
    private $model;

    public function __construct($mysqli)
    {
        $this->model = new UserModel($mysqli);
    }

    // Xử lý yêu cầu đăng ký
    public function register()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username   = $_POST['username'] ?? '';
            $password   = $_POST['password'] ?? '';
            $firstname  = $_POST['firstname'] ?? '';
            $lastname   = $_POST['lastname'] ?? '';
            $fullname   = $firstname . ' ' . $lastname;
            $errors     = [];

            if (empty($username)) {
                $errors['username'] = 'Username không được để trống.';
            } else {
                if ($this->isValidUsername($username)) {
                    $errors['username'] = 'Username không đúng định dạng.';
                }
                if ($this->checkUsernameExists($username)) {
                    $errors['username'] = 'Username đã tồn tại.';
                }
            }
            if (empty($password)) {
                $errors['password'] = 'Password không được để trống.';
            }
            if (empty($firstname)) {
                $errors['firstname'] = 'First name không được để trống.';
            }
            if (empty($lastname)) {
                $errors['lastname'] = 'Last name không được để trống.';
            }


            if (empty($errors)) {
                $this->model->register($username, $password, $fullname);
                header('Location: login.php'); // Chuyển hướng đến trang chào mừng sau khi đăng nhập
                exit();
            }
        }

        require __DIR__ . '/../views/auth/register.php';
    }

    // Xử lý yêu cầu đăng nhập
    public function login()
    {
        // Kiểm tra nếu người dùng đã đăng nhập
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username   = $_POST['username'] ?? '';
            $password   = $_POST['password'] ?? '';
            $errors     = [];

            if (empty($username)) {
                $errors['username'] = 'Username không được để trống.';
            } else {
                if ($this->isValidUsername($username)) {
                    $errors['username'] = 'Username không đúng định dạng.';
                }
            }
            if (empty($password)) {
                $errors['password'] = 'Password không được để trống.';
            }

            if (empty($errors)) {
                if ($this->model->login($username, $password)) {
                    $message = 'Login successful!';
                    // Có thể lưu thông tin người dùng vào session ở đây

                    $_SESSION['username'] = $username; // Lưu tên người dùng vào session
                    header('Location:../admin/index.php'); // Chuyển hướng đến trang chào mừng sau khi đăng nhập
                    exit();
                } else {
                    $message = 'Username hoặc password không đúng.';
                }
            }
        }

        require __DIR__ . '/../views/auth/login.php';
    }

    // Xử lý đăng xuất
    public function logout()
    {
        session_destroy();
        header('Location: login.php'); // Chuyển hướng đến trang đăng nhập
        exit();
    }

    // Kiểm tra username
    function isValidUsername($username)
    {
        // Định nghĩa mẫu biểu thức chính quy cho tên người dùng
        $pattern = '/^{5,20}$/'; // Cho phép chữ cái, số, dấu gạch dưới, và dấu chấm, độ dài từ 5 đến 20 ký tự

        // Kiểm tra tên người dùng với biểu thức chính quy
        if (preg_match($pattern, $username)) {
            return true; // Tên người dùng hợp lệ
        } else {
            return false; // Tên người dùng không hợp lệ
        }
    }


    // Check username exists
    function checkUsernameExists($username)
    {
        return $this->model->checkUsernameExists($username);
    }

    // get me
    public function getMe($username)
    {
        return $this->model->getMe($username);
    }

    // get all users 
    public function getAllUsers()
    {
        $users =  $this->model->getAllUsers();

        require __DIR__ . '/../views/admin/user/list.php';
    }

    // Create user
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username       =   $_POST['username'] ?? '';
            $password       =   $_POST['password'] ?? '';
            $fullname       =   $_POST['fullname'] ?? '';
            $errors         =   [];

            if (empty($username)) {
                $errors['username'] = 'Username không được để trống.';
            } else {
                if ($this->checkUsernameExists($username)) {
                    $errors['username'] = 'Username đã tồn tại.';
                }
            }
            if (empty($password)) {
                $errors['password'] = 'Password không được để trống.';
            }
            if (empty($fullname)) {
                $errors['fullname'] = 'Họ và tên không được để trống.';
            }

            if (empty($errors)) {
                if (isset($_FILES['avatar'])) {
                    $avatar =  $this->uploadAvatar($_FILES['avatar'], 'avatars');
                    $this->model->createUser($username, $password, $fullname, $avatar);
                    header('Location: /views/admin/user/index.php?mod=user');
                    exit();
                }
            }
        }
        require __DIR__ . '/../views/admin/user/create.php';
    }

    // Upload avatar
    private function uploadAvatar($file, $folder)
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

    // Delete avatar 
    public function deleteAvatar($username)
    {
    }

    // Edit user
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $fullname = $_POST['fullname'] ?? '';
            $errors = [];
            // Kiểm tra lỗi
            if (empty($password)) {
                $errors['password'] = 'Password không được để trống.';
            }
            if (empty($fullname)) {
                $errors['fullname'] = 'Họ và tên không được để trống.';
            }

            // Kiểm tra và xử lý file ảnh
            if (empty($errors)) {
                if (isset($_FILES['avatar'])) {
                    $avatar = $this->uploadAvatar($_FILES['avatar'], 'avatars');
                } else {
                    $avatar = null; // Hoặc một giá trị mặc định nếu không có ảnh
                }

                // Cập nhật thông tin người dùng
                $this->model->updateUser($id, $username, $password, $fullname, $avatar);

                // Chuyển hướng sau khi cập nhật
                header('Location: /views/admin/user/index.php?mod=user');
                exit();
            } else {
                // Nếu có lỗi, quay lại trang chỉnh sửa với các lỗi
                require __DIR__ . '/../views/admin/user/edit.php';
            }
        } else {
            // Lấy thông tin người dùng và hiển thị trang chỉnh sửa
            $user = $this->model->getUserById($id);
            require __DIR__ . '/../views/admin/user/edit.php';
        }
    }

    // Delete user
    public function delete($id)
    {
        $this->model->deleteUser($id);
        header('Location: /views/admin/user/index.php?mod=user');
        exit();
    }
}
