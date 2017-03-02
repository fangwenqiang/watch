 <?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
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
                    	<td></td>
                        <td><a target="_blank" href="#"><?php echo $v['comment_content']?><br><font style="color: gray">[<?php echo date('Y-m-d H:i:s',$v['time'])?>]</font></a></td>
                        <td align="center">商家:喜悦商城</td>
                        <td align="center"><?php echo $v['goods_name']?><br><font style="color: orange"><?php echo $v['shop_price']?></font>元</td>
                        <td><font class="cb01"></font><br></td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
        <!-- order表单 End -->

        <!-- 翻页 Begin -->
        <!-- 翻页 End -->

    </div>

    <!-- 左边菜单 Begin -->
    <div class="leftArea">
        <div class="leftArea">
            <div class="u__mine"><a href="http://user.wbiao.cn/" style="display: block; height: 100%;"></a></div>
            <div class="floor">
                <div class="t"><i class="u__trade"></i><font class="f_fixed">交易管理</font></div>
                <div class="c">
                    <ul>
                        <li><i></i><a href="Script/yonghu.htm" title="我的订单" rel="nofollow">我的订单 (<span class="cb01">1</span>)</a></li>
                        <li><i></i><a href="#" title="我的预售" rel="nofollow">我的预售 (<span class="cb01">0</span>)</a></li>
                        <li><i></i><a href="#" title="收货地址" rel="nofollow">收货地址</a></li>
                        <li><i></i><a href="<?php echo Url::to(['home/personal/gift_card'])?>" title="礼品卡" rel="nofollow">礼品卡</a></li>
                        <li style="border:0;"><i></i><a  href="#" title="代金券/优惠券" rel="nofollow">代金券/优惠券</a></li>
                    </ul>
                </div>
            </div>
            <div class="floor">
                <div class="t"><i class="u__datum"></i><font class="f_fixed">账户管理</font></div>
                <div class="c">
                    <ul>
                        <li><i></i><a href="#" title="个人资料" rel="nofollow">个人资料</a></li>
                        <li><i></i><a href="#" title="修改密码" rel="nofollow">修改密码</a></li>
                        <li><i></i><a href="<?php echo Url::to(['home/personal/my_collect'])?>" title="我的收藏" rel="nofollow">我的收藏</a></li>
                        <li><i></i><a href="<?php echo Url::to(['home/personal/my_history'])?>" title="浏览历史" rel="nofollow">最近访问</a></li>
                        <li style="border:0;"><i></i><a href="http://user.wbiao.cn/recommend" title="为我推荐" rel="nofollow">为我推荐</a></li>
                    </ul>
                </div>
            </div>
            <div class="floor">
                <div class="t"><i class="u__integral"></i><font class="f_fixed">积分管理</font></div>
                <div class="c">
                    <ul>
                        <li><i></i><a href="<?php echo Url::to(['home/personal/my_integral'])?>" title="我的积分" rel="nofollow">我的积分</a></li>
                        <li><i></i><a href="<?php echo Url::to(['home/personal/integral_rule'])?>" title="积分细则" rel="nofollow">积分细则</a></li>
                        <li style="border:0;"><i></i><a href="#" title="推荐有礼" rel="nofollow">推荐有礼</a></li>
                    </ul>
                </div>
            </div>
            <div class="floor">
                <div class="t"><i class="u__service"></i><font class="f_fixed">消息管理</font></div>
                <div class="c">
                    <ul>
                        <li><i></i><a href="#" title="购买咨询" rel="nofollow">购买咨询</a></li>
                        <li ><i class="u__point"></i><a href="<?php echo Url::to(['home/personal/my_comment'])?>" title="我的评论"  class="ccf0" rel="nofollow">我的评论</a></li>
                        <li style="border:0;"><i></i><a href="#" title="我的消息" rel="nofollow">我的消息</a></li>
                        <li style="border:0;"><i></i><a href="#" title="促销通知" rel="nofollow">促销通知</a></li>
                    </ul>
                </div>
            </div>
            <div class="floor">
                <div class="t"><i class="u__star"></i><font class="f_fixed">喜悦手表会员</font></div>
                <div class="c">
                    <ul>
                        <li><i></i><a href="<?php echo Url::to(['home/personal/member_profile'])?>" title="会员简介" rel="nofollow">会员简介</a></li>
                    </ul>
                </div>
            </div>
            <div class="logout">
                <a href="<?php echo Url::to(['home/login/logout'])?>" class="c999">退出登录</a>
            </div>
        </div>
    </div>
    <!-- 左边菜单 End -->

</div>