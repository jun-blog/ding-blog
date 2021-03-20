<?php
session_start();//启用session
header("Content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');//调整时区
if(!isset($_SESSION['name'])){
    header('location: login.php');
}
$id = $_GET['id'];
// $date=$_POST;
require "del.class.php";
$message=new Message();
$message->insert($id);
header('location: list.php')
?>