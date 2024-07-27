<?php
class Post
{
    private $mysqli;

    private $table = 'posts';
    public $id;
    public $title;
    public $content;
    public $thumbnail;
    public $is_visible;

    public function __construct($mysqli)
    {
        $this->mysqli = $mysqli;
    }

    // Thêm mới
    public function create()
    {
        $query = 'INSERT INTO ' . $this->table . '(title, content, thumbnail, is_visible) VALUES (?,?,?,?)';
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("ssss", $this->title, $this->content, $this->thumbnail, $this->is_visible);
        return $stmt->execute();
    }

    // Sửa
    public function update()
    {
        $query = "UPDATE $this->table SET title =?, content =?, thumbnail =?, is_visible =? WHERE id =?";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("ssssi", $this->title, $this->content, $this->thumbnail, $this->is_visible, $this->id);
        return $stmt->execute();
    }

    // Xóa
    public function delete($postId)
    {
        $query = "DELETE FROM " . $this->table . " WHERE id =?";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("i", $postId);
        return $stmt->execute();
    }

    // Get by id
    public function getById($id)
    {
        $query = "SELECT * FROM $this->table WHERE id =?";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Get 5 bài viết được is_visible
    public function getShowPost()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE is_visible = 1";
        $stmt = $this->mysqli->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Get all post
    public function getAllPost()
    {
        $query = "SELECT * FROM $this->table";
        $stmt = $this->mysqli->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Change status post
    public function changeStatus($id, $status)
    {
        $query = "UPDATE $this->table SET is_visible =? WHERE id =?";
        $stmt = $this->mysqli->prepare($query);
        $stmt->bind_param("si", $status, $id);
        return $stmt->execute();
    }
}
