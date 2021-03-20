<?php
session_start();//启用session
header("Content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');//调整时区
if(empty($_SESSION['name'])){
    header('location: login.php');
}
$date=$_POST;

require "add.class.php";
$message=new Message();
$message->insert($date);
header('location: list.php')
?>