
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DouPHP 管理中心 - 商品列表 </title>
    <meta name="Copyright" content="Douco Design." />
    <style>
        #list table tr{
            height: 20px;
            padding: 20px;
        }
        .upColor{
            background-color, "#abcdef";
        }
    </style>
    <script type="text/javascript" src="js/jquery.carousel.js"></script>
</head>
<body>
<div id="dcWrap">
    <div id="dcMain">
        <!-- 当前位置 -->
        <div id="urHere">DouPHP 管理中心<b>></b><strong>订单列表</strong> </div>
        <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <div class="filter">
                <?php $form = yii\widgets\ActiveForm::begin(['method'=>'post','id'=>'carousel']) ?>
                订单号：<input name="orderSn" type="text" class="inpMain" value="" size="20" placeholder="订单号" />
                订单时间：<input name="firstTime" type="text" class="inpMain" value="" size="20" placeholder="开始时间" />-<input name="lastTime" type="text" class="inpMain" value="" size="20" placeholder="结束时间" />
                <select name="payStatus">
                    <option value="-1">选择支付状态</option>
                    <option value="1">已支付</option>
                    <option value="0">待支付</option>
                </select>
                <select name="orderStatus">
                        <option value="-1">选择订单状态</option>
                        <option value="1">已确认</option>
                        <option value="0">待确定</option>
                </select>
                    <input class="btnGray" type="submit" value="筛选" title="点击筛选" style="background-color: #93ebff;" />
                <?php  yii\widgets\ActiveForm::end() ?>
            </div>
            <div id="list">
                <style>
                    .box{
                        background-color: #979593;
                        font-weight: bolder;

                    }
                </style>
                <?php if(count($data)!=0): ?>
                    <table width="100%" border="0"  class="tableBasic">
                        <thead>
                            <tr>
                                <td width="10" align="center" class="box">编号</td>
                                <td width="20" align="center" class="box">订单号</td>
                                <td width="80" align="center" class="box">订单状态(0/1)</td>
                                <td width="80" align="center" class="box">支付状态(0/1)</td>
                                <td width="80" align="center" class="box">订单总额(元)</td>
                                <td width="80" align="center" class="box">订单时间</td>
                                <td width="80" align="center" class="box">操作</td>
                            </tr>
                        </thead>
                        <tbody id="changeColor">
                            <?php foreach ($data as $k => $v): ?>
                            <tr>
                                <td align="center" height="30"><?= $v['order_id'] ?></td>
                                <td align="center" height="30"><?= \yii\helpers\Html::a($v['order_sn'], ['admin/order/info', 'orderId' => $v['order_id']], ['title' => '查看详情','style'=>'color:blue;']) ?></td>
                                <td align="center" height="30" id="<?= $v['order_id'] ?>"><?php if($v['order_status'] == 1) echo '<font color="#20ff0e">已确认</font>';elseif($v['order_status'] == 0) echo '<font color="#ff0707">待确定</font>';else echo '<font color="#8ec52b;">交易完成</font>'; ?></td>
                                <td align="center" height="30"><?php if($v['pay_status'] == 1) echo '<font color="#20ff0e">已支付</font>';else echo '<font color="#ff0707">待支付</font>'; ?></td>
                                <td align="center" height="30"><?= $v['goods_total_prices'] ?></td>
                                <td align="center" height="30"><?=date('Y-m-d H:i:s',$v['add_time'])?></td>
                                <td align="center" height="30">
                                    <?= \yii\helpers\Html::a('查看', ['admin/order/info', 'orderId' => $v['order_id']], ['title' => '查看详情','style'=>'color:blue;'])?>&nbsp;
                                    <?php if($v['pay_status'] == 1 & $v['order_status'] == 0){ echo \yii\helpers\Html::button('确认订单', ['class'=>'orderStatus','orderId'=>$v['order_id'],'type'=>'up','style'=>'background-color:#ff0707']);} elseif($v['pay_status'] == 1 & $v['order_status'] == 1) {echo \yii\helpers\Html::button('取消确认', ['class'=>'orderStatus','orderId'=>$v['order_id'],'type'=>'un','style'=>'background-color:#20ff0e']);} ?>
                                </td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div style="margin-left: 30%;margin-top: 10%;">
                        <img src="images/weizhaodao.jpg" alt="未找到">
                        <span style="color: #ff4b33;font-size: 18px;">暂无相关数据!</span>
                    </div>
                <?php endif ?>
            </div>
            <div class="pager"><?=yii\widgets\LinkPager::widget(['pagination' => $page])?></div>
        </div>
    </div>
    <div class="clear"></div>
    <div class="clear"></div>
</div><br><br><br><br><br><br><br>

<script type="text/javascript">
    $(function () {
        url = "<?=\yii\helpers\Url::toRoute(['admin/order'])?>";
        csrf = $('input[name=_csrf]').val();
    });
</script>
</body>
</html>
