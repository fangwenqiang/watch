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
		<span>我的订单</span>
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
							<option selected="selected" value="0" <?php if($time == 0)echo 'selected';?>>所有订单</option>
							<option value="1" <?php if($time == 1)echo 'selected';?>>近一个月订单</option>
							<option value="2" <?php if($time == 2)echo 'selected';?>>近三个月订单</option>
							<option value="3" <?php if($time == 3)echo 'selected';?>>近一年订单</option>
						</select>&nbsp;
						<select name="orderStatus">
							<option value="0" <?php if($status == 0)echo 'selected';?>>全部状态</option>
							<option value="2" <?php if($status == 2)echo 'selected';?>>已确认</option>
							<option value="3" <?php if($status == 3)echo 'selected';?>>待发货</option>
							<option value="4" <?php if($status == 4)echo 'selected';?>>已发货</option>
							<option value="5" <?php if($status == 5)echo 'selected';?>>待支付</option>
							<option value="6" <?php if($status == 6)echo 'selected';?>>已支付</option>
							<option value="7" <?php if($status == 7)echo 'selected';?>>已取消</option>
							<option value="8" <?php if($status == 8)echo 'selected';?>>已退货</option>
							<option value="9" <?php if($status == 9)echo 'selected';?>>成功交易</option>

						</select>
					</div>
					<div class="right">
						&lt;订单编号：&gt;
						<!--订单编号：-->
						<input type="text" class="txt" name="orderSn" value="<?=$sn?>" />
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
							<td class="w87">评论</td>
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
							<td>
								<table width="100%" style="height:200px;">
									<?php foreach ($v['orderGoods'] as $m): ?>
										<tr>
											<td align="center" style="border-left:none;">
												<?php if ($v['order_status'] == 3 & $m['comment_status'] == 0 ){ ?>
													<a class="c0e7" href="<?php echo \yii\helpers\Url::to(['home/goods-show/goods_comment','goods_id'=>$m['goods_id'],'order_id'=>$m['order_id']])?>">
														立即评论
													</a>
													<?php }elseif($v['order_status'] == 3 & $m['comment_status'] == 1){ ?>
													已评论
													<?php }elseif($v['order_status'] == 2 ){ ?>
													<a class="c0e7" href="<?php echo \yii\helpers\Url::to(['home/goods-show/goods_comment','goods_id'=>$m['goods_id'],'order_id'=>$m['order_id']])?>">
														立即收货
													</a>
													<?php }else{ ?>
														暂无操作
												<?php }?>
											</td>
										</tr>
									<?php endforeach; ?>
								</table>
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
		<style>
			.pager {
				padding-left: 0;
				margin: 20px 0;
				text-align: center;
				list-style: none;
			}
			.pager li {
				display: inline;
			}
			.pager li > a,
			.pager li > span {
				display: inline-block;
				padding: 5px 14px;
				background-color: #fff;
				border: 1px solid #ddd;
				border-radius: 15px;
			}
			.pager li > a:hover,
			.pager li > a:focus {
				text-decoration: none;
				background-color: #eee;
			}
			.pager .previous > a,
			.pager .previous > span {
				float: left;
			}
			.pager .disabled > a,
			.pager .disabled > a:hover,
			.pager .disabled > a:focus,
			.pager .disabled > span {
				color: #777;
				cursor: not-allowed;
				background-color: #fff;
			}
			.pager .active > a,.pager .active > a:hover{
				background-color: #71d7f4;
				cursor: default;
			}
		</style>
		<div class="pager"><?=yii\widgets\LinkPager::widget(['pagination' => $pages])?></div>
	</div>