<?php
class DBConfig {
    private $host;
    private $username;
    private $password;
    private $dbname;

    public function __construct() {    
        $this->host = 'destia_mysql';
        $this->username = 'root';
        $this->password = 'Gbd12345678;';
        $this->dbname = 'destia';
    }

    public function getConnection() {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
}
