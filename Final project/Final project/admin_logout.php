<?php
session_start();

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Set proper headers
header('Content-Type: application/json');
echo json_encode(['success' => true]);
?> 