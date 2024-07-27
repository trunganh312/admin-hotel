<?php
// app/models/Image.php
class Config
{
    private $conn;
    private $table = 'config';
    public $hotline;
    public $email;
    public $id;
    public $facebook_link;
    public $instagram_link;
    public $is_visible;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Get all
    public function getAll()
    {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // Get by ID
    public function getById($id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id =?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Thêm mới
    public function create($hotline, $email, $facebook_link, $instagram_link, $is_visible)
    {
        $query = 'INSERT INTO ' . $this->table . '(hotline, email, facebook_link, instagram_link, is_visible) VALUES (?,?,?,?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('sssss', $hotline, $email, $facebook_link, $instagram_link, $is_visible);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Sửa
    public function update($id, $hotline, $email, $facebook_link, $instagram_link, $is_visible)
    {
        $query = 'UPDATE ' . $this->table . 'SET hotline =?, email =?, facebook_link =?, instagram_link =?, is_visible =? WHERE id =?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('sssssi', $hotline, $email, $facebook_link, $instagram_link, $is_visible, $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Xóa
    public function delete($id)
    {
        $query = 'DELETE FROM ' . $this->table . 'WHERE id =?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Lấy ra config được hiển thị
    public function getVisibleConfig()
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE is_visible = 1 LIMIT 1';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    // change visible config
    public function changeVisibleConfig($id, $is_visible)
    {
        $query = 'UPDATE ' . $this->table . ' SET is_visible =? WHERE id =?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ii', $is_visible, $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Edit
    public function editConfig($id, $hotline, $email, $facebook_link, $instagram_link, $is_visible)
    {
        $query = 'UPDATE ' . $this->table . ' SET is_visible =?, hotline =?, email =?, facebook_link =?, instagram_link =? WHERE id =?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('sssssi', $is_visible, $hotline, $email, $facebook_link, $instagram_link, $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Xóa
    public function deleteConfig($id)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id =?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
