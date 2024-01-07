<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch feedback from the database
$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);

// Display feedback in a simple HTML table
echo "<html><head><title>View Feedback</title></head><body>";
echo "<h2>Feedback</h2>";

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Name</th><th>Rating</th><th>Feedback</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["rating"] . "</td><td>" . $row["comment"] . "</td></tr>";
    }

    echo "</table>";
} else {
    echo "No feedback available.";
}

echo "</body></html>";

// Close the database connection
$conn->close();
?>
<style>body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

h2 {
    text-align: center;
    color: #3498db;
    margin-top: 30px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #ffffff;
    border-radius: 10px;
    overflow: hidden;
}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #3498db;
    color: #ffffff;
}

tr:hover {
    background-color: #f5f5f5;
}

.no-feedback {
    text-align: center;
    margin-top: 20px;
    color: #777;
}

.back-link {
    display: block;
    margin-top: 20px;
    text-align: center;
}

.back-link a {
    text-decoration: none;
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    color: #ffffff;
    background-color: #2ecc71;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}

.back-link a:hover {
    background-color: #27ae60;
}


</style>