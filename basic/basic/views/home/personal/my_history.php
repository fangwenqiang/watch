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
        <span>最近访问</span>
    </div>
    <div class="rightArea">
        <!-- 便利提醒 Begin -->
        <div class="prompt">
            <div class="pr_top">
                <b class="tit">最近访问</b>
                <div id="contact_kf_div" class="u__kf"></div>
            </div>

        </div>
        <!-- 便利提醒 End -->

        <div class="clear"></div>
        <!-- order表单 Begin -->
        <div class="odrTab">
            <div class="ot_top">
                <form action="">
                    <div class="left">
                        <select name="datetime">
                            <option selected="selected" value="">所有订单</option>
                            <option value="1">近一个月订单</option>
                            <option value="2">近三个月订单</option>
                            <option value="3">近一年订单</option>
                        </select>
                        <select name="order_status">
                            <option value="">全部状态</option>
                            <option value="1">未确认</option>
                            <option value="2">确认中</option>
                            <option value="3">已确认</option>
                            <option value="4">待发货</option>
                            <option value="5">分单发货中</option>
                            <option value="6">已发货</option>
                            <option value="7">已取消</option>
                            <option value="8">待支付</option>
                        </select>

                    </div>
                    <div class="right">
                        &lt;订单编号：&gt;<!--订单编号：-->
                        <input type="text" class="txt" name="order_id" value="" onfocus="javascript:$(this).val('');">
                        <input type="submit" class="lookup" value="查询">
                    </div>
                </form>
            </div>
        </div>
        <table border="1">
        <tr>
	        <?php foreach ($history_list as $key => $value): ?>
	        	<?php if($key%5==0){?></tr><tr>
	        	<?php } ?>
	        	<td>
                <div align="center">
                    <a href="<?php echo Url::to(['home/goods-show/show'])?>"><img src="images/<?php echo $value['goods_img']; ?>" height="160px" width="160px"></a>
                </div>
                <div align="center">
                    <span style="color:orange;">促￥<?php echo $value['shop_price']; ?></span>&nbsp;&nbsp;
                    <span style="color:gray;">￥<s><?php echo $value['market_price']; ?></s><br></span>
                </div>
                <div align="center">
                    <a href=""><span style="text-align:center;width:150px;"><?php echo $value['goods_name']; ?></span></a>
                </div>
	        	</td>
	        <?php endforeach; ?>
        </tr>
        </table>
        <!-- order表单 End -->

        <!-- 翻页 Begin -->
        <!-- 翻页 End -->

    </div>