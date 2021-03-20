<!DOCTYPE html>
<html>
    <head>
        <title>登录</title>
        <meta name="content-type"; charset="UTF-8">
        <link rel="stylesheet" href="./css/log.css">
    </head>
    <body>
    
            <div class="content">
                <!-- MP4背景 -->
                <div class="fullscreen-video-wrap">
                    <video src="./video/nw.mp4" id="v1" autoplay="true" loop="true" muted="true">
                            
                    </video>
                </div>
                <div class="log">
                    <!--头部-->
                    <div class="header"> <h1 align="center">登录</h1> </div> 
                    <!--中部--> 
                    <div class="middle">
                        <form id="loginform" action="loginaction.php" method="post"> 
                            <table border="0"> 
                                
                                <p><label class="label_input">用户名</label><input type="text" id="name" name="name" class="text_field"/></p>
                                <p><label class="label_input">密码</label><input type="password" id="password" name="pas" class="text_field"/></p> 
                                <!-- <p>
                                    <label class="label_input">用户身份：</label>
                                    
                                        <input type="radio" name="role" value="admin">管理员
                                        <input type="radio" name="role" value="student">学生
                                    
                                </p> -->

                            
                                <p> 
                                    
                                    <div id="login_control">
                                        <input type="submit" id="login" name="login" value="登录"> 
                                        <!-- <input type="reset" id="reset" name="reset" value="重置"> -->
                                        <a id="reset" href="reg.php" target='_black'>注册</a>
                                    </div>
                                    
                                </p> 
                            </table> 
                        </form>
                    </div>
                   
                </div>
            </div> 
        
</body>
</html> 