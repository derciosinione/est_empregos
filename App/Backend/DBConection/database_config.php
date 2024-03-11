<?php

const SERVER = 'localhost';
const USERNAME = 'root';
const PASSWORD = '';
const DATABASE = 'est_jobs';
const PORT = 3306;

global $conn;

function openConnection()
{
    global $conn;
    $conn = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE, PORT);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function closeConnection()
{
    global $conn;
    $conn->close();
}