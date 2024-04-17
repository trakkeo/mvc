<?php
namespace App\Config;

use PDO;
use PDOException;

class Database 
{
    private $host = 'localhost';
    private $db_name = 'mvc';
    private $username = 'mvc';
    private $password = 'P@stouadmin51821837';
    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name",$this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>