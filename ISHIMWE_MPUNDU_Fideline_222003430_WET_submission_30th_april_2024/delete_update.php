<?php
// Include database connection
include 'db_connection.php';

// Check if database connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve lounge ID from the form
    $lounge_id = $_POST["lounge_id_delete"];

    // SQL query to delete lounge record
    $sql = "DELETE FROM lounge WHERE lngid=?";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the parameter
        $stmt->bind_param("i", $lounge_id);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Lounge record deleted successfully";
        } else {
            echo "Error deleting lounge record: " . $stmt->error;
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
