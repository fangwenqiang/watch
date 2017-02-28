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
        <span>我的积分</span>
    </div>
    <div class="rightArea">
        <!-- 便利提醒 Begin -->
        <div class="prompt">
            <div class="pr_top">
                <b class="tit">我的积分</b>
                <div id="contact_kf_div" class="u__kf" onclick="javascript:NTKF.im_openInPageChat('kf_9988_1341905703263');_gaq.push(['_trackEvent','kefuxiaochuang', 'tousu', location.href]);"></div>
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
                        <td class="w120">名称</td>
                        <td class="w186">类型</td>
                        <td class="w75">周期范围</td>
                        <td class="w111">周期内最多奖励次数</td>
                        <td class="w111">积分</td>
                    </tr>
                    <?php foreach($rule_list as $key=>$v):?>
                    <tr class="c">
                        <td class="w120 h70"><a class="c0e7" target="_blank" href="#"><?php echo $v['alias']?></a></td>
                        <td class="w186 adjust02"><?php echo $v['type']?></td>
                        <td class="w75 h70"><font class="c333">每天</font></td>
                        <td class="w111 adjust01"><font class="cb01">不限次数</font><br></td>
                        <td class="w111 adjust01"><font class="cb01"><?php echo $v['integral']?></font><br></td>
                    </tr>
                <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- order表单 End -->

        <!-- 翻页 Begin -->
        <!-- 翻页 End -->

    </div>

    <!-- 左边菜单 Begin -->
    <div class="leftArea">
        <div class="leftArea">
            <div class="u__mine"><a
                    onclick="_gaq.push(['_trackEvent','user','user_index','http://user.wbiao.cn/']);"
                    href="http://user.wbiao.cn/" style="display: block; height: 100%;"></a></div>
            <div class="floor">
                <div class="t"><i class="u__trade"></i><font class="f_fixed">交易管理</font></div>
                <div class="c">
                    <ul>
                        <li><i></i><a onclick="_gaq.push(['_trackEvent','user','user_order','/order']);" href="Script/yonghu.htm"  title="我的订单" rel="nofollow">我的订单 (<span class="cb01">1</span>)</a></li>
                        <li><i></i><a onclick="_gaq.push(['_trackEvent','user','user_orderbooking','/orderbooking']);" href="#" title="我的预售" rel="nofollow">我的预售 (<span class="cb01">0</span>)</a></li>
                        <li><i></i><a onclick="_gaq.push(['_trackEvent','user','user_address','/address']);" href="#" title="收货地址" rel="nofollow">收货地址</a></li>
                        <li><i></i><a onclick="_gaq.push(['_trackEvent','user','user_giftcard','/giftcard']);"  href="#" title="礼品卡" rel="nofollow">礼品卡</a></li>
                        <li style="border:0;"><i></i><a onclick="_gaq.push(['_trackEvent','user','user_bonus','/bonus']);" href="#" title="代金券/优惠券" rel="nofollow">代金券/优惠券</a></li>
                    </ul>
                </div>
            </div>
            <div class="floor">
                <div class="t"><i class="u__datum"></i><font class="f_fixed">账户管理</font></div>
                <div class="c">
                    <ul>
                        <li><i></i><a onclick="_gaq.push(['_trackEvent','user','user_profile','/profile']);" href="#" title="个人资料" rel="nofollow">个人资料</a></li>
                        <li><i></i><a onclick="_gaq.push(['_trackEvent','user','user_password','/password']);" href="#" title="修改密码" rel="nofollow">修改密码</a></li>
                        <li><i></i><a onclick="_gaq.push(['_trackEvent','user','user_collection','/collection']);" href="#" title="我的收藏" rel="nofollow">我的收藏</a></li>
                        <li><i></i><a onclick="_gaq.push(['_trackEvent','user','user_history_record','/history/record']);" href="#" title="浏览历史" rel="nofollow">浏览历史</a></li>
                        <li style="border:0;"><i></i><a onclick="_gaq.push(['_trackEvent','user','user_recommend','/recommend']);" href="http://user.wbiao.cn/recommend" title="为我推荐" rel="nofollow">为我推荐</a></li>
                    </ul>
                </div>
            </div>
            <div class="floor">
                <div class="t"><i class="u__integral"></i><font class="f_fixed">积分管理</font></div>
                <div class="c">
                    <ul>
                        <li><i></i><a onclick="_gaq.push(['_trackEvent','user','user_points','/points']);" href="<?php echo Url::to(['home/personal/my_integral'])?>" title="我的积分" rel="nofollow">我的积分</a></li>
                        <li><i class="u__point"></i><a onclick="_gaq.push(['_trackEvent','user','user_points_detail','/points/detail']);" href="<?php echo Url::to(['home/personal/integral_rule'])?>" title="积分细则"  class="ccf0" rel="nofollow">积分细则</a></li>
                        <li style="border:0;"><i></i><a onclick="_gaq.push(['_trackEvent','user','user_recommend_gift','/recommend/gift']);" href="#" title="推荐有礼" rel="nofollow">推荐有礼</a></li>
                    </ul>
                </div>
            </div>
            <div class="floor">
                <div class="t"><i class="u__service"></i><font class="f_fixed">消息管理</font></div>
                <div class="c">
                    <ul>
                        <li><i></i><a href="#" title="购买咨询" rel="nofollow">购买咨询</a></li>
                        <li><i></i><a href="#" title="我的评论" rel="nofollow">我的评论</a></li>
                        <li style="border:0;"><i></i><a href="#" title="我的消息" rel="nofollow">我的消息</a></li>
                        <li style="border:0;"><i></i><a href="#" title="促销通知" rel="nofollow">促销通知</a></li>
                    </ul>
                </div>
            </div>
            <div class="floor">
                <div class="t"><i class="u__star"></i><font class="f_fixed">喜悦手表会员</font></div>
                <div class="c">
                    <ul>
                        <li><i></i><a href="#" title="会员简介" rel="nofollow">会员简介</a></li>
                    </ul>
                </div>
            </div>
            <div class="logout">
                <a href="#" class="c999">退出登录</a>
            </div>
        </div>
    </div>
    <!-- 左边菜单 End -->

</div>