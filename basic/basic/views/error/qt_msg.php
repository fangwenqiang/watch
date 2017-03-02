<?php
use yii\helpers\Url;
?>
<script src="js/jquery.js"></script>
<!-- End header -->
<link rel="stylesheet" href="css/list.css">
<!--<script src="Script/list.js"></script>-->

<!-- Main Begin -->
    <div id="dcMain">
        <!-- 当前位置 -->
        <div class="mainBox" style="height:auto!important;height:200px;min-height:200px;">
            <div class="idTabs">
                <div class="items">
                    <div class="site-error" style="width: 1000px;height: 200px;margin-left: 140px;">
                        <div class="alert alert-danger page-none-alert">
                            <p>
                                <?php if(!isset($gotoUrl)):?>
                                    <span class="glyphicon glyphicon-remove-sign text-danger"></span>
                                    <span class="btn-lg text-danger"><?php echo '操作出错啦：' ?><?php echo '<span>'.$errorMessage.'</span>';?></span>
                                    <br/><br/><a href="javascript:void(0)" onclick="history.go(-1)">返回上一页</a>
                                <?php else:?>
                                    <span class="glyphicon glyphicon-ok-sign text-success"></span>
                                    <?php  if(empty($errorMessage)) :  ?>
                                           <span class="btn-lg text-success">恭喜！操作成功！</span>
                                    <?php else:?>
                                        <span><?php echo $errorMessage;?></span>
                                    <?php endif;?>
                                <p class="text-muted" style="margin-top: 25px;">该页将在<span id="time"><?php echo $sec;?></span>秒后自动跳转!</p>
                               <br/><a href="<?php echo $gotoUrl?>">点击：立即跳转</a>
                                <?php endif;?>
                        </div>
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


