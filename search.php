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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize user input to prevent SQL injection
    $searchTerm = mysqli_real_escape_string($conn, $_POST['search']);

    // Perform a search query
    $sql = "SELECT * FROM properties WHERE address LIKE '%$searchTerm%'";
    $result = $conn->query($sql);

    // Display search results
    if ($result->num_rows > 0) {
        // Assuming there is only one result, you can modify the logic if needed
        $row = $result->fetch_assoc();

        // Close the database connection
        $conn->close();

        // Redirect to searchAddress.php with the specific property address
        header("Location: addressSearch.php?address={$row['address']}");
        exit();
    } else {
        // Close the database connection
        $conn->close();

         // Display alert if no properties are found
         echo '<script>';
         echo 'alert("No properties found.");';
         echo 'window.location.href = "index.html";';
         echo '</script>';
         exit();
    }
}
?>
