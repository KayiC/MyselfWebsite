<?php
include_once 'addEntry.php';
session_start();

if($_GET['op']=='checkLogin'){
    checkLogin($_POST['email'], $_POST['password']);
}
else{
    echo 'error';
}

function checkLogin($email, $password){
    global $conn;
    $userQ = mysqli_query($conn, "SELECT `email`,`password` FROM `USERS`");
    while($user = mysqli_fetch_assoc($userQ)){
        if($email == $user['email'] && $password == $user['password']){
            $_SESSION['email'] = $_POST['email'];
    
            header("Location: addPost.html");
            exit;
        }
    }
        
    echo "<p>Error: Incorrect email address or password.</p>";
    exit;
}
?>