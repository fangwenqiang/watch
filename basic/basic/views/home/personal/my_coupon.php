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
			<form id="bonus-form" name="bonus-form" action="/bonus/add" method="post">
				<div class="pr_top">
					<b class="tit">现金券/优惠券</b>
				</div>
				<div class="pr_middle_02">
					添加现金券/优惠券序列号：
					<input type="text" class="auto_txt w230 ml10" name="bonus_sn" id="bonus_sn" maxlength="20" />
					<a href="javascript:void(0);" class="u__btn02 ml10" onclick="javascript:$('#bonus-form').submit();">
						确认添加
					</a>
				</div>
			</form>
		</div>
		<div class="clear"></div>
		<div class="coupon">
			<ul class="c_t">
				<li class="w109">
					编号
				</li>
				<li class="w220">
					名称
				</li>
				<li class="w82">
					面值
				</li>
				<li class="w112">
					所需消费
				</li>
				<li class="w192">
					有效期
				</li>
				<li class="w82">
					状态
				</li>
			</ul>
			<ul class="c_c">
				<?php foreach($coupon_list as $key => $v) {?>
				<li class="w109">
					<?php echo $v['coupon_sn']?>
				</li>
				<li class="w220">
					<?php echo $v['coupon_name']?>
				</li>
				<li class="w82">
					<?php echo $v['coupon_value']?>
				</li>
				<li class="w112">
					<?php echo $v['require_spend']?>
				</li>
				<li class="w192">
					<?php echo date('Y-d-m', $v['start_time']) . '至' . date('Y-d-m', $v['expire_time'])?>
				</li>
				<li class="w82">
					<?php if($v['is_use'] == 0) {?>
						未使用
					<?php } else { ?>
						已使用
					<?php }?>
				</li>
				<?php }?>
			</ul>
		</div>
	</div>
