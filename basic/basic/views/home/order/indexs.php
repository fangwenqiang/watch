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
        .address_div1{border: 1px solid red;height: 40px;line-height: 40px;background-color: #ffd7e0}
        .address_div2{height: 40px;line-height: 40px;}
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
            <li class="w60 bold f14 cd00">选购商品</li>
            <li class="w90">&nbsp;</li>
            <li class="w60 bold f14 c666">提交订单</li>
            <li class="w90">&nbsp;</li>
            <li class="w60 bold f14 c666">支付订单</li>
            <li class="w90">&nbsp;</li>
            <li class="w60 bold f14 c666">等待签收</li>
        </ul>
    </div>
    <h1><br /><img src="css/images/LOGO.png" /></h1>
</div>
<div id="main">
    <div class="w930 m0a mt30">
        <div class="w930 m0a">
            <div class="fr">
                <input type="checkbox" class="car_goods" value="1">
                <input type="checkbox" class="car_goods"  value="2">
                <form action="<?php echo Url::to(['home/order/index'])?>" method="post">
                    <div class="mt20 tr">
                        <input type="hidden" id="car" value="" name="car" >
                        <input name="_csrf" type="hidden" id="_csrf" value="<?= \Yii::$app->request->csrfToken ?>">
                        <input  type="submit" class="btnd00 w146 h40 f16 bold"  value="确认购物车" />
                    </div>
                </form>

            </div>
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

        $(".textarea").keyup(function(){
            var len = $(this).val().length;
            if(len > 199){
                $(this).val($(this).val().substring(0,200));
                len = 200;
            }
            if(len != 200){
                $(this).next().html(len+"/"+200);
            } else {
                $(this).next().html("<font color='red'>"+len+"/"+200+"</font>");
            }
        });


        $('.car_goods').click(function(){
            var str = $(this).val()
            var car = $('#car').val();
            car +=','+str;
            $('#car').val(car);
        });
    });


</script>