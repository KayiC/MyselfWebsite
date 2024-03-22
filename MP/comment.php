<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
</head>
<?php 
include_once 'addEntry.php';
include_once 'viewBlog.php';
session_start();
global $conn;
global $data;
?>
<body>
    <form align="center" id="comment" action="viewBlog.php" method="POST">
        <input type="text" required placeholder="Comment" name="comment">
        <button type="submit">Submit</button>
    </form>
</body>
</html>

<?php
if(empty($_POST['comment'])){
    echo "Blank comments cannot be submitted. Please complete this field.";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $sql = "INSERT INTO COMMENTS (`email`, `comment`, `post_title`)
   VALUES ('{$_SESSION['email']}', '{$_POST['comment']}', '{$data['title']}')";

    if ($conn->query($sql) === TRUE) {
        header("Location: viewBlog.php");
    } 
    else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}

