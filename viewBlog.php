<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/reset.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="CSS/portfolio.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="CSS/mobile.css?v=<?php echo time(); ?>">
    <title>My Blog</title>
</head>
<body id="viewBlog">
    <p>
        <?php 
        include_once 'index.php';
        include_once 'addEntry.php';
        ?>
    </p>
    <form class="calendar" method="post" action="viewBlog.php">
        <p><img src="image/calender.png" width="25" height="25" id="logo">:</p>
        <select name="monthSelect" class="monthSelect">
            <option value="All" selected>All</option>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM `POSTS` WHERE `ts` BETWEEN '2023-01-01' AND '2033-12-31'");
            while($rows = mysqli_fetch_array($result)){
            ?>
            <option value="<?php echo date("m", strtotime($rows[3]));?>">
            <?php
            echo date("M", strtotime($rows[3]));
            ?>
            </option>
            <?php } ?>
        </select>
        <input type="submit" value="Go">
    </form>
</body>
</html>

<?php
    session_start();
    global $conn;

    $k = $_POST['monthSelect'];

    if($k == "All"){
    $r = mysqli_query($conn, "SELECT * FROM `POSTS`");
    }
    else{
        $r = mysqli_query($conn, "SELECT * FROM `POSTS` WHERE MONTH(`ts`) = '{$k}'");
    }

    while($row = mysqli_fetch_array($r)){
        $dataA[] = array('title'=>$row['title'], 'body_text'=>$row['body_text'], 'ts'=>$row['ts']);
    }

    function sort_algorithms($arr){
        $row = count($arr);
        for($i=0; $i<$row; $i++){
            for($j=0; $j<$row;$j++){
                if($arr[$j]['ts']<$arr[$j+1]['ts']){
                    $temp = $arr[$j];
                    $arr[$j] = $arr[$j+1];
                    $arr[$j+1] = $temp;
                }
            }
        }
        return $arr;
    } 
    $dataR = sort_algorithms($dataA);
    
    foreach($dataR as $data){
        echo '<div id="time" class="data">';
        echo $data['ts'].'<br>';
        echo '</div>'.'<div id="heading" class="data">';
        echo $data['title'].'<br>';
        echo '</div>'.'<div id="body" class="data">';
        echo $data['body_text'].'<br>';
        echo '</div>'.'<hr>';

        if($_SESSION['email']== 'kellycheng790@gmail.com'){
            echo '<p id=cd><a href=comment.php><img src="image/comment.png" width="23" height="20" id="logo"></a></p>';
            echo "<p id=cd><a href=delete.php?title=".$data['title'].">".'<img src="image/rubbish_bin.png" width="23" height="20" id="logo"></a></p>';
        }
        else if($_SESSION){
            echo '<p><a href=comment.php><img src="image/comment.png" width="23" height="20" id="logo"></a></p>';
        }

        $res = mysqli_query($conn, "SELECT * FROM `COMMENTS` WHERE `post_title` = '{$data['title']}'");
        while($com = mysqli_fetch_array($res)){
            echo '<div class="comments">';
            echo '<b>'.$com['email'].'</b><br>';
            echo '<p>'.$com['comments'].'</p><br>';
            if($_SESSION['email']== 'kellycheng790@gmail.com'){
                echo '<p id=cd><a href=comment.php><img src="image/comment.png" width="23" height="20" id="logo"></a></p>';
                echo "<p id=cd><a href=delete.php?email=".$com['email'].">".'<img src="image/rubbish_bin.png" width="23" height="20" id="logo"></a></p>';
            }
            echo '</div>';
        }
    }

?>