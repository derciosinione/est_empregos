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

    /** @var mysqli $connection */
    private $connection;

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
        if ($this->connection) {
            $this->connection->close();
        }
    }

    public function executeSqlQuery($query)
    {
        $this->getConnection();
        $result = $this->connection->query($query);

        if (!$result) {
            die("Query execution failed: " . $this->connection->error);
        }

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $this->closeConnection();

        return $data;
    }
}
?>
