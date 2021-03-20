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
    <title>搜索</title>

    <link href="http://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background: #494A5F;
            font-weight: 500;
            font-family: "Microsoft YaHei","宋体","Segoe UI", "Lucida Grande", Helvetica, Arial,sans-serif, FreeSans, Arimo;
        }

        #container {
            width: 500px;
            height: 820px;
            margin: 0 auto;
        }
        div.search {padding: 30px 0;}

        form {
            position: relative;
            width: 300px;
            margin: 0 auto;
        }

        input, button {
            border: none;
            outline: none;
        }

        input {
            width: 100%;
            height: 42px;
            padding-left: 13px;
        }

        button {
            height: 42px;
            width: 42px;
            cursor: pointer;
            position: absolute;
        }
        .bar2 {background: #DABB52;}
        .bar2 input, .bar2 button {
            border-radius: 3px;
        }
        .bar2 input {
            background: #F9F0DA;
        }
        .bar2 button {
            height: 26px;
            width: 26px;
            top: 8px;
            right: 8px;
            background: #F15B42;
        }
        .bar2 button:before {
            content: "\f105";
            font-family: FontAwesome;
            color: #F9F0DA;
            font-size: 20px;
            font-weight: bold;
        }
        </style>
</head>
<body>
<div id="container">
    <div class="search bar2">
        <form action="ind.php" method="post">
            <input type="text" name="searchterm" placeholder="请输入您要搜索的内容...">
            <input type="hidden" name="flag" value="1">
            <button type="submit" name="submit" value="Search"></button>
        </form>
    </div>
</div>
</body>
</html>