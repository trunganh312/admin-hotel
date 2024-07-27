<?php
include_once __DIR__ . '/../models/ImageModel.php';
class Hotel
{
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
    public $type;
    public $latitude;
    public $longitude;
    public $amenities = array();
    public $hotel_id;
    public $imageModel;
    public $isPromotion;
    public $isHot;
    public $city_id;
    public $district_id;

    public function __construct($db)
    {
        $this->conn = $db;
        $this->imageModel = new Image($db);
    }

    public function read()
    {
        $query = 'SELECT * FROM ' . $this->table;
        $result = $this->conn->query($query);
        return $result;
    }

    // Tạo mới hotel
    public function create()
    {
        $query = 'INSERT INTO ' . $this->table . ' (id,name, rate, address, description, phone, number_of_rooms, email, website, latitude, longitude, type, promotion, city_id, district_id, is_hot) VALUES (?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param('isssssssssssssss', $this->hotel_id, $this->name, $this->rate, $this->address, $this->description, $this->phone, $this->number_of_rooms, $this->email, $this->website, $this->latitude, $this->longitude, $this->type, $this->isPromotion, $this->city_id, $this->district_id, $this->isHot);

        if ($stmt->execute()) {
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
    public function update()
    {
        $query = 'UPDATE ' . $this->table . ' SET name = ?, rate = ?, address = ?, description = ?, phone = ?, number_of_rooms = ?, email = ?, website = ?, latitude = ?, longitude = ?, type = ?, promotion = ?, city_id = ?, district_id = ?, is_hot = ? WHERE id = ?';
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param('sssssssssssssssi', $this->name, $this->rate, $this->address, $this->description, $this->phone, $this->number_of_rooms, $this->email, $this->website, $this->latitude, $this->longitude, $this->type, $this->isPromotion, $this->city_id, $this->district_id, $this->isHot, $this->id);

        if ($stmt->execute()) {
            $this->manageAmenities($this->amenities, $this->id);
            return true;
        }
        return false;
    }

    // Xóa hotel
    public function delete()
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = ?';
        $stmt = $this->conn->prepare($query);

        $stmt->bind_param('i', $this->id);
        if ($this->deleteAmenitiesByHotelId($this->id)) {
            $stmt->execute();
            return true;
        }
        return false;
    }

    // Lấy danh sách khách sạn với tùy chọn lọc và sắp xếp và phân trang
    public function getHotels($filter = [], $sort = '', $page = 1, $perPage = 10)
    {
        $offset = ($page - 1) * $perPage;

        $sql = "SELECT h.*, (SELECT i.name FROM images i WHERE i.hotel_id = h.id LIMIT 1) AS image_name, 
                c.name AS city_name,
                d.name AS district_name
                FROM hotels h
                LEFT JOIN city c ON h.city_id = c.id
                LEFT JOIN district d ON h.district_id = d.id
                WHERE 1=1";

        // Áp dụng filter
        $params = [];
        $types = '';

        // Tìm kiếm theo tên gần đúng
        if (!empty($filter['name'])) {
            $sql .= " AND h.name LIKE ?";
            $params[] = "%" . $filter['name'] . "%";
            $types .= 's';
        }

        // Tìm theo tỉnh
        if (!empty($filter['city_id'])) {
            $sql .= " AND city_id= ?";
            $params[] = $filter['city_id'];
            $types .= 's';
        }

        // Tìm theo huyện
        if (!empty($filter['district_id'])) {
            $sql .= " AND district_id= ?";
            $params[] = $filter['district_id'];
            $types .= 's';
        }

        if (!empty($filter['rate'])) {
            $sql .= " AND rate= ?";
            $params[] = $filter['rate'];
            $types .= 's';
        }

        // Lọc theo tick hot
        if (!empty($filter['hot'])) {
            $sql .= " AND is_hot= ?";
            $params[] = $filter['hot'];
            $types .= 's';
        }

        // Lọc theo tick promotion
        if (!empty($filter['promotion'])) {
            $sql .= " AND promotion= ?";
            $params[] = $filter['promotion'];
            $types .= 's';
        }

        // Lọc theo ID tiện nghi
        if (!empty($filter['amenities'])) {
            $amenityIds = $filter['amenities'];
            $sql .= " AND h.id IN (
                    SELECT hotel_id 
                    FROM hotel_amenities 
                    WHERE amenity_id IN (" . implode(',', array_fill(0, count($amenityIds), '?')) . ") 
                    GROUP BY hotel_id 
                    HAVING COUNT(DISTINCT amenity_id) = ?
                  )";
            $params = array_merge($params, $amenityIds, [count($amenityIds)]);
            $types .= str_repeat('i', count($amenityIds)) . 'i';
        }

        // Áp dụng sort
        if (!empty($sort)) {
            $allowedSortFields = ['name', 'type'];
            if (in_array($sort, $allowedSortFields)) {
                $sql .= " ORDER BY " . $sort;
            }
        }

        // Thêm phần phân trang
        $sql .= " LIMIT ? OFFSET ?";
        $params[] = $perPage;
        $params[] = $offset;
        $types .= 'ii';

        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }

        // Liên kết tham số với câu lệnh SQL
        if (!empty($params)) {
            $this->bindParams($stmt, $types, $params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $hotels = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();

        return $hotels;
    }


    // Lấy tất cả tiện nghi
    public function getAmenities()
    {
        $stmt = $this->conn->prepare("SELECT * FROM amenities");
        $stmt->execute();
        $result = $stmt->get_result();
        $amenities = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $amenities;
    }

    // Lấy tất cả nhóm tiện nghi
    public function getAmenityGroups()
    {
        $stmt = $this->conn->prepare("SELECT * FROM amenity_groups");
        $stmt->execute();
        $result = $stmt->get_result();
        $groups = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $groups;
    }

    // Lấy ra tiện nghi thuộc hotel_id
    public function getAmenitiesByHotelId($hotel_id)
    {
        $query = 'SELECT 
                ag.name AS amenity_group_name, 
                a.name AS amenity_name
            FROM 
                hotel_amenities ha
            INNER JOIN 
                amenities a ON ha.amenity_id = a.id
            INNER JOIN 
                amenity_groups ag ON a.group_id = ag.id
            WHERE 
                ha.hotel_id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $hotel_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $amenities = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $amenities;
    }

    // Lấy ra tiện nghi thuộc hotel_id k bao gôm group
    public function getAmenitiesNoGroupByHotelId($hotel_id)
    {
        $query = 'SELECT 
                 a.*
             FROM 
                 hotel_amenities ha
             INNER JOIN 
                 amenities a ON ha.amenity_id = a.id
             WHERE 
                 ha.hotel_id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $hotel_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $amenities = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $amenities;
    }

    // Nhận vào mảng tiện nghi và hotel id, kiểm tra xem tiện nghi của hotel đó đã có trong db hay chưa, nếu chưa có thì tạo mới, nếu có thì thôi, nếu không có thì xóa 
    public function manageAmenities($amenities, $hotel_id)
    {
        // Lấy tiện nghi hiện tại của khách sạn
        $currentAmenities = $this->getAmenitiesNoGroupByHotelId($hotel_id);

        // Xác định tiện nghi cần thêm và xóa
        $amenitiesToAdd = array_diff($amenities, array_column($currentAmenities, 'id'));
        $amenitiesToRemove = array_diff(array_column($currentAmenities, 'id'), $amenities);

        // Thêm tiện nghi mới
        foreach ($amenitiesToAdd as $amenity_id) {
            $stmt = $this->conn->prepare("INSERT INTO hotel_amenities (hotel_id, amenity_id) VALUES (?,?)");
            $stmt->bind_param("ii", $hotel_id, $amenity_id);
            $stmt->execute();
            $stmt->close();
        }

        // Xóa tiện nghi không còn
        foreach ($amenitiesToRemove as $amenity_id) {
            $stmt = $this->conn->prepare("DELETE FROM hotel_amenities WHERE hotel_id =? AND amenity_id =?");
            $stmt->bind_param("ii", $hotel_id, $amenity_id);
            $stmt->execute();
            $stmt->close();
        }

        return true;
    }



    // Xóa tiện ích theo hotel_id
    public function deleteAmenitiesByHotelId($hotel_id)
    {
        $stmt = $this->conn->prepare("DELETE FROM hotel_amenities WHERE hotel_id =?");
        $stmt->bind_param("i", $hotel_id);
        $stmt->execute();
        $stmt->close();
        return true;
    }

    public function getTotalHotels($filter = [])
    {
        $sql = "SELECT COUNT(*) as total FROM hotels WHERE 1=1";

        // Áp dụng filter
        $params = [];
        $types = '';


        // Tìm theo tỉnh
        if (!empty($filter['city_id'])) {
            $sql .= " AND city_id= ?";
            $params[] = $filter['city_id'];
            $types .= 's';
        }

        // Tìm theo huyện
        if (!empty($filter['district_id'])) {
            $sql .= " AND district_id= ?";
            $params[] = $filter['district_id'];
            $types .= 's';
        }

        if (!empty($filter['rate'])) {
            $sql .= " AND rate= ?";
            $params[] = $filter['rate'];
            $types .= 's';
        }

        // Lọc theo tick hot
        if (!empty($filter['hot'])) {
            $sql .= " AND is_hot= ?";
            $params[] = $filter['hot'];
            $types .= 's';
        }

        // Lọc theo tick promotion
        if (!empty($filter['promotion'])) {
            $sql .= " AND promotion= ?";
            $params[] = $filter['promotion'];
            $types .= 's';
        }

        // Lọc theo ID tiện nghi
        if (!empty($filter['amenities'])) {
            $amenityIds = $filter['amenities'];
            $sql .= " AND id IN (
                SELECT hotel_id 
                FROM hotel_amenities 
                WHERE amenity_id IN (" . implode(',', array_fill(0, count($amenityIds), '?')) . ") 
                GROUP BY hotel_id 
                HAVING COUNT(DISTINCT amenity_id) = ?
              )";
            $params = array_merge($params, $amenityIds, [count($amenityIds)]);
            $types .= str_repeat('i', count($amenityIds)) . 'i';
        }

        if (!empty($filter['name'])) {
            $sql .= " AND name LIKE ?";
            $params[] = '%' . $filter['name'] . '%'; // Tìm kiếm gần đúng
            $types .= 's'; // kiểu dữ liệu là string
        }

        // Tạo đối tượng chuẩn bị câu lệnh
        $stmt = $this->conn->prepare($sql);
        if ($stmt === false) {
            die('Prepare failed: ' . $this->conn->error);
        }

        // Liên kết tham số với câu lệnh SQL
        if (!empty($params)) {
            $this->bindParams($stmt, $types, $params);
        }

        // Thực thi câu lệnh
        if (!$stmt->execute()) {
            die('Execute failed: ' . $this->conn->error);
        }

        // Lấy kết quả
        $result = $stmt->get_result();
        if ($result === false) {
            die('Get result failed: ' . $this->conn->error);
        }

        $total = $result->fetch_assoc()['total'];

        // Đóng câu lệnh
        $stmt->close();

        return $total;
    }

    // Hàm để liên kết các tham số với câu lệnh SQL
    private function bindParams($stmt, $types, $params)
    {
        // Tạo mảng tham số để truyền vào bind_param
        $bindParams = [];
        foreach ($params as $key => $param) {
            $bindParams[$key] = &$params[$key]; // Tham chiếu đến các tham số
        }
        // Gọi bind_param với tham số kiểu dữ liệu và các tham số liên kết
        call_user_func_array([$stmt, 'bind_param'], array_merge([$types], $bindParams));
    }

    // get hotel by id
    public function getHotelById($id)
    {
        $stmt = $this->conn->prepare('SELECT * FROM hotels WHERE id = ?');
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $hotel = $result->fetch_assoc();
        return $hotel;
    }

    // Lấy ra 2 hotel khuyến mại
    public function getHotelPromotions()
    {
        $stmt = $this->conn->prepare("
        SELECT h.*, 
            (SELECT i.name FROM images i WHERE i.hotel_id = h.id LIMIT 1) AS image_name
            FROM hotels h
        WHERE h.promotion = 1
        LIMIT 2;
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Lấy 10 hotel hot 
    public function getHotelsHot()
    {
        $stmt = $this->conn->prepare("
            SELECT h.*, (SELECT i.name FROM images i WHERE i.hotel_id = h.id LIMIT 1) AS image_name
            FROM hotels h
            WHERE h.is_hot = 1
            LIMIT 10
        ");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Get details hotel
    public function getHotelDetails($id)
    {
        $stmt = $this->conn->prepare("
            SELECT h.*,  c.name AS city_name, d.name AS district_name
            FROM hotels h
            LEFT JOIN city c ON h.city_id = c.id
            LEFT JOIN district d ON h.district_id = d.id
            WHERE h.id = ?
            LIMIT 1
        ");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $hotel = $result->fetch_assoc();
        $stmt->close();


        if (!$hotel) {
            return null; // Không tìm thấy khách sạn
        }

        // Lấy tất cả các ảnh liên kết với khách sạn
        $images = $this->imageModel->getImagesByHotelId($id);

        // Thêm mảng ảnh vào thông tin khách sạn
        $hotel['images'] = $images;


        return $hotel;
    }

    // Update promotion
    public function updateHotelPromotion($id, $promotion)
    {
        $stmt = $this->conn->prepare("UPDATE hotels SET promotion = ? WHERE id =?");
        $stmt->bind_param('ii', $promotion, $id);
        $stmt->execute();
        $stmt->close();
    }

    // Update hot
    public function updateHotelHot($id, $hot)
    {
        $stmt = $this->conn->prepare("UPDATE hotels SET is_hot = ? WHERE id =?");
        $stmt->bind_param('ii', $hot, $id);
        $stmt->execute();
        $stmt->close();
    }
}
