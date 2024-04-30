<?php
// Connection details
include('dbconnection.php');
// Check if course_code is set
if(isset($_REQUEST['book_id'])) {
    $ID = $_REQUEST['book_id'];
    
    // Prepare and execute SELECT statement to retrieve courses details
    $stmt = $connection->prepare("SELECT * FROM book WHERE book_id= ?");
    $stmt->bind_param("i", $ID);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['book_id'];
        $z = $row['book_title'];
        $y = $row['book_isnb'];
        $z = $row['book_pubyear'];
       

    } else {
        echo "borrowing not found.";
    }
}

?>

<html>
<head><title></title>
<!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script></head>
<body>
    <form method="POST" onsubmit="return confirmUpdate();">
        <label for="ID">Book_Id:</label>
        <input type="number" name="book_id" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>

        <label for="returndate">Book_Title:</label>
        <input type="text" name="book_title" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        
        <label for="borrowingdate">book_isnb:</label>
        <input type="text" name="book_isnb" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>
        <label for="amount">book_pubyear:</label>
        <input type="number" name="book_pubyear" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>
        
       
        <input type="submit" name="up" value="Update">
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $ID = $_POST['book_id'];
    $returndate = $_POST['book_title'];
    $borrowingdate = $_POST['book_isnb'];
    $amount = $_POST['book_pubyear'];
    
    // Update the courses in the database
    $stmt = $connection->prepare("UPDATE book SET book_title=?, book_isnb=?, book_pubyear=? WHERE book_id=?");
    $stmt->bind_param("ssss", $cID, $returndate, $borrowingdate, $amount);
    
    if ($stmt->execute()) {
        // Redirect to courses.php after successful update
        header('Location: book_table.php');
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
        echo "Error updating borrowing: " . $stmt->error;
    }
}
?>
