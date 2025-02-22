<?php
// Include the PDO connection
require 'db_connect.php';

// Check if the 'id' is present in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the student's current data
    $sql = "SELECT * FROM student WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    // Update the student's data
    $sql = "UPDATE student SET name = :name, email = :email, age = :age WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: display_students.php');
        exit();
    } else {
        echo "Error updating student.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
</head>
<body>
    <h2>Update Student</h2>
    <form action="update_student.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo $student['name']; ?>" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $student['email']; ?>" required><br><br>

        <label for="age">Age:</label>
        <input type="number" name="age" id="age" value="<?php echo $student['age']; ?>" required><br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>
