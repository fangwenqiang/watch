
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>DouPHP 管理中心 - 订单列表 </title>
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
    <script typr="text/javascript" src="js/laydate/laydate.js"></script>
</head>
<body>
    <div id="dcMain">
        <!-- 当前位置 -->
        <div id="urHere">DouPHP 管理中心<b>></b><strong>订单列表</strong> </div>
        <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <div class="filter">
                <?php $form = yii\widgets\ActiveForm::begin(['method'=>'post'])?>
                <table>
                    <tr>
                        <td style="height: 30px;">订单号：</td>
                        <td>
                            <input name="orderSn" type="text" class="form-control" placeholder="订单号" value="<?=$order_sn?>" style="width: 150px;" />
                        </td>
                        <td>&nbsp;创建时间：</td>
                        <td>
                            <input name="firstTime" id="start" type="text" class="form-control layer-date" placeholder="起始(Y-M-D h:i:s)" value="<?=$first_Time?>"  style="background:url('js/laydate/skins/default/icon.png') no-repeat right"/>
                        </td>
                        <td>——</td>
                        <td><input name="lastTime" id="end" type="text" class="form-control layer-date"  placeholder="结束(Y-M-D h:i:s)" value="<?=$lastTime?>" style="background:url('js/laydate/skins/default/icon.png') no-repeat right"/></td>
                        <td>
                            <select name="orderStatus" class="form-control" style="margin-left: 5px;">
                                <option value="-1">全部订单状态</option>
                                <option value="1" <?php if($order_status == 1)echo 'selected';?>>已确认</option>
                                <option value="0" <?php if($order_status == 0)echo 'selected';?>>待确定</option>
                            </select>
                        </td>
                        <td>&nbsp;</td>
                        <td>
                            <select name="payStatus" class="form-control" style="margin-left: 5px;">
                                <option value="-1">全部支付状态</option>
                                <option value="1" <?php if($pay_status == 1)echo 'selected';?>>已支付</option>
                                <option value="0" <?php if($pay_status == 0)echo 'selected';?>>待支付</option>
                            </select>
                        </td>
                        <style>
                            .btn48 {
                                background: rgba(0, 0, 0, 0) url("./images/bg48.jpg") repeat-x scroll left top;
                                color: #8bf8ff;
                                height: 40px;
                                width: 233px;
                            }
                        </style>
                        <td>&nbsp;
                            <input type="submit" class="btn48" value="筛选 " onmouseover="this.style.backgroundPosition='left -67px';this.style.color='#d7bff2';" onmouseout="this.style.backgroundPosition='left top';this.style.color='#8bf8ff';" style="background-position: left top; color: rgb(139, 248, 255);">
                        </td>
                    </tr>
                </table>


                <?php yii\widgets\ActiveForm::end(); ?>
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
                                <td width="80" align="center" class="box">创建时间</td>
                                <td width="80" align="center" class="box">操作</td>
                            </tr>
                        </thead>
                        <tbody id="changeColor">
                            <?php foreach ($data as $k => $v): ?>
                            <tr>
                                <td align="center" height="30"><?= $v['order_id'] ?></td>
                                <td align="center" height="30"><?= \yii\helpers\Html::a($v['order_sn'], ['admin/order/info', 'orderId' => $v['order_id']], ['title' => '查看详情','style'=>'color:blue;']) ?></td>
                                <td align="center" height="30" id="<?= $v['order_id'] ?>"><?php switch ($v['order_status']){ case '0':echo '<font color="#20ff0e">待确认</font>';break;case '1':echo '<font color="#ff0707">已确认</font>';break;case '2':echo '<font color="#ff0707">已发货</font>';break;case '3':echo '<font color="#ff0707">交易完成</font>';break;case '-1':echo '<font color="#20ff0e">已取消</font>';break;case '-2':echo '<font color="#20ff0e">已退货</font>';break;}?></td>
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

<script type="text/javascript">
    $(function () {
        url = "<?=\yii\helpers\Url::toRoute(['admin/order'])?>";
        csrf = $('input[name=_csrf]').val();
        //日期范围限制
        var start = {
            elem: '#start',
            format: 'YYYY-MM-DD hh:mm:ss',
            min: '1900-01-01 00:00:00', //设定最小日期为当前日期
            max: '2099-06-16 23:59:59', //最大日期
            istime: true,
            istoday: true,
            festival: true, //显示节日
            choose: function (datas) {
                end.min = datas; //开始日选好后，重置结束日的最小日期
                end.start = datas //将结束日的初始值设定为开始日
            }
        };
        var end = {
            elem: '#end',
            format: 'YYYY-MM-DD hh:mm:ss',
            min: '1900-01-01 00:00:00',
            max: '2099-06-16 23:59:59',
            istime: true,
            istoday: true,
            festival: true, //显示节日
            choose: function (datas) {
                start.max = datas; //结束日选好后，重置开始日的最大日期
            }
        };
        laydate(start);
        laydate(end);
    });
</script>
</body>
</html>
