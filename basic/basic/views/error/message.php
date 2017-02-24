
<?php
use yii\helpers\Url;
?>
<link href="css/public.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/global.js"></script>
<script type="text/javascript" src="js/jquery.tab.js"></script>
<script type="text/javascript" src="js/jquery.validate.js"></script>
<style>
    .errorInfo{font-weight: bold;color: red}
</style>
<div id="dcMain">
    <!-- 当前位置 -->
    <div id="urHere">DouPHP 管理中心<b>></b><strong>系统设置</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <div class="idTabs">
            <div class="items">
                <div class="site-error" style="width: 1000px;height: 800px;margin-left: 50px;">
                    <div class="alert alert-danger page-none-alert">
                        <p>
                            <?php if(isset($errorMessage)):?>
                                <span class="glyphicon glyphicon-remove-sign text-danger"></span>
                                <span class="btn-lg text-danger"><?php echo '操作出错啦！' ?></span>
                                <?php echo '<p>'.$errorMessage.'</p>';?>            <?php else:?>
                                <span class="glyphicon glyphicon-ok-sign text-success"></span>
                                <span class="btn-lg text-success">恭喜！操作成功！</span>
                            <?php endif;?>
                        </p>
                        <p class="text-muted">该页将在<span id="time"><?php echo $sec;?></span>秒后自动跳转!</p>
                        <p>            <?php if(isset($gotoUrl)):?>
                                <a href="<?php echo $gotoUrl?>">立即跳转</a>
                            <?php else:?>
                                <a href="javascript:void(0)" onclick="history.go(-1)">返回上一页</a>
                            <?php endif;?>        </p>    </div>
                    <style>
                        .page-none-alert{margin: 100px 0 !important;
                            text-align: center !important;
                            font-size: 30px !important;
                        }
                    </style>
                </div>


            </div>
        </div>
    </div>
</div>
<script>
    function times()
    {
        var time=document.getElementById('time').innerHTML;
       if(time !=0){
           time=time-1;
       }
        document.getElementById('time').innerHTML=time;
    }    setInterval("times();",1000);
    <?php if(!isset($gotoUrl)):?>
    setInterval("history.go(-1);",<?php echo $sec;?>000);
    <?php else:?>
    setInterval("window.location.href='<?php echo  $gotoUrl;?>'",<?php echo $sec;?>000);
    <?php endif;?>
</script>