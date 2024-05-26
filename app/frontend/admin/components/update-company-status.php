<?php
// Checks if any form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['companyId']) && isset($_POST['newStatus'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "est_jobs";

    // Pull data from the previous page :)
    $companyId = $_POST['companyId'];
    $newStatus = $_POST['newStatus'];

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Checks connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sends a query to update the database
    $sql = "UPDATE Companies SET CompanyStatusId = '$newStatus' WHERE Id = '$companyId'";

    // Executes the query
    if ($conn->query($sql) === TRUE) {
        echo "Company status updated successfully";
    } else {
        echo "Error updating company status: " . $conn->error;
    }

    // Closes the database connection
    $conn->close();

    // Redirects back to the same company listing - wow amazing!
    header("Location: ../companies-info.php?id=$companyId");
    exit();
}
?>
