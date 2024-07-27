<?php
// app/controllers/HotelController.php
include_once __DIR__ . '/../models/DistrictModel.php';
include_once __DIR__ . '/../models/CityModel.php';

class DistrictController
{
    private $districtModel;
    private $cityModel;

    public function __construct($db)
    {
        $this->districtModel = new District($db);
        $this->cityModel = new City($db);
    }

    // Lấy danh sách quận theo city_id
    public function getDistrictsByCityId($city_id)
    {
        $districts = $this->districtModel->getDistrictsByCityId(1);

        require __DIR__ . '/../views/pages/home/district.php';
    }

    // Get district by id
    public function getDistrictById($id)
    {
        $district = $this->districtModel->getDistrictById($id);
    }

    // Lấy danh sách các huyện 
    public function getAllDistricts()
    {
        $districts = $this->districtModel->getAllDistricts();
        $cities = $this->cityModel->getCities();
        require __DIR__ . '/../views/admin/district/list.php';
    }

    // Thêm mới quận huyện
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $image = $_POST['image'] ?? '';
            $city = $_POST['city'] ?? 0;

            $this->districtModel->name = $name;
            $this->districtModel->image = $image;
            $this->districtModel->city_id = $city;

            if ($this->districtModel->create()) {
                header('Location: /views/admin/district');
                exit;
            }
        } else {



            require __DIR__ . '/../views/admin/district/create.php';
        }
    }

    // Sửa
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $image = $_POST['image'] ?? '';
            $city = $_POST['city'] ?? 0;

            $this->districtModel->id = $id;
            $this->districtModel->name = $name;
            $this->districtModel->image = $image;
            $this->districtModel->city_id = $city;

            if ($this->districtModel->update()) {
                header('Location: /views/admin/district');
                exit;
            }
        } else {
            $district = $this->districtModel->getDistrictById($id);
            $cities = $this->cityModel->getCities();
            require __DIR__ . '/../views/admin/district/edit.php';
        }
    }

    // Xóa
    public function delete($id)
    {
        $this->districtModel->id = $id;
        $this->districtModel->delete();
        header('Location: /views/admin/district');
        exit;
    }
}
