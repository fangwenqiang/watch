<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<script src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<script type="text/javascript" src="http://<?=$_SERVER['SERVER_NAME']?>/public/admin/dist/sweetalert.min.js"></script>
<link rel="stylesheet" href="http://<?=$_SERVER['SERVER_NAME']?>/public/admin/dist/sweetalert.css">
<script type="text/javascript" src="js/save_pwd.js"></script>
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
            <?php $form = yii\widgets\ActiveForm::begin(['method'=>'post','id'=>'form'])?>
            <div class="p_c">
                <span class="left"><i class="p_r">*</i>旧密码：</span>
                <span class="right"><input id="oldPwd" name="oldPwd" class="p_pwd valid" placeholder="6-15位密码" type="password"></span>
            </div>
            <div class="p_c">
                <span class="left"><i class="p_r">*</i>新的登录密码：</span>
                <span class="right"><input id="newPwd" name="newPwd" class="p_pwd valid" placeholder="6-15位新密码" type="password">
                    <span class="check" style="display: none;">
                        <em id="strength_L" >弱</em>
                        <em id="strength_M" >中</em>
                        <em id="strength_H" >强</em>
                    </span>
                </span>
            </div>
            <div class="p_c adjust">
                <span class="left"><i class="p_r">*</i>确认新密码：</span>
                <span class="right">
                    <input id="repwd" name="repwd" value="" class="p_pwd error" placeholder="6-15位确认密码" type="password">
                </span>
            </div>
            <div class="p_c">
                <span class="left">&nbsp;</span>
                <span class="right"><input value="提交" class="u__btn02" type="submit"></span>
            </div>
            <div class="clear"></div>
            <?php yii\widgets\ActiveForm::end(); ?>
        </div>
    </div>
    <script>
        SERVER_NAME = '<?='http://'.$_SERVER['SERVER_NAME']?>';
        URL = "<?=\yii\helpers\Url::toRoute(['home/personal'])?>";
        CSRF = $('input[name=_csrf]').val();
    </script>