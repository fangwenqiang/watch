<?php
use yii\helpers\Url;
use app\Lib\Functions\Filtration;
use \yii\widgets\LinkPager;
?>
<script src="js/jquery.js"></script>
<link href="css/jimai.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/index.css" type="text/css" media="screen, projection" />
<div class="jimai_box">
    <div class="jimai_slider">
        <div class="mtsBanner" id="mtsBanner">
            <ul class="bannerWrap">
                <img src="Images/banner2.jpg" />
            </ul>
        </div>
    </div>
    <div class="nav_box">
        <div class="jnav" id="fixed">
            <ul class="clearfix">
                <li>
                    <a style="display:block; width:163px; height:44px;" href="<?php echo Url::to(['home/consignment/consign_1'])?>" target="_blank"><div class="nav_btn01">
                            <p class="clearfix">
                                <span class="t1 pngfix"></span>寄卖说明
                            </p>
                        </div>
                    </a>
                <li><a class="aStyle navBtn02" href="<?php echo Url::to(['home/consignment/consign_2'])?>">寄卖的方式与流程</a></li>
                <li>
                    <a class="aStyle navBtn01" href="<?php echo Url::to(['home/consignment/index'])?>">寄卖铺</a></li>

                </li>
                <li><a class="aStyle navBtn03" href="<?php echo Url::to(['home/consignment/my_apply'])?>">我的寄卖</a></li>
                <li class="anotherBtn">
                    <a class="aStyle navBtn02" href="<?php echo Url::to(['home/consignment/apply'])?>">立即寄卖</a>

                </li>
                <li class="anotherBtn">
                    <a class="aStyle navBtn02" href="<?php echo Url::to(['home/consignment/consult'])?>">寄卖咨询</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="content_box" id="floor">
        <div class="jimai_list01 bgcolor01" style="line-height: 50px;font-size: 16px;text-indent: 2em;">
            <p>寄卖一种委托代售的经营方式。是寄卖经营企业按照寄卖服务协议，为货主销售物品，之后再与其结算货款并收取佣金的一种商业服务行为。</p>
            <h4 class="h4">喜悦手表在线寄卖</h4>
            <p>突破传统寄卖模式，通过喜悦手表官网或微信提交寄卖商品信息，我们鉴定师会在24小时内与您联系并提供邮寄地址，我们收到的商品通过鉴定后，将您的商品在线上线
                下多种渠道为您销售商品，售出后自动在您库支付账号中充入等值货款.</p>
            <p>您可预约或直接前往喜悦手表（北京，上海，成都）会所参与寄卖，请携带您欲寄卖的奢品与相关证件，我们的鉴定师会现场为您鉴定估价办理寄卖手续。</p>
            <p>注：到会所寄卖我们同时提供买断和置换服务。</p>
            <p>在您的商品寄卖过程中，您都可以对您的商品在“我的喜悦手表-寄卖物品管理”中进行调价，可以使用比价功能作为参考，每日最多可以调价3次，调价后我们会在24小时内与您联系确认。</p>
            <p>如果您想取回您的商品，可以前往喜悦手表（北京，上海，成都）会所直接撤卖或者线上“我的喜悦手表-寄卖物品管理”申请撤卖，我们会在24小时内与您联系确认。</p>
            <p>注：商品如果被顾客预订，系统显示“预订中”，不能申请调价与撤卖。</p>
            <p>售出后库支付结算：您在喜悦手表寄卖的货品订单完成三个工作日内，我们将结算金额等值库币自动转入库支付帐户中，即可消费，剩余库币可以在该货品订单完成次月15日起登录<a href="http://www.secoo.com/">http://www.secoo.com</a>在”我的喜悦手表－帐户余额”中申请提现。</p>
            <h4 class="h4">提现方式：</h4>
            <p>1、预约会所取款：请您预约取现时间、地点（北京、上海、成都库会所），届时前去领取，未按选择时间领取需再次勾选预约；</p>
            <p>2、转账提现：我们会在您提出申请的5个工作日将款项打入下方账户中（到账时间或因银行不同有时间差），初次寄卖请在“我的喜悦手表-账户余额”中添加银行卡信息。
                如需更改提现方式，必须携带本人有效二代身份证件到鉴定中心做变更。</p>
        </div>
    </div>
</div>

