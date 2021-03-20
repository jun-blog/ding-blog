<?php
session_start();//启用session
header("Content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');//调整时区
if(!isset($_SESSION['name'])){
    header('location: login.php');
}

include "db.php";
    $id = $_GET['id'];
    $sql = "select * from msg where id='$id'";
    $query = mysqli_query($pdo,$sql);
    $time = date("Y:m:d H:i:s",time());
    $rs = mysqli_fetch_array($query,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
        body{
            background:url(./img/bg.jpg);
            
            background-size: cover;
        }

    </style>
</head>
<body>
    <h3>用户：<?php echo "{$rs['username']}";?></h3>
    <p>内容：<?php echo "{$rs['content']}";?></p>
    <p>时间：<?php echo "{$rs['sendtime']}";?></p>
    <!-- <form>
        <textarea name="content"><texterea>
        <div></div>
    </form> -->
    <p>评论内容:</p>
    <?php
                
                include('conn.php');
                
                $sql = "SELECT * FROM comments WHERE art_id='$id' ORDER BY id DESC ";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                        ?>
                        <p>评论者：<?php echo "{$row["user"]}";?></p>
                        <p>评论内容：<?php echo "{$row["comment"]}";?></p>
                        <p>评论时间：<?php echo "{$row["addtime"]}";?></p>
                        <?php  
                    }
                }
                mysqli_close($conn);
    ?>
                   
    
</body>
</html>

            

