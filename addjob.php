<?php
// Replace these with your actual database configuration
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'project';

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get job details from the form
    $jobTitle = $_POST['jobTitle'];
    $jobDetails = $_POST['jobDetails'];
    $salary = $_POST['salary'];
    $place = $_POST['place'];
    $type = $_POST['type'];
    $experience = $_POST['experience'];

    // Insert data into the database
    $sql = "INSERT INTO career (jobTitle, jobDetails, salary, place, typeofwork, experience) 
            VALUES ('$jobTitle', '$jobDetails', '$salary', '$place', '$type', '$experience')";

    if ($conn->query($sql) === TRUE) {
        // Display success message using JavaScript alert
        echo '<script>alert("Job listing added successfully!");</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
