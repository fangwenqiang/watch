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
				<b class="tit">收货地址</b>
			</div>
		</div>
		<div class="clear"></div>
		<div class="address">
			<div class="a_top">
				<div class="a_tit">
					已有收货地址
				</div>
			</div>
			<div class="a_middle">
				<ul class="a_t">
					<li class="w62">
						收货人
					</li>
					<li class="w120">
						所在地区
					</li>
					<li class="w234">
						详细地址
					</li>
					<li class="w62">
						邮编
					</li>
					<li class="w109">
						电话/手机
					</li>
					<li class="w95">
						操作
					</li>
					<li class="w90">
						&nbsp;
					</li>
				</ul>
				<ul class="a_c">
					<li class="w62">
						王喜文
					</li>
					<li class="w120">
						北京 北京 海淀区
					</li>
					<li class="w234">
						上地七街八维研修学院
					</li>
					<li class="w62">
						100000
					</li>
					<li class="w109">
						15201352029
					</li>
					<li class="w95">
						<a class="c0e7" href="javascript:;" onclick="edit_shipping_address(319215);location.href=location.href.replace('#edit','')+'#edit';" rel="nofollow">
							编辑
						</a>
						<a class="c0e7 ml10" href="javascript:;" onclick="delete_shipping_address(319215);" rel="nofollow">
							删除
						</a>
					</li>
					<li class="w90">
						<label>
						<input type="radio" name="default" checked="checked" />
						<font class="c0e7">默认地址</font></label>
					</li>
				</ul>
				<div class="a_newAdr">
					<a href="javascript:;" class="u__btn03" id="add_shipping_list_title">
						增加新收货地址
					</a>
				</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="new_address" style="display:none;">
			<form action="/address/add" name="add_address_form" id="add_address_form" method="post">
				<input type="hidden" value="0" id="user_address_id" name="user_address_id" />
				<input type="hidden" value="0" id="add_address_form_act" name="act" />
				<ul>
					<li>
						<span class="left"><i class="n_r">*</i>收货人姓名：</span><span class="right">
						<input type="text" class="n_txt w150" value="" maxlength="30" name="consignee" id="consignee" />
						</span>
					</li>
					<li>
						<span class="left"><i class="n_r">*</i>省/市/区：</span><span id="area" class="right">
						<input type="hidden" name="country_id" id="selCountries_" value="1" />
						<select class="n_slt" name="province_id" id="province"></select>&nbsp;
						<select class="n_slt" name="city_id" id="city"></select>&nbsp;
						<select class="n_slt" name="county_id" id="county"></select></span>
					</li>
					<li>
						<span class="left"><i class="n_r">*</i>详细地址：</span><span class="right">
						<input type="text" class="n_txt w234" maxlength="255" id="address" name="address" value="" />
						</span>
					</li>
					<li>
						<span class="left"><i class="n_r"></i>邮政编码：</span><span class="right">
						<input type="text" class="n_txt w150" maxlength="6" id="zip_code" name="zipcode" value="" />
						</span>
					</li>
					<li>
						<span class="left">电话：</span><span class="right">
						<div class="adjust03">
							<input type="text" class="n_txt w40" id="telephone1" name="telephone1" maxlength="4" value="" />
							<span class="adjust">−</span>
							<input type="text" class="n_txt w109" id="telephone2" name="telephone2" maxlength="15" value="" />
							<span class="adjust">−</span>
							<input type="text" class="n_txt w40" id="telephone3" name="telephone3" maxlength="4" value="" />
						</div></span>
					</li>
					<li>
						<span class="left"><i class="n_r">*</i>手机：</span><span class="right">
						<input type="text" class="n_txt w150" maxlength="11" id="mobile" name="mobile" value="" />
						</span>
					</li>
					<li class="tipsw">
						<span class="left"><i class="n_r">&nbsp;</i></span><span class="right">
						<input type="checkbox" class="cbi" name="to_notify_mobile" id="to_notify_mobile" />
						&nbsp;<label>如果您是送朋友，可点此另填接收短信通知的手机号，以保持惊喜哦</label></span>
					</li>
					<li class="mbsw hide">
						<span class="left"><i class="n_r"></i>&nbsp;</span><span class="right">
						<input type="text" class="n_txt w150" maxlength="11" placeholder="接收订单状态短信手机号" id="notify_mobile" name="notify_mobile" />
						</span>
					</li>
					<li>
						<span class="left">电子邮箱：</span><span class="right">
						<input type="text" class="n_txt w150" maxlength="60" id="email" name="email" value="" />
						</span>
					</li>
					<li>
						<span class="left">设为默认：</span><span class="right">
						<input type="checkbox" class="adjust" value="1" name="is_default" id="is_default" />
						</span>
					</li>
					<li>
						<span class="left">&nbsp;</span><span class="right">
						<input type="submit" class="u__btn02" id="shipping_submit" value="保存地址" />
						<a href="javascript:;" id="cancel_shipping_list_edit" class="ml10 c0e7">
							取消
						</a></span>
					</li>
				</ul>
			</form>
			<div class="clear"></div>
		</div>
</div>
