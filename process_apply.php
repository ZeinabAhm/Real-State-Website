<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    // Retrieve data from the form
    $jobTitle = $_POST['job_title'];
    $number = $_POST['number'];
    $email = $_POST['email'];

    // Validate and process the data (you should add more validation and processing logic)
   
    // Example: Save data to a database (Assuming you have a database connection)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape variables for security
    $jobTitle = mysqli_real_escape_string($conn, $jobTitle);
    $number = mysqli_real_escape_string($conn, $number);
    $email = mysqli_real_escape_string($conn, $email);

    // File upload handling
    $targetDir = "uploads/";  // Directory where you want to store uploaded files
    $targetFile = $targetDir . basename($_FILES["resume"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is a PDF
    if ($fileType != "pdf") {
        echo "Only PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check file size (adjust as needed)
    if ($_FILES["resume"]["size"] > 500000) {
        echo "File is too large. Max file size is 500 KB.";
        $uploadOk = 0;
    }

    // If everything is ok, try to upload file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["resume"]["tmp_name"], $targetFile)) {

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Insert data into the database
    $sql = "INSERT INTO career_cv (job_title, number, email, cv_file) VALUES ('$jobTitle', '$number', '$email', '$targetFile')";

    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Applied Successfully');</script>";
        echo "<script>window.location.href='career.html';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>