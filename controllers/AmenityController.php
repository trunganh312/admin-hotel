<?php
// app/controllers/HotelController.php
include_once __DIR__ . '/../models/AmenityModel.php';
include_once __DIR__ . '/../models/GroupAmenityModel.php';

class AmenityController
{
    private $amenityModel;
    private $groupModel;

    public function __construct($db)
    {
        $this->amenityModel = new Amenity($db);
        $this->groupModel = new GroupAmentity($db);
    }

    // Lấy danh sách tiện ích
    public function getAll()
    {
        $amenities = $this->amenityModel->getAll();
        $groups = $this->groupModel->getAll();
        require __DIR__ . '/../views/admin/amenity/list.php';
    }
    // Thêm mới tiện ích
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $group_id = $_POST['group_id'];
            $this->amenityModel->name = $name;
            $this->amenityModel->group_id = $group_id;
            if ($this->amenityModel->create()) {
                header('Location: /views/admin/amenity/index.php');
                exit;
            }
        } else {
            require __DIR__ . '/../views/admin/amenity/create.php';
        }
    }

    // Sửa
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $group_id = $_POST['group_id'];
            $this->amenityModel->id = $id;
            $this->amenityModel->name = $name;
            $this->amenityModel->group_id = $group_id;
            if ($this->amenityModel->update()) {
                header('Location: /views/admin/amenity/index.php');
                exit;
            }
        } else {
            $amenity = $this->amenityModel->getById($id);
            $groups = $this->groupModel->getAll();
            require __DIR__ . '/../views/admin/amenity/edit.php';
        }
    }

    // Xóa
    public function delete($id)
    {
        $this->amenityModel->id = $id;
        if ($this->amenityModel->delete()) {
            header('Location: /views/admin/amenity/index.php');
            exit;
        } else {
            die('Error deleting record.');
        }
    }
}
