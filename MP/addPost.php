<?php
include_once 'addEntry.php';
global $conn;

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sql = "INSERT INTO `POSTS`(`title`, `body_text`)
   VALUES ('{$_POST['title']}', '{$_POST['body_text']}')";

    if ($conn->query($sql) === TRUE) {
        header("Location: viewBlog.php");
    } 
    else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}