<?php
session_start();
require_once dirname(__DIR__) . '/config/connection.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_SESSION['user_id'];
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $newPassword = $_POST['new_password'] ?? '';
    $currentPassword = $_POST['current_password'] ?? '';

    try {
        // First verify the current password
        $stmt = $conn->prepare("SELECT password_hash FROM users WHERE user_id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch();

        if (!$user || !password_verify($currentPassword, $user['password_hash'])) {
            $_SESSION['error'] = 'Current password is incorrect';
            header('Location: ../profile.php');
            exit();
        }

        // Check if username or email already exists for other users
        $stmt = $conn->prepare("SELECT user_id FROM users WHERE (username = ? OR email = ?) AND user_id != ?");
        $stmt->execute([$username, $email, $userId]);
        if ($stmt->rowCount() > 0) {
            $_SESSION['error'] = 'Username or email already exists';
            header('Location: ../profile.php');
            exit();
        }

        // Update user information
        if ($newPassword) {
            // Update with new password
            $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, password_hash = ? WHERE user_id = ?");
            $stmt->execute([$username, $email, $passwordHash, $userId]);
        } else {
            // Update without changing password
            $stmt = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE user_id = ?");
            $stmt->execute([$username, $email, $userId]);
        }

        // Update session variables
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;

        $_SESSION['success'] = 'Profile updated successfully';
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Failed to update profile: ' . $e->getMessage();
    }

    header('Location: ../profile.php');
    exit();
}
