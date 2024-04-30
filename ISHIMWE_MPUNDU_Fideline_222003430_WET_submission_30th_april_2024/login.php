<?php

session_start();
include('dbconnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $em = $_POST['username'];
    $pass = $_POST['password'];

    // Prepare SQL statement to prevent SQL injection
    $sql = $connection->prepare("SELECT * FROM registration WHERE username= ? AND password = ?");
    
    // Check if prepare() succeeded
    if (!$sql) {
        die("Prepare failed: " . $conn->error);
    }
    
    // Bind parameters
    $sql->bind_param("ss", $em, $pass);

    // Execute query
    $sql->execute();
    
    // Check for errors in query execution
    if ($sql->error) {
        die("Query execution error: " . $sql->error);
    }

    // Get result set
    $result = $sql->get_result();

    // Check if any rows are returned
    if ($result->num_rows == 1) {
        // Fetch user data
        $user_data = $result->fetch_assoc();

        // Store user data in session
        $_SESSION['email'] = $user_data['email'];

        echo 'success'; // Send success message
        header("location:home page.html");
    } else {
        echo 'Invalid username or password'; // Send error message
    }
}

$connection->close();
?>
