<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $servername = "localhost"; // Replace with your SQL server address
    $dbname = "CP476"; // Replace with your database name
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to the SQL server using MySQLi
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "Connected successfully";
    }

    // Close the connection
    $conn->close();
}
?>
