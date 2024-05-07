<?php

namespace Core;

use PDO;

class Database
{
    private $connection;

    protected $statement;

    public function __construct(array $config, string $username = 'user', string $password = 'password')
    {
        // Connect with msql database

        $dns = "mysql:". http_build_query($config, '', ';');

        $this->connection = new PDO($dns, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query(string $query, array $params = []) :Database
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function getAll() {
        return $this->statement->fetchAll();
    }

    /**
     * @return mixed `false` is returned on failure or if there are no more rows.
     */
    public function find() : mixed
    {
        return $this->statement->fetch();
    }

    public function findOrFail() 
    {
        $result = $this->find();
        
        if(! $result) {
            abort();
        }

        return $result;
    }
}
