
﻿<?php
use yii\helpers\Url;
use app\Lib\Functions\Filtration;
use \yii\widgets\LinkPager;

?>
   <script src="js/jquery.js"></script>
    <link rel="stylesheet" href="css/sxg.css">
    <style type="text/css">
        <!--
        .STYLE1 {
            font-size: large
        }

        .STYLE3 {
            font-size: medium;
            color: #CC0000;
        }

        -->
    </style>

<!-- Begin header -->
<div id="member_info2"></div>


<!-- End header -->
<link rel="stylesheet" href="css/index.css" type="text/css" media="screen, projection"/>


<!--index banner start-->


<!--index banner end-->


<div style="width:1100px;height:500px; margin:0 auto;">
    <div style="width:600px;height:450px; float:left; margin-top:30px;border:1px solid;"><img src="Images/gg.jpg"/>
    </div>
    <div style="width:495px;height:450px; float:right;margin-top:30px;border:1px solid;">
        <div style="width:495px;height:20px; float:right;margin-top:20px;" align="right" ;>


            <span class="STYLE3"><a href="<?=Url::to(['home/login/reg']) ?>">注册新用户</a></span></div>
        <div style="width:495px;height:80px; float:right;margin-top:100px;" align="center" ;>
            <form id="form" method="post" action="javascript:void(0)">
                <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                <span class="STYLE1">用户名:</span>
                <input type="text" required="required" placeholder="用户名" name="user" id="user" size="35"
                       style="height:30px">
        </div>
        <div style="width:495px;height:80px; float:right;" align="center" ;>
            <span class="STYLE1">密  码</span>：
            <input type="password" required="required" placeholder="密码" name="pwd" id="pwd" size="35"
                   style="height:30px">
        </div>
        <div style="width:495px;height:80px; float:right;" align="center" ;><span class="error" id="msg"></span></div>
        <div style="width:495px;height:80px; float:right;" align="center" ;><a href="javascript:void(0)" id="but"><img
                    src="Images/denglu.png"></a>
                <a href="javascript:void(0);" id="qqlogin">
                    <img src="Images/qq.png"></a>
            <a href="<?=Url::to(['home/personal/back_password']) ?>"><strong> 忘记密码</strong></a></div>
        </form>
    </div>
</div>


<!--热销 start-->
<div id="hot_display_position"></div>
</div>
<p align="center">&nbsp;</p>

<!--热销 end-->


<div id="rank_display_position"></div>
</div>
<!--销售排行榜 end-->
</div>

<!--底部 -->

<!-- End footer -->
<div id="floatBox">
    <div id="return">
        <a href="javascript:void(0);" class="c__gotop" title="返回顶部" style="display:none;" rel="nofollow"></a>
    </div>
</div>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script>
    $('#but').click(function () {
        var csrfToken = $('#_csrf').val();
        var user = $('#user').val();
        var pwd = $('#pwd').val();
        $.ajax({
            type: 'GET',
            timeout: '0',
            url: "<?=Url::to(['home/login/logto']) ?>",
            data: "user=" + user + "&pwd=" + pwd + "&_csrf=" + csrfToken,
            async: true,
            success: function (msg) {
                if (msg == 1) {
                    $('#msg').html("用户名不存在")
                } else if (msg == 2) {
                    $('#msg').html("密码错误")
                } else if (msg == 3) {
                    $('#msg').html("您的账号因违规操作已被封禁,暂无法登录")
                } else {
                    $('#msg').html("登录成功")
                    location.href = "<?=Url::to(['home/index']) ?>";
                }
            }
        });
    });
    $('#qqlogin').click(function ()
    {
        //以下为按钮点击事件的逻辑。注意这里要重新打开窗口
        //否则后面跳转到QQ登录，授权页面时会直接缩小当前浏览器的窗口，而不是打开新窗口
        var A=window.open("<?= "http://$_SERVER[SERVER_NAME]/login.php" ?>","_blank",'');
    }
    )

</script>

