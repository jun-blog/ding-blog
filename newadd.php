<?php
session_start();//启用session
header("Content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');//调整时区
if(!isset($_SESSION['name'])){
    header('location: login.php');
}
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
    <form action="add.php" method="post" class="STYLE-NAME">
        <h1>Contact Form
            <span>Please fill all the texts in the fields.</span>
        </h1>
        <label>
            <input type="hidden" name="auther" value="<?php  echo $_SESSION["name"];?>">
        </label>
        <label>
            <span>内容 :</span>
            <textarea id="message" name="content" placeholder="请写点什么吧！" required="required"></textarea>
        </label>
        <label>
            <span> </span>
            <input type="submit" class="button" value="发送" />
        </label>
    </form>
</body>
</html>