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

// Check if id is set
if(isset($_REQUEST['AU_ID'])) {
    $id = $_REQUEST['AU_ID'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM authors WHERE AU_ID=?");
    $stmt->bind_param("i", $AU_ID);
      ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Delete Record</title>
        <script>
            function confirmDelete() {
                return confirm("Are you sure you want to delete this record?");
            }
        </script>
    </head>
    <body>
        <form method="post" onsubmit="return confirmDelete();">
            <input type="hidden" name="AU_ID" value="<?php echo $AU_ID; ?>">
            <input type="submit" value="Delete">
        </form>

        <?php

    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "AU_ID is not set.";
}

$connection->close();
?>
