<?php
// app/models/Image.php
class District
{
    private $conn;
    private $table = 'district';

    public $id;
    public $city_id;
    public $name;
    public $image;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Lấy danh sách quận thuộc city_id
    public function getDistrictsByCityId($city_id = 1)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE city_id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $city_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // get district by id
    public function getDistrictById($id)
    {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id =?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Lấy danh sách các huyện kèm theo tên tỉnh theo city_id
    public function getAllDistricts()
    {
        $query = 'SELECT d.*, c.name AS city_name FROM ' . $this->table . ' d JOIN city c ON d.city_id = c.id';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Thêm mới quận
    public function create()
    {
        $query = 'INSERT INTO ' . $this->table . ' (city_id, name, image) VALUES(?,?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('iss', $this->city_id, $this->name, $this->image);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Sửa
    public function update()
    {
        $query = 'UPDATE ' . $this->table . ' SET city_id=?, name=?, image=? WHERE id=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('issi', $this->city_id, $this->name, $this->image, $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Xóa
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
}
