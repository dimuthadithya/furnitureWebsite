<?php
// Include database configuration
require_once '../config/db.php';


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
