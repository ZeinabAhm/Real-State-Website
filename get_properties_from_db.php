<?php
// get_properties_from_db.php

include('db_connect.php');

// Fetch properties from the database
$sql = "SELECT * FROM properties";
$result = mysqli_query($conn, $sql);
$properties = array();
// Fetch each row from the result set
while ($row = mysqli_fetch_assoc($result)) {
    $properties[] = array(
        'id' => $row['id'],
        'address' => $row['address'],
        'price' => $row['price'],
        'beds' => $row['beds'],
        'baths' => $row['baths'],
        'image_url' => $row['image_url']
    );
}

// Close the database connection
mysqli_close($conn);

// Return properties as JSON
echo json_encode($properties);
?>
