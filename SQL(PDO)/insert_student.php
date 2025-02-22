<?php
// Include the PDO connection
require 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    // Prepare the SQL statement
    $sql = "INSERT INTO student (name, email, age) VALUES (:name, :email, :age)";
    $stmt = $pdo->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':age', $age);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Student added successfully!";
    } else {
        echo "Error adding student.";
    }
}
?>
