<?php
session_start();
require_once dirname(__DIR__) . '/config/connection.php';

// Function to register a new user
function registerUser($username, $email, $password)
{
    global $conn;
    try {
        // Check if username or email already exists
        $stmt = $conn->prepare("SELECT user_id FROM users WHERE username = ? OR email = ?");
        $stmt->execute([$username, $email]);
        if ($stmt->rowCount() > 0) {
            return [
                'status' => 'error',
                'message' => 'Username or email already exists'
            ];
        }

        // Hash password
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        // Insert new user
        $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash, is_admin) VALUES (?, ?, ?, false)");
        $stmt->execute([$username, $email, $password_hash]);

        return [
            'status' => 'success',
            'message' => 'Registration successful'
        ];
    } catch (PDOException $e) {
        return [
            'status' => 'error',
            'message' => 'Registration failed: ' . $e->getMessage()
        ];
    }
}

// Function to login user
function loginUser($email, $password)
{
    global $conn;
    try {
        // Get user by email
        $stmt = $conn->prepare("SELECT user_id, username, email, password_hash, is_admin FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        if (!$user || !password_verify($password, $user['password_hash'])) {
            return [
                'status' => 'error',
                'message' => 'Invalid email or password'
            ];
        }

        // Set session variables
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['is_admin'] = $user['is_admin'];

        return [
            'status' => 'success',
            'message' => 'Login successful',
            'is_admin' => $user['is_admin']
        ];
    } catch (PDOException $e) {
        return [
            'status' => 'error',
            'message' => 'Login failed: ' . $e->getMessage()
        ];
    }
}

// Function to check if user is logged in
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

// Function to check if user is admin
function isAdmin()
{
    return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
}

// Function to logout user
function logoutUser()
{
    session_start();
    session_destroy();
    header('Location: login.php');
    exit();
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'register') {
        $username = $_POST['username'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Basic validation
        if (empty($username) || empty($email) || empty($password)) {
            echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
            exit;
        }
        $result = registerUser($username, $email, $password);
        if ($result['status'] === 'success') {
            $_SESSION['success'] = $result['message'];
            header('Location: ../login.php');
        } else {
            $_SESSION['error'] = $result['message'];
            header('Location: ../register.php');
        }
        exit;
    }

    if ($action === 'login') {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        // Basic validation
        if (empty($email) || empty($password)) {
            echo json_encode(['status' => 'error', 'message' => 'All fields are required']);
            exit;
        }
        $result = loginUser($email, $password);
        if ($result['status'] === 'success') {
            // Redirect based on user role
            if ($result['is_admin']) {
                header('Location: ../admin/index.php');
            } else {
                header('Location: ../index.php');
            }
            exit;
        }
        $_SESSION['error'] = $result['message'];
        header('Location: ../login.php');
        exit;
    }

    if ($action === 'logout') {
        logoutUser();
    }
}
