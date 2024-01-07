<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'project';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$agents = array();

// Fetch agent data from the database
$sql = "SELECT * FROM agents";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $agents[] = array(
            'name' => $row['name'],
            'image_url' => $row['image_url'],
            'email' => $row['email'],

            'major' => $row['major'],
            'description' => $row['description']
            // Add more fields as needed
        );
    }
}

// Close the database connection
$conn->close();

// Return the agent data as JSON
header('Content-Type: application/json');
echo json_encode($agents);
?>
