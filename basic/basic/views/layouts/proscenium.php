<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Cache-Control" content="no-transform" />
    <title>喜悦手表网【官网】：中国最大的正品名表商城！买手表，上喜悦手表！</title>
    <meta name="keywords" content="手表,买手表,喜悦手表网,喜悦手表网官网,名表商城,正品手表，瑞士手表" />
    <meta name="description" content="【喜悦手表网官网】：买原装正品世界名表：浪琴、天梭、欧米茄、劳力士等瑞士手表品牌，信用卡分期付款，正品保证，全国联保，终身售后保障！" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8" />
    <base href="<?php echo Url::to('@web/public/home/')?>">
    <!--[if lte IE 6]>

    <script src="home/js/DD_belatedPNG.js"></script>
    <script>
        DD_belatedPNG.fix('.head .c__logo, .c__corner, .c__b_dotted, .bx-pager-link, .c__ls_pointer, .c__rs_pointer, .c__tMsk, .c__tm_more, .gMenu, .c__gotop, .c__suggest, .c__compare, .close, .n__dotted,.n__acn,.n__t_top,.n__t_bottom,.n__rank,.n__letter,.n__sina,.n__tqq,.n__app,.iphone,.android,.weixin, .n__left_brands,.n__right_brands, .n__arrleft,.n__arrright, .n__squ, .n__squ_small, .n__sign, .n__src_btn, .n__sa_rank, .n__smaller, .n__bigger, .n__red_pointer, .n__pl_btn, .n__ckb, .n__face, .n__sc_bg, .n__c_add, .n__c_rank, .n__r_bg, .n__sina_weibo, .n__qq_weibo, .n__weixin, .n__bo_pointer, .jb_ad img, #kf, #kfs, #goods #lookOver, .cc a.on span, #goods .agency, .bx-prev, .bx-next, .fancybox-wrap .hand, .c__pTag ');
    </script>
    <![endif]-->
    <!-- banner js -->
    <script src="js/banner.js"></script>
    <!-- end banner js -->
    <link rel="stylesheet" href="css/sxg.css">
    <script src="js/jquery.js"></script>
    <script src="js/saved_resource"></script>
    <link rel="stylesheet" href="css/user.css" type="text/css" media="screen, projection">
    <script type="text/javascript" src="js/user.js"></script>
    <link rel="stylesheet" href="css/user.css">
    <!--<script src="js/global.js"></script>
    
    <!--修订功能js错误 重置模块功能：下拉菜单隐藏、头部幻灯片， 修改时间2014年5月20日11:11:17 修改员：huang-->
    <script type="text/javascript">
        $(function() {
            //我们一开始就隐藏所有的下拉菜单
            $('#dropdown_nav li').find('.sub_nav').hide();
            //当鼠标悬停在主导航链接，我们发现下拉菜单中的相应链接。
            $('#dropdown_nav li').hover(function() {
                $(this).find('.sub_nav').fadeIn(100);
                $(this).find(".sub_link").addClass("cur");
            }, function() {
                $(this).find('.sub_nav').fadeOut(50);
                $(this).find(".sub_link").removeClass("cur");
            });
        });
    </script>
    <!-- end 修改完毕---------------------------------------------------------------------------------------------->
</head>
<body>
<!-- Begin header -->
<div id="member_info2"></div>
<div class="head">
    <div class="r1 w1225">
        <div class="ri">
            <span class="tLnk2"><a href=""  >购物车</a></span>
            <span class="tLnk1"><a href="" class="f12">登录</a> <a href="" class="f12">注册</a></span>
        </div>
    </div>
    <div class="r2 w1225">
        <h1 class="logo w440"><img src="css/images/LOGO.png" /></h1>
        <div class="srh">
            <form id="searchForm" name="searchForm" method="get" action="/shoubiao.html" onsubmit="return checkSearchForm()"><input type="hidden" value="1" name="dow" id="dow">
                <input name="w" id="w" type="text" class="tIptTxt c999 f14" value="搜索 品牌/系列/型号" title="搜索 品牌/系列/型号" onfocus="javascript:var t=$(this); if(t.val()==t.attr('title')) t.val('');" onblur="javascript:var t=$(this); if(t.val()=='') t.val(t.attr('title'));" />
                <a class="c__search">搜索</b></a>
            </form>
        </div>
        <div class="wbPt">
            <span class="tTel" style="font-size:16px;">服务热线：400-888-8888</span>
        </div>
    </div>



    <!-- 模块修改：腕表弹出层，修改内容：从展开修改为收起。修改2014-5-19 15:17:34 修改员：huang-->
    <div class="r3 w1225" style="position:relative">
        <div class="gSort" id="pop_menu">


            <!-- 修改后导航开始---------------------------------------------------------------------------------------------->
            <ul id="dropdown_nav">
                <li>
                    <a class="sub_link" href="#">腕表分类<img src="css/images/x_icon.png" /></a>

                    <div class="sub_nav">
                        <dl>
                            <dt class="sub_ie">手表品牌</dt>
                            <dd>
                                <a   href="">劳力士</a>
                                <a   href="">欧米茄</a>
                                <a   href="">欧古诗丹</a>
                                <a   href="">天梭</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt>男士手表</dt>
                            <dd>
                                <a   href="">送父亲</a>
                                <a   href="">送老公</a>
                                <a   href="">送男友</a>
                                <a   href="">送亲人</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt>女士手表</dt>
                            <dd>
                                <a   href="">送母亲</a>
                                <a   href="">送老婆</a>
                                <a   href="">送女友</a>
                                <a   href="">送亲人</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt>特价推荐</dt>
                            <dd>
                                <a href="" title="雅克利曼手表 Jacques Lemans">雅克利曼</a>
                                <a href="" title="玛莎拉蒂手表 Maserati">玛莎拉蒂</a>
                                <a href="" title="CK手表 Calvin Klein">CK</a>
                                <a href="" title="Guess手表 Guess">Guess</a>
                            </dd>
                        </dl>
                        <dl>
                            <dt>款式场合</dt>
                            <dd>
                                <a href="" title="商务手表">商务休闲</a>
                                <a href="" title="正装手表">正装</a>
                                <a href="" title="时尚手表">时尚</a>
                                <a href="" title="运动手表">运动</a>
                                <a href="" title="运动手表">收藏</a>
                            </dd>
                        </dl>
                    </div>
                </li>
            </ul><!-- 修改后导航结束---------------------------------------------------------------------------------------------->



        </div>
        <!-- end pop_menu-->
        <!--end gMune 修改2014-5-19 15:15:00 修改员——huang-->

        <ul class="gNav">

            <li><a  title="首页" class="cur"  href="index.html">首页</a></li>
            <li><a    href="tejia.html" title="本期特价">本期特价</a></li>
            <li><a    href="time.html" title="限时抢购">限时抢购</a></li>
            <li><a    href="boys.html" title="男士腕表">男士腕表</a></li>
            <li><a    href="girl.html" title="女士腕表">女士腕表</a></li>
            <li><a    href="jimai.html" title="免费寄卖">免费寄卖</a></li>
            <li><a href="huiyuan.html"    style="font-size:15px; color:#ce1739;" title="寻表专区/采购清单"><strong>寻表专区/采购清单</strong></a></li>
        </ul>
    </div>
</div>

<!-- End header -->
<link rel="stylesheet" href="css/index.css" type="text/css" media="screen, projection" />
<!--index banner start  ---------------------------------------------------------------------------------------------->
<?=$content?>
<!--index banner end----------------------------------------------------------------------------------------------------->




<!--底部 -->
<div class="foot">
    <div class="r1 w1225">
        <dl class=" w188">
            <dd class=" w110">
                <a href="/help-706.html"   rel="nofollow"><img src="css/images/logoxia.png"/></a>
            </dd>
        </dl>
        <dl class=" w188">
            <dt class=" w70"><i>新手</i></dt>
            <dd class=" w110">
                <a href=""   rel="nofollow">&bull;&nbsp;用户注册</a>
                <a href=""   rel="nofollow">&bull;&nbsp;找回密码</a>
                <a href=""   rel="nofollow">&bull;&nbsp;订购流程</a>
            </dd>
        </dl>
        <dl class=" w188">
            <dt class=" w70"><i>支付</i></dt>
            <dd class=" w110">
                <a href=""   rel="nofollow">&bull;&nbsp;支付方式</a>
                <a href=""   rel="nofollow">&bull;&nbsp;发票说明</a>
                <a href=""   rel="nofollow">&bull;&nbsp;支付问题</a>
            </dd>
        </dl>
        <dl class=" w188">
            <dt class=" w70"><i>配送</i></dt>
            <dd class=" w110">
                <a href=""   rel="nofollow">&bull;&nbsp;配送方式</a>
                <a href=""   rel="nofollow">&bull;&nbsp;配送说明</a>
                <a href=""   rel="nofollow">&bull;&nbsp;包裹签收</a>
            </dd>
        </dl>
        <dl class=" w188">
            <dt class=" w70"><i>保障</i></dt>
            <dd class=" w110">
                <a href=""   rel="nofollow">&bull;&nbsp;退换货政策说明</a>
                <a href=""   rel="nofollow">&bull;&nbsp;如何办理退货</a>
                <a href=""   rel="nofollow">&bull;&nbsp;常见问题</a>
            </dd>
        </dl>
        <dl class=" w188">
            <dt class=" w70"><i>寄卖</i></dt>
            <dd class=" w110">
                <a href=""   rel="nofollow">&bull;&nbsp;寄卖流程</a>
                <a href=""   rel="nofollow">&bull;&nbsp;寄卖说明</a>
                <a href=""   rel="nofollow">&bull;&nbsp;调价与撤卖</a>
            </dd>
        </dl>
    </div>
    <div class="r2 w1225 wide">
        <div class="f333 tmallLinks">
            <a href=""   rel="nofollow">正品保证</a>&nbsp;|&nbsp;
            <a href=""   rel="nofollow">7天退货</a>&nbsp;|&nbsp;
            <a href=""  >售后维修 </a>&nbsp;|&nbsp;
            <a href=""  >全场包邮</a>&nbsp;|&nbsp;
            <a href=""   rel="nofollow">投诉建议</a>
        </div>
        <div>
            喜悦名表 版权所有  Copyright 2014-2015 www.xxxxxxx.cn . LTD ALL RIGHT RESERVED.
            <br/>
        </div>
    </div>
</div><!-- End footer -->

<!--back top ---------------------------------------------------------------------------------------------->
<div id="top_item">
    <a id="back_top" onclick="return false;" title="回到顶部"></a>
</div>
<script type="text/javascript">
    $(function() {
        $(window).scroll(function(){
            var scrolltop=$(this).scrollTop();
            if(scrolltop>=200){
                $("#top_item").show();
            }else{
                $("#top_item").hide();
            }
        });
        $("#back_top").click(function(){
            $("html,body").animate({scrollTop: 0}, 500);
        });
    });
</script><!--back top ---------------------------------------------------------------------------------->
</body>
</html>