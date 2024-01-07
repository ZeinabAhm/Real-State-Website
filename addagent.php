<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'project';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $agentName = mysqli_real_escape_string($conn, $_POST['adminAgentName']);
    $agentImageURL = mysqli_real_escape_string($conn, $_POST['adminAgentImageURL']);
    $agentMajor = mysqli_real_escape_string($conn, $_POST['adminAgentMajor']);
    $agentEmail = mysqli_real_escape_string($conn, $_POST['adminAgentEmail']);
    $agentDescription = mysqli_real_escape_string($conn, $_POST['adminAgentDescription']);

    $sql = "INSERT INTO agents (name, image_url, major, email, description) VALUES ('$agentName', '$agentImageURL', '$agentMajor', '$agentEmail', '$agentDescription')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => $conn->error]);
    }
}

$conn->close();
?>
