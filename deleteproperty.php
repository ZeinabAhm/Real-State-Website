<?php
// delete_property.php
include('db_connect.php');
  // Get property ID from POST data
  $propertyId = $_POST['property_id'];

  // Prepare and execute the delete query
  $sql = "DELETE FROM properties WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('i', $propertyId);

  if ($stmt->execute()) {
    // If deletion is successful
    echo json_encode(['status' => 'success']);
  } else {
    // If an error occurred
    echo json_encode(['status' => 'error', 'message' => $stmt->error]);
  }

  // Close statement and connection
  $stmt->close();
  $conn->close();

?>
