<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<!DOCTYPE>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="Cache-Control" content="no-transform"/>
    <title><?php echo $this->params['system']['site_title'] ?></title>
    <meta name="keywords" content="<?php echo $this->params['system']['site_keywords'] ?>"/>
    <meta name="description" content="<?php echo $this->params['system']['site_description'] ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8"/>
    <base href="<?php echo Url::to('@web/public/home/') ?>">
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
    <script src="js/global.js"></script>
    <script src="js/saved_resource"></script>
    <script type="text/javascript" src="js/user.js"></script>
    <link rel="stylesheet" href="css/user.css">
</head>
<body>
<!-- Begin header -->
<div id="member_info2"></div>
<div class="head">
    <div class="r1 w1225">
        <div class="ri" id='Login'>
            <?php foreach ($this->params['nav']['top'] as $key => $val) {?>
                    <span><a href="<?php echo $val['nav_link'] ?>"><?php echo $val['nav_name'] ?></a></span>
            <?php } ?>
        </div>
    </div>
    <div class="r2 w1225">
        <h1 class="logo w440"><img src="css/images/LOGO.png"/></h1>
        <div class="srh">
            <form id="searchForm" name="searchForm" method="get" action="/shoubiao.html"
                  onsubmit="return checkSearchForm()"><input type="hidden" value="1" name="dow" id="dow">
                <input name="w" id="w" type="text" class="tIptTxt c999 f14" value="搜索 品牌/系列/型号" title="搜索 品牌/系列/型号"
                       onfocus="javascript:var t=$(this); if(t.val()==t.attr('title')) t.val('');"
                       onblur="javascript:var t=$(this); if(t.val()=='') t.val(t.attr('title'));"/>
                <a class="c__search">搜索</b></a>
            </form>
        </div>
        <div class="wbPt">
            <span class="tTel" style="font-size:16px;">服务热线：<?php echo $this->params['system']['tel'] ?></span>
        </div>
    </div>


    <!-- 模块修改：腕表弹出层，修改内容：从展开修改为收起。修改2014-5-19 15:17:34 修改员：huang-->
    <div class="r3 w1225" style="position:relative">
        <div class="gSort" id="pop_menu">


            <!-- 修改后导航开始-->
            <ul id="dropdown_nav" >
                <li>
                    <a class="sub_link" href="#">腕表分类<img src="css/images/x_icon.png"/></a>
                    <div class="sub_nav" style="display: none;">
                        <?php foreach ($this->params['categoryData'] as $key => $value) {?>
                        <dl>
                            <dt <?php if($key==0){echo 'style="position:absolute;"';}?>><?=$value['gt_name']?></dt>
                            <dd>
                                <?php foreach ($value['son'] as $k => $v) {?>
                                <a href="<?=$v['gt_outlink']?>" title="<?=$v['gt_name']?>"><?=$v['gt_name']?></a>
                                <?php } ?>
                            </dd>
                        </dl>
                        <?php } ?>
                    </div>
                </li>
            </ul>
            <!-- 修改后导航结束-->
        </div>
        <!-- end pop_menu-->
        <!--end gMune 修改2014-5-19 15:15:00 修改员——huang-->

        <ul class="gNav">
            <?php
                foreach ($this->params['nav']['zhu'] as $key => $val) {       ?>
           
                        <li><a title="<?php echo $val['nav_name'] ?>" class="cur"
                               href="<?php echo $val['nav_link'] ?>"><?php echo $val['nav_name'] ?></a></li>
                    <?php   }    ?>
        </ul>
    </div>
</div>

<!-- End header -->
<link rel="stylesheet" href="css/index.css" type="text/css" media="screen, projection"/>

<?= $content ?>


<div class="foot">
      <div class="r1 w1225">
        <dl class=" w188">
            <dd class=" w110">
                <a href="/help-706.html" target="_blank" rel="nofollow"><img src="css/images/logoxia.png"/></a>
            </dd>
        </dl>
        <dl class=" w188">
            <dt class=" w70"><i>新手</i></dt>
            <dd class=" w110">
                <a href="" target="_blank" rel="nofollow">&bull;&nbsp;用户注册</a>
                <a href="" target="_blank" rel="nofollow">&bull;&nbsp;找回密码</a>
                <a href="" target="_blank" rel="nofollow">&bull;&nbsp;订购流程</a>
            </dd>
        </dl>
        <dl class=" w188">
            <dt class=" w70"><i>支付</i></dt>
            <dd class=" w110">
                <a href="" target="_blank" rel="nofollow">&bull;&nbsp;支付方式</a>
                <a href="" target="_blank" rel="nofollow">&bull;&nbsp;发票说明</a>
                <a href="" target="_blank" rel="nofollow">&bull;&nbsp;支付问题</a>
            </dd>
        </dl>
        <dl class=" w188">
            <dt class=" w70"><i>配送</i></dt>
            <dd class=" w110">
                <a href="" target="_blank" rel="nofollow">&bull;&nbsp;配送方式</a>
                <a href="" target="_blank" rel="nofollow">&bull;&nbsp;配送说明</a>
                <a href="" target="_blank" rel="nofollow">&bull;&nbsp;包裹签收</a>
            </dd>
        </dl>
        <dl class=" w188">
            <dt class=" w70"><i>保障</i></dt>
            <dd class=" w110">
                <a href="" target="_blank" rel="nofollow">&bull;&nbsp;退换货政策说明</a>
                <a href="" target="_blank" rel="nofollow">&bull;&nbsp;如何办理退货</a>
                <a href="" target="_blank" rel="nofollow">&bull;&nbsp;常见问题</a>
            </dd>
        </dl>
        <dl class=" w188">
            <dt class=" w70"><i>寄卖</i></dt>
            <dd class=" w110">
                <a href="" target="_blank" rel="nofollow">&bull;&nbsp;寄卖流程</a>
                <a href="" target="_blank" rel="nofollow">&bull;&nbsp;寄卖说明</a>
                <a href="" target="_blank" rel="nofollow">&bull;&nbsp;调价与撤卖</a>
            </dd>
        </dl>
    </div>
    <div class="r2 w1225 wide">
        <div class="f333 tmallLinks">
        <a href="" target="_blank" rel="nofollow">正品保证</a>&nbsp;|&nbsp;
        <a href="" target="_blank" rel="nofollow">7天退货</a>&nbsp;|&nbsp;
        <a href="" target="_blank">售后维修 </a>&nbsp;|&nbsp;
        <a href="" target="_blank">全场包邮</a>&nbsp;|&nbsp;
        <a href="" target="_blank" rel="nofollow">投诉建议</a>
        </div>
        <div>
                喜悦名表 版权所有  Copyright 2014-2015 www.xxxxxxx.cn . LTD ALL RIGHT RESERVED.
            <br/>
        </div>
    </div>
</div>
<!-- End footer -->
<div id="floatBox">
    <div id="return">
        <a href="javascript:void(0);" class="c__gotop" title="返回顶部" style="display:none;" rel="nofollow"></a>
    </div>
</div>
</body>
</html>
