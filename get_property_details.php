<?php
$propertyId = $_GET['property_id']; // Assuming you're getting the property_id from the URL

$mysqli = new mysqli('localhost', 'root', '', 'project');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

$query = "SELECT * FROM properties WHERE id = $propertyId";
$result = $mysqli->query($query);

if (!$result) {
    die('Error: ' . $mysqli->error);
}

$propertyDetails = [];

if ($result->num_rows > 0) {
    $propertyDetails = $result->fetch_assoc();
} else {
    $propertyDetails['error'] = 'Property not found';
}

echo json_encode($propertyDetails);

$mysqli->close();
?>
