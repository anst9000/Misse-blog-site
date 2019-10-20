<?php
class Database
{
    // Connecting to FastComet
    private $host = "am5.fcomet.com";
    private $db_name = "ackesite_misseblogg";
    private $username = "ackesite_misse";
    private $password = "K98ni2ek-,Ao";
    private $port = "3306";

    private $dsn;
    public $conn;

    // get the database connection
    public function connect()
    {
        $this->conn = null;
        $this->dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name;

        try {
            $this->conn = new PDO($this->dsn, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
