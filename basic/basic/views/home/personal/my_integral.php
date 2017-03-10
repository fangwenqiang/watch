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
        <span>积分规则</span>
    </div>
    <div class="rightArea">
        <!-- 便利提醒 Begin -->
        <div class="prompt">
            <div class="pr_top">
                <b class="tit">积分规则</b>
                <div id="contact_kf_div" class="u__kf"
                     onclick="javascript:NTKF.im_openInPageChat('kf_9988_1341905703263');_gaq.push(['_trackEvent','kefuxiaochuang', 'tousu', location.href]);"></div>
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
                        <input type="text" class="txt" name="order_id" value=""
                               onfocus="javascript:$(this).val(');">
                        <input type="submit" class="lookup" value="查询">
                    </div>
                </form>
            </div>
        </div>
        <div class="account">
            <div class="hisOrd">
                <table class="ho_middle" cellpadding="0" cellspacing="0">
                    <tbody>
                    <tr class="t">
                        <td class="w120">操作</td>
                        <td class="w186">积分变更</td>
                        <td class="w75">详情</td>
                        <td class="w111">变更时间</td>
                    </tr>
                    <?php foreach($integral_list as $key=>$v):?>
                    <tr class="c">
                        <td class="w120 h70"><a class="c0e7" target="_blank" href="#">用户登陆</a></td>
                        <td class="w186 adjust02" style="text-align:left;"><?php echo $v['integral_sum']?></td>
                        <td class="w75 h70"><font class="c333"></font></td>
                        <td class="w111 adjust01"><font class="cb01"><?php echo date('Y-m-d H:i:s',$v['update_date'])?></font><br></td>
                    </tr>
                	<?php endforeach; ?>
                    </tbody>
                </table>
            </div>
<<<<<<< HEAD
        </div></div>
=======
        </div>	
>>>>>>> d93b71ce0d48a654a10a250c9ff5cfe3260db1fc
