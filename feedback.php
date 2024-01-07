<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get values from the form
$name = $_POST['userName'];
$rating = $_POST['userRating'];
$comment = $_POST['userFeedback'];

// Insert data into the database
$sql = "INSERT INTO feedback (name, rating, comment) VALUES ('$name', $rating, '$comment')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true, "message" => "Thank you for your feedback!"]);
} else {
    echo json_encode(["success" => false, "message" => "Error: " . $sql . "<br>" . $conn->error]);
}

// Close the database connection
$conn->close();
?>
