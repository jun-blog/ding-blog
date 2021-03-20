<?php
$conn = mysqli_connect('localhost','root','','php10');
// mysql_select_db("php10",$conn);
// mysqli_query("set names gbk");
$time = date("Y:m:d H:i:s",time());
$query="select * from msg where content like '%".$_POST["searchterm"]."%'";
$result = mysqli_query($conn,$query);
if(!$result){
    echo "查询失败";
}
    echo "查询成功";
if(mysqli_num_rows($result)>0){
    // if($query){
    //     while($myrow=mysql_fetch_array($query)){
        while($myrow=mysqli_fetch_array($result,MYSQLI_ASSOC)){
    
?>
    <P align="center" bgcolor="#ffffff" class="STYLE4"><span class="STYLE2"><?php echo $myrow['username'];?> </span></P>
    <P align="center" bgcolor="#ffffff" class="STYLE4"><span class="STYLE2"><?php echo $myrow['content'];?></span></P>
    <P height="23" align="center" bgcolor="#ffffff" class="STYLE4"><span class="STYLE2"><?php echo $time;?></span></P>
<?php
}
}
?>
<a href="list.php">返回</a>