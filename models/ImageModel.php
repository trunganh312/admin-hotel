<?php
// app/models/Image.php
class Image {
    private $conn;
    private $table = 'images';

    public $id;
    public $hotel_id;
    public $name;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Tạo mới ảnh
    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (hotel_id, name) VALUES (?, ?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('is', $this->hotel_id, $this->name);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }


    // Lấy ra tất cả các ảnh thuộc hotel_id
    public function getImagesByHotelId($hotel_id) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE hotel_id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $hotel_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Xóa ảnh
    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Lấy ảnh theo id
    public function getImageById($id) {
        $query = 'SELECT * FROM ' . $this->table . ' WHERE id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Xóa ảnh theo hotel id 
    public function deleteByHotelId($hotel_id) {
        $query = 'DELETE FROM '. $this->table.' WHERE hotel_id =?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $hotel_id); 
    
        if($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
