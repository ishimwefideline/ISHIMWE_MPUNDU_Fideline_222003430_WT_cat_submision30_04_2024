<?php
include('dbconnection.php');


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare and bind the parameters
    $stmt = $connection->prepare("INSERT INTO authors (AU_ID, AU_FNAME, AU_LNAME, AU_biography) VALUES (?, ?, ?, ?)"); 
    $stmt->bind_param("ssss", $AU_ID, $AU_FNAME, $AU_LNAME, $AU_biography);
    // Set parameters and execute
    $AU_ID = $_POST['AU_ID'];
    $AU_FNAME = $_POST['AU_FNAME'];
    $AU_LNAME = $_POST['AU_LNAME'];
    $AU_biography = $_POST['AU_biography'];
   
    if ($stmt->execute() === TRUE) {
        echo "New record has been added successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// SQL query to fetch data from the booking table
$sql = "SELECT * FROM authors";
$result = $connection->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail information Of authors</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <center><h2>Table of authors</h2></center>
    <table border="5">
        <tr>
            <th>AU_ID</th>
            <th>AU_FNAME</th>
            <th>AU_LNAME</th>
            <th>AU_biography</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        // Check if there are any bookings
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $id = $row['AU_ID']; // Fetch the id
                echo "<tr>
                    <td>" . $row['AU_ID'] . "</td>
                    <td>" . $row['AU_FNAME'] . "</td>
                    <td>" . $row['AU_LNAME'] . "</td>
                    <td>" . $row['AU_biography'] . "</td>
                    <td><a style='padding:4px' href='delete_booking.php?AU_ID=$id'>Delete</a></td> 
                    <td><a style='padding:4px' href='update_booking.php?AU_ID=$id'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>

    <footer>
        <center> 
            <b><h2>UR CBE BIT &copy, 2024 &reg;, Designer by: @Irasubiza denyse</h2></b>
        </center>
    </footer>
</body>
</html>
