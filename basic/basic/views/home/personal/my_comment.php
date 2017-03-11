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
                <div id="contact_kf_div" class="u__kf"
                     onclick="javascript:NTKF.im_openInPageChat('kf_9988_1341905703263');_gaq.push(['_trackEvent','kefuxiaochuang', 'tousu', location.href]);"></div>
            </div>

        </div>
        <!-- 便利提醒 End -->

        <div class="clear"></div>
        <!-- order表单 Begin -->
        <table class="ho_middle" cellpadding="0" cellspacing="0"  border="1">
                    <tbody>
                    <tr class="t">
                        <td class="w90" align="center">
	                        <select name="datetime">
	                            <option selected="selected" value="">评价</option>
	                            <option value="1">好评</option>
	                            <option value="2">中评</option>
	                            <option value="3">差评</option>
	                        </select>
                        </td>
                        <td class="w160" align="center">
                        	<select name="order_status">
                            	<option value="">评论</option>
                            	<option value="1">有评论内容</option>
                            	<option value="2">无评论内容</option>
                        	</select>
                        </td>
                        <td class="w75" align="center">被评价人</td>
                        <td class="w100" align="center">商品信息</td>
                        <td class="w111" >操作</td>
                    </tr>
                    <?php foreach($comment_list as $key=>$v):?>
                    <tr class="c">
                    	<td align="center"><?php echo $v['comment_rank']?></td>
                        <td><a target="_blank" href="#"><?php echo $v['comment_content']?><br><font style="color: gray">[<?php echo date('Y-m-d H:i:s',$v['time'])?>]</font></a></td>
                        <td align="center">商家:喜悦商城</td>
                        <td align="center"><?php echo $v['goods_name']?><br><font style="color: orange"><?php echo $v['shop_price']?></font>元</td>
                        <td><font class="cb01"></font><br></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
        <!-- order表单 End -->

        <!-- 翻页 Begin -->
        <!-- 翻页 End -->

    </div>