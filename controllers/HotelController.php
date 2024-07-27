<?php
// app/controllers/HotelController.php
include_once __DIR__ . '/../models/HotelModel.php';
include_once __DIR__ . '/../models/ImageModel.php';
include_once __DIR__ . '/../models/DistrictModel.php';
include_once __DIR__ . '/../models/AmenityModel.php';
include_once __DIR__ . '/../models/CityModel.php';
include_once __DIR__ . '/../lib/simple_html_dom.php';
class HotelController
{
    private $hotelModel;
    private $imageModel;
    private $districtModel;
    private $amenityModel;
    private $cityModel;

    public function __construct($db)
    {

        $this->hotelModel = new Hotel($db);
        $this->imageModel = new Image($db);
        $this->districtModel = new District($db);
        $this->amenityModel = new Amenity($db);
        $this->cityModel = new City($db);
    }

    // Lấy ra danh sách hotel
    public function index()
    {

        $filter = [];
        $sort = '';

        if (!empty($_GET['name'])) {
            $filter['name'] = $_GET['name'];
        }

        if (!empty($_GET['district_id'])) {
            $filter['district_id'] = $_GET['district_id'];
        }

        if (!empty($_GET['city_id'])) {
            $filter['city_id'] = $_GET['city_id'];
        }

        if (!empty($_GET['hot'])) {
            $filter['hot'] = $_GET['hot'];
        }

        if (!empty($_GET['promotion'])) {
            $filter['promotion'] = $_GET['promotion'];
        }

        // Lấy sort từ query string
        if (!empty($_GET['sort'])) {
            $sort = $_GET['sort'];
        }

        $amenities = $this->hotelModel->getAmenities();
        // Xử lý các tham số phân trang
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['size']) ? (int)$_GET['size'] : 10;

        // Số khách sạn hiển thị trên mỗi trang

        // Lấy dữ liệu khách sạn và tổng số khách sạn
        $hotels = $this->hotelModel->getHotels($filter, $sort, $page, $perPage);

        $totalHotels = $this->hotelModel->getTotalHotels($filter);

        $totalPages = ceil($totalHotels / $perPage);


        $cities = $this->cityModel->getCities();

        $districts = $this->districtModel->getAllDistricts();


        require __DIR__ . '/../views/admin/hotel/list.php';
    }


    // Tạo mới hotel
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->hotelModel->name             =   $_POST['name'];
            $this->hotelModel->rate             =   $_POST['rate'];
            $this->hotelModel->address          =   $_POST['address'];
            $this->hotelModel->description      =   $_POST['description'];
            $this->hotelModel->phone            =   $_POST['phone'];
            $this->hotelModel->number_of_rooms  =   $_POST['number_of_rooms'];
            $this->hotelModel->email            = $_POST['email'];
            $this->hotelModel->website          = $_POST['website'];
            $this->hotelModel->latitude         = $_POST['latitude'];
            $this->hotelModel->longitude        = $_POST['longitude'];
            $this->hotelModel->type             = $_POST['type'];
            $this->hotelModel->amenities        = $_POST['amenities'];
            $this->hotelModel->isPromotion      = $_POST['isPromotion'];
            $this->hotelModel->city_id          = $_POST['city_id'];
            $this->hotelModel->district_id      = $_POST['district_id'];
            $this->hotelModel->isHot            = $_POST['isHot'];
            $hotel_id = time();
            $this->hotelModel->hotel_id = $hotel_id;
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
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->hotelModel->id               = $id;
            $this->hotelModel->name             = $_POST['name'];
            $this->hotelModel->rate             = $_POST['rate'];
            $this->hotelModel->address          = $_POST['address'];
            $this->hotelModel->description      = $_POST['description'];
            $this->hotelModel->phone            = $_POST['phone'];
            $this->hotelModel->number_of_rooms  = $_POST['number_of_rooms'];
            $this->hotelModel->email            = $_POST['email'];
            $this->hotelModel->website          = $_POST['website'];
            $this->hotelModel->latitude         = $_POST['latitude'];
            $this->hotelModel->longitude        = $_POST['longitude'];
            $this->hotelModel->type             = $_POST['type'];
            $this->hotelModel->isPromotion      = $_POST['isPromotion'] ?? 0;
            $this->hotelModel->city_id          = $_POST['city_id'];
            $this->hotelModel->district_id      = $_POST['district_id'];
            $this->hotelModel->isHot            = $_POST['isHot'] ?? 0;
            $this->hotelModel->amenities        = $_POST['amenities'] ?? array();

            if ($this->hotelModel->update()) {
                if (isset($_FILES['images'])) {
                    $this->uploadImages($id, $_FILES['images'], 'hotels');
                }
                header('Location: /views/admin/hotel/index.php');
            }
        } else {

            $hotel = $this->hotelModel->getHotelById($id);
            // Lấy ra image của hotel
            $images = $this->imageModel->getImagesByHotelId($id);

            // Lấy ra tiện ích của hotel
            $amenitiesCurrent = $this->hotelModel->getAmenitiesNoGroupByHotelId($id);

            // Lấy ra danh sách tiện ích
            $amenitiesList = $this->hotelModel->getAmenities();

            $cities = $this->cityModel->getCities();

            $districts = $this->districtModel->getAllDistricts();

            require __DIR__ . '/../views/admin/hotel/edit.php';
        }
    }

    // Xóa hotel
    public function delete($id)
    {
        $upload_dir = '../../../uploads/hotels/';
        $this->hotelModel->id = $id;
        if ($this->imageModel->deleteByHotelId($id)) {
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
    private function uploadImages($hotel_id, $files, $folder)
    {
        $upload_dir = '../../../uploads/' . $folder . '/';
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
    public function deleteImage($id)
    {
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
        header('Location: /views/admin/hotel/index.php?action=edit&id=' . $image['hotel_id']);
    }

    // Lấy ra 3 hotel khuyến mại 
    public function getHotelPromotions()
    {
        $hotels = $this->hotelModel->getHotelPromotions();

        require __DIR__ . '/../views/pages/home/promotion.php';
    }

    // Lấy danh sách 10 hotel có tick hot
    public function getHotelsHot()
    {
        $hotels_hot = $this->hotelModel->getHotelsHot();

        require __DIR__ . '/../views/pages/home/hotel_host.php';
    }

    // Search hotel
    public function search()
    {
        $filter = [];
        $sort = '';

        if (!empty($_GET['name'])) {
            $filter['name'] = $_GET['name'];
        }

        if (!empty($_GET['rate'])) {
            $filter['rate'] = $_GET['rate'];
        }

        if (!empty($_GET['district_id'])) {
            $filter['district_id'] = $_GET['district_id'];
        }

        if (!empty($_GET['city_id'])) {
            $filter['city_id'] = $_GET['city_id'];
        }

        if (!empty($_GET['rate'])) {
            $filter['rate'] = $_GET['rate'];
        }

        if (!empty($_GET['hot'])) {
            $filter['hot'] = $_GET['hot'];
        }

        if (!empty($_GET['promotion'])) {
            $filter['promotion'] = $_GET['promotion'];
        }

        // Lọc theo ID tiện nghi
        if (!empty($_GET['amenities'])) {
            // Kiểm tra nếu 'amenities' là mảng và chuyển đổi nó thành mảng số nguyên
            if (is_array($_GET['amenities'])) {
                $filter['amenities'] = array_map('intval', $_GET['amenities']);
            } else {
                // Nếu không phải là mảng, có thể là chuỗi phân tách bằng dấu phẩy
                $filter['amenities'] = array_map('intval', explode(',', $_GET['amenities']));
            }
        }

        // Lấy sort từ query string
        if (!empty($_GET['sort'])) {
            $sort = $_GET['sort'];
        }

        // Xử lý các tham số phân trang
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = isset($_GET['size']) ? (int)$_GET['size'] : 10;

        // Số khách sạn hiển thị trên mỗi trang
        // Lấy dữ liệu khách sạn và tổng số khách sạn
        $hotels = $this->hotelModel->getHotels($filter, $sort, $page, $perPage);

        $totalHotels = $this->hotelModel->getTotalHotels($filter);

        $totalPages = ceil($totalHotels / $perPage);

        if (!empty($_GET['district_id'])) {
            $district = $this->districtModel->getDistrictById($_GET['district_id']);
        }

        $amenities = $this->amenityModel->getAll();

        require __DIR__ . '/../views/pages/list/listing.php';
    }

    // Xem chi tiết khách sạn
    public function detail($id)
    {
        $hotel = $this->hotelModel->getHotelDetails($id);
        // Lấy ra tiện ích của hotel
        $amenitiesCurrent = $this->hotelModel->getAmenitiesByHotelId($id);
        $hotel['amenities'] = $amenitiesCurrent;
        return $hotel;
    }

    // Update promotion
    public function updatePromotion($id, $promotion)
    {
        $this->hotelModel->updateHotelPromotion($id, $promotion);
    }

    // Update hot
    public function updateHot($id, $hot)
    {
        $this->hotelModel->updateHotelHot($id, $hot);
    }
}
