﻿<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
$session = \Yii::$app->session;
$a = $session->get('mobile_code');
echo"$a";
?>
<style>
    .su {
        width: 300px;
        min-height: 20px;
        display: block;
        background-color: red;
        border: 1px solid #3762bc;
        color: #fff;
        padding: 9px 14px;
        font-size: 15px;
        line-height: normal;
        border-radius: 5px;
        margin: 0;
    }
    .fa {
        width: 110px;
        min-height: 20px;
        display: block;
        background-color: #00A000;
        border: 1px solid #3762bc;
        color: #fff;
        padding: 9px 10px;
        font-size: 12px;
        line-height: normal;
        border-radius: 5px;
        margin: 0;
    }
</style>
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
<script type="text/javascript" src="Script/index.js"></script>

<!--index banner start-->


<!--index banner end-->


<div style="width:1100px;height:500px; margin:0 auto;">

    <div style="width:1090px;height:450px; float:right;margin-top:30px;border:1px solid;">
        <div style="width:1090px;height:20px; float:right;margin-top:5px;" align="right" ;>
            <?php $form = ActiveForm::begin([
                'method' => 'post',
                'validateOnBlur' => false,//关闭失去焦点验证
                'enableAjaxValidation' => true, //开启Ajax验证
                'enableClientValidation' => false //关闭客户端验证
            ]); ?>
            <span class="STYLE3"><a href="#">帮助中心</a></span></div>
        <div style="width:200px;height:40px; float:left;margin-top:15px;" align="right" ;><span
                class="STYLE1">*用户名:</span></div>
        <div style="width:880px;height:40px; float:right;margin-top:15px;" align="left" ;>
            <?= $form->field($model, 'username')->input('text', ['class' => 'inpMain', 'size' => '50', 'style' => 'height:38px', 'placeholder' => '4-10位字符，可由中文、英文、数字及组成'])->label('') ?>
            <span class="mb25">
</span></div>
        <div style="width:200px;height:40px; float:left;margin-top:15px;" align="right" ;><span
                class="STYLE1">*设置密码:</span></div>
        <div style="width:880px;height:40px; float:right;margin-top:15px;" align="left" ;>
            <?= $form->field($model, 'password')->input('password', ['class' => 'inpMain', 'size' => '50', 'style' => 'height:38px', 'placeholder' => '6-15位字符，可使用字母、数字组合'])->label('') ?>
            <span class="mb25">
</span></div>

        <div style="width:200px;height:40px; float:left;margin-top:15px;" align="right" ;><span
                class="STYLE1">*确认密码:</span></div>
        <div style="width:880px;height:40px; float:right;margin-top:15px;" align="left" ;>
            <?= $form->field($model, 'espassword')->input('password', ['class' => 'inpMain', 'size' => '50', 'style' => 'height:38px', 'placeholder' => '请再次输入密码'])->label('') ?>
            <span class="mb25">
</span></div>

        <div style="width:200px;height:40px; float:left;margin-top:15px;" align="right" ;><span
                class="STYLE1">*电子邮箱:</span></div>
        <div style="width:880px;height:40px; float:right;margin-top:15px;" align="left" ;>
            <?= $form->field($model, 'email')->input('email', ['class' => 'inpMain', 'size' => '50', 'style' => 'height:38px', 'placeholder' => '请输入常用的邮箱，将用来找回密码、接收订单通知等'])->label('') ?>
            <span class="mb25">
</span></div>

        <div style="width:200px;height:40px; float:left;margin-top:15px;" align="right" ;><span
                class="STYLE1">*手机号码:</span></div>
        <div style="width:880px;height:40px; float:right;margin-top:15px;" align="left" ;>
            <?= $form->field($model, 'tel')->input('tel', ['class' => 'inpMain', 'size' => '50', 'id' => 'tel', 'style' => 'height:38px', 'placeholder' => '请输入11位手机号码 '])->label('') ?>
            <span class="mb25">
</span></div>

        <div style="width:200px;height:40px; float:left;margin-top:15px;" align="right" ;><span class="STYLE1">*验证码:
        </div>
        <div style="width:880px;height:40px; float:right;margin-top:15px;" align="left" ;>
            <div style="float: left"><?= $form->field($model, 'yan')->input('text', ['class' => 'inpMain', 'size' => '30',  'style' =>  'height:38px', 'placeholder' => '请输入收到的短信验证码 '])->label('') ?></div><div style="float: left;margin-left: 10px;"><a href="javascript:void(0);" onclick="fun()" ><input type="button" value="发送验证码" class="fa"></a></div></div>
        <input type="hidden" value="<?= Yii::$app->request->csrfToken ?>" id="csrf" />

        <div style="width:200px;height:40px; float:left;margin-top:15px;" align="right" ;></div>
        <div style="width:880px;height:40px; float:right;margin-top:15px;" align="left"
             ;> <?= Html::submitButton('注册', ['class' => 'su', 'name' => 'submit']) ?></div>

        <?php ActiveForm::end() ?>
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
</body>
</html>
<script>
    function fun() {
        var phone = $("#tel").val();
        var csrf = $("#csrf").val();
        $.ajax({
            type: 'GET',
            url: "<?=Url::to(['home/login/send']) ?>",
            data: "phone="+phone+"&id="+csrf,
            async: true,
            success: function(msg){
                alert(msg);
            }
        });
    }
</script>