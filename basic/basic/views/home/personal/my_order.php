<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<script src="js/jquery.js"></script>
<div id="main">
	<div class="position">
		<a href="<?php echo Url::to(['home/index/index'])?>">
			<strong>首页</strong>
		</a>
		<i>&gt;</i>
		<a href="<?php echo Url::to(['home/personal/index'])?>" target="_blank" class="c0e7">
			我的喜悦手表
		</a>
		<i>&gt;</i>
		<span>最近访问</span>
	</div>
	<div class="rightArea">
		<div class="prompt">
			<div class="pr_top">
				<b class="tit">我的订单</b>
				<div id="__User_order_zixun" class="u__kf pc_to_ntalk"></div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="odrTab">
			<div class="ot_top">
				<?php $form = yii\widgets\ActiveForm::begin(['method'=>'post'])?>
					<div class="left">
						<select name="addTime">
							<option selected="selected" value="0">所有订单</option>
							<option value="1">近一个月订单</option>
							<option value="2">近三个月订单</option>
							<option value="3">近一年订单</option>
						</select>&nbsp;
						<select name="orderStatus">
							<option value="0">全部状态</option>
							<option value="1">待确认</option>
							<option value="2">已确认</option>
							<option value="3">待发货</option>
							<option value="4">已发货</option>
							<option value="5">待支付</option>
							<option value="6">已支付</option>
							<option value="7">已取消</option>
							<option value="8">已退货</option>
							<option value="9">成功交易</option>

						</select>
					</div>
					<div class="right">
						&lt;订单编号：&gt;
						<!--订单编号：-->
						<input type="text" class="txt" name="orderSn" value="" onfocus="javascript:$(this).val('');" />
						<input type="submit" class="lookup" value="查询" />
					</div>
				<?php yii\widgets\ActiveForm::end(); ?>
			</div>
		</div>
		<div class="account">
			<div class="hisOrd">
				<?php if(count($orderInfo)!=0): ?>
				<table class="ho_middle" cellpadding="0" cellspacing="0">
					<tbody>
						<tr class="t">
							<td class="w120">订单信息</td>
							<td class="w186">订购商品</td>
							<td class="w75">购买数量</td>
							<td class="w111">商品单价</td>
							<td class="w87">订单状态</td>
							<td class="w130">操作</td>
						</tr>
						<?php foreach ($orderInfo as $k=>$v):?>
						<tr>
							<td style="text-align: left;width: 200px;">
								<p></p>
								<p>订单号：<?=$v['order_sn']?></p>
								<p>创建时间：<?=date('Y-m-d H:i:s',$v['add_time'])?></p>
								<p>商品金额：¥ <?=$v['goods_total_prices']?></p>
								<p>快递公司：<?=$v['express_name']?></p>
								<p>收货地址：<?=$v['country'].' '.$v['province'].' '.$v['city'].' '.$v['district'].' '.$v['address']?></p>
								<p>收件号码：<?=$v['mobile']?></p>
							</td>
							<td align="center">
								<table width="100%" style="height: 200px">
								<?php foreach ($v['orderGoods'] as $m): ?>
									<tr><td align="center" style="border-left:none;">
											<img src="<?='http://'.$_SERVER['SERVER_NAME'].'/'.$m['img']?>" alt="商品图片" title="<?=$m['goods_name']?>">
									</td></tr>
								<?php endforeach; ?>
								</table>
							</td>
							<td align="center">
								<table width="100%" style="height:200px;">
									<?php foreach ($v['orderGoods'] as $m): ?>
										<tr><td align="center" style="border-left:none;"><?=$m['buy_number']?></td></tr>
									<?php endforeach; ?>
								</table>
							</td>
							<td align="center">
								<table width="100%" style="height: 200px">
									<?php foreach ($v['orderGoods'] as $m): ?>
										<tr><td align="center" style="border-left:none;">¥ <?=$m['buy_price']?></td></tr>
									<?php endforeach;?>
								</table>
							</td>
							<td>
								<p>
									<?php if($v['pay_status'] == 1){echo '<font color="#8ec52b;">已支付</font>（'.$v['pay_name'].')';}else{echo '<font color="#ff0707">待支付</font>';}?>
								</p>
								<p>
									<?php switch ($v['order_status']){ case '0':echo '<font color="#20ff0e">待确认</font>';break;case '1':echo '<font color="#ff0707">已确认</font>';break;case '2':echo '<font color="#ff0707">已发货</font>';break;case '3':echo '<font color="#ff0707">交易完成</font>';break;case '-1':echo '<font color="#20ff0e">已取消</font>';break;case '-2':echo '<font color="#20ff0e">已退货</font>';break;}?>
								</p>
							</td>
							<td >
								<?php if($v['order_status'] == 0) { ?>
								<a class="cb01" target="_blank" href="https://cart.wbiao.cn/pay/?order_sn=2017030912002&amp;token=3dc1e04eb2a1996a9328b861e916faae">
									支付
								</a><span>|</span>
								<a class="c888 fancybox.iframe cancel_order_link" href="/order/cancel/?order_id=645323">
									取消
								</a>
								<?php } ?>
								<?php if($v['order_status'] == 3) { ?>
									<a class="c0e7" href="https://www.wbiao.cn/davosa-g13823.html#comment">
										评论
									</a><span>|</span>
									<a class="c0e7" href="https://www.wbiao.cn/davosa-g13823.html#comment">
										删除
									</a>
								<?php } ?>
								<br />
								<?php if($v['order_status'] == 1) { ?>
								<a href="javascript:void(0);" class="c0e7 pc_to_ntalk_ser">
									退换货
								</a>
								<?php } ?>
								<a class="c0e7" target="_blank" href="#">
									查看
								</a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
				<?php else: ?>
					<div style="margin-left: 30%;margin-top: 10%;">
						<img src="../admin/images/weizhaodao.jpg" alt="未找到">
						<span style="color: #ff4b33;font-size: 18px;">暂无相关数据!</span>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>