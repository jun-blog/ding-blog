<?php
session_start();//启用session
header("Content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');
// header("Content-type:text/html;charset=utf-8");    //设置编码
// include "post.php";
$conn=mysqli_connect("localhost","root","","comment");
// $id = $_POST["id"];
$content = $_POST["content"];
$username = $_SESSION['name'];
$time = date("Y:m:d H:i:s",time());
$art_id = $_POST["art_id"];
// mysqli_set_charset($conn,"utf8");
// $sql="SELECT * from comments";
// $que=mysqli_query($conn,$sql);
// while($row=mysqli_fetch_array($que)){
//       $comments[] = array("id"=>$row['id'],"user"=>$row['user'],"comment"=>$row['comment'],"addtime"=>$row['addtime']);
// }
// echo json_encode($comments);
$sql = "insert into comments (user,comment,addtime,art_id) values ('{$username}','{$content}','{$time}','{$art_id}')";
    if(mysqli_query($conn,$sql)){
        echo "新纪录插入成功";
        header('location: list.php');
    }
    else{
        echo "Error:".$sql."<br>".mysqli_error($conn);
    }
    // header('location: list.php')
?>