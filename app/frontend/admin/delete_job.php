<?php

require '../../backend/Config/DbContext.php';

use Config\DbContext;

$dbContext = new DbContext();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM JobOffers WHERE Id=?";
    $stmt = $dbContext->getConnection()->prepare($sql);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        header("Location: jobs.php");
        exit();
    } else {
        echo "Error deleting record: " . $stmt->error;
    }
} else {
    echo "Invalid request.";
    exit();
}
?>
