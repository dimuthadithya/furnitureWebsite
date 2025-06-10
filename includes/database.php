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
