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

// Function to get database connection
function getConnection()
{
    global $pdo;
    return $pdo;
}

// Function to close database connection
function closeConnection()
{
    global $pdo;
    $pdo = null;
}

// Function to perform a safe query with parameters
function executeQuery($sql, $params = [])
{
    global $pdo;
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    } catch (PDOException $e) {
        // Log error and return false
        error_log("Database error: " . $e->getMessage());
        return false;
    }
}

// Function to get a single row
function fetchOne($sql, $params = [])
{
    $stmt = executeQuery($sql, $params);
    return $stmt ? $stmt->fetch() : false;
}

// Function to get multiple rows
function fetchAll($sql, $params = [])
{
    $stmt = executeQuery($sql, $params);
    return $stmt ? $stmt->fetchAll() : [];
}

// Function to insert a record and return the last insert id
function insert($sql, $params = [])
{
    global $pdo;
    $stmt = executeQuery($sql, $params);
    return $stmt ? $pdo->lastInsertId() : false;
}

// Function to update or delete records
function execute($sql, $params = [])
{
    $stmt = executeQuery($sql, $params);
    return $stmt ? $stmt->rowCount() : false;
}
