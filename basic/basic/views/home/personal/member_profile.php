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
     <div class="prompt">
      <div class="pr_top">
       <b class="tit">会员简介</b>
      </div>
     </div>
     <div class="clear"></div>
     <div class="intro" style="margin-top:15px;">
      <div>
       <div id="phase">
        <div class="top">
         <div class="tit">
          会员级别
         </div>
        </div>
        <div class="mid">
         <div class="img"></div>
        </div>
       </div>
      </div>
      <div>
       <table class="i_middle" cellpadding="0" cellspacing="0">
        <tbody>
         <tr class="i_e">
          <td class="cell" colspan="5">会员特权</td>
         </tr>
         <tr class="i_t">
          <td class="w107 cell">权利</td>
          <td class="w172 cell">普通卡</td>
          <td class="w172 cell">银卡</td>
          <td class="w172 cell">金卡</td>
          <td class="w172 cell">白金卡</td>
         </tr>
         <tr class="i_c">
          <td class="cell">全场免运费</td>
          <td class="cell">可享</td>
          <td class="cell">可享</td>
          <td class="cell">可享</td>
          <td class="cell">可享</td>
         </tr>
         <tr class="i_c">
          <td class="cell">积分奖励</td>
          <td class="cell">可享</td>
          <td class="cell">可享</td>
          <td class="cell">可享</td>
          <td class="cell">可享</td>
         </tr>
         <tr class="i_c">
          <td class="cell">会员特惠</td>
          <td class="cell">-</td>
          <td class="cell">银卡级</td>
          <td class="cell">金卡级</td>
          <td class="cell">白金卡级</td>
         </tr>
         <tr class="i_c">
          <td class="cell">保养维修优惠</td>
          <td class="cell">-</td>
          <td class="cell">9折</td>
          <td class="cell">8.5折</td>
          <td class="cell">8折</td>
         </tr>
         <tr class="i_c">
          <td class="cell">优先发货</td>
          <td class="cell">-</td>
          <td class="cell">银卡级速度</td>
          <td class="cell">金卡级速度</td>
          <td class="cell">白金卡级速度</td>
         </tr>
         <tr class="i_c">
          <td class="cell">服务专线</td>
          <td class="cell">-</td>
          <td class="cell">-</td>
          <td class="cell">金牌客服</td>
          <td class="cell">手表达人</td>
         </tr>
         <tr class="i_c">
          <td class="cell">会员活动</td>
          <td class="cell">-</td>
          <td class="cell">-</td>
          <td class="cell">万表网手表展示会等</td>
          <td class="cell">万表网手表展示会、高管见面会等</td>
         </tr>
         <tr class="i_c">
          <td class="cell">尊享惊喜</td>
          <td class="cell">-</td>
          <td class="cell">-</td>
          <td class="cell">-</td>
          <td class="cell">可享</td>
         </tr>
        </tbody>
       </table>
      </div>
     </div>
    </div>

    <!-- 左边菜单 Begin -->
    <div class="leftArea">
        <div class="leftArea">
            <div class="u__mine"><a onclick="_gaq.push(['_trackEvent','user','user_index','http://user.wbiao.cn/']);" href="http://user.wbiao.cn/" style="display: block; height: 100%;"></a></div>
            <div class="floor">
                <div class="t"><i class="u__trade"></i><font class="f_fixed">交易管理</font></div>
                <div class="c">
                    <ul>
                        <li><i></i><a href="Script/yonghu.htm" title="我的订单" rel="nofollow">我的订单 (<span class="cb01">1</span>)</a></li>
                        <li><i></i><a href="#" title="我的预售" rel="nofollow">我的预售 (<span class="cb01">0</span>)</a></li>
                        <li><i></i><a href="#" title="收货地址" rel="nofollow">收货地址</a></li>
                        <li><i></i><a href="<?php echo Url::to(['home/personal/gift_card'])?>" title="礼品卡" rel="nofollow">礼品卡</a></li>
                        <li style="border:0;"><i></i><a href="<?php echo Url::to(['home/personal/gift_card'])?>" title="代金券/优惠券" rel="nofollow">代金券/优惠券</a></li>
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
                        <li><i class="u__point"></i><a href="<?php echo Url::to(['home/personal/my_history'])?>" title="浏览历史" class="ccf0" rel="nofollow">最近访问</a></li>
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
                        <li><i></i><a href="<?php echo Url::to(['home/personal/my_comment'])?>" title="我的评论" rel="nofollow">我的评论</a></li>
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
                <a href="#" class="c999">退出登录</a>
            </div>
        </div>
    </div>
    <!-- 左边菜单 End -->

</div>
