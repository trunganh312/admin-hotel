<?php
class Hotel {
    public $conn;
    private $table = 'hotels';

    public $id;
    public $name;
    public $rate;
    public $address;
    public $description;
    public $phone;
    public $number_of_rooms;
    public $email;
    public $website;
    public $location_id;
    public $type;
    public $latitude;
    public $longitude;
    public $amenities = array();
    public $hotel_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = 'SELECT * FROM ' . $this->table;
        $result = $this->conn->query($query);
        return $result;
    }

    // Tạo mới hotel
    public function create() {
        $query = 'INSERT INTO ' . $this->table . ' (id,name, rate, address, description, phone, number_of_rooms, email, website, latitude, longitude, type) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param('isssssssssss',$this->hotel_id, $this->name, $this->rate, $this->address, $this->description, $this->phone, $this->number_of_rooms, $this->email, $this->website, $this->latitude, $this->longitude, $this->type);

        if($stmt->execute()) {
            foreach ($this->amenities as $amenity_id) {
                $stmt = $this->conn->prepare("INSERT INTO hotel_amenities (hotel_id, amenity_id) VALUES (?, ?)");
                $stmt->bind_param("ii", $this->hotel_id, $amenity_id);
                $stmt->execute();
                $stmt->close();
            }
            return true;
            
        }
       

        return false;
    }

    // Update hotel
    public function update() {
        $query = 'UPDATE ' . $this->table . ' SET name = ?, rate = ?, address = ?, description = ?, phone = ?, number_of_rooms = ?, email = ?, website = ?, latitude = ?, longitude = ?, type = ? WHERE id = ?';
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param('sssssssssssi', $this->name, $this->rate, $this->address, $this->description, $this->phone, $this->number_of_rooms, $this->email, $this->website, $this->latitude,$this->longitude, $this->type, $this->id);



        if($stmt->execute()) {
            $this->manageAmenities($this->amenities, $this->id);
            return true;
        }
        return false;
    }

    // Xóa hotel
    public function delete() {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = ?';
        $stmt = $this->conn->prepare($query);
        
        $stmt->bind_param('i', $this->id);
        if($this->deleteAmenitiesByHotelId($this->id)) {
            $stmt->execute();
            return true;
        }
        return false;
    }

    // Lấy danh sách khách sạn với tùy chọn lọc và sắp xếp
    public function getHotels($filter = [], $sort = '') {
        $sql = "SELECT * FROM hotels WHERE 1=1";
        
        // Áp dụng filter
        $params = [];
        $types = '';

        if (!empty($filter['type'])) {
            $sql .= " AND type = ?";
            $params[] = $filter['type'];
            $types .= 's';
        }

        if (!empty($filter['name'])) {
            $sql .= " AND name LIKE ?";
            $params[] = "%" . $filter['name'] . "%";
            $types .= 's';
        }

        // Áp dụng sort
        if (!empty($sort)) {
            $allowedSortFields = ['name', 'type'];
            if (in_array($sort, $allowedSortFields)) {
                $sql .= " ORDER BY " . $sort;
            }
        }
        $stmt = $this->conn->prepare($sql);

        // Liên kết tham số nếu có
        if (!empty($params)) {
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $hotels = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();

        return $hotels;
    }

      // Lấy tất cả tiện nghi
      public function getAmenities() {
        $stmt = $this->conn->prepare("SELECT * FROM amenities");
        $stmt->execute();
        $result = $stmt->get_result();
        $amenities = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $amenities;
    }

    // Lấy tất cả nhóm tiện nghi
    public function getAmenityGroups() {
        $stmt = $this->conn->prepare("SELECT * FROM amenity_groups");
        $stmt->execute();
        $result = $stmt->get_result();
        $groups = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $groups;
    }

    // Lấy ra tiện nghi thuộc hotel_id
    public function getAmenitiesByHotelId($hotel_id) {
        $query = 'SELECT amenities.* FROM amenities INNER JOIN hotel_amenities ON amenities.id = hotel_amenities.amenity_id WHERE hotel_amenities.hotel_id =?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $hotel_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $amenities = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $amenities;
    }

    // Nhận vào mảng tiện nghi và hotel id, kiểm tra xem tiện nghi của hotel đó đã có trong db hay chưa, nếu chưa có thì tạo mới, nếu có thì thôi, nếu không có thì xóa 
    public function manageAmenities($amenities, $hotel_id) {
        $currentAmenities = $this->getAmenitiesByHotelId($hotel_id);
        $amenitiesToAdd = array_diff($amenities, array_column($currentAmenities, 'id'));
        $amenitiesToRemove = array_diff(array_column($currentAmenities, 'id'), $amenities);
        foreach ($amenitiesToAdd as $amenity_id) {
            $stmt = $this->conn->prepare("INSERT INTO hotel_amenities (hotel_id, amenity_id) VALUES (?,?)");
            $stmt->bind_param("ii", $hotel_id, $amenity_id);
            $stmt->execute();
            $stmt->close();
        }
        foreach ($amenitiesToRemove as $amenity_id) {
            $stmt = $this->conn->prepare("DELETE FROM hotel_amenities WHERE hotel_id =? AND amenity_id =?");
            $stmt->bind_param("ii", $hotel_id, $amenity_id);
            $stmt->execute();
            $stmt->close();
        }
        return true;
    }
    

    // Xóa tiện ích theo hotel_id
    public function deleteAmenitiesByHotelId($hotel_id) {
        $stmt = $this->conn->prepare("DELETE FROM hotel_amenities WHERE hotel_id =?");
        $stmt->bind_param("i", $hotel_id);
        $stmt->execute();
        $stmt->close();
        return true;
    }
}
