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
				<form action="">
					<div class="left">
						<select name="datetime">
							<option selected="selected" value="">所有订单</option><option value="1">近一个月订单</option><option value="2">近三个月订单</option><option value="3">近一年订单</option>
						</select>
						<select name="order_status">
							<option value="">全部状态</option><option value="1">未确认</option><option value="2">已确认</option><option value="3">待发货</option><option value="4">分单发货中</option><option value="5">已发货</option><option value="6">已取消</option><option value="7">已退货</option><option value="8">待支付</option>
						</select>
					</div>
					<div class="right">
						&lt;订单编号：&gt;
						<!--订单编号：-->
						<input type="text" class="txt" name="order_id" value="" onfocus="javascript:$(this).val('');" />
						<input type="submit" class="lookup" value="查询" />
					</div>
				</form>
			</div>
		</div>
		<div class="account">
			<div class="hisOrd">
				<table class="ho_middle" cellpadding="0" cellspacing="0">
					<tbody>
						<tr class="t">
							<td class="w120">订单编号</td>
							<td class="w186">订单商品</td>
							<td class="w75">收货人</td>
							<td class="w111">订单金额</td>
							<td class="w87">下单时间</td>
							<td class="w87">订单状态</td>
							<td class="w130">操作</td>
						</tr>
						<tr class="c">
							<td class="w120 h70">
								<a class="c0e7" target="_blank" href="/order/detail/645323">
									2017030912002
								</a></td>
							<td class="w186 adjust02" style="text-align:left;">
								<a target="_blank" title="瑞士迪沃斯（DAVOSA）-Classic Quartz 经典系列 16246615 男士商务、石英表" href="https://www.wbiao.cn/davosa-g13823.html">
									<img alt="瑞士迪沃斯（DAVOSA）-Classic Quartz 经典系列 16246615 男士商务、石英表" src="https://image2.wbiao.co/goods/d/201511/16/16246615_99415.jpg" />
								</a></td>
							<td class="w75 h70"><font class="c333">王喜文</font></td>
							<td class="w111 adjust01"><font class="cb01">￥1580.00</font>
								<br />
								<br />
								<font class="c333">已付：￥0.00</font></td>
							<td class="w87 adjust01">
								<div>
									2017-03-09 16:16:37
								</div></td>
							<td class="w87 h70"><font class="c888">已确认</font></td>
							<td class="w130 adjust03">
								<a class="c0e7" target="_blank" href="/order/detail/645323">
									查看
								</a><span>|</span>
								<a class="c0e7" href="https://www.wbiao.cn/davosa-g13823.html#comment">
									评论
								</a><span>|</span>
								<a class="cb01" target="_blank" href="https://cart.wbiao.cn/pay/?order_sn=2017030912002&amp;token=3dc1e04eb2a1996a9328b861e916faae">
									支付
								</a>
								<a class="c888 fancybox.iframe cancel_order_link" href="/order/cancel/?order_id=645323">
									取消
								</a>
								<br />
								<a href="javascript:void(0);" class="c0e7 pc_to_ntalk_ser">
									申请返修/退换货
								</a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>