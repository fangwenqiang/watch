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
				<b class="tit">会员简介</b>
			</div>
		</div>
		<div class="clear"></div>
		<div class="intro" style="margin-top:15px;">
			<div>
				<div id="phase">
					<div class="top">
						<div class="tit">
							会员级别
						</div>
					</div>
					<div class="mid">
						<div class="img"></div>
					</div>
				</div>
			</div>
			<div>
				<table class="i_middle" cellpadding="0" cellspacing="0">
					<tbody>
						<tr class="i_e">
							<td class="cell" colspan="5">会员特权</td>
						</tr>
						<tr class="i_t">
							<td class="w107 cell">权利</td>
							<td class="w172 cell">普通卡</td>
							<td class="w172 cell">银卡</td>
							<td class="w172 cell">金卡</td>
							<td class="w172 cell">白金卡</td>
						</tr>
						<tr class="i_c">
							<td class="cell">全场免运费</td>
							<td class="cell">可享</td>
							<td class="cell">可享</td>
							<td class="cell">可享</td>
							<td class="cell">可享</td>
						</tr>
						<tr class="i_c">
							<td class="cell">积分奖励</td>
							<td class="cell">可享</td>
							<td class="cell">可享</td>
							<td class="cell">可享</td>
							<td class="cell">可享</td>
						</tr>
						<tr class="i_c">
							<td class="cell">会员特惠</td>
							<td class="cell">-</td>
							<td class="cell">银卡级</td>
							<td class="cell">金卡级</td>
							<td class="cell">白金卡级</td>
						</tr>
						<tr class="i_c">
							<td class="cell">保养维修优惠</td>
							<td class="cell">-</td>
							<td class="cell">9折</td>
							<td class="cell">8.5折</td>
							<td class="cell">8折</td>
						</tr>
						<tr class="i_c">
							<td class="cell">优先发货</td>
							<td class="cell">-</td>
							<td class="cell">银卡级速度</td>
							<td class="cell">金卡级速度</td>
							<td class="cell">白金卡级速度</td>
						</tr>
						<tr class="i_c">
							<td class="cell">服务专线</td>
							<td class="cell">-</td>
							<td class="cell">-</td>
							<td class="cell">金牌客服</td>
							<td class="cell">手表达人</td>
						</tr>
						<tr class="i_c">
							<td class="cell">会员活动</td>
							<td class="cell">-</td>
							<td class="cell">-</td>
							<td class="cell">万表网手表展示会等</td>
							<td class="cell">万表网手表展示会、高管见面会等</td>
						</tr>
						<tr class="i_c">
							<td class="cell">尊享惊喜</td>
							<td class="cell">-</td>
							<td class="cell">-</td>
							<td class="cell">-</td>
							<td class="cell">可享</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
