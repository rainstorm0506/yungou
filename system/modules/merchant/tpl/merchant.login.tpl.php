<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title>一元云购>>>商家管理后台</title><base target="_blank" />
        <style>
            *{
                padding:0px;
                margin:0px;
            }
            a{color:White}
            body{
                font-family:Arial, Helvetica, sans-serif;
                background:url(/statics/uploads/bg/grass.png) no-repeat center;
                font-size:13px; 
            }
            img{
                border:0;
            }
            .lg{width:468px; height:468px; margin:100px auto; background:url(http://keleyi.com/keleyi/phtml/divcss/21/images/login_bg.png) no-repeat;}
            .lg_top{ height:200px; width:468px;}
            .lg_main{width:400px; height:180px; margin:0 25px;}
            .lg_m_1{
                width:290px;
                height:100px;
                padding:60px 55px 20px 55px;
            }
            .ur{
                height:37px;
                border:0;
                color:#666;
                width:236px;
                margin:4px 28px;
                background:url(http://keleyi.com/keleyi/phtml/divcss/21/images/user.png) no-repeat;
                padding-left:10px;
                font-size:16pt;
                font-family:Arial, Helvetica, sans-serif;
            }
            .pw{
                height:37px;
                border:0;
                color:#666;
                width:236px;
                margin:4px 28px;
                background:url(http://keleyi.com/keleyi/phtml/divcss/21/images/password.png) no-repeat;
                padding-left:10px;
                font-size:16pt;
                font-family:Arial, Helvetica, sans-serif;
            }
            .bn{width:330px; height:72px; background:url(http://keleyi.com/keleyi/phtml/divcss/21/images/enter.png) no-repeat; border:0; display:block; font-size:18px; color:#FFF; font-family:Arial, Helvetica, sans-serif; font-weight:bolder;cursor: pointer;}
            .lg_foot{
                height:80px;
                width:330px;
                padding: 6px 68px 0 68px;
            }
        </style>
    </head>

    <body class="b">
        <div class="lg">
            <form action="" method="post">
                <div class="lg_top"></div>
                <div class="lg_main">
                    <div class="lg_m_1">
                        用户名:
                        <input name="username" value="" class="ur" placeholder="请输入用户名"/>
                        密码:
                        <input name="password" type="password" value="" class="pw" placeholder="请输入密码"/>

                    </div>
                </div>
                <div class="lg_foot">
                    <input type="submit" name="submit" value="点这里登录" class="bn" /></div>
            </form>
        </div>
    </body>
</html>