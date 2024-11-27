<?php
try {
    $pdo = new PDO('mysql:host=localhost', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create database
    $pdo->exec("CREATE DATABASE IF NOT EXISTS pets");
    $pdo->exec("USE pets");

    // Create table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS puzzle_results (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_name VARCHAR(255) NOT NULL,
            completion_time FLOAT NOT NULL,
            completed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");

    echo "Database and table setup completed successfully!";
} catch (PDOException $e) {
    die("Setup failed: " . $e->getMessage());
}
?>