<?php

class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";

    public function connect()
    {
        try {
        $connection = new PDO("mysql:host=$this->servername;dbname=gallery", $this->username, $this->password);

        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
        echo "Connected";
        } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        }
    }
}
