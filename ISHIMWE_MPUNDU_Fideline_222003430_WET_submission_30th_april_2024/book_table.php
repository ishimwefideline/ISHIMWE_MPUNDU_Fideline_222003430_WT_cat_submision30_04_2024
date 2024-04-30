<?php
include('dbconnection.php');

$sql = "SELECT * FROM book";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table of book</title>
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
    <header>
        <h1>Table of books</h1>
    </header>

    <main>
        <table border="1">
            <tr>
                <th>BOOK_ID</th>
                <th>BOOK_TITLE</th>
                <th>BOOK_ISNB</th>
                <th>BOOK_PUBYEAR</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
            <?php if ($result->num_rows > 0) : ?>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $row['book_id'] ?></td>
                        <td><?= $row['book_title'] ?></td>
                        <td><?= $row['book_isnb'] ?></td>
                        <td><?= $row['book_pubyear'] ?></td>
                        <td><a class="delete" href='delete_book.php?book_id=<?= $row['book_id'] ?>'>Delete</a></td>
                        <td><a class="update" href='update_book.php?book_id=<?= $row['book_id'] ?>'>Update</a></td>
                    </tr>
                <?php endwhile; ?>
            <?php else : ?>
                <tr><td colspan='6'>No data found</td></tr>
            <?php endif; ?>
        </table>
    </main>
<center><button style="background-color: indigo; width: 150px;height: 40px;" ><a href="home page.html" style=" font-size: 15px;color: white;text-decoration: none;margin-top: 400px;" >Back Home</a></button></center>
    <footer>
        <p>UR CBE BIT &copy; 2024 &reg; Designed by: @fideline mpundu ishimwe</p>
    </footer>
</body>
</html>
