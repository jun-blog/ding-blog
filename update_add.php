<?php
include "db.php";
// if(!$pdo){
//     echo "连接失败";
// }

//     echo "连接成功";
// $username = $_POST["myusername"];
$content=$_POST["mycontent"];
$id=$_POST["myid"];
$sql="update msg set content='".$content."' where id=$id";
if(mysqli_query($pdo,$sql)){
    echo "记录更新成功<br>";
    ?>
    <a href="list.php">返回</a>
<?php
}
else{
    echo "错误信息".mysqli_error($pdo);
}
mysqli_close($pdo);
?>