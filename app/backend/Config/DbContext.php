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

    /**
     * @param false|mysqli_stmt $statement
     * @return array|false|null
     */
    public function executeSqlCommand($statement)
    {
        $this->getConnection();

        $statement->execute();

        $result = $statement->get_result();

        if (!$result || $result->num_rows == 0) return null;

        $response = $result->fetch_assoc();

        $this->closeConnection();

        return $response;
    }

    /**
     * Executes an INSERT query and returns the last inserted ID if successful.
     *
     * @param string $query The SQL INSERT query to execute.
     *
     * @return int|null The last inserted ID if the query was successful, or null on failure.
     */
    public function executeInsertQuery(string $query): ?int
    {
        $this->getConnection();

        $result = $this->connection->query($query);

        if (!$result){
            die("Query execution failed: " . $this->connection->error);
        }

        $lastInsertedId = 0;

        if ($result === true &&  $this->connection->insert_id !== 0) {
            $lastInsertedId = $this->connection->insert_id;
        }

        $this->closeConnection();

        return $lastInsertedId;
    }
}
?>
