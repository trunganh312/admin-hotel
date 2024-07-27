<?php
// app/models/Image.php
class GroupAmentity
{
    private $conn;
    private $table = 'amenity_groups';

    public $name;
    public $id;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Tạo mới
    public function create()
    {
        $query = 'INSERT INTO ' . $this->table . ' (name) VALUES (?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $this->name);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Sửa
    public function update()
    {
        $query = 'UPDATE ' . $this->table . ' SET name =? WHERE id =?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('si', $this->name, $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Xóa
    public function delete($id)
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id =?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
            return true;
        }
    }

    // Get by id
    public function getById($id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id =?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Get all
    public function getAll()
    {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
}
