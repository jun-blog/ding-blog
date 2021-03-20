<?php
session_start();//启用session
header("Content-type:text/html;charset=utf-8");//设置编码格式为utf-8
date_default_timezone_set('PRC');//调整时区
$name = isset($_POST['name'])?$_POST['name']:"";
$pas = isset($_POST['pas'])?$_POST['pas']:"";
if(!empty($name)&&!empty($name)){
    //建立连接
    $conn = mysqli_connect('localhost','root','','user');//准备sql语句
    $sql_select = "SELECT username,pas FROM usertext WHERE username = '$name' AND pas = '$pas'";
    $ret = mysqli_query($conn,$sql_select);
    $row = mysqli_fetch_array($ret);//判断用户名或密码是否正确
    if($name == $row['username']&& $pas == $row['pas']){
        $name = $_POST["name"];//用户名
        $pas = $_POST["pas"];//密码
        // $role = $_POST["role"];
        $time = date("Y:m:d H:i:s",time());//登录时获取的时间
        $ip = $_SERVER["SERVER_ADDR"];//接收ip位置
                $_SESSION["name"] = $name;
                $_SESSION["pas"] = $pas;
                $_SESSION["role"] = $role;
                $_SESSION["ip"] = $ip;
                $_SESSION["time"] = $time;
                header("location:loginsucc.php");//成功后返回index.php页面并保存role值
     }
    else{
        //用户名和密码错误，赋值err为1
        echo "用户名或密码错误！";
        header("Location:login.php?err=1");
    }
}
else{ 
    //用户名或密码为空，赋值err为2
    echo "用户名或密码不能为空！";
    header("Location:login.php?err=2");
}
?>
