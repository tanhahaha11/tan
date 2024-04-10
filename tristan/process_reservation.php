<?php
// Retrieve form data
$name = $_POST['name'];
$grade = $_POST['grade'];
$section = $_POST['section'];
$adviser = $_POST['adviser'];
$contact = $_POST['contact'];
$title = $_POST['title'];
$userType = $_POST['userType'];
$studentType = isset($_POST['studentType']) ? $_POST['studentType'] : '';
$facultyType = isset($_POST['facultyType']) ? $_POST['facultyType'] : '';
$dateBorrowed = $_POST['dateBorrowed'];
$accessionNo = $_POST['accessionNo'];
$dateDue = $_POST['dateDue'];
$dateReturned = $_POST['dateReturned'];

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tristan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO reservations (name, grade, section, adviser, contact, title, userType, studentType, facultyType, dateBorrowed, accessionNo, dateDue, dateReturned) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters
$stmt->bind_param("sssssssssssss", $name, $grade, $section, $adviser, $contact, $title, $userType, $studentType, $facultyType, $dateBorrowed, $accessionNo, $dateDue, $dateReturned);

// Execute SQL statement
if ($stmt->execute()) {
    // Respond with success
    echo json_encode(['success' => true]);
} else {
    // Respond with error
    echo json_encode(['success' => false, 'error' => 'Failed to insert data']);
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
