<?php
session_start();

// Set proper headers
header('Content-Type: application/json');

// Get POST data
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Simple admin credentials (in production, use a database and proper password hashing)
$admin_username = 'admin';
$admin_password = 'admin123';

if ($username === $admin_username && $password === $admin_password) {
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_username'] = $username;
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
}
?> 