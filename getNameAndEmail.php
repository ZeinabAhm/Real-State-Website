<?php
// Replace these variables with your actual database credentials
session_start();
// Include your database connection file
include('db_connect.php');

// SQL query to retrieve the last sign-in record
$sql = "SELECT * FROM information ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

// Check if there are rows in the result set
if ($result->num_rows > 0) {
    // Output data of the last sign-in
    $row = $result->fetch_assoc();
    $response = array('name' => $row['name'], 'email' => $row['email']);
    echo json_encode($response);
    // Modify the output based on your database table columns
} else {
    echo json_encode(array('name' => 'No sign-ins found', 'email' => ''));
}

// Close connection
$conn->close();
?>
