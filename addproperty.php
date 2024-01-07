<?php
// add_property.php

include('db_connect.php');

$address = $_POST['address'];
$price = $_POST['price'];
$information = $_POST['information'];
$city = $_POST['city'];
$beds = $_POST['beds'];
$baths = $_POST['baths'];
$image_url = $_POST['image_url'];

// Insert data into the properties table
$sql = "INSERT INTO properties (address,city, information,price, beds, baths, image_url) VALUES ('$address', '$city','$information','$price', '$beds', '$baths', '$image_url')";
$result = mysqli_query($conn, $sql);

mysqli_close($conn);

header("Location: addproperty.html");
exit();
?>
