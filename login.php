<?php
session_start();

require('db_connect.php');

if (isset($_POST['email']) && isset($_POST['password'])) {
    $username = $conn->real_escape_string($_POST['email']);

    $query = "SELECT * FROM userSTD WHERE email=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        if (password_verify($_POST['password'], $hashedPassword)) {
            $_SESSION['user'] = $username;

            // Check if the user is an admin based on the role value
            if ($row['role'] == 2) {
                $_SESSION['role'] = 'admin';
                header('Location: admin.html');
            } else {
                header('Location: index.html');
            }
            exit;
        } else {
            echo "<script>alert('Invalid password');</script>";
            echo "<script>window.location.href='login.html';</script>";
            exit;
        }
    } else {
        echo "<script>alert('Invalid username');</script>";
        echo "<script>window.location.href='login.html';</script>";
        exit;
    }
}

// If the user is not already authenticated, redirect to the login page
if (!isset($_SESSION['user'])) {
    header('Location: login.html');
    exit;
}
?>
