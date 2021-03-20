<?php
class Message{
    public function insert($id){
        // $time = date("Y:m:d H:i:s",time());
        $sql = "delete from msg where id=$id";
        require "db.class.php";
        $db = new DB('localhost','root','','php10');
        $db->query($sql);
    }
}
?>