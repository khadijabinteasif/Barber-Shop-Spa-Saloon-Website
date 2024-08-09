<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appointments_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO appointments (first_name, last_name, date, time, phone, message) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $first_name, $last_name, $date, $time, $phone, $message);

// Set parameters and execute
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$date = $_POST['date'];
$time = $_POST['time'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();
?>
