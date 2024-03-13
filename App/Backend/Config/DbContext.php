<?php

namespace Config;

use mysqli;
use mysqli_stmt;

class DbContext
{

    const SERVER = 'localhost';
    const USERNAME = 'root';
    const PASSWORD = '';
    const DATABASE = 'est_jobs';
    const PORT = 3306;
    
    /** @var mysqli $connection */
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

    /**
     * @param false|mysqli_stmt $statement
     * @return array|false|null
     */
    public function executeSqlCommand($statement)
    {
        $statement->execute();

        $result = $statement->get_result();

        if (!$result || $result->num_rows == 0) return null;

        $response = $result->fetch_assoc();

        $this->closeConnection();

        return $response;
    }

    /**
     * @return array|false|null
     */
    public function executeSqlQuery($query)
    {
        $result = $this->connection->query($query);

        if (!$result){
            die("Connection failed: " . $this->connection->error);
        }

        if ($result->num_rows < 0) return null;

        $response = $result->fetch_assoc();

        $this->closeConnection();

        return $response;
    }

    public function closeConnection()
    {
        $this->connection->close();
    }
}