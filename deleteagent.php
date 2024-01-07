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
    $agentName = mysqli_real_escape_string($conn, $_POST['agentName']);

    // Check if the agent exists in the database
    $checkSql = "SELECT * FROM agents WHERE name = '$agentName'";
    $checkResult = $conn->query($checkSql);

    if ($checkResult->num_rows > 0) {
        // Agent exists, proceed with deletion
        $deleteSql = "DELETE FROM agents WHERE name = '$agentName'";
        if ($conn->query($deleteSql) === TRUE) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => $conn->error]);
        }
    } else {
        // Agent does not exist
        echo json_encode(['status' => 'error', 'message' => 'Agent not found']);
    }
}

$conn->close();
?>
