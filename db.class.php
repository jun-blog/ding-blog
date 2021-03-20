<?php
    class DB{
        public $host;
        public $username;
        public $password;
        public $dbName;
        public $link;
        public function __construct($host,$username,$password,$dbName){
            $this->host=$host;
            $this->username=$username;
            $this->password=$password;
            $this->dbName=$dbName;
            $this->connect();
            // $this->setCharset();
        }
        public function connect(){
            $this->link=mysqli_connect($this->host,$this->username,$this->password,$this->dbName);
        }
        // public function setCharset(){
        //     mysqli_set_charset($this->link,$this->charset);
        // }
        public function query($sql){
            return mysqli_query($this->link,$sql);
        }
        public function fetchAll($sql){
            $time = date("Y:m:d H:i:s",time());
            $result = $this->query($sql);
            if(!$result){
                echo "查询失败";
            }
                echo "查询成功";
            // return mysqli_fetch_all($result,MYSQLI_ASSOC);
            if(mysqli_num_rows($result)>0){
                // if($query){
                    // while($myrow=mysql_fetch_array($query)){
                    while($myrow=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                
            ?>
                <!-- <P align="center" bgcolor="#ffffff" class="STYLE4"><span class="STYLE2"> -->
                    <?php 
                    // echo $myrow['username'];
                    ?> 
                    <!-- </span></P> -->
                <!-- <P align="center" bgcolor="#ffffff" class="STYLE4"><span class="STYLE2"> -->
                    <?php 
                    // echo $myrow['content'];
                    ?>
                    <!-- </span></P> -->
                <!-- <P height="23" align="center" bgcolor="#ffffff" class="STYLE4"><span class="STYLE2"> -->
                    <?php 
                    // echo $time;
                    ?>
                    <!-- </span></P> -->
                <div class="item">
                            <div class="item_content">
                                <h1>用户名：<?php echo "{$myrow["username"]}";?></h1>
                                <p class="item_descri">内容：<?php echo "{$myrow["content"]}";?></p>
                                
                            </div>
                </div> 
            <?php
            }
            }    
            ?>
        <?php
        }
    }
    ?>
