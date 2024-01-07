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

// Get property address from the URL parameter
$propertyAddress = isset($_GET['address']) ? urldecode($_GET['address']) : null;

// Validate property address
if (!$propertyAddress) {
    echo "  window.location.href = 'index.html';    ";
} else {
    // Perform a query to fetch all property details based on the property address
    $sql = "SELECT * FROM properties WHERE address = '$propertyAddress'";
    $result = $conn->query($sql);

    // Display all property details
    if ($result->num_rows > 0) {
        $propertyDetails = $result->fetch_assoc();
        ?>
      <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />
    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Property Details</title>
</head>

<body>

    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
        <div class="container">
            <div class="menu-bg-wrap">
                <div class="site-navigation">
                    <a href="index.html" class="logo m-0 float-start">Property</a>
                    <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
                        <li><a href="index.html">Home</a></li>
                        <li class="has-children">
                            <a href="properties.html">Properties</a>
                         </li>
                        <li><a href="services.html">Services</a></li>
                        <li><a href="about.html">About</a></li>
                        <li class="active"><a href="contact.html">Contact Us</a></li>
                    </ul>
                    <a href="#" class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
                        <span></span>
                    </a>
                </div>
            </div>
        </div>
    </nav><div class="container">
            <!-- Display property details as needed -->
            <h1><?php echo $propertyDetails['address']; ?></h1>
            <img src="<?php echo $propertyDetails['image_url']; ?>" alt="Property Image">
            <p><?php echo $propertyDetails['city']; ?></p>
            <p>Number of bedrooms: <?php echo $propertyDetails['beds']; ?></p>
            <p>Number of bathrooms: <?php echo $propertyDetails['baths']; ?></p>
            <!-- Add more property details as needed -->
            <a href="schedule.html" class="btn btn-primary py-2 px-3">Schedule A Meeting</a>
    </div>
    
        <style>
    /* Add this style if you don't have a specific class for buttons */
    .btn {
        background-color: #007bff;
        color: #fff;
       margin-left: 40%;
    }

    body {
            font-family: 'Arial', sans-serif;
            line-height: 1.6;
            color: teal;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: teal;
            text-align: center;
        }

        p {
            text-align: center;
            margin-bottom: 10px;
            color:teal;
        }

        img {
            width: 150px;
            height: auto;
            display: block;
            margin: 0 auto;
        }
    </style>

        </html>
        <?php
    } else {
        echo "Property not found.";
    }
}

// Close the database connection
$conn->close();
?>
