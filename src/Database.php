<?php

class Database
{
    private $connection;

    public function __construct()
    {
        // Connect with msql database

        $dns = "mysql:host=db;port=3306;dbname=mydatabase;user=root;charset=utf8";

        $this->connection = new PDO($dns);
    }

    public function query(string $query) :\PDOStatement|false
    {
        $stm = $this->connection->prepare($query);
        $stm->execute();
        return $stm;
    }
}
