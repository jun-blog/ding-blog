<?php
session_start();//启用session
header("Content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');//调整时区
if(!isset($_SESSION['name'])){
    header('location: login.php');
}

$art_id=$_GET['id'];
// echo $art_id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/color.css">
</head>
<body class="elegant-aero">
    <form action="server.php" method="POST" class="STYLE-NAME">
        <h1>Contact Form
            <span>Please fill all the texts in the fields.</span>
        </h1>
        <label>
            <!-- <span>姓名 :</span> -->
            <input id="name" type="hidden" name="username" value="<?php echo $_SESSION['name']?>" />
            <input type="hidden" name="art_id" value="<?php  echo $art_id;?>">
        </label>
        <label>
            <span>请评论:</span>
            <textarea id="message" name="content" placeholder="请写点什么吧！"></textarea>
        </label>
        <label>
            <span> </span>
            <input type="submit" class="button" value="发送" />
        </label>
    </form>
</body>
</html>
