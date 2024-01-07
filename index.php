<?php
// index.php

include('db_connect.php');

// Fetch properties from the database
$sql = "SELECT * FROM properties";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

$properties = array();

while ($row = mysqli_fetch_assoc($result)) {
    $properties[] = $row;
}

// Close the database connection
mysqli_close($conn);

// Return the properties as JSON
echo json_encode($properties);
?>
