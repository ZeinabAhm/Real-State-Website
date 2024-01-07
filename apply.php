<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Job</title>
</head>
<body>

<?php
// Retrieve job title from the URL
$jobTitle = urldecode($_GET['job_title']);

// Display the job title in your form

// Your form can include additional fields as needed

echo '<form action="process_apply.php" id="applicationForm"  method="post" enctype="multipart/form-data">';
echo '<h2>Apply for Job: ' . htmlspecialchars($jobTitle) . '</h2>';

echo '  <input type="hidden" name="job_id" value="' . htmlspecialchars($_GET['job_id']) . '">';
echo '  <label for="number">Your Number:</label>';
echo '  <input type="text" name="number" required>';
echo '  <label for="email">Your Email:</label>';
echo '  <input type="email" name="email" required>';
echo '  <label for="resume">Resume (PDF only):</label>';
echo '  <input type="file" name="resume" accept=".pdf" required>';
echo '  <input type="hidden" name="job_title" value="' . htmlspecialchars($jobTitle) . '">';
echo '  <input type="submit" value="Submit Application">';
echo '</form>';
?>
 <script>
        $(document).ready(function () {
            $('#applicationForm').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'process_apply.php',
                    data: $(this).serialize(),
                    success: function (data) {
                        alert('Applied successfully!');
                        // You can redirect or perform other actions as needed
                        window.location.href = 'career.html';
                    },
                    error: function (error) {
                        console.log('Error:', error);
                    }
                });
            });
        });
    </script>
 <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        input[type="file"] {
            border: none;
            background-color: #f5f5f5;
        }

        input[type="submit"] {
            background-color: teal;
            color: #fff;
            padding: 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</body>
</html>
