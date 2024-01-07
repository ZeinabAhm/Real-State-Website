<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'project';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch agent names from the database
$sql = "SELECT name FROM agents";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $agentNames = array();

    // Fetch and store agent names in an array
    while ($row = $result->fetch_assoc()) {
        $agentNames[] = $row['name'];
    }

    // Return agent names as JSON
    echo json_encode($agentNames);
} else {
    echo json_encode(array()); // Return an empty array if no agents found
}

$conn->close();
?>
