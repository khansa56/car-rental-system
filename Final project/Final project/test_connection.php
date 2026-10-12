<?php
require_once 'db.php';

try {
    $stmt = $pdo->query("SELECT * FROM cars");
    $cars = $stmt->fetchAll();
    
    echo "<h2>Database Connection Test</h2>";
    echo "<p>Connection successful!</p>";
    echo "<h3>Current Cars in Database:</h3>";
    echo "<pre>";
    print_r($cars);
    echo "</pre>";
} catch (Exception $e) {
    echo "<h2>Error</h2>";
    echo "<p>Connection failed: " . $e->getMessage() . "</p>";
}
?> 