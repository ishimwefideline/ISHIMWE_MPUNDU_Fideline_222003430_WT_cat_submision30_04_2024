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

// Check if Product_Id is set
if(isset($_REQUEST['AU_ID'])) {
    $id = $_REQUEST['AU_ID'];
    
    $stmt = $connection->prepare("SELECT * FROM authors WHERE AU_ID=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['AU_ID'];
        $y = $row['AU_FNAME'];
        $z = $row['AU_LNAME'];
        $w = $row['AU_biography'];
    } else {
        echo "authors not found.";
    }
}
$stmt->close(); // Close the statement after use

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update authors</title>
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
?>

<html>
<body>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="AU_ID">AU_ID:</label>
        <input type="number" name="AU_ID" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="AU_FNAME">AU_FNAME:</label>
        <input type="name" name="AU_FNAME" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="AU_LNAME">AU_LNAME:</label>
        <input type="name" name="AU_LNAME" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>

         <label for="AU_biography">AU_biography:</label>
        <input type="name" name="AU_biography" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $bookingdateandtime = $_POST['AU_ID'];
    $bookingdateandtime = $_POST['AU_FNAME'];
    $numberofticket = $_POST['AU_LNAME'];
    $totalprice = $_POST['AU_biography'];
    
    // Update the product in the database
    $stmt = $connection->prepare("UPDATE authors SET  AU_FNAME=?, AU_LNAME=?, AU_biography=? WHERE AU_ID=?");
    $stmt->bind_param("sssi", $AU_FNAME, $AU_LNAME, $AU_biography, $AU_ID);
    $stmt->execute();
    
    // Redirect to authors.php
    header('Location: authors.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
