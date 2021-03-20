<?php
    $content = $_POST["content"];
    $username = $_POST["username"];
    var_dump($content,$username);
    $conn = mysqli_connect('localhost','root','','php10');
    $sql = "insert into msg (username,content) values ('{$username}','{$content}')";
    if(mysqli_query($conn,$sql)){
        echo "新纪录插入成功";
    }
    else{
        echo "Error:".$sql."<br>".mysqli_error($conn);
    }
    header('location: list.php')
?>