<?php
class UserModel
{
    private $mysqli;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    // Đăng ký người dùng
    public function register($username, $password, $fullname)
    {



        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Tạo câu lệnh sql
        $sql = "INSERT INTO admin (username, password, full_name) VALUES (?, ?, ?)";

        // Chuẩn bị câu lệnh SQL
        $stmt = $this->mysqli->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . $this->mysqli->error);
        }

        // Liên kết tham số và thực thi
        $stmt->bind_param('sss', $username, $hashedPassword, $fullname);
        $result = $stmt->execute();

        // Đóng câu lệnh và trả về kết quả
        $stmt->close();
        return $result;
    }

    // Đăng nhập người dùng
    public function login($username, $password)
    {

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        // Chuẩn bị câu lệnh SQL
        $stmt = $this->mysqli->prepare("SELECT password FROM admin WHERE username = ?");
        if ($stmt === false) {
            die('Prepare failed: ' . $this->mysqli->error);
        }

        // Liên kết tham số và thực thi
        $stmt->bind_param('s', $username);
        $stmt->execute();


        $storeHashedPassword = "";

        // Lấy kết quả
        $stmt->bind_result($storeHashedPassword);
        $stmt->fetch();

        // So sánh mật khẩu và trả về kết quả
        $result = password_verify($password, $storeHashedPassword);



        // Đóng câu lệnh và trả về kết quả
        $stmt->close();
        return $result;
    }

    // Check username exists
    public function checkUsernameExists($username)
    {
        // Chuẩn bị câu lệnh SQL
        $stmt = $this->mysqli->prepare("SELECT COUNT(*) FROM admin WHERE username = ?");
        if ($stmt === false) {
            die('Prepare failed: ' . $this->mysqli->error);
        }

        // Liên kết tham số và thực thi
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $count = 0;

        // Lấy kết quả
        $stmt->bind_result($count);
        $stmt->fetch();

        return $count > 0;
    }

    // Get me
    public function getMe($username)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM admin WHERE username =?");
        if ($stmt === false) {
            die('Prepare failed: ' . $this->mysqli->error);
        }

        // Liên kết tham số và thực thi
        $stmt->bind_param('s', $username);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_assoc();
    }

    // Get all users
    public function getAllUsers()
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM admin");
        if ($stmt === false) {
            die('Prepare failed: ' . $this->mysqli->error);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Create user
    public function createUser($username, $password, $fullname, $avatar)
    {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->mysqli->prepare("INSERT INTO admin (username, password, full_name, avatar) VALUES (?,?,?,?)");
        if ($stmt === false) {
            die('Prepare failed: ' . $this->mysqli->error);
        }
        $stmt->bind_param('ssss', $username, $hashedPassword, $fullname, $avatar);

        return $stmt->execute();
    }

    // Get user by id
    public function getUserById($id)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM admin WHERE id =?");
        if ($stmt === false) {
            die('Prepare failed: ' . $this->mysqli->error);
        }
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // update user 
    public function updateUser($id, $username, $password, $fullname, $avatar)
    {
        // Kiểm tra xem có thay đổi password không

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $this->mysqli->prepare("UPDATE admin SET username =?, password =?, full_name =?, avatar =? WHERE id =?");
        if ($stmt === false) {
            die('Prepare failed: ' . $this->mysqli->error);
        }
        $stmt->bind_param('ssssi', $username, $hashedPassword, $fullname, $avatar, $id);
        return $stmt->execute();
    }

    // Delete user
    public function deleteUser($id)
    {
        $stmt = $this->mysqli->prepare("DELETE FROM admin WHERE id =?");
        if ($stmt === false) {
            die('Prepare failed: ' . $this->mysqli->error);
        }
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}
