<style>
    html {
        width: 100%;
        height: 100%;
        overflow: hidden;
        font-style: sans-serif;
    }

    body {
        width: 100%;
        height: 100%;
        font-family: 'Open Sans', sans-serif;
        margin: 0;
        background-color: #4A374A;
    }

    #login {
        position: absolute;
        top: 50%;
        left: 50%;
        margin: -150px 0 0 -150px;
        width: 300px;
        height: 300px;
    }

    #login h1 {
        color: #fff;
        text-shadow: 0 0 10px;
        letter-spacing: 1px;
        text-align: center;
    }

    h1 {
        font-size: 2em;
        margin: 0.67em 0;
    }

    input {
        width: 300px;
        height: 40px;
        margin-bottom: 10px;
        outline: none;
        padding: 10px;
        font-size: 13px;
        color: #fff;
        text-shadow: 1px 1px 1px;
        border-top: 1px solid #312E3D;
        border-left: 1px solid #312E3D;
        border-right: 1px solid #312E3D;
        border-bottom: 1px solid #56536A;
        border-radius: 4px;
        background-color: #2D2D3F;
    }

    .but {
        width: 300px;
        min-height: 20px;
        display: block;
        background-color: #4a77d4;
        border: 1px solid #3762bc;
        color: #fff;
        padding: 9px 14px;
        font-size: 15px;
        line-height: normal;
        border-radius: 5px;
        margin: 0;
    }


</style>
<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="Login.css"/>
</head>
<body>
<div id="login">
    <h1>后台登录<?php echo "user" ?></h1>
    <form id="form" method="post" action="javascript:void(0)">
        <span class="error" id="msg"></span>
        <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
        <input type="text" required="required" placeholder="用户名" name="user" id="user">
        <input type="password" required="required" placeholder="密码" name="pwd" id="pwd">
        <button class="but" type="submit">登录</button>
    </form>
</div>
</body>
</html>
<script type="text/javascript" src="public/admin/js/jquery.min.js"></script>
<script>


    $('#form').submit(function () {
        var csrfToken = $('#_csrf').val();
        var user = $('#user').val();
        var pwd = $('#pwd').val();
        $.ajax({
            type: 'GET',
            timeout: '5000',
            url: "<?=Url::to(['admin/login/logto']) ?>",
            data: "user=" + user + "&pwd=" + pwd + "&_csrf=" + csrfToken,
            async: true,
            success: function (msg) {
                if (msg == 1) {
                    $('#msg').html("用户名不存在")
                } else if (msg == 2) {
                    $('#msg').html("密码错误")
                } else {
                    $('#msg').html("登录成功")
                    location.href = "<?=Url::to(['admin/index']) ?>";
                }

            }
        });


    });


</script>

