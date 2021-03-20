<?php
session_start();//启用session
header("Content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');//调整时区
if(!isset($_SESSION['name'])){
    header('location: login.php');
}
$conn = mysqli_connect('localhost','root','','php10');
// echo $_GET["id"];
$sql="select * from msg where id=".$_GET["id"];
$result=mysqli_query($conn,$sql);
if(!$result){
    die("不能获取数据");
}
echo "<hr>";
// $myid=0;
// $mycontent="";
// $myusername="";
while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    // echo "{$row["id"]}"."<br>"."{$row["username"]}"."<br>"."{$row["content"]}"."<br>";
    $myid=$row["id"];
    $mycontent=$row["content"];
    $myusername=$_SESSION['name'];
}
mysqli_close($conn);
?>
<!-- <form action="update_add.php" method="POST" >
    用户名：<input type="text" name="myusername" value="<?php 
    // echo $myusername
    ?>"/> <br>
    内容:<input type="text" name="mycontent" value="<?php 
    // echo $mycontent
    ?>"/> <br>
    <input type="hidden" name="myid" value="<?php 
    // echo $myid
    ?>"/><br>
    
    <input type="submit">
</form> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/color.css">
</head>
<body class="elegant-aero">
    <form action="update_add.php" method="POST" class="STYLE-NAME">
        <h1>Contact Form
            <span>Please fill all the texts in the fields.</span>
        </h1>
        <label>
            <!-- <span>用户名 :</span> -->
            <input id="name" type="hidden" name="myusername" value="<?php echo $myusername?>" required="required"/>
        </label>
        <label>
            <span>内容 :</span>
            <textarea class="inp" type="text" id="message" name="mycontent" placeholder="<?php echo $mycontent;?>" required="required"></textarea>
            <input type="hidden" name="myid" value="<?php echo $myid?>"/><br>
        </label>
        <label>
            <span> </span>
            <input type="submit" class="button" value="发送" />
        </label>
    </form>
</body>
</html>
