<?php
// get_properties.php

include('db_connect.php');

// Fetch data from the properties table
$sql = "SELECT * FROM career";
$result = mysqli_query($conn, $sql);

// Create an array to store the property data
$properties = array();

while ($row = mysqli_fetch_assoc($result)) {
  $properties[] = $row;
}

// Close the database connection
mysqli_close($conn);

// Return the property data as JSON
echo json_encode($properties);
?>
