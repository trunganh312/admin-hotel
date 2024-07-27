<?php
// app/controllers/HotelController.php
include_once __DIR__ . '/../models/ConfigModel.php';

class ConfigController
{
    private $configModel;

    public function __construct($db)
    {
        $this->configModel = new Config($db);
    }

    // Get all config
    public function getAll()
    {
        $configs = $this->configModel->getAll();

        require  __DIR__ . '/../views/admin/config/list.php';
    }

    // Thêm mới config
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $hotline = $_POST['hotline'] ?? '';
            $email = $_POST['email'] ?? '';
            $facebook_link = $_POST['facebook'] ?? '';
            $instagram_link = $_POST['instagram'] ?? '';
            $is_visible = $_POST['show'] ?? 0;

            $this->configModel->create($hotline, $email, $facebook_link, $instagram_link, $is_visible);

            header('Location: /views/admin/config/index.php');
        } else {
            require __DIR__ . '/../views/admin/config/create.php';
        }
    }

    // Change visible
    public function changeVisible($configId, $isVisible)
    {
        $this->configModel->changeVisibleConfig($configId, $isVisible);
    }

    // Lấy ra 1 config được phép hiển thị
    public function getVisibleConfig()
    {
        return $this->configModel->getVisibleConfig();
    }

    // Sửa
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $hotline = $_POST['hotline'] ?? '';
            $email = $_POST['email'] ?? '';
            $facebook_link = $_POST['facebook'] ?? '';
            $instagram_link = $_POST['instagram'] ?? '';
            $is_visible = $_POST['show'] ?? 0;

            $this->configModel->editConfig($id, $hotline, $email, $facebook_link, $instagram_link, $is_visible);
            header('Location: /views/admin/config/index.php');
        } else {
            $config = $this->configModel->getById($id);
            require __DIR__ . '/../views/admin/config/edit.php';
        }
    }

    // xóa
    public function delete($id)
    {
        $this->configModel->deleteConfig($id);
        header('Location: /views/admin/config/index.php');
    }
}
