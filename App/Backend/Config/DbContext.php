<?php

namespace Config;

use mysqli;

class DbContext
{
    const SERVER = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = '';
    const DATABASE = 'est_jobs';
    const PORT = 3306;

    private $connection;

    public function __construct()
    {
    }

    public function getConnection()
    {
        $this->connection = new mysqli(self::SERVER, self::USERNAME, self::PASSWORD, self::DATABASE, self::PORT);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        return $this->connection;
    }

    public function closeConnection()
    {
        $this->connection->close();
    }
}