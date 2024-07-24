<?php
// app/controllers/HotelController.php
include __DIR__ . '/../models/HotelModel.php';
include __DIR__ . '/../models/ImageModel.php';

class HotelController {
    private $hotelModel;
    private $imageModel;

    public function __construct($db) {
        $this->hotelModel = new Hotel($db);
        $this->imageModel = new Image($db);
    }

    // Lấy ra danh sách hotel
    public function index() {
        $filter = [];
        $sort = '';

       
        if (!empty($_GET['type'])) {
            $filter['type'] = $_GET['type'];
        }

        if (!empty($_GET['name'])) {
            $filter['name'] = $_GET['name'];
        }

        // Lấy sort từ query string
        if (!empty($_GET['sort'])) {
            $sort = $_GET['sort'];
        }

        // Lấy danh sách khách sạn từ model
        $hotels = $this->hotelModel->getHotels($filter, $sort);
        $amenities = $this->hotelModel->getAmenities();

        
        require __DIR__ . '/../views/admin/hotel/list.php';
    }


    // Tạo mới hotel
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->hotelModel->name         =   $_POST['name'];
            $this->hotelModel->rate         =   $_POST['rate'];
            $this->hotelModel->address      =   $_POST['address'];
            $this->hotelModel->description  =   $_POST['description'];
            $this->hotelModel->phone        =   $_POST['phone'];
            $this->hotelModel->number_of_rooms  =   $_POST['number_of_rooms'];
            $this->hotelModel->email = $_POST['email'];
            $this->hotelModel->website = $_POST['website'];
            $this->hotelModel->latitude = $_POST['latitude'];
            $this->hotelModel->longitude = $_POST['longitude'];
            $this->hotelModel->type = $_POST['type'];
            $this->hotelModel->amenities = $_POST['amenities'];
            $hotel_id = time();
            $this->hotelModel->hotel_id =$hotel_id;
            if ($this->hotelModel->create()) {
                if (isset($_FILES['images'])) {
                    $this->uploadImages($hotel_id, $_FILES['images'], 'hotels');
                }

                header('Location: /views/admin/hotel/index.php');
            }
         
        }
         // Lấy danh sách tiện nghi 
         $amenities = $this->hotelModel->getAmenities();
        require __DIR__ . '/../views/admin/hotel/create.php';
    }

    // Update hotel
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->hotelModel->id = $id;
            $this->hotelModel->name = $_POST['name'];
            $this->hotelModel->rate = $_POST['rate'];
            $this->hotelModel->address = $_POST['address'];
            $this->hotelModel->description = $_POST['description'];
            $this->hotelModel->phone = $_POST['phone'];
            $this->hotelModel->number_of_rooms = $_POST['number_of_rooms'];
            $this->hotelModel->email = $_POST['email'];
            $this->hotelModel->website = $_POST['website'];
            $this->hotelModel->latitude = $_POST['latitude'];
            $this->hotelModel->longitude = $_POST['longitude'];
            $this->hotelModel->type = $_POST['type'];
            $this->hotelModel->amenities = $_POST['amenities'];

            if ($this->hotelModel->update()) {
                if (isset($_FILES['images'])) {
                    $this->uploadImages($id, $_FILES['images'], 'hotels');
                }
                header('Location: /views/admin/hotel/index.php');
            }
        } else {
            $stmt = $this->hotelModel->conn->prepare('SELECT * FROM hotels WHERE id = ?');
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $hotel = $result->fetch_assoc();

            // Lấy ra image của hotel
            $images = $this->imageModel->getImagesByHotelId($id);

            // Lấy ra tiện ích của hotel
            $amenitiesCurrent = $this->hotelModel->getAmenitiesByHotelId($id);

            // Lấy ra danh sách tiện ích
            $amenitiesList = $this->hotelModel->getAmenities();
            require __DIR__ . '/../views/admin/hotel/edit.php';

        }
    }

    // Xóa hotel
    public function delete($id) {
        $upload_dir = '../../../uploads/hotels/';
        $this->hotelModel->id = $id;
        if($this->imageModel->deleteByHotelId($id)) {
            $images = $this->imageModel->getImagesByHotelId($id);
            foreach ($images as $image) {
                unlink($upload_dir . $image['name']);
            }
            if ($this->hotelModel->delete()) {
                header('Location: /views/admin/hotel/index.php');
            }
        }
        
    }

    // Upload image
    private function uploadImages($hotel_id, $files, $folder) {
        $upload_dir = '../../../uploads/'.$folder.'/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        $current_timestamp = time();

        foreach ($files['tmp_name'] as $key => $tmp_name) {
            $file_name = basename($files['name'][$key]);
            $file_path = $current_timestamp . '_' . $file_name;
            $root_path = $upload_dir . $file_path;
            if (move_uploaded_file($tmp_name, $root_path)) {
                $this->imageModel->hotel_id = $hotel_id;
                $this->imageModel->name     = $file_path;
                $this->imageModel->create();
            }
        }
    }

    // Xóa ảnh
    public function deleteImage($id) {
        $this->imageModel->id = $id;
        $image = $this->imageModel->getImageById($id);
        var_dump($image);
        $imageName = $image['name'] ?? '';
        $documentRoot = $_SERVER['DOCUMENT_ROOT'];
        echo $documentRoot;
        // Đường dẫn tới tệp hình ảnh
        $imagePath = $documentRoot . "/uploads/hotels/" . $imageName;
        echo $imagePath;
        if (file_exists($imagePath)) {
            if (unlink($imagePath)) {
                $this->imageModel->delete();
            }
        }
        header('Location: /views/admin/hotel/index.php?action=edit&id='. $image['hotel_id']);
        
    }
}
