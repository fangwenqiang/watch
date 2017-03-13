<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<script src="js/jquery.js"></script>

<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="http://<?=$_SERVER['SERVER_NAME']?>/public/admin/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="http://<?=$_SERVER['SERVER_NAME']?>/public/admin/dist/sweetalert.css">

<div id="main">
    <div class="position">
        <a href="<?php echo Url::to(['home/index/index'])?>">
            <strong>首页</strong>
        </a>
        <i>&gt;</i>
        <a href="<?php echo Url::to(['home/personal/index'])?>" target="_blank" class="c0e7">
            我的喜悦手表
        </a>
        <i>&gt;</i>
        <span>修改密码</span>
    </div>
    <div class="rightArea">
        <div class="prompt">
            <div class="pr_top">
                <b class="tit">修改密码</b>
                <div id="__User_order_zixun" class="u__kf pc_to_ntalk"></div>
            </div>
        </div>
        <div class="clear"></div>
        <div class="password">
            <div class="p_c">
                <span class="left"><i class="p_r">*</i>旧密码：</span>
                <span class="right"><input id="oldPwd" name="oldPwd" class="p_pwd valid" type="password"></span>
            </div>
            <div class="p_c">
                <span class="left"><i class="p_r">*</i>新的登录密码：</span>
                <span class="right"><input id="newPwd" name="newPwd" value="" class="p_pwd valid" type="password">
                    <span class="check">
                        <em id="strength_L" >弱</em>
                        <em id="strength_M" >中</em>
                        <em id="strength_H" >强</em>
                    </span>
                </span>
            </div>
            <div class="p_c adjust">
                <span class="left"><i class="p_r">*</i>确认新密码：</span>
                <span class="right">
                    <input id="repwd" name="repwd" value="" class="p_pwd error" type="password">
                </span>
            </div>
            <div class="p_c">
                <span class="left">&nbsp;</span>
                <span class="right"><input value="提交" class="u__btn02" type="submit"></span>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <script>
        $(function () {

            $('#newPwd').keydown(fnPwd);
            $('#newPwd').keyup(fnPwd);
            function fnPwd() {
                var newPwd = $('#newPwd').val();
                var number = pwdStrong(newPwd);
                if ( number == 0 | number == 1 ) {
                    $('#strength_L').css({background:'#b01330',color:'#fff'}).siblings().removeAttr('style');
                } else if ( number == 2 ) {
                    $('#strength_M').css({background:'#b01330',color:'#fff'}).siblings().removeAttr('style');
                } else if ( number == 3 ) {
                    $('#strength_H').css({background:'#b01330',color:'#fff'}).siblings().removeAttr('style');
                } else {
                    $('#strength_H').removeAttr('style').siblings().removeAttr('style');

                }


            }

            function pwdStrong(pwd){
                var num=0;
                var reg1=/\d/;//如果有数字
                if(reg1.test(pwd)){
                    num++;
                }
                var reg2=/[a-zA-Z]/;//如果有字母
                if(reg2.test(pwd)){
                    num++;
                }
                var reg3=/[^a-zA-Z0-9]/;//如果有特殊字符
                if(reg3.test(pwd)){
                    num++;
                }
                if(pwd.length<7){
                    num--;
                }
                return num;
            }

        });
    </script>