<?php
$servername="localhost";
$username="root";
$password="";
$dbname="ishimwe_mpundu_fideline";

// Creating connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
// Handling POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieving form data
    $ID  = $_POST['ID'];
    $fname  = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $birthdate = $_POST['birthdate'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    
    // Preparing SQL query
    $sql = "INSERT INTO user (ID, firstname, lastname, address, contact, birthdate, username, password) VALUES ('$ID','$fname','$lname','$address', '$contact', '$birthdate','$username','$password')";

    // Executing SQL query
    if ($connection->query($sql) === TRUE) {
        // Redirecting to login page on successful registration
        header("Location: index.html");
        exit();
    } else {
        // Displaying error message if query execution fails
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Closing database connection
$connection->close();
?>
