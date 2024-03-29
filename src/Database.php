<?php

class Database
{
    private $connection;

    public function __construct(array $config, string $username = 'user', string $password = 'password')
    {
        // Connect with msql database

        $dns = "mysql:". http_build_query($config, '', ';');

        $this->connection = new PDO($dns, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query(string $query, array $params = []) :\PDOStatement|false
    {
        $stm = $this->connection->prepare($query);
        $stm->execute($params);
        return $stm;
    }
}
