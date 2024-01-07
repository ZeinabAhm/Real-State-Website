<?php
// process_deletejob.php
include('db_connect.php');

// Get job ID from POST data
$jobId = $_POST['job_id'];

// Prepare and execute the delete query
$sql = "DELETE FROM career WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $jobId);

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
