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
            <li class="w60 bold f14 c666">选购商品</li>
            <li class="w90">&nbsp;</li>
            <li class="w60 bold f14 cd00">提交订单</li>
            <li class="w90">&nbsp;</li>
            <li class="w60 bold f14 c666">支付订单</li>
            <li class="w90">&nbsp;</li>
            <li class="w60 bold f14 c666">等待签收</li>
        </ul>
    </div>
    <h1><br /><img src="css/images/LOGO.png" /></h1>
</div>
<div id="main">
    <form action="<?php echo Url::to(['home/order/index_2'])?>" method="post">
        <div class="w930 m0a mt30">
            <div class="ml20" style="margin-top: 50px;">
                <div style="border-bottom: 1px solid #dcdcdc;padding-bottom: 5px;height: 15px;">
                    <div style="float: left">选择收货地址</div>
                    <div style="float: right"><a href="javascript:void(0);" >管理收货地址</a></div>
                </div>
            </div>
            <div class="bgf6f br10" style="margin-top: 10px;" id="address_div">
                <div class="address_div1">
                    <div style="float: left" class="class_div1"> 寄送至：</div>
                    <div style="float: left">
                        <input type="radio" checked name="address" class="address" value="1">北京 北京市 海淀区 上地街道 北京市海淀区上地七街软件园南路57号（刘杰 收）13576993529  默认地址
                    </div>
                    <div style="float: right" class="class_div2">修改本地址</div>
                </div>

                <div class="address_div2">
                    <div style="float: left" class="class_div1"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <div style="float: left">
                        <input type="radio" name="address" class="address" value="2">北京 北京市 海淀区 上地街道 北京市海淀区上地七街软件园南路57号（刘 收）13576993529  默认地址
                    </div>
                    <div style="float: right;" class="class_div2">修改本地址</div>
                </div>
                <div class="address_div2">
                    <div style="float: left" class="class_div1"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <div style="float: left">
                        <input type="radio" name="address" class="address" value="3">北京 北京市 海淀区 上地街道 北京市海淀区上地七街软件园南路57号（杰 收）13576993529  默认地址
                    </div>
                    <div style="float: right" class="class_div2"></div>
                </div>

                <div style="height: 40px;line-height: 40px;">
                    <div style="float: left"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <div style="float: left">
                        +添加新地址
                    </div>
                </div>

                <div class="clear"></div>
            </div>
        </div>
        <div class="w930 m0a mt30">
            <div class="ml20" style="margin-top: 50px;">
                <div style="border-bottom: 1px solid #dcdcdc;padding-bottom: 5px;height: 15px;">
                    <div style="float: left">确认订单信息</div>
                </div>
            </div>
            <?php
             foreach($data as $key=>$val){  ?>
                 <div class="bgf6f br10">
                     <ul class="c999 f13 h40 mt10 li_left">
                         <li class="w510 tl pl20">商品</li>
                         <li class="w120 tc">单价</li>
                         <li class="w120 tc">数量</li>
                         <li class="w120 tc">小计</li>
                     </ul>

                     <ul class="bt_1_eae bb_1_fff" id="goods_line_548546"></ul>
                     <ul class="999 f13 h120 li_left" id="goods_list_548546">
                         <li class="w510 tl pl20">
                             <a href="#" target="_blank" class="fl">
                                 <img src="images/3412_183_24_30_27_27885.jpg" width="100px" height="100px" class="m_10_20_10_0" alt="">
                             </a>
                             <a href="#" target="_blank">
                                 <span class="w390 bold c333 fl h20 mt35"><?php echo $val['goods_name']?></span>
                             </a>
                         </li>
                         <li class="w120 tc">
                             <span class="bold ccf0 f16">￥<?php echo $val['price']?></span>
                         </li>
                         <li class="w120 tc">
                             <span class="btne3d w18 h22 inbl re_t0-l5 ie-t1_m50 ie_mi" oprtype="add" oprid="548546"><?php echo $val['num']?></span>
                         </li>
                         <li class="w120 tc">
                             <span class="btne3d" oprtype="add" oprid="548546">￥<?php echo $val['price']*$val['num']?></span>
                         </li>
                     </ul>


                     <ul class="bt_1_eae bb_1_fff"></ul>


                     <!-- Cale 2014-03-13-->
                     <div class="c999">
                         <div style="width: 50%;height: 150px;;border-top:  1px solid white;border-left:  1px solid white;border-right:  1px solid white;float: left;">
                             <div style="margin:5px;">
                                 <div style="float: left">
                                     给卖家留言：
                                 </div>
                                 <div style="float: left;width: 75%" >
                                     <textarea rows="5" cols="40" name="intro[]" placeholder="选填:对本次交易的说明(建议填写已和卖家协商一致的内容)" class="textarea"></textarea>
                                     <p style="margin-left: 245px;" class="str">0/200</p>
                                 </div>
                             </div>
                         </div>
                         <div style="width: 49%;height: 50px;;border-top:  1px solid white;float: left;line-height: 50px;">
                             <div style="margin:5px;float: left">运送方式:普通配送快递 免邮</div>
                             <div style="margin:5px;float: right"><span style="font-size: 14px;font-weight: bold;color: red;">0.00</span></div>
                         </div>
                         <div style="width: 49%;height: 50px;border-top:  1px solid white;float: left;line-height: 50px;">
                             <div style="margin:5px;">发货时间: 卖家承诺订单在买家付款后, 72小时内发货</div>
                         </div>
                         <div style="width: 49%;height: 50px;;border-top:  1px solid white;float: left;line-height: 50px;">
                             <div style="margin:5px;float: left">运费险:运费险卖家赠送，若确认收货前退货，可获保险赔付</div>
                             <div style="margin:5px;float: right">
                                 <span style="font-size: 14px;font-weight: bold;color: red;">0.80</span>
                             </div>
                         </div>
                     </div>


                     <div class="clear"></div>
                 </div>
             <?php   } ?>

            <div class="w930 m0a">
                <div class="fl">
                    <div class="mt50">
                        <a href="javascript:void(0);" class="f14 bold c999 b_1_efe btnf7f w146 h40 fl tc">返回修改</a>
                    </div>
                </div>
                <div class="fr">
                    <div class="tc cd00 mt20">
                        <span class="f13 bold">商品总额：￥</span>
                        <span class="f20" id="goods_amount"><?php echo $prices?></span>
                    </div>

                    <div class="mt20 tr">

                            <div class="mt20 tr">
                                <input type="hidden" id="car" value="<?php echo $car?>" name="car">
                                <input name="_csrf" type="hidden" id="_csrf" value="<?= \Yii::$app->request->csrfToken ?>">
                                <input  type="submit" class="btnd00 w146 h40 f16 bold"  value="提交订单" />
                            </div>
                    </div>

                </div>
            </div>
        </div>
     </form>
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
    });
</script>