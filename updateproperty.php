<?php
// update_property.php

include('db_connect.php');

  // Get property details from POST data
  $propertyId = $_POST['property_id'];
  $newAddress = $_POST['address'];
  $newCity = $_POST['city'];
  $newPrice = $_POST['price'];
  $newBeds = $_POST['beds'];
  $newBaths = $_POST['baths'];
  $newImageUrl = $_POST['image_url'];

  // Prepare and execute the update query
  $sql = "UPDATE properties SET address=?, city=?, price=?, beds=?, baths=?, image_url=? WHERE id=?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('sssiiii', $newAddress, $newCity, $newPrice, $newBeds, $newBaths, $newImageUrl, $propertyId);

  if ($stmt->execute()) {
    // If update is successful
    echo json_encode(['status' => 'success']);
  } else {
    // If an error occurred
    echo json_encode(['status' => 'error', 'message' => $stmt->error]);
  }

  // Close statement and connection
  $stmt->close();
  $conn->close();

?>
