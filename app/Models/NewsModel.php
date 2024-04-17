<?php
namespace App\Models;
use PDO;
use App\Config\Database;

class NewsModel
{
    private $conn;
    private $table = 'news';

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->conn;
    }

    public function getNews()
    {
        $query = "SELECT * FROM news";
        $stmt = $this->conn->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getNewsById($id)
    {
        $query = "SELECT * FROM news WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function createNews($title, $content, $status, $userId)
    {
        $query = "INSERT INTO news (title, content, status, userId, createdAt, updatedAt) 
                  VALUES (:title, :content, :status, :userId, NOW(), NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':userId', $userId);
        return $stmt->execute();
    }

    public function updateNews($id, $title, $content, $status, $userId)
    {
        $query = "UPDATE news 
                  SET title = :title, content = :content, status = :status, userId = :userId, updatedAt = NOW() 
                  WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':userId', $userId);
        return $stmt->execute();
    }

    public function deleteNews($id)
    {
        $query = "DELETE FROM news WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}