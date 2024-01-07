<?php
// update_job.php

include('db_connect.php');

// Check if the required POST data is set
if (isset($_POST['job_id'], $_POST['jobTitle'], $_POST['jobDetails'], $_POST['salary'], $_POST['place'], $_POST['typeofwork'], $_POST['experience'])) {
    // Get job details from POST data
    $jobId = $_POST['job_id'];
    $newJobTitle = $_POST['jobTitle'];
    $newJobDetails = $_POST['jobDetails'];
    $newSalary = $_POST['salary'];
    $newPlace = $_POST['place'];
    $newTypeOfWork = $_POST['typeofwork'];
    $newExperience = $_POST['experience'];

    // Prepare and execute the update query
    $sql = "UPDATE career SET jobTitle=?, jobDetails=?, salary=?, place=?, typeofwork=?, experience=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssssi', $newJobTitle, $newJobDetails, $newSalary, $newPlace, $newTypeOfWork, $newExperience, $jobId);

    if ($stmt->execute()) {
        // If update is successful
        echo json_encode(['status' => 'success']);
    } else {
        // If an error occurred
        echo json_encode(['status' => 'error', 'message' => $stmt->error]);
    }

    // Close statement
    $stmt->close();
} else {
    // If required data is not set
    echo json_encode(['status' => 'error', 'message' => 'Missing required data']);
}

// Close connection
$conn->close();
?>
