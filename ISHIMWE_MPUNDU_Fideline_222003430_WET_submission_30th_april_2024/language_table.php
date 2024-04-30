<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>library management system</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #f0f0f0;
            padding: 20px;
            text-align: center;
        }

        main {
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        footer {
            background-color: teal;
            text-align: center;
            color: white;
            font-size: 16px;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .delete, .update {
            padding: 8px 12px;
            background-color: #ff3333;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
            border-radius: 4px;
        }

        .update {
            background-color: #4CAF50;
        }
    </style>
</head>
<body> 
<center><p style="font-weight: bold;font-size: 25px;align-items: center;color: blue;"><i>LIBRARY MANAGEMENT SYSTEM</i></p></center><hr>
<div style="margin-left: 500px;"><form action="search.php" method="GET">
      <input type="search" name="query" placeholder="search here!!!!!!!">&nbsp;&nbsp;&nbsp;<button type="submit" style="background-color: blue;width: 100px;">search</button>
    </form></div><hr>
    <center><h2><i> TABLE FOR LANGUAGE </h2></i></center>
    <table>
        <tr>
            <th>lngid</th>
            <th>lng_fname</th>
            <th>lng_lname</th>
            <th>lng_country</th>
            
            <th colspan="2">Action</th>
        </tr>
        <?php
        // Define connection parameters
      include('dbconnection.php');
        $sql = "SELECT * FROM language";
        $result = $connection->query($sql);

        // Check if there are any products
        if ($result->num_rows > 0) {
            // Output data for each row
            while ($row = $result->fetch_assoc()) {
                $pid = $row['lngid']; // Fetch the Product_Id
                echo "<tr>
                    <td>" . $row['lngid'] . "</td>
                    <td>" . $row['lng_fname'] . "</td>
                    <td>" . $row['lng_lname'] . "</td>
                    <td>" . $row['lng_country'] . "</td>
                    
                    <td style='background-color:red'><a style='padding:4px' href='delete_language.php?lngid=$pid'>Delete</a></td> 
                    <td style='background-color:#007bff'><a style='padding:4px' href='update_language.php?lngid=$pid'>Update</a></td> 
                </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        // Close the database connection
        $connection->close();
        ?>
    </table>
    <center><button style="background-color: indigo; width: 150px;height: 40px;" ><a href="home page.html" style=" font-size: 15px;color: white;text-decoration: none;margin-top: 400px;" >Back Home</a></button></center>
</body>
 <div><footer style="background-color:teal;text-align: center;width:100%;height:70px; color: white;font-size: 25px;bottom:0px;"><p style="margin-top: 20px;"> Designed by fideline mpundu ishimwe_222003430 &copy YEAR TWO BIT GROUP A &reg 2024</p></footer></div>

</body>
</html>