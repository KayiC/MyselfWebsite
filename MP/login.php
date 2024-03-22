<html>
    <head>
        <title>Login</title>
        <meta charset='utf-8'>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Signika+Negative&display=swap" rel="stylesheet">
        <style>
            @import url("CSS/reset.css");
            @import url("CSS/portfolio.css");
            @import url("CSS/mobile.css");
        </style>
    </head>
    <body id="lg">
        <form align="center" id="login-in" action="checkLogin.php?op=checkLogin" method="post">
            <legend>Login</legend>
            <div class="Login">
                <ol>
                    <li><input type="email" name="email" required placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"><br></li>
                    <li><input type="password" name="password" required title="Password must contain at least 6 characters, including UPPER/lowercase and numbers" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}"><br></li>
                </ol>
            </div>
            <button type="submit">LOGIN</button>
            <button type="button"><a href="registration.php">Registration</a></button>
        </form>
        <footer class="back"><a href=Home.html><img src="image/back.png" width="23" height="20" id="logo"></a></footer>
    </body>
</html>

<?php
session_start();
if(isset($_SESSION['email'])){
    header("Location: addPost.html");
}
?>