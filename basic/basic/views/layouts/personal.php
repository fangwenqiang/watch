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
<!--    <script src="js/saved_resource"></script>-->
    <script type="text/javascript" src="js/user.js"></script>
    <link rel="stylesheet" href="css/user.css">
</head>
<body>
<!-- Begin header -->
<div id="member_info2"></div>
<div class="head">
    <div class="r1 w1225">
        <div class="ri" id='login'>
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
                    <div class="sub_nav">
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
<!--index banner start  ---------------------------------------------------------------------------------------------->
<?= $content ?>

	<div class="leftArea">
        <div class="leftArea">
            <div class="u__mine"><a onclick="_gaq.push(['_trackEvent','user','user_index','http://user.wbiao.cn/']);" href="http://user.wbiao.cn/" style="display: block; height: 100%;"></a></div>
            <div class="floor">
                <div class="t"><i class="u__trade"></i><font class="f_fixed">交易管理</font></div>
                <div class="c">
                    <ul>
                        <li><i></i><a href="<?php echo Url::to(['home/personal/my_order'])?>" title="我的订单" rel="nofollow">我的订单 </a></li>
                        <li><i></i><a href="<?php echo Url::to(['home/personal/my_periods'])?>" title="我的分期" rel="nofollow">我的分期 </a></li>
                        <li><i></i><a href="<?php echo Url::to(['home/personal/my_presell'])?>" title="我的预售" rel="nofollow">我的预售</a></li>
                        <li><i></i><a href="<?php echo Url::to(['home/personal/my_address'])?>" title="收货地址" rel="nofollow">收货地址</a></li>
                        <li><i></i><a href="<?php echo Url::to(['home/personal/gift_card'])?>" title="礼品卡" rel="nofollow">礼品卡</a></li>
                        <li style="border:0;"><i></i><a href="<?php echo Url::to(['home/personal/my_coupon'])?>" title="代金券/优惠券" rel="nofollow">代金券/优惠券</a></li>
                    </ul>
                </div>
            </div>
            <div class="floor">
                <div class="t"><i class="u__datum"></i><font class="f_fixed">账户管理</font></div>
                <div class="c">
                    <ul>
                        <li><i class="u__point"></i><a href="<?php echo Url::to(['home/personal/index'])?>" title="个人资料" class="ccf0" rel="nofollow">个人资料</a></li>
                        <li><i></i><a href="<?=Url::to(['home/personal/save_pwd'])?>" title="修改密码" rel="nofollow">修改密码</a></li>
                        <li><i></i><a href="<?php echo Url::to(['home/personal/my_collect'])?>" title="我的收藏" rel="nofollow">我的收藏</a></li>
                        <li><i></i><a href="<?php echo Url::to(['home/personal/my_history'])?>" title="浏览历史"  rel="nofollow">最近访问</a></li>
                        <li style="border:0;"><i></i><a href="<?php echo Url::to(['home/personal/my_address'])?>" title="为我推荐" rel="nofollow">为我推荐</a></li>
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
                <a href="<?=Url::to(['home/login/logout']) ?>" class="c999">退出登录</a>
            </div>
        </div>
   </div>
   </div>
	<!-- 左边菜单 End -->
	<div class="clear"></div>

<!--底部 -->
<div class="foot">
    <div class="r1 w1225">
        <dl class=" w188">
            <dd class=" w110">
                <a href="/help-706.html" rel="nofollow"><img src="css/images/logoxia.png"/></a>
            </dd>
        </dl>
        <?php foreach ($this->params['nav']['bottom'] as $key => $val) {
            ?>
                <dl class=" w188">
                    <dt class=" w70"><i><?php echo $val['nav_name'] ?></i></dt>
                    <dd class=" w110">
                        <?php foreach ($val['child'] as $k => $v) { ?>
                            <a href="<?php echo $val['nav_link'] ?>"
                               rel="nofollow">&bull;&nbsp;<?php echo $v['nav_name'] ?></a>
                        <?php } ?>
                    </dd>
                </dl>
            <?php
        } ?>
    </div>
    <div class="r2 w1225 wide">
        <div class="f333 tmallLinks">
            <a href="" rel="nofollow">正品保证</a>&nbsp;|&nbsp;
            <a href="" rel="nofollow">7天退货</a>&nbsp;|&nbsp;
            <a href="">售后维修 </a>&nbsp;|&nbsp;
            <a href="">全场包邮</a>&nbsp;|&nbsp;
            <a href="" rel="nofollow">投诉建议</a>
        </div>
        <div>
            <?php echo $this->params['system']['site_name'] ?> 版权所有 Copyright
            2014-2015 <?php echo $this->params['system']['email'] ?> . <?php echo $this->params['system']['icp'] ?>.
            <br/>
        </div>
    </div>
</div><!-- End footer -->

<!--back top -->
<div id="top_item">
    <a id="back_top" onclick="return false;" title="回到顶部"></a>
</div>
<script type="text/javascript">
    $(function () {

        //判断是否登录
        $.get("<?=Url::to(['home/login/login_status']) ?>", function(re_val){
            if(re_val!=0)
            {
                  str='<span><a href="<?=Url::to(['home/personal/index']) ?>">欢迎:<font color="red">'+re_val+'</font></a></span>\
                    <span><a href="<?=Url::to(['home/login/logout']) ?>">退出</a></span>\
                    <span><a href="<?=Url::to(['home/order/car_list']) ?>">购物车</a></span>'
                  $("#login").html(str);
            }
        });


        $(window).scroll(function () {
            var scrolltop = $(this).scrollTop();
            if (scrolltop >= 200) {
                $("#top_item").show();
            } else {
                $("#top_item").hide();
            }
        });
        $("#back_top").click(function () {
            $("html,body").animate({scrollTop: 0}, 500);
        });


        $(function () {
            //我们一开始就隐藏所有的下拉菜单
            $('#dropdown_nav li').find('.sub_nav').hide();
            //当鼠标悬停在主导航链接，我们发现下拉菜单中的相应链接。
            $('#dropdown_nav li').hover(function () {
                $(this).find('.sub_nav').fadeIn(100);
                $(this).find(".sub_link").addClass("cur");
            }, function () {
                $(this).find('.sub_nav').fadeOut(50);
                $(this).find(".sub_link").removeClass("cur");
            });
        });

    });
</script>
</body>
</html>

<script>
    $('#out').click(function () {
    
        $.ajax({
            url: "<?=Url::to(['home/login/logout']) ?>",
            success: function (msg) {
                if (msg == 0) {
                    alert("退出登录失败");
                } else {
                    alert("退出登录成功");
                    location.href = "<?=Url::to(['home/index']) ?>";
                }
            }
        });
    })

    /**
     * 显示当前nav小图标
     */
    $(function () {
        var controller = '<?=\Yii::$app->controller->id;?>';
        controller = controller.replace(/\//g, '%2F');
        var action = '<?=\Yii::$app->controller->action->id;?>';
        var liObj = $('.c li');
        for(var i = 0; i<liObj.length; i++ ){
            var str = liObj.eq(i).children('a').attr('href');
            str = str.substr(13);
            if(str == controller+'%2F'+action ) {
                liObj.eq(i).children('i').addClass('u__point');
                liObj.eq(i).children('a').addClass('ccf0');
            } else {
                liObj.eq(i).children('i').removeClass('u__point');
                liObj.eq(i).children('a').removeClass('ccf0');
            }
        }
    });

</script>
