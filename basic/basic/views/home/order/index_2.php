<?php

use yii\helpers\Url;
?>
<!DOCTYPE>
<!-- saved from url=(0096)http://cart.wbiao.cn/success?order_id=102338&payment_id=2&token=846a32919ddd22bffc6d85fa1781e2d6 -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>订单提交成功_喜悦手表网</title>

    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE8">
    <base href="<?php echo Url::to('@web/public/home/') ?>">
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <link rel="stylesheet" href="css/2.css">
    <style>
        .order2{float: left;margin-top: 30px;margin-left: 75px;}
    </style>
    <!--[if lte IE 6]>
    <![endif]-->
</head>

<body style="">
<div id="member_info2"></div>
<div id="header">
    <div class="top">
        <ul>
            <li id="member_info"><a href="#" title="登录" rel="nofollow">登录</a><span>&nbsp;|&nbsp;</span><a href="#" title="注册" rel="nofollow">注册</a></li>
            <li>&nbsp;|&nbsp;</li>
            <li><a href="#" rel="nofollow" title="我的订单">我的订单</a></li>
            <li>&nbsp;|&nbsp;</li>
            <li class="s__center"><a class="link_center" href="#" rel="nofollow" title="会员中心">会员中心&nbsp;<span class="s__arrow_red_down">&nbsp;</span></a>
                <div id="user_menu_list">
                    <p>您好! 进入会员中心请先<a href="#" >&nbsp;登录&nbsp;</a>或<a href="#" >&nbsp;注册&nbsp;</a></p>
                </div>
            </li>
            <li>&nbsp;|&nbsp;</li>
            <li class="s__clearing"><div class="s__cart"><a href="#" rel="nofollow">去购物车结算&nbsp;<span class="s__arrow_red_down">&nbsp;</span></a></div></li>
        </ul>
    </div>
    <div class="w750 mt30 fr">
        <ul class="m_0_23 inline w464 fr li_left li">
            <li class="w14 h14 circle bp_0-36"></li>
            <li class="w136 h8 mt6 bt_2_f1f">&nbsp;</li>
            <li class="w14 h14 circle bp_0-36"></li>
            <li class="w136 h8 mt6 bt_2_f1f">&nbsp;</li>
            <li class="w14 h14 circle bp_0-36"></li>
            <li class="w136 h8 mt6 bt_2_f1f">&nbsp;</li>
            <li class="w14 h14 circle bp_0-19"></li>
        </ul>
        <ul class="w510 mt10 fr li_left li">
            <li class="w60 bold f14 c666">选购商品</li>
            <li class="w90">&nbsp;</li>
            <li class="w60 bold f14 c666">提交订单</li>
            <li class="w90">&nbsp;</li>
            <li class="w60 bold f14 cd00">支付订单</li>
            <li class="w90">&nbsp;</li>
            <li class="w60 bold f14 c666">等待签收</li>
        </ul>
    </div>
    <h1><br /><img src="css/images/LOGO.png" /></h1>
</div>
<div id="main">
    <div class="w930 m0a mt30">
        <div class="ml20" style="margin-top: 50px;">
            <div style="border-bottom: 1px solid #dcdcdc;padding-bottom: 5px;height: 15px;">
                <div style="float: left">请选择付款方式</div>
            </div>
            <p style="height: 42px;font-weight: bold;font-size: 16px;color: red;line-height: 42px;">
                <span style="float: left">总金额：￥1200</span>
            </p>
        </div>
        <div class="bgf6f br10" style="margin-top: 10px;" id="address_div">
       <div style="height: 150px;">
           <a href="javascript:void(0)"><img src="Images/order-1.jpg" style="margin-top: 30px;margin-left:75px;float: left"></a>
           <a href="javascript:void(0)"><img src="Images/order-2.jpg" class="order2"></a>
           <a href="javascript:void(0)"><img src="Images/order-3.jpg" class="order2"></a>
           <a href="javascript:void(0)"><img src="Images/order-4.jpg" class="order2"></a>
           <a href="<?php echo $link;?>"><img src="Images/order-5.jpg" class="order2"></a>
           <a href="javascript:void(0)"><img src="Images/order-6.jpg" class="order2"></a>
           <a href="javascript:void(0)"><img src="Images/order-7.jpg" class="order2"></a>
           <a href="javascript:void(0)"><img src="Images/order-8.jpg" class="order2"></a>


       </div>
            <div class="clear"></div>
            <img src="Images/order-10.jpg" style="margin-top: 20px;">
        </div>

    </div>

</div>

<link rel="stylesheet" href="css/fancybox.css" type="text/css">
<div id="footer">
    <div class="info">
        <p class="copyright">                喜悦名表 版权所有  Copyright 2014-2015 www.xxxxxxx.cn . LTD ALL RIGHT RESERVED.

        </p>
    </div>
</div>
</body>
</html>

<script>
    $(function(){
       $('.address').click(function(){
           $("#address_div div").removeClass('address_div1');
           $("#address_div div").addClass('address_div2');


           $(".class_div1").html("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
           $(".class_div2").html("");


           $(this).parent().parent().addClass('address_div1');
          $(this).parent().prev().html('寄送至：');
          $(this).parent().next().html('修改本地址');

       });
    });
</script>