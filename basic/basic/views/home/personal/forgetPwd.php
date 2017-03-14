<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>找回密码</title>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="http://<?=$_SERVER['SERVER_NAME']?>/public/admin/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="http://<?=$_SERVER['SERVER_NAME']?>/public/admin/dist/sweetalert.css">
    <script type="text/javascript" src="js/back_pwd_link.js"></script>
</head>
<body>
<div style="width:1100px;height:500px; margin:0 auto;">
    <div style="width:600px;height:450px; float:left; margin-top:30px;border:1px solid;">
        <img src="Images/gg.jpg"/>
    </div>
    <div style="width:495px;height:450px; float:right;margin-top:30px;border:1px solid;">
        <div style="width:495px;height:20px; float:right;margin-top:20px;" align="center" ;>
            <span style="color: #b01330;font-size: 18px;font-family: 宋体;font-weight: bold">获取找回密码连接</span>
        </div>
        <input type="hidden" name="_csrf" value="<?=\yii::$app->request->csrfToken?>">
        <div style="width:495px;height:80px; float:right;margin-top:100px;" ><font color=""></font>
            <span style="font-size: 20px;margin-left: 20px;">邮箱:</span>
            <input type="text" placeholder="注册时的邮箱地址" id="email" style="height: 40px;width: 260px;border:2px solid #cca;font-size: 18px;border-radius: 3px;" onfocus="$(this).css({border:'2px solid #00bbdd',boxShadow:'0 0 4px #14eff4'})" onblur="$(this).css({border:'2px solid #cca',boxShadow:'0 0 0px #fff'})">
            <button style="height: 42px;width: 150px;cursor: pointer" id="btn_pwd">获取找回密码连接</button
        </div>
        </div>
    </div>
</div>
<script>
    SERVER_NAME = '<?='http://'.$_SERVER['SERVER_NAME']?>';
    URL = "<?=\yii\helpers\Url::toRoute(['home/personal'])?>";
    CSRF = $('input[name=_csrf]').val();
</script>
</body>
</html>