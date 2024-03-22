<?php
    include_once 'addEntry.php';
    global $conn;

    $psw = $_POST['psw'];
    $cpsw = $_POST['cpsw'];

    if($psw!=$cpsw){
        echo "Password and Confirm Password does not match. Please enter the password and confirm password again.";

    }
    else if($psw == "" || $cpsw == ""){
        echo "Password or Confirm Password cannot be blank. Please enter a vaild password.";
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $sql = "INSERT INTO `USERS`(`firstName`, `lastName`, `email`, `password`)
        VALUES ('{$_POST['first_name']}', '{$_POST['surname']}', '{$_POST['registration_email']}', '{$_POST['psw']}')";

        if ($conn->query($sql) === TRUE) {
    ?>
    
    <p>Registration Successful</p>
    <button type="button"><a href="login.php">Login</a></button>

    <?php
        } 
        else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
?>