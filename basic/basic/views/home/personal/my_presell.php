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
				<b class="tit">我的预售</b>
				<div class="u__kf pc_to_ntalk"></div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="odrTab">
			<div class="ot_middle">
				<ul class="t">
					<li class="w97">
						订单编号
					</li>
					<li class="w100">
						预售商品
					</li>
					<li class="w142">
						预售状态
					</li>
					<li class="w120">
						订金支付时间
					</li>
					<li class="w120">
						商品到仓
					</li>
					<li class="w87">
						等待时间
					</li>
					<li class="w130">
						操作
					</li>
				</ul>
				<ul class="c">
					<li class="none">
						暂无预售订单，这就去挑选商品：
						<a href="https://www.wbiao.cn/" class="c0e7">
							首页
						</a>
						&nbsp;&nbsp;
						<a href="https://www.wbiao.cn/shoubiao.html" class="c0e7">
							选表中心
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>