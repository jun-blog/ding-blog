<?php
$date=$_POST;
require "add.class.php";
$message=new Message();
$message->regist($date);
header('location: login.php');

?>