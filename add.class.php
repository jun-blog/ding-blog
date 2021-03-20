<?php
// header("Content-type:text/html;charset=utf-8");
// date_default_timezone_set('PRC');//调整时区
// if(empty($_SESSION['name'])){
//     header('location: login.php');
// }
class Message{
    public function insert($date){
        // $time = date("Y:m:d H:i:s",time());
        $time = date("Y:m:d H:i:s",time());
        echo $date['content'];
        echo $date['auther'];
        echo $time;
        $sql = "insert into msg(content,username,sendtime) values ('{$date['content']}','{$date['auther']}','{$time}')";
        require "db.class.php";
        $db = new DB('localhost','root','','php10');
        $db->query($sql);
    }
    public function getAll(){
        $sql="select * from msg where username like '%".$_POST["searchterm"]."%'";
        require "db.class.php";
        $db=new DB('localhost','root','','php10');
        $rows =$db->fetchall($sql);
        return $rows;
    }
    public function regist($date){
        // $time = date("Y:m:d H:i:s",time());
        require "db.class.php";
        $conn=mysqli_connect('localhost','root','','user');
        $db = new DB('localhost','root','','user');
        $judge = "select count(*) as total from usertext where username='{$date['username']}'";
        $res=mysqli_query($conn,$judge);
        $row=mysqli_fetch_array($res);
        $count=$row['total'];
        if($count>0){
            echo "用户名已经被占用";
        }
        else{
        $sql = "insert into usertext(username,pas) values ('{$date['username']}','{$date['password']}')";
        
        $db->query($sql);
        // echo "注册成功！";
        header('location: login.php');
        }
    }
}
?>