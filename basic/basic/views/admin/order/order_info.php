<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DouPHP 管理中心 - 订单详情 </title>
    <meta name="Copyright" content="Douco Design." />

</head>
<body>
<div id="dcWrap">
    <div id="dcMain">
        <!-- 当前位置 -->
        <div id="urHere">DouPHP 管理中心<b>></b><strong>订单详情</strong> </div>   <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3>订单详情</h3>
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <td align="center" width="400">订单信息</td>
                    <td align="center" width="150">订购商品</td>
                    <td align="center" width="100">件数</td>
                    <td align="center" width="130">单价</td>
                    <td align="center">订单状态</td>
                </tr>
                <tr style="font-size: 14px;">
                    <td style="padding-left: 10px;">
                        <p></p>
                        <p>订单号：<?=$orderInfo['order_sn']?></p>
                        <p>创建时间：<?=date('Y-m-d H:i:s',$orderInfo['add_time'])?></p>
                        <p>商品金额：¥ <?=$orderInfo['goods_total_prices']?></p>
                        <p>快递公司：<?=$orderInfo['express_name']?></p>
                        <p>收货地址：<?=$orderInfo['country'].' '.$orderInfo['province'].' '.$orderInfo['city'].' '.$orderInfo['district'].' '.$orderInfo['address']?></p>
                        <p>收件号码：<?=$orderInfo['mobile']?></p>
                    </td>
                    <td align="center">
                        <table width="100%" style="height:200px;">
                            <?php foreach ($orderGoods as $v): ?>
                                <tr><td align="center"><img src="<?='http://'.$_SERVER['SERVER_NAME'].'/'.$v['img']?>" alt="商品图片" title="<?=$v['goods_name']?>"></td></tr>
                            <?php endforeach;?>
                        </table>
                    </td>
                    <td align="center">
                        <table width="100%" style="height:200px;">
                            <?php foreach ($orderGoods as $v): ?>
                                <tr><td align="center"><?=$v['buy_number']?></td></tr>
                            <?php endforeach;?>
                        </table>
                    </td>
                    <td align="center">
                        <table width="100%" style="height:200px;">
                            <?php foreach ($orderGoods as $v): ?>
                                <tr><td align="center">¥ <?=$v['buy_price']?></td></tr>
                            <?php endforeach;?>
                        </table>
                    </td>
                    <td align="center" style="font-size: 18px;">
                        <p>
                            <?php if($orderInfo['pay_status'] == 1){echo '<font color="#8ec52b;">已支付</font>（'.$orderInfo['pay_name'].')';}else{echo '<font color="#ff0707">待支付</font>';}?>
                        </p>
                        <p>
                            <?php if($orderInfo['order_status'] == 1){echo '<font color="#ff0707">已发货</font>';}elseif($orderInfo['order_status'] == 0){echo '<font color="#20ff0e">待确认</font>';}else{echo '<font color="#8ec52b;">交易完成</font>';}?>
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="clear"></div>
    <div class="clear"></div> </div>
</body>
</html>