<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>密码重置</title>
<style>
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
    <!--
    .STYLE1 {
        font-size: large
    }

    .STYLE3 {
        font-size: medium;
        color: #CC0000;
    }

    -->
    .in{
        height: 40px;
        width: 300px;
        size: 30;
    }
    .btn43 {
        background: rgba(0, 0, 0, 0) url("bg43.jpg") repeat-x scroll left top;
        color: #fffea4;
        height: 50px;
        padding-bottom: 36px;
        width: 251px;
        font-size: 18px;
        line-height: 50px;
    }
</style>
    <link rel="stylesheet" href="css/sxg.css">
    <link rel="stylesheet" href="css/index.css" type="text/css" media="screen, projection"/>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    <script type="text/javascript" src="http://<?=$_SERVER['SERVER_NAME']?>/public/admin/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="http://<?=$_SERVER['SERVER_NAME']?>/public/admin/dist/sweetalert.css">
    <script type="text/javascript" src="js/password.js"></script>

</head>
<body>
<div style="width:1100px;height:500px; margin:0 auto;">
    <div style="width:1090px;height:450px; float:right;margin-top:30px;border:1px solid;">
        <form id="signForm">
        <div style="width:1090px;height:20px; float:right;margin-top:5px;" align="right" ;>
          <span class="STYLE3"><a href="javascript:void(0);">密码重置</a></span>
        </div>
        <div style="width:200px;height:40px; float:left;margin-top:15px;" align="right" ;>
            <span class="STYLE1">
                <font color="red" style="font-weight: bold;font-size: 20px;">*</font>用户名:</span>
        </div>
        <div style="width:880px;height:40px; float:right;margin-top:15px;" align="left" ;>
            <input type="text" name="user" id="user"  class="in">
            <span class="mb25"></span>
        </div>
            <input type="hidden" name="_csrf" value="<?=\yii::$app->request->csrfToken?>">
        <div style="width:200px;height:40px; float:left;margin-top:15px;" align="right" ;>
            <span class="STYLE1"><font color="red" style="font-weight: bold;font-size: 20px;">*</font>手机号码:</span>
        </div>
        <div style="width:880px;height:40px; float:right;margin-top:15px;" align="left" ;>
            <input type="text" name="tel" class="in">
           <span class="mb25"></span>
        </div>

        <div style="width:200px;height:40px; float:left;margin-top:15px;" align="right" ;>
            <span class="STYLE1"><font color="red" style="font-weight: bold;font-size: 20px;">*</font>验证码:
        </div>
        <div style="width:880px;height:40px; float:right;margin-top:15px;" align="left" ;>
            <div style="float: left">
                <input type="text" name="captcha" id="captcha" class="in" style="width: 180px;">
            </div>
            <div style="float: left;margin-left: 10px;">
                <input type="button" value="发送验证码" class="fa" style="cursor: pointer" id="getCaptcha">
            </div>
        </div>

        <div style="width:200px;height:40px; float:left;margin-top:15px;" align="right" ;>
            <span class="STYLE1"><font color="red" style="font-weight: bold;font-size: 20px;">*</font>设置密码:</span>
        </div>
        <div style="width:880px;height:40px; float:right;margin-top:15px;" align="left" ;>
            <input type="password" name="pwd" id="pwd" class="in">
            <span class="mb25"></span>
        </div>

        <div style="width:200px;height:40px; float:left;margin-top:15px;" align="right" ;>
            <span class="STYLE1"><font color="red" style="font-weight: bold;font-size: 20px;">*</font>确认密码:</span>
        </div>
        <div style="width:880px;height:40px; float:right;margin-top:15px;" align="left" ;>
            <input type="password" name="confirm_password" class="in">
           <span class="mb25"></span>
        </div>

        <input type="hidden" value="<?= Yii::$app->request->csrfToken ?>" id="csrf" />

        <div style="width:200px;height:40px; float:left;margin-top:15px;" align="right" ;></div>
        <div style="width:880px;height:40px; float:right;margin-top:15px;" align="left">
            <input class="btn43" value="重置密码" type="submit">
        </div>
        </form>
    </div>
</div>
<script>
 
    SERVER_NAME = '<?='http://'.$_SERVER['SERVER_NAME']?>';
    URL = "<?=\yii\helpers\Url::toRoute(['home/personal'])?>";
    CSRF = $('input[name=_csrf]').val();
    
</script>
</body>
</html>