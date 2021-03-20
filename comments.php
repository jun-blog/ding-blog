<?php
header("Content-type:text/html;charset=utf-8");    //设置编码
$user = htmlspecialchars(trim($_POST['user']));
$txt = htmlspecialchars(trim($_POST['txt']));
$time = date("Y-m-d H:i:s");
if(empty($user)){
   echo "昵称不能为空！";
   exit;
}
if(empty($txt)){
   echo "评论内容不能为空！";
   exit;
}
$conn=mysqli_connect("localhost","root","root","comments");
mysqli_set_charset($conn,"utf8");
$sql="insert into comments(user,comment,addtime)values('$user','$txt','$time')";
$que=mysqli_query($conn,$sql);
if($que)  echo "1";
?>