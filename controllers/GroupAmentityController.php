<?php
// app/controllers/HotelController.php
include_once __DIR__ . '/../models/GroupAmenityModel.php';

class GroupAmentityController
{
    private $groupModel;

    public function __construct($db)
    {
        $this->groupModel = new GroupAmentity($db);
    }

    // Tạo mới tỉnh
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->groupModel->name = $_POST['name'];
            $this->groupModel->create();
            header('Location: /views/admin/group_amenity/index.php');
        } else {
            require __DIR__ . '/../views/admin/group_amentity/create.php';
        }
    }

    // Sửa 
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->groupModel->name = $_POST['name'];
            $this->groupModel->id = $id;
            $this->groupModel->update();
            header('Location: /views/admin/group_amenity/index.php');
        } else {

            $group_amentity = $this->groupModel->getById($id);
            require __DIR__ . '/../views/admin/group_amenity/edit.php';
        }
    }
    // xóa
    public function delete($id)
    {
        $this->groupModel->delete($id);

        header('Location: /views/admin/group_amenity/index.php');
    }

    // Get all groups
    public function getAll()
    {
        $groups = $this->groupModel->getAll();

        require __DIR__ . '/../views/admin/group_amenity/list.php';
    }
}
