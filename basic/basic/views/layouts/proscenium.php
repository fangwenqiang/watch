<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Cache-Control" content="no-transform" />
    <title><?php echo $this->params['system']['site_title']?></title>
    <meta name="keywords" content="<?php echo $this->params['system']['site_keywords']?>" />
    <meta name="description" content="<?php echo $this->params['system']['site_description']?>" />
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
    <!--<script src="Script/global.js"></script>

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
            <?php  foreach($this->params['nav'] as $key=>$val){
                if($val['nav_place'] == 2){ ?>
                    <span ><a href="<?php echo $val['nav_link']?>"  ><?php echo $val['nav_name']?></a></span>
                <?php } } ?>
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
            <span class="tTel" style="font-size:16px;">服务热线：<?php echo $this->params['system']['tel']?></span>
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
            <?php  foreach($this->params['nav'] as $key=>$val){
                  if($val['nav_place'] == 1){ ?>
                      <li><a  title="<?php echo $val['nav_name']?>" class="cur"  href="<?php echo $val['nav_link']?>"><?php echo $val['nav_name']?></a></li>
            <?php } } ?>
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
        <?php  foreach($this->params['nav'] as $key=>$val){
                if($val['nav_place'] == 3){ ?>
                    <dl class=" w188">
                        <dt class=" w70"><i><?php echo $val['nav_name']?></i></dt>
                        <dd class=" w110">
                            <?php foreach($val['child'] as $k=>$v){ ?>
                                <a href="<?php echo $val['nav_link']?>"   rel="nofollow">&bull;&nbsp;<?php echo $v['nav_name']?></a>
                            <?php } ?>
                        </dd>
                    </dl>
         <?php   } }  ?>
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
            <?php echo $this->params['system']['site_name']?> 版权所有  Copyright 2014-2015 <?php echo $this->params['system']['email']?> . <?php echo $this->params['system']['icp']?>.
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