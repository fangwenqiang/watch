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
				<b class="tit">礼品卡</b>
			</div>
			<div class="pr_middle_02">
				<dl>
					<dt class="c333">
					万表礼品卡——商务馈赠、节日送礼、企业福利的最佳选择
					</dt>
					<dd style="text-indent:26px;margin-top:10px;">
						值得信任的名表商城，最全的世界名表正品供您选择；礼品卡可以与其他优惠券同时使用；有效期长达36个月，到期后可重新激活使用。
					</dd>
				</dl>
				<dl>
					<dt class="c333">
					如何使用礼品卡？
					</dt>
					<dd>
						<div class="gift_card"></div>
					</dd>
				</dl>
				<div class="remark">
					<div class="fl">
						备注：
					</div>
					<ul class="fl">
						<li>
							1.账户中已有绑定的礼品卡，可在订单结算页面中勾选已绑定的礼品卡，礼品卡余额将会抵扣订单金额；
						</li>
						<li>
							2.账户中未有绑定的礼品卡，可在订单结算页面中输入礼品卡密码，礼品卡余额将会抵扣订单金额。
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="clear"></div>
		<div class="giftCard">
			<ul class="top">
				<li class="on">
					礼品卡绑定/查询
				</li>
				<li>
					<a href="/giftcard/detail/" rel="nofollow">
						已绑定礼品卡明细
					</a>
				</li>
			</ul>
			<div class="mid">
				<form id="frmQueryBind" action="" method="POST">
					<div class="item">
						<span class="label">请输入礼品卡序列号：</span>
						<div class="fl">
							<input type="text" class="text" id="user1" name="user1" maxlength="4" />
							<label>-</label>
							<input type="text" class="text" id="user2" name="user2" style="width:125px;" maxlength="11" />
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="item">
						<span class="label">请输入密码：</span>
						<div class="fl">
							<input type="password" class="text" id="pwd" name="pwd" maxlength="20" style="width:200px;" />
							<div class="clear"></div>
							<div class="msg-text">
								密码区分大小写
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="item">
						<span class="label">请输入验证码：</span>
						<div class="fl">
							<input type="text" class="text" maxlength="4" id="verify_code" name="verify_code" title="请输入验证码，不区分大小写" />
							<img src="/common/verify/?1488372620" alt="CAPTCHA" border="1" onclick="this.src='/common/verify/?'+Math.random();" title="看不清？点击更换另一个验证码。" class="verify2 pl10" id="captchaid" style="cursor:pointer;vertical-align:middle" />
							<span class="gray pl10" id="vercodespan">看不清？
							<a id="new_verify_code" href="javascript:void(0);" onclick="var c=$(&quot;#captchaid&quot;);c.attr(&quot;src&quot;,&quot;/common/verify/?&quot;+Math.random()).show();" class="redLink">
								换一张
							</a></span>
							<span id="msg_verifyCode"></span>
						</div>
						<div class="clear"></div>
					</div>
					<div class="item">
						<span class="label">&nbsp;</span>
						<div class="fl">
							<a class="binding" href="javascript:void(0);" id="btnBind">
								<s></s>绑定
							</a>
							<a class="inquire" href="javascript:void(0);" id="btnQuery">
								<s></s>查询余额
							</a>
						</div>
						<div class="clear"></div>
					</div>
				</form>
			</div>
		</div>
		<div class="clear"></div>
		<div class="gc_tips">
			<div class="top">
				礼品卡温馨提示：
			</div>
			<div class="mid">
				<ul>
					<li>
						1.礼品卡绑定账户后，只能当前账户使用，不能跨账户使用；
					</li>
					<li>
						2.礼品卡不记名、不挂失、不兑现、不可修改密码，请妥善保管卡号及密码；
					</li>
					<li>
						3.订单金额中使用礼品卡支付的部分，将不再开具发票，可凭保修卡享受正常售后服务；
					</li>
					<li>
						4.退货时，礼品卡支付部分退回原礼品卡内，不予兑换；
					</li>
					<li>
						5.单个订单可使用多张礼品卡，余额将保留在原卡中。
					</li>
				</ul>
			</div>
		</div>
	</div>
