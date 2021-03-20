<?php
session_start();//启用session
header("Content-type:text/html;charset=utf-8");
date_default_timezone_set('PRC');//调整时区
if(empty($_SESSION['name'])){
    header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<!-- 引用外部css文件样式 -->
<link rel="stylesheet" type="text/css" href="./css/b.css">
<meta charset="utf-8">
<title>jun'blog</title>
<?php
 
        //分页的函数
        function news($pageNum = 1, $pageSize = 7)
        {
            $array = array();
            $coon = mysqli_connect("localhost", "root");
            mysqli_select_db($coon, "php10");
            mysqli_set_charset($coon, "utf8");
            // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
            $rs = "select * from msg order by id desc limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
            $r = mysqli_query($coon, $rs);
            while ($obj = mysqli_fetch_array($r)) {
                $array[] = $obj;
            }
            mysqli_close($coon,"php10");
            return $array;
        }
        
        //显示总页数的函数
        function allNews()
        {
            $coon = mysqli_connect("localhost", "root");
            mysqli_select_db($coon, "php10");
            mysqli_set_charset($coon, "utf8");
            $rs = "select count(*) num from msg"; //可以显示出总页数
            $r = mysqli_query($coon, $rs);
            $obj = mysqli_fetch_object($r);
            mysqli_close($coon,"php10");
            return $obj->num;
        }
        
            @$allNum = allNews();
            @$pageSize = 7; //约定没页显示几条信息
            @$pageNum = empty($_GET["pageNum"])?1:$_GET["pageNum"];
            @$endPage = ceil($allNum/$pageSize); //总页数
            @$array = news($pageNum,$pageSize);
     ?>
</head>
<body>
    <div>
        <!-- 在这里控制全局的页面，定义div的id是"global" -->
        <div id="global">
            <div id="heading">您好，欢迎您～</div>
            <div id="topnav">
                <a href="">首页</a>
                <a href="newadd.php">添加新随笔</a>
                <a href="search.php">查询</a>
                <a href="login.php">登录</a>
                <a href="reg.php">注册</a>
                <div class="topnav_side">
                    <em>随笔-<?php
                                 include('db.php');
            
                                 $sql = "SELECT * FROM msg";
                                 $result = mysqli_query($pdo,$sql);
                                 $row = mysqli_num_rows($result);
                                 echo $row;
                             ?>
                    </em>
                </div>
            </div>
            <div id="content_body">
                <div class="main">
                    <?php
                        foreach($array as $key){
                            // while( $key=mysqli_fetch_array($array,MYSQLI_ASSOC)){
                    ?>
                        <div class="item">
                            <div class="item_content">
                                <h1><c:if>用户名：<?php echo "{$key["username"]}";?></c:if></h1>
                                <p class="item_descri"><c:if>内容：<?php echo "{$key["content"]}";?><c:if></p>
                                <div class="bottom">
                                    <div class="item_info"><?php
                                    include('db.php');
                                    $id=$key['id'];
                                    $sql = "SELECT * FROM msg WHERE id='$id'";
                                    $result = mysqli_query($pdo,$sql);
                                    if(mysqli_num_rows($result)>0){
                                        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                            ?>
                                            <p>发表时间：<?php echo "{$row["sendtime"]}";?></p>
                                            <?php  
                                        }
                                    }
                                    mysqli_close($pdo);
                                    ?></div>
                                    <div class="item_info"><a class="a" href="del.php?id=<?php echo $key['id'];?>" target='_blank'>删除</a></div>
                                    <div class="item_info"><a class="a" href="update.php?id=<?php echo $key['id'];?>" target='_black'>编辑</a></div>
                                    <div class="item_info"><a class="a" href="view.php?id=<?php echo $key['id'];?>" target='_black'>查看</a></div>
                                    <div class="item_info"><a class="a" href="com.php?id=<?php echo $key['id'];?>" target='_black'>评论(<?php 
                                    include('conn.php');
                                    $id=$key['id'];
                                    $sql = "SELECT * FROM comments WHERE art_id='$id'";
                                    $result = mysqli_query($conn,$sql);
                                    $row=(mysqli_num_rows($result));
                                    echo $row;
                                    ?>)</a></div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="foot">
                        <a href="?pageNum=1">首页</a>
                        <a href="?pageNum=<?php echo $pageNum==1?1:($pageNum-1)?>">上一页</a>
                        <a href="?pageNum=<?php echo $pageNum==$endPage?$endPage:($pageNum+1)?>">下一页</a>
                        <a href="?pageNum=<?php echo $endPage?>">尾页</a>
                    </div>
                </div>
                
                <div class="side">
                    <div class="author_info">
                        <!--p style="background-color:blue;margin-left:20px">公告</p-->
                        <div class="author_Image">
                            <img src="https://i.loli.net/2020/05/14/3gAp7j2uxakRVNy.jpg" alt="this is a author image">
                        </div>
                        
                        <div class="author_descri">
                            <h2><?php echo "您好，".$_SESSION["name"]."<br>"; ?></h2>
                            <p>一枚小小的初学者</p>
                        </div>
                    </div>
                    
                    <div class="top_article">
                        <h3 class="new">最新随笔</h3>
                        <?php

                        include('db.php');
                                    
                                    $sql = "SELECT * FROM msg ORDER BY id DESC LIMIT 4";
                                    $result = mysqli_query($pdo,$sql);
                                    // if(mysqli_num_rows($result)>0){
                                        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                            ?>
                                            <p><?php 
                                            // echo "{$row["user"]}";
                                            ?></p>
                                            <p><?php 
                                            // echo "{$row["comment"]}";
                                            ?></p>
                                            <p><?php 
                                            // echo "{$row["addtime"]}";
                                            ?></p>
                                            <ul>
                                                <li><?php echo "{$row["content"]}";?></li>
                                            </ul>
                                            <?php  
                                        }
                                    // }
                                    mysqli_close($pdo);
                        ?>
                        
                    </div>
                </div>
                
                <div id="footer">
                    <div class="copyRight">
                    <p>Copyright &copy;2020 墨伤心～</p>
                    </div>
                    
                    <div class="site_link">
                        <ul>
                            <li><a href="">关于我们</a></li>
                            <li><a href="">联系我们</a></li>
                            <li><a href="">使用条款</a></li>
                            <li><a href="">意见反馈</a></li>
                        <ul>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>