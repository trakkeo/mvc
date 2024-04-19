use Illuminate\Database\Eloquent\Model;

<?php

namespace App\Models;
use PDO;
use App\Config\Database;

class ShiftsModel
{
    private $conn;
    private $table = 'shifts';

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->conn;
    }

    public function getShifts()
    {
        $query = 'SELECT * FROM ' . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}