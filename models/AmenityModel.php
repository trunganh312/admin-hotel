<?php
// app/models/Image.php
class Amenity
{
    private $conn;
    private $table = 'amenities';

    public $id;
    public $group_id;
    public $name;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Thêm mới tiện nghi
    public function create()
    {
        $query = 'INSERT INTO ' . $this->table . ' (group_id, name) VALUES (?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('is', $this->group_id, $this->name);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Xóa tiện nghi
    public function delete()
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id =?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Sửa
    public function update()
    {
        $query = 'UPDATE ' . $this->table . ' SET group_id =?, name =? WHERE id =?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('isi', $this->group_id, $this->name, $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Lấy tất cả tiện nghi kèm tên group
    public function getAll()
    {
        $query = 'SELECT a.*, ag.name AS group_name FROM ' . $this->table . ' a INNER JOIN amenity_groups ag ON a.group_id = ag.id ';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy theo id
    public function getById($id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id =?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
