<?php
include('dbconnection.php');

$sql = "SELECT * FROM borrowing";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Information of borrowing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

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

        form {
            margin-bottom: 20px;
            text-align: center;
        }

        input[type="text"] {
            padding: 6px;
        }

        button[type="submit"] {
            padding: 6px 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        button.delete, button.update {
            padding: 6px 12px;
            background-color: #f44336;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin: 4px 2px;
            border-radius: 4px;
        }

        button.update {
            background-color: #008CBA;
        }

        footer {
            background-color: grey;
            text-align: center;
            color: white;
            font-size: 16px;
            height: 70px;
            line-height: 70px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <center>
        <form action="search_borrowing.php" method="GET">
            <input type="text" name="query" placeholder="Search here">
            <button type="submit">Search</button>
        </form>
        <h2>Table of borrowing</h2>
    </center>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Return Date</th>
            <th>Borrowing Date</th>
            <th>Amount</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $ID = $row['ID'];
                echo "<tr>
                    <td>" . $row['ID'] . "</td>
                    <td>" . $row['returndate'] . "</td>
                    <td>" . $row['borrowingdate'] . "</td>
                    <td>" . $row['amount'] . "</td>
                    <td><button class='delete'><a href='delete_borrowing.php?ID=$ID' style='color: white; text-decoration: none;'>Delete</a></button></td> 
                    <td><button class='update'><a href='update_borrowing.php?ID=$ID' style='color: white; text-decoration: none;'>Update</a></button></td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        $connection->close();
        ?>
    </table>
    <footer>
        <p>Designed by Fideline ISHIMWE_Mpundu_222003430 &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
    </footer>
    <center>
        <button style="background-color: darkgreen; width: 150px;height: 40px;">
            <a href="home page.html" style="font-size: 15px;color: white;text-decoration: none;">Back Home</a>
        </button>
    </center>
</body>
</html>
