<?php
// app/controllers/HotelController.php
include_once __DIR__ . '/../models/CityModel.php';

class CityController
{
    private $cityModel;

    public function __construct($db)
    {
        $this->cityModel = new City($db);
    }

    // Tạo mới tỉnh
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->cityModel->name = $_POST['name'];
            $this->cityModel->create();
            header('Location: /views/admin/city/index.php');
        } else {
            require __DIR__ . '/../views/admin/city/create.php';
        }
    }

    // Sửa 
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->cityModel->name = $_POST['name'];
            $this->cityModel->id = $id;
            $this->cityModel->update();
            header('Location: /views/admin/city/index.php');
        } else {
            $city = $this->cityModel->getById($id);
            require __DIR__ . '/../views/admin/city/edit.php';
        }
    }

    //   Lấy danh sách các tỉnh
    public function getAllCities()
    {
        $cities = $this->cityModel->getCities();

        require __DIR__ . '/../views/admin/city/list.php';
    }

    // xóa
    public function delete($id)
    {
        $this->cityModel->delete($id);
        header('Location: /views/admin/city/index.php');
    }
}
