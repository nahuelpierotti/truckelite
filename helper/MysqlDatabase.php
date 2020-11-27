<?php

class MysqlDatabase{
    private $connection;

    public function __construct($servername, $username, $password, $dbname,$port){
        $conn = mysqli_connect(
            $servername,
            $username,
            $password,
            $dbname,
            $port
        );

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $this->connection = $conn;
    }

    public function query($sql){
        $result = mysqli_query($this->connection, $sql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    public function execute($sql){
        return mysqli_query($this->connection, $sql);
    }

    public function regresaId($sql){

        return $this->execute($sql) ? mysqli_insert_id($this->connection) : false;
    }
}