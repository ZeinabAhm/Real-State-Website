<?php
// Include the database connection
require_once('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Securely hash the password


    // Insert student data into the 'student' table
    $sql = "INSERT INTO information (name, email,username) VALUES ('$name', '$email', '$username')";
    if (mysqli_query($conn, $sql)) {
        // Insert user data into the 'userSTD' table
        $sql = "INSERT INTO userSTD (email, password) VALUES ('$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            // Redirect to a success page
            header('Location: index.html');
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>