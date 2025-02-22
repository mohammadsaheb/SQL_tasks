<?php
// Include the PDO connection
require 'db_connect.php';

// Check if the 'id' is present in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the student from the database
    $sql = "DELETE FROM student WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: display_students.php');
        exit();
    } else {
        echo "Error deleting student.";
    }
}
?>
