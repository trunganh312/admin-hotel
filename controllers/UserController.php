<?php
include __DIR__ . '/../models/UserModel.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class UserController {
    private $model;

    public function __construct($mysqli) {
        $this->model = new UserModel($mysqli);
    }

    // Xử lý yêu cầu đăng ký
    public function register() {
        // Check xem đăng nhập chưa. Nếu r thì k cho vào trang này nữa
       
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $firstname = $_POST['firstname'] ?? '';
            $lastname = $_POST['lastname'] ?? '';
            $fullname = $firstname . ' ' . $lastname;
            $errors = [];

            if(empty($username)) {
                $errors['username'] = 'Username không được để trống.';
            } else {
                if($this ->isValidUsername($username)) {
                    $errors['username'] = 'Username không đúng định dạng.';
                }
                if($this->checkUsernameExists($username)) {
                    $errors['username'] = 'Username đã tồn tại.';
                }
            }
            if(empty($password)) {
                $errors['password'] = 'Password không được để trống.';
            }
            if(empty($firstname)) {
                $errors['firstname'] = 'First name không được để trống.';
            }
            if(empty($lastname)) {
                $errors['lastname'] = 'Last name không được để trống.';
            }
            

           if(empty($errors)) {
            $this->model->register($username, $password, $fullname);
            header('Location: login.php'); // Chuyển hướng đến trang chào mừng sau khi đăng nhập
            exit();
            
           }
        }

        require __DIR__ . '/../views/auth/register.php';
    }

    // Xử lý yêu cầu đăng nhập
    public function login() {
        // Kiểm tra nếu người dùng đã đăng nhập
        $message = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
            $errors = [];

            if(empty($username)) {
                $errors['username'] = 'Username không được để trống.';
            } else {
                if($this ->isValidUsername($username)) {
                    $errors['username'] = 'Username không đúng định dạng.';
                }
            }
            if(empty($password)) {
                $errors['password'] = 'Password không được để trống.';
            }

            if(empty($errors)) {
                if($this->model->login($username, $password)) {
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
    public function logout() {
        session_destroy();
        header('Location: login.php'); // Chuyển hướng đến trang đăng nhập
        exit();
    }

    // Kiểm tra username
    function isValidUsername($username) {
        // Định nghĩa mẫu biểu thức chính quy cho tên người dùng
        $pattern = '/^[a-zA-Z0-9_\.]{5,20}$/'; // Cho phép chữ cái, số, dấu gạch dưới, và dấu chấm, độ dài từ 5 đến 20 ký tự
    
        // Kiểm tra tên người dùng với biểu thức chính quy
        if (preg_match($pattern, $username)) {
            return true; // Tên người dùng hợp lệ
        } else {
            return false; // Tên người dùng không hợp lệ
        }
    }


    // Check username exists
    function checkUsernameExists($username) {
        return $this->model->checkUsernameExists($username);
    }

    // get me
    public function getMe($username) {
        return $this->model->getMe($username);
    }

    // Upload image avatar 
    public function uploadImagesAvatar( $file, $folder) {
        $upload_dir = '../../../uploads/'.$folder.'/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $current_timestamp = time();
        $fileName = basename($file['name']);
        $file_path = $current_timestamp. '_'. $fileName;
        $root_path = $upload_dir. $file_path;
        if (move_uploaded_file($file['tmp_name'], $root_path)) {
            return $file_path;
        }
    }

}
?>
