<?php
// Database configuration
$host = 'localhost';      // Database host
$dbname = 'furniture_db'; // Database name
$username = 'root';       // Database username
$password = '';          // Database password

try {
    // Create PDO connection
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $username,
        $password,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    // Set the PDO error mode to exception and default fetch mode
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // If there is an error with the connection, stop the script and display the error
    die('Connection failed: ' . $e->getMessage());
}
