<?php
// Database connection settings
$host = 'localhost';
$dbname = 'school';
$username = 'root'; // Use your MySQL username
$password = '';     // Use your MySQL password

try {
    // Establish the connection using PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully!";
} catch (PDOException $e) {
    // Handle connection error
    echo "Connection failed: " . $e->getMessage();
}
?>
