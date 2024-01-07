<?php
include('db_connect.php');

$meeting_date = $_POST['meeting_date'];
$meeting_time = $_POST['meeting_time'];
$guest_name = $_POST['guest_name'];
$guest_email = $_POST['guest_email'];

// Insert data into the schedule table
$sql = "INSERT INTO schedule (meeting_date, meeting_time, guest_name, guest_email) VALUES ('$meeting_date', '$meeting_time', '$guest_name', '$guest_email')";
$result = mysqli_query($conn, $sql);

if ($result) {

echo json_encode(["success" => true]);
    exit();
} else {
    // Error handling, you may want to handle errors differently
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
