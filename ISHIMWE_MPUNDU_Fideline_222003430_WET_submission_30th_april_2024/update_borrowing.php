<?php
// file contain database connection
include "dbconnection.php";
// Check if user_id is set
if (isset($_REQUEST['ID'])) {
    $user_id = $_REQUEST['ID'];

    // Prepare and execute SELECT statement to retrieve user details
    $stmt = $connection->prepare("SELECT * FROM borrowing WHERE ID = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $a = $row['ID'];
        $x = $row['returndate'];
        $z = $row['borrowingdate'];
        $b = $row['amount']; // Corrected 'Status' to 'status'
    } else {
        echo "User not found.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
   <head><title>update employee record</title> 
 <!-- JavaScript validation and content load for update or modify data-->
    <script>
        function confirmUpdate() {
            return confirm('Are you sure you want to update this record?');
        }
    </script>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        form {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            border: 2px solid red;
            border-radius: 10px;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"],
        input[type="date"],
        input[type="number"] {
            width: calc(100% - 22px); /* Adjusting width to account for padding and border */
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            outline: none;
            margin-top: 5px;
        }
        input[type="submit"],
        input[type="reset"] {
            width: 45%;
            background-color: indigo;
            color: white;
            font-size: 20px;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: darkblue;
        }
    </style></head>
<body>
    <form method="POST" onsubmit="return confirmUpdate();">
 
    <center><p style="color: deeppink;font-size: 20px;">update Holiday records</p></center>
        <label for="employee_code">Id:</label>
        <input type="text" name="ID" value="<?php echo isset($a) ? $a : ''; ?>">
        <br><br>
        <label for="returndate">returndate</label>
        <input type="date" name="returndate" value="<?php echo isset($x) ? $x : ''; ?>">
        <br><br>
        <label for="startdate">borrowingdate</label>
        <input type="date" name="borrowingdate" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>
        <label for="enddate">amount</label>
        <input type="number" name="amount" value="<?php echo isset($b) ? $b : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
        <input type="reset" name="cn" value="Cancel">
    </form>
</body>
</html>

<?php
//file contains database connection
include "dbconnection.php";
if (isset($_POST['up'])) {
    // Retrieve updated values from form
    $firstname = $_POST['ID'];
    $lastname = $_POST['returndate'];
    $username = $_POST['borrowingdate'];
    $email = $_POST['amount'];
    // Update the user in the database
    $stmt = $connection->prepare("UPDATE borrowing SET returndate=?, borrowingdate=?, amount=?, WHERE ID=?");

    $stmt->bind_param("sssssi",$lastname, $username, $email, $user_id); // Corrected binding parameters

    if ($stmt->execute()) {
      echo "<script>alert('attendance updated successfully.'); window.location.href = 'borrowing.php?id=$user_id';</script>";
        exit(); // Ensure that no other content is sent after the header redirection
    } else {
         echo echo "<script>alert('fail in editing record.');</script>" . $stmt->error;
    }
}
?>
