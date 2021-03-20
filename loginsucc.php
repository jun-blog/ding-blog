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
    <title>登录成功</title>
    <link rel="stylesheet" href="./css/logsucc.css">
</head>
<body>
    <div class="bGround">
        <div>
            
                    <h1>登录成功！</h1> 
                    欢迎您！<br>
                    <?php
                    //以session方式输出
                    echo "您好，".$_SESSION["name"]."<br>";
                    echo "您的密码:".$_SESSION["pas"]."<br>";
                    echo "您的ip:".$_SESSION["ip"]."<br>";
                    echo "登录成功！您上次访问的时间是：".$_SESSION["time"]."<br>";
                    
                ?>
                <a href="list.php">进入blog</a>
        </div>
    </div>
</body>
</html>
