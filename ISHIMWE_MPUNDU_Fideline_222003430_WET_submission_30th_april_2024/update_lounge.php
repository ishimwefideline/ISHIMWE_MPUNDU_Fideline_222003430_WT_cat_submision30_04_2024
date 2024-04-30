<?php
// Include database connection
include 'db_connection.php';

// Check if database connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $lounge_id = $_POST["lounge_id"];
    $lng_fname = $_POST["lng_fname"];
    $lng_lname = $_POST["lng_lname"];
    $lng_country = $_POST["lng_country"];

    // SQL query to update lounge information
    $sql = "UPDATE lounge SET lng_fname=?, lng_lname=?, lng_country=? WHERE lngid=?";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("sssi", $lng_fname, $lng_lname, $lng_country, $lounge_id);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Lounge information updated successfully";
        } else {
            echo "Error updating lounge information: " . $stmt->error;
        }

        // Close statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
