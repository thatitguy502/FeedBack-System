<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "review";
    private $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        } catch(Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return $this->conn;
    }
}
?>