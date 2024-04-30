<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System - Home</title>
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
            background-color: transparent;
        }
        .navigation li a:hover {
            background-color: deeppink;
        }

        /* Main content styling */
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
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
                <!-- Move this input tag out of dropdown-contents -->
            </div>
        </li>
    </ul>
</div>
<section class="container">
    <h1><u>Book Form</u></h1>
    <form method="post" action="">
        <label for="book_id">Book ID:</label>
        <input type="number" id="book_id" name="book_id" required><br><br>

        <label for="book_title">Book Title:</label>
        <input type="text" id="book_title" name="book_title" required><br><br>

        <label for="book_isnb">Book ISNB:</label>
        <input type="text" id="book_isnb" name="book_isnb" required><br><br>

        <label for="book_pubyear">Book Publication Year:</label>
        <input type="number" id="book_pubyear" name="book_pubyear" required><br><br>

        <input type="submit" name="add" value="Insert"><br><br>
    </form>
</section>

<?php
include('dbconnection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind parameters for book insertion
    $stmt = $connection->prepare("INSERT INTO book (book_id, book_title, book_isnb, book_pubyear) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $book_id, $book_title, $book_isnb, $book_pubyear);

    // Set parameters from form data
    $book_id = $_POST['book_id'];
    $book_title = $_POST['book_title'];
    $book_isnb = $_POST['book_isnb'];
    $book_pubyear = $_POST['book_pubyear'];

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "New record has been added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>

<footer>
    <center><b>UR CBE BIT &copy; 2024 &reg; Designed by: @fideline mpundu ishimwe</b></center>
</footer>

</body>
</html>
