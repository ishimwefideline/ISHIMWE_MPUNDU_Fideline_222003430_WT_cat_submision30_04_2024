<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;

        }

        .container {
            width: 500px;
            margin: 50px auto;
            padding: 20px;
            border: 2px solid red;
            background-color: skyblue;
            border-radius: 10px; /* Added border radius */
        }

        .heading {
            text-align: center;
            font-weight: bold;
            font-size: 25px;
            color: blue;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-size: 20px;
            color: black; /* Corrected color */
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="password"],
        input[type="number"],
        input[type="date"] {
            width: calc(100% - 10px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="email"] {
            width: calc(100% - 10px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="tel"] {
            width: calc(100% - 10px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            width: 48%;
            padding: 10px;
            font-size: 20px;
            background-color:#dc3545 ;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        input[type="button"] {
            width: 48%;
            padding: 10px;
            font-size: 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }

        input[type="submit"]:last-child {
            background-color: blue;
            margin-left: 4%; /* Adjusted margin */
        }

        footer {
            background-color:teal;
            text-align: center;
            width: 100%;
            height: 70px;
            color: white;
            font-size: 25px;
            position: fixed;
            bottom: 0;
            left: 0;
        }
    </style>
    <script>
    function validateForm() {
        var email = document.getElementById('email').value;
        var phone = document.getElementById('phone').value;

        // Email validation
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            alert('Please enter a valid email address');
            return false;
        }

        // Phone number validation
        var phonePattern = /^\d{10}$/;
        if (!phonePattern.test(phone)) {
            alert('Please enter a valid 10-digit phone number');
            return false;
        }

        return true;
    }
</script>
</head>
<body style="background-image: url('.2.jpg');
background-repeat: no-repeat;background-size: cover;">
<h2 class="heading"><i>LIBRARY MANAGEMENT SYSTEM</i></h2>
<div class="container">
    <h2 class="heading"><i>Create Account Form</i></h2>
    <form action="Register.php" method="POST" onsubmit="return validateForm()">
       
        <div class="form-group">
            <label for="id">id</label>
            <input type="number" name="id" id="id" required>
        </div>
        <div class="form-group">
            <label for="name">name</label>
            <input type="text" name="name" id="name" required> <!-- Changed type to email -->
        </div>
        <div class="form-group">
            <label for="phone">phone</label>
            <input type="tel" name="phone" id="phone" required>
        </div>
        <div class="form-group">
            <label for="address
            ">address</label>
            <input type="text" name="phone" id="phone" required> <!-- Changed type to tel -->
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="username">username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-group">
            <label for="password">password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div class="form-group">
            <label for="hireddate">hireddate</label>
            <input type="date" name="hireddate" id="hireddate" required>
        </div>
        <input type="submit" name="send" value="Register">
        <input type="button" value="Cancel" onclick="window.location.href='login.html'">
    </form>
</div>

<footer>
    <p>Designed by fideline mpundu ishimwe_222002776 &copy; YEAR TWO BIT GROUP A &reg; 2024</p>
</footer>



</body>
</html>
