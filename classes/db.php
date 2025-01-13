<?php

abstract class Database {
    private $server_name = 'localhost';
    private $user_name = 'root';
    private $password = '';
    private $db_name = 'db_mbocinemas';
    protected $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:host=$this->server_name;dbname=$this->db_name", $this->user_name, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

 
}

?>
