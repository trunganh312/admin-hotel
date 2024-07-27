<?php
// app/models/Image.php
class City
{
    private $conn;
    private $table = 'city';

    public $name;
    public $id;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Lấy danh sách các tỉnh
    public function getCities()
    {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Tạo mới tỉnh
    public function create()
    {
        $query = 'INSERT INTO ' . $this->table . '(name) VALUES(?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $this->name);
        if ($stmt->execute()) {
            return true;
        }
    }

    // Sửa tỉnh
    public function update()
    {
        $query = 'UPDATE ' . $this->table . ' SET name = ? WHERE id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('si', $this->name, $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Lấy ra 1 tỉnh
    public function getById($id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id =?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // xóa
    public function delete($id)
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
