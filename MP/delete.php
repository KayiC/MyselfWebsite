<?php
include_once 'addEntry';
include_once 'viewBlog.php';
global $conn;

if(isset($_GET['email'])){
    $e=$_GET['email'];
    if($del = mysqli_query($conn, "DELETE FROM `COMMENTS` WHERE `email` = '$e'")){
        echo "Record deleted successfully";
    }
    else{
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

if(isset($_GET['title'])){
    $t=$_GET['title'];
    if($del = mysqli_query($conn, "DELETE FROM `POSTS` WHERE `title` = '$t'")){
        echo "Record deleted successfully";
    }
    else{
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
