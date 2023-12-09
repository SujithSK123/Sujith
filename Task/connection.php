<?php
// Database configuration
$servername = "localhost"; // Change this if your MySQL server is different
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "sk mobiles"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
//if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare and bind SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO register (username, phone_number, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $phone, $email, $password);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "Registration successful";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close prepared statement
    $stmt->close();
//}

// Close the database connection
$conn->close();
?>
