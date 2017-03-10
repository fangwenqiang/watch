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
        <div style="background-color:#FEFFD0;border:1px solid #FF8E46;color:#FF3300;height:22px;line-height:22px;margin-bottom:15px;padding:8px 12px;position:relative;">
            <p>您的邮箱还未激活验证，激活验证邮箱后将立即赠送500积分！
                <a href="/profile/sendemail/" class="activate" style="position:absolute;top:7px;" rel="nofollow">
                    <img src="//qd2.wbiao.co/img/4.0/user/activate.png" alt="马上验证" /></a></p>
        </div>
        <div class="account">
            <div class="data">
                <div class="left">
                    <img style="width:130px;height:130px;" id="user_head_img" src="https://image2.wbiao.co/others/user/head/default.jpg" alt="暂无图片" />
                    <a id="setting_head_img" href="/index/setting_head_pop" style="display:none;" class="fancybox.iframe">&nbsp;</a>
                    <span class="blue" style="cursor:pointer;" onclick="javascript:$('#setting_head_img').click()">[修改头像]</span></div>
                <div class="right">
                    <div class="welcome">
                        <h1>欢迎您，a1228289802</h1>
                        <a href="/profile/" class="c0e7">编辑个人信息</a>
                        <div class="clear"></div>
                    </div>
                    <div class="grade">
                                    <span class="w96">会员等级：
                                        <a class="c0e7" href="/index/grade_introduction">普通卡</a></span>
                        <span class="w337" style="width:476px;">成功消费一次;可升级到银卡</span></div>
                    <div class="verify2">
                                    <span>
                                        <i class="v_email u__g_email"></i>
                                        <a href="/profile/sendemail/" class="c0e7">邮箱未验证(立即验证)</a></span>
                    </div>
                    <div class="table">
                        <div class="cell">
                                        <span class="w414">
                                            <i>订单提醒：</i>
                                            <a href="/order/?order_status=8" class="w107">待付款
                                                <font class="cb01">(0)</font></a>
                                            <a href="/order/?order_status=4" class="w107">待发货
                                                <font class="cb01">(0)</font></a>
                                        </span>
                                        <span class="w198">
                                            <i style="width:70px;text-align:right;">
                                                <font class="c666">我的积分：</font></i>
                                            <a href="/points/" class="blue">
                                                <font class="cb01">5000</font>分</a>
                                            <a href="/points/exchange/" class="blue" target="_blank">积分换券</a></span>
                        </div>
                        <div class="cell">
                                        <span class="w414">
                                            <i>账户提醒：</i>
                                            <a href="/feedback/" class="w107">咨询留言
                                                <font class="cb01">(0)</font></a>
                                            <a href="/collection/" class="w107">我的收藏
                                                <font class="cb01">(0)</font></a>
                                        </span>
                                        <span class="w198">
                                            <i style="width:70px;text-align:right;">
                                                <font class="c666">&nbsp;&nbsp;优惠券：</font></i>
                                            <a href="/bonus/" class="blue">
                                                <font class="cb01">1</font>张</a></span>
                        </div>
                        <div class="cell">
                                        <span class="w414">
                                            <i>其他提醒：</i>
                                            <a href="https://cart.wbiao.cn/" class="w107">我的购物车
                                                <font class="cb01">(0)</font></a>
                                            <a href="/comment/" class="w107">我的评论
                                                <font class="cb01">(0)</font></a>
                                            <a href="/inbox/" class="w100">短消息
                                                <font class="cb01">(0)</font></a>
                                        </span>
                            <span class="w198">&nbsp;</span></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
            <div class="hisOrd">
                <div class="ho_top">
                    <span class="ho_tit">近一个月订单</span>
                                <span class="ho_more">
                                    <a class="c0e7" href="/order">查看更多订单&gt;&gt;</a></span>
                </div>
                <table class="ho_middle" cellpadding="0" cellspacing="0">
                    <tr class="t">
                        <td class="w107">订单编号</td>
                        <td class="w198">订单商品</td>
                        <td class="w75">收货人</td>
                        <td class="w111">订单金额</td>
                        <td class="w87">下单时间</td>
                        <td class="w87">订单状态</td>
                        <td class="w130">操作</td></tr>
                </table>
            </div>
            <div class="clear"></div>
            <div class="recGoods">
                <div class="rg_tit">
                    <span class="on">特价单品</span>
                    <span>热卖单品</span>
                    <span style="width:268px;border-right:1px solid #ddd;">猜你喜欢</span></div>
                <div class="rg_con">
                    <div class="s_con">
                        <ul class="slides">
                            <li>
                                <a href="https://www.wbiao.cn/longines-g48000.html" target="_blank">
                                    <img src="https://image2.wbiao.co/goods/c/201504/07/L4_810_5_12_7_71854.jpg" alt="浪琴longines-博雅系列 L4.810.5.12.7 机械男表"></a>
                                <a href="https://www.wbiao.cn/longines-g48000.html" target="_blank">
                                    <span>浪琴</span>
                                    <span style="margin-top:-4px;">博雅系列L4.810.5.12.7</span></a>
                                <span style="font-family:Arial">￥20800</span>
                                <span class="maket">&yen;20800</span>
                                <input type="hidden" id="goods_id" value="48000"></li>
                            <li>
                                <a href="https://www.wbiao.cn/muehle-glashutte-g28657.html" target="_blank">
                                    <img src="https://image2.wbiao.co/goods/c/201311/05/M1-37-74-LB_25920.jpg" alt="德国品牌：格拉苏蒂·莫勒 Muehle·Glashuette-Sporty Instrument Watches 运动系列 M1-37-74-LB 德式计时大飞机械男表"></a>
                                <a href="https://www.wbiao.cn/muehle-glashutte-g28657.html" target="_blank">
                                    <span>格拉苏蒂·莫勒</span>
                                    <span style="margin-top:-4px;">Sporty Instrument Watches 运动系列M1-37-74-LB</span></a>
                                <span style="font-family:Arial">￥24300</span>
                                <span class="maket">&yen;24300</span>
                                <input type="hidden" id="goods_id" value="28657"></li>
                            <li>
                                <a href="https://www.wbiao.cn/cys-g42325.html" target="_blank">
                                    <img src="https://image2.wbiao.co/goods/c/201503/12/3130_1H_91630.jpg" alt="限量88枚：瑞士库尔沃CYS-Historiador 历史学家系列 3130.1H 机械男表（已绝版）"></a>
                                <a href="https://www.wbiao.cn/cys-g42325.html" target="_blank">
                                    <span>库尔沃</span>
                                    <span style="margin-top:-4px;">Historiador 历史学家系列3130.1H</span></a>
                                <span style="font-family:Arial">￥21560</span>
                                <span class="maket">&yen;35280</span>
                                <input type="hidden" id="goods_id" value="42325"></li>
                            <li>
                                <a href="https://www.wbiao.cn/davosa-g42240.html" target="_blank">
                                    <img src="https://image2.wbiao.co/goods/c/201405/16/16151885_01703.jpg" alt="瑞士迪沃斯(DAVOSA)-Military 军用系列Trail Master追踪器 16151885 机械男表"></a>
                                <a href="https://www.wbiao.cn/davosa-g42240.html" target="_blank">
                                    <span>迪沃斯</span>
                                    <span style="margin-top:-4px;">Military 军用系列16151885</span></a>
                                <span style="font-family:Arial">￥6300</span>
                                <span class="maket">&yen;6300</span>
                                <input type="hidden" id="goods_id" value="42240"></li>
                            <li>
                                <a href="https://www.wbiao.cn/michel-herbelin-g26990.html" target="_blank">
                                    <img src="https://image2.wbiao.co/goods/c/201605/27/1043_89N_28030.jpg" alt="法国赫柏林-Epsilon 灵动系列 1043/89N 女士石英表"></a>
                                <a href="https://www.wbiao.cn/michel-herbelin-g26990.html" target="_blank">
                                    <span>赫柏林</span>
                                    <span style="margin-top:-4px;">Epsilon 灵动系列1043/89N</span></a>
                                <span style="font-family:Arial">￥5850</span>
                                <span class="maket">&yen;5850</span>
                                <input type="hidden" id="goods_id" value="26990"></li>
                            <li>
                                <a href="https://www.wbiao.cn/michel-herbelin-g28231.html" target="_blank">
                                    <img src="https://image2.wbiao.co/goods/c/201311/01/12243_T08_85558.jpg" alt="法国赫柏林Michel Herbelin-Newport Yacht Club 纽波特游艇俱乐部系列 255/64 机械男表（已绝版）"></a>
                                <a href="https://www.wbiao.cn/michel-herbelin-g28231.html" target="_blank">
                                    <span>赫柏林</span>
                                    <span style="margin-top:-4px;">Newport Yacht Club 纽波特游艇俱乐部系列255/64</span></a>
                                <span style="font-family:Arial">￥16870</span>
                                <span class="maket">&yen;16870</span>
                                <input type="hidden" id="goods_id" value="28231"></li>
                        </ul>
                    </div>
                    <div class="s_con">
                        <ul class="slides">
                            <li>
                                <a href="https://www.wbiao.cn/tissot-g836.html" target="_blank">
                                    <img src="https://image2.wbiao.co/goods/c/200907/08/836_97982.jpg" alt="天梭TISSOT-力洛克系列 T41.1.483.33 机械男表"></a>
                                <a href="https://www.wbiao.cn/tissot-g836.html" target="_blank">
                                    <span>天梭</span>
                                    <span style="margin-top:-4px;">力洛克系列T41.1.483.33</span></a>
                                <span style="font-family:Arial">￥4450</span>
                                <span class="maket">&yen;4450</span>
                                <input type="hidden" id="goods_id" value="836"></li>
                            <li>
                                <a href="https://www.wbiao.cn/michel-herbelin-g5561.html" target="_blank">
                                    <img src="https://image2.wbiao.co/goods/c/201608/03/12443_S01_36031.jpg" alt="法国优雅腕表品牌：赫柏林Michel Herbelin-Classiques 经典系列 -12443/S01 中性石英表"></a>
                                <a href="https://www.wbiao.cn/michel-herbelin-g5561.html" target="_blank">
                                    <span>赫柏林</span>
                                    <span style="margin-top:-4px;">Classiques 经典系列12443/S01</span></a>
                                <span style="font-family:Arial">￥2680</span>
                                <span class="maket">&yen;2680</span>
                                <input type="hidden" id="goods_id" value="5561"></li>
                            <li>
                                <a href="https://www.wbiao.cn/davosa-g14506.html" target="_blank">
                                    <img src="https://image2.wbiao.co/goods/c/201603/10/16155550_40702.jpg" alt="瑞士迪沃斯（DAVOSA）-Diving 潜水系列 Ternos特勒斯 HC/200-黑 16155550 机械潜水男表"></a>
                                <a href="https://www.wbiao.cn/davosa-g14506.html" target="_blank">
                                    <span>迪沃斯</span>
                                    <span style="margin-top:-4px;">Diving 潜水系列16155550</span></a>
                                <span style="font-family:Arial">￥6700</span>
                                <span class="maket">&yen;6700</span>
                                <input type="hidden" id="goods_id" value="14506"></li>
                            <li>
                                <a href="https://www.wbiao.cn/longines-g3317.html" target="_blank">
                                    <img src="https://image2.wbiao.co/goods/c/201605/24/L2_628_4_78_3_68248.jpg" alt="浪琴longines-名匠系列 L2.628.4.78.3 机械男表"></a>
                                <a href="https://www.wbiao.cn/longines-g3317.html" target="_blank">
                                    <span>浪琴</span>
                                    <span style="margin-top:-4px;">名匠系列L2.628.4.78.3</span></a>
                                <span style="font-family:Arial">￥15000</span>
                                <span class="maket">&yen;15000</span>
                                <input type="hidden" id="goods_id" value="3317"></li>
                            <li>
                                <a href="https://www.wbiao.cn/tissot-g44266.html" target="_blank">
                                    <img src="https://image2.wbiao.co/goods/c/201604/18/T063_610_11_037_00_53061.jpg" alt="天梭TISSOT-俊雅系列 T063.610.11.037.00 石英男表"></a>
                                <a href="https://www.wbiao.cn/tissot-g44266.html" target="_blank">
                                    <span>天梭</span>
                                    <span style="margin-top:-4px;">俊雅系列T063.610.11.037.00</span></a>
                                <span style="font-family:Arial">￥2550</span>
                                <span class="maket">&yen;2550</span>
                                <input type="hidden" id="goods_id" value="44266"></li>
                            <li>
                                <a href="https://www.wbiao.cn/davosa-g13823.html" target="_blank">
                                    <img src="https://image2.wbiao.co/goods/c/201511/16/16246615_99415.jpg" alt="瑞士迪沃斯（DAVOSA）-Classic Quartz 经典系列 16246615 男士商务、石英表"></a>
                                <a href="https://www.wbiao.cn/davosa-g13823.html" target="_blank">
                                    <span>迪沃斯</span>
                                    <span style="margin-top:-4px;">Classic Quartz 经典石英系列16246615</span></a>
                                <span style="font-family:Arial">￥2100</span>
                                <span class="maket">&yen;2100</span>
                                <input type="hidden" id="goods_id" value="13823"></li>
                        </ul>
                    </div>
                    <div class="s_con">
                        <ul class="slides">
                            <li>
                                <a href="https://www.wbiao.cn/epos-g25536.html" target="_blank">
                                    <img src="https://image2.wbiao.co/goods/c/201611/02/3420_152_24_14_15_15295.jpg" alt="瑞士艺术制表大师爱宝时（EPOS）-Originale原创系列 激薄-都市灰3420.152.24.14.15 机械男表 7.7毫米厚度 流畅线条"></a>
                                <a href="https://www.wbiao.cn/epos-g25536.html" target="_blank">
                                    <span>爱宝时</span>
                                    <span style="margin-top:-4px;">Originale原创系列3420.152.24.14.15</span></a>
                                <span style="font-family:Arial">￥8100</span>
                                <span class="maket">&yen;8100</span>
                                <input type="hidden" id="goods_id" value="25536"></li>
                            <li>
                                <a href="https://www.wbiao.cn/cys-g26741.html" target="_blank">
                                    <img src="https://image2.wbiao.co/goods/c/201512/16/3130_1FA_27420.jpg" alt="拥有拉丁血统的瑞士腕表品牌：瑞士库尔沃CYS-Historiador 历史学家系列 古董手绘火焰纹款 3130.1FA 机械男表"></a>
                                <a href="https://www.wbiao.cn/cys-g26741.html" target="_blank">
                                    <span>库尔沃</span>
                                    <span style="margin-top:-4px;">Historiador 历史学家系列3130.1FA</span></a>
                                <span style="font-family:Arial">￥20880</span>
                                <span class="maket">&yen;20880</span>
                                <input type="hidden" id="goods_id" value="26741"></li>
                            <li>
                                <a href="https://www.wbiao.cn/michel-herbelin-g9307.html" target="_blank">
                                    <img src="https://image2.wbiao.co/goods/c/201610/14/COF_17048_59LT_20700.jpg" alt="法国优雅腕表品牌：赫柏林Michel Herbelin-Antarès 恒星系列 COF.17048/59LT 女士腕表"></a>
                                <a href="https://www.wbiao.cn/michel-herbelin-g9307.html" target="_blank">
                                    <span>赫柏林</span>
                                    <span style="margin-top:-4px;">Antarès 恒星系列COF.17048/59LT</span></a>
                                <span style="font-family:Arial">￥5850</span>
                                <span class="maket">&yen;5850</span>
                                <input type="hidden" id="goods_id" value="9307"></li>
                            <li>
                                <a href="https://www.wbiao.cn/longines-g6895.html" target="_blank">
                                    <img src="https://image2.wbiao.co/goods/c/201506/19/L8_110_4_87_6_49716.jpg" alt="浪琴longines-心月系列 L8.110.4.87.6 女士石英表"></a>
                                <a href="https://www.wbiao.cn/longines-g6895.html" target="_blank">
                                    <span>浪琴</span>
                                    <span style="margin-top:-4px;">心月系列L8.110.4.87.6</span></a>
                                <span style="font-family:Arial">￥10400</span>
                                <span class="maket">&yen;10400</span>
                                <input type="hidden" id="goods_id" value="6895"></li>
                            <li>
                                <a href="https://www.wbiao.cn/swiss-military-g27764.html" target="_blank">
                                    <img src="https://image2.wbiao.co/goods/c/201311/12/24771_05385.jpg" alt="瑞士军表SWISS MILITARY-AIRFORCE 空军系列 HURRICANE WORLDTIMER RAWHID 飓风世界时 皮带版 24771 军用专业多功能飞行员执勤表"></a>
                                <a href="https://www.wbiao.cn/swiss-military-g27764.html" target="_blank">
                                    <span>瑞士军表</span>
                                    <span style="margin-top:-4px;">AIRFORCE 空军系列24771</span></a>
                                <span style="font-family:Arial">￥6480</span>
                                <span class="maket">&yen;6480</span>
                                <input type="hidden" id="goods_id" value="27764"></li>
                            <li>
                                <a href="https://www.wbiao.cn/omega-g16809.html" target="_blank">
                                    <img src="https://image2.wbiao.co/goods/c/201308/27/212_30_41_20_03_001_79603.jpg" alt="欧米茄Omega-海马系列 212.30.41.20.03.001 机械男表"></a>
                                <a href="https://www.wbiao.cn/omega-g16809.html" target="_blank">
                                    <span>欧米茄</span>
                                    <span style="margin-top:-4px;">海马系列212.30.41.20.03.001</span></a>
                                <span style="font-family:Arial">￥32400</span>
                                <span class="maket">&yen;32400</span>
                                <input type="hidden" id="goods_id" value="16809"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top:10px;">
            <a href="https://data.wbiao.cn/ad.php?ad_id=2758" target="_blank" rel="nofollow" onclick="">
                <img src="//qd2.wbiao.co/img/unit/blank.gif" class="lazy" data-original="https://image2.wbiao.co/others/up/201703/09/148904110466344.jpg" alt="3.15" /></a>
        </div>
    </div>
