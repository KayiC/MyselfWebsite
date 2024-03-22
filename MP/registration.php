<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/portfolio.css">
    <link rel="stylesheet" href="CSS/mobile.css">
</head>
<?php
    include 'index.php';
?>
<body class="userReg">
    <form align="center" id="Registration" action="regSuccess.php" method="POST">
        <legend>User Registration Form</legend><br>
        <div class="Registraion">
            <ol>
                <li><input type="text" required placeholder="First Name" name="first_name"><br></li>
                <li><input type="text" required placeholder="Surname" name="surname"><br></li>
                <li><input type="email"  required placeholder="Email" name="registration_email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"><br></li>
                <li><input type="password" required name="psw" placeholder="Password" title="Password must contain at least 6 characters, including UPPER/lowercase and numbers" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"><br></li>
                <li><input type="password" required name="cpsw" placeholder="Confirm Password" title="Password must contain at least 6 characters, including UPPER/lowercase and numbers"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"><br></li>
            </ol>
        </div>
        <button type="submit">Complete Registration</button>
    </form>
    <p class="back" id="return"><a href="login.php"><img src="image/back.png" width="23" height="20" id="logo"></a></p>
</body>
</html>

