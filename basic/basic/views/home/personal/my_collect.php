<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<script src="js/jquery.js"></script>
<div id="main">
    <div class="position">
        <a href="<?php echo Url::to(['home/index/index'])?>"><strong>首页</strong></a>
        <i>&gt;</i>
        <a href="<?php echo Url::to(['home/personal/index'])?>" target="_blank" class="c0e7">我的喜悦手表</a>
        <i>&gt;</i>
        <span>我的收藏</span>
    </div>
    <div class="rightArea">
        <!-- 便利提醒 Begin -->
        <div class="prompt">
            <div class="pr_top">
                <b class="tit">我的收藏</b>
                <div id="contact_kf_div" class="u__kf"
                     onclick="javascript:NTKF.im_openInPageChat('kf_9988_1341905703263');_gaq.push(['_trackEvent','kefuxiaochuang', 'tousu', location.href]);"></div>
            </div>

        </div>
        <!-- 便利提醒 End -->

        <div class="clear"></div>
        <!-- order表单 Begin -->
        <table>
        <tr>
            <?php foreach ($collect_list as $key => $value): ?>
                <?php if($key%5==0){?></tr><tr>
                <?php } ?>
                <td>
                    <div>
                        <a href=""><img src="<?php echo $value['goods_img']; ?>" height="160px" width="160px"></a>                
                    </div>
                    <div align="center">
                        <a href=""><span style="text-align:center;width:150px;"><?php echo $value['goods_name']; ?></span></a>
                    </div>
                    <div align="center">
                        <span style="color:orange">促￥<?php echo $value['market_price']; ?></span>
                        <span style="color:gray;">￥<s><?php echo $value['shop_price']; ?></s></span>
                    </div>
                    <br /><br />
                </td>
            <?php endforeach; ?>
            <br /><br />
        </tr>
        </table>
        <!-- order表单 End -->

        <!-- 翻页 Begin -->
        <!-- 翻页 End -->

    </div>