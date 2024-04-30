<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System - About Us</title>
    <style>
     /* General styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('./tth.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Header styling */
        .header {
            display: flex;
            margin: 20px;
            align-items: center;
            padding: 10px 20px;
            background-color: teal;
            border-bottom: 5px solid black;
        }
        .logo {
            width: 60px;
            height: auto;
        }
        .header h3 {
            color: white;
            margin: 0;
        }
        .navigation {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .navigation li {
            display: inline-block;
            margin-right: 10px;
        }
        .navigation li a {
            text-decoration: none;
            color: white;
            padding: 8px 15px;
            border-radius: 3px;
        }
        .navigation li a:hover {
            background-color: deeppink;
        }

        /* Main content styling */
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9); /* Adding opacity to background */
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h2 {
            color: darkolivegreen;
        }
        .container p {
            color: #333;
        }

        /* Footer styling */
        footer {
            background-color: teal;
            text-align: center;
            width: 100%;
            height: 70px;
            color: white;
            font-size: 18px;
            position: fixed;
            bottom: 0;
            left: 0;
            padding-top: 25px;
        }

        /* Dropdown styles */
        .dropdown-contents {
            display: none;
            position: absolute;
            background-color: deeppink;
            min-width: 120px;
            z-index: 1;
        }
        .dropdown-contents a {
            color: black;
            text-decoration: none;
            display: block;
            padding: 10px;
        }
        .dropdown-contents a:hover {
            background-color: red;
        }
        .dropdown:hover .dropdown-contents {
            display: block;
        }
    </style>
</head>
<body>
<div class="header">
    <img class="logo" src="logo.jpg" alt="Logo">
    <h3>LIBRARY <br>MANAGEMENT SYSTEM</h3>
    <ul class="navigation">
        <li><a href="home_page.html">Home</a></li>
        <li><a href="about_us.html">About Us</a></li>
        <li><a href="contact_us.html">Contact Us</a></li>
        <li class="dropdown">
            <a href="#">Forms</a>
            <div class="dropdown-contents">
                <a href="Admin.php">Admin</a>
                <a href="authors.php">Authors</a>
                <a href="book.php">Book</a>
                <a href="borrowing.php">Borrowing</a>
                <a href="publisher.php">Publisher</a>
                <a href="registration.php">Registration</a>
                <a href="user.php">User</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="#">Tables</a>
            <div class="dropdown-contents">
                <a href="Admin.php">Admin</a>
                <a href="authors.php">Authors</a>
                <a href="book.php">Book</a>
                <a href="borrowing.php">Borrowing</a>
                <a href="publisher.php">Publisher</a>
                <a href="registration.php">Registration</a>
                <a href="user.php">User</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="#">Settings</a>
            <div class="dropdown-contents">
                <a href="login.php">Login</a>
                <a href="registration.php">Registration</a>
                <a href="logout.php">Logout</a>
            </div>
        </li>
    </ul>
</div>
<center>
<p style="font-weight: bold;font-size: 25px;align-items: center;color: blue;"><i>LIBRARY MANAGEMENT SYSTEM</i></p>
<form action="" method="POST" onsubmit="return confirmInsert();">
    <h3 style="font-size: 20px;color: deeppink;"><i>Language FORM</i></h3>
    <label for="lngid">lngid:</label>
    <input type="number" id="lngid" name="lngid"><br><br>

    <label for="lng_fname">lng_fname:</label>
    <input type="text" id="lng_fname" name="lng_fname" required><br><br>

    <label for="lng_lname">lng_lname:</label>
    <input type="text" id="lng_lname" name="lng_lname" required><br><br>

    <label for="lng_country">lng_country:</label>
    <input type="text" id="lng_country" name="lng_country" required><br><br>

    <input type="submit" name="send" value="Register" style="width: 150px;background-color: indigo;color: white;font-size: 30px;">
    <input type="submit" name="send" value="Cancel" style="width: 150px;background-color:blue;color: white;font-size: 30px;">
</form>

<?php
include "dbconnection.php";
if(isset($_POST['send'])) {
    // Retrieve values from form
    $lngid = $_POST['lngid'];
    $lng_fname = $_POST['lng_fname'];
    $lng_lname = $_POST['lng_lname'];
    $lng_country = $_POST['lng_country'];

    // Insert new record into the database
    $stmt = $connection->prepare("INSERT INTO language (lngid, lng_fname, lng_lname, lng_country) VALUES (?, ?, ?, ?)");

    $stmt->bind_param("isss", $lngid, $lng_fname, $lng_lname, $lng_country);

    if ($stmt->execute()) {
        echo "<script>alert('Record inserted successfully.');</script>";
    } else {
        echo "Error inserting record: " . $stmt->error;
    }
}
?>
<footer>
    <p>Designed by Fideline mpundu ishimwe_222003430 &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
</footer>
</body>
</html>
