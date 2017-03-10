<!-- 
    名表的出厂信息 $factory
    
 -->
 <?php
	use yii\helpers\Url;
  ?>
 <script src="js/jquery.js"></script>
<style type="text/css">

    div.all div.column{
        display:none;
    }
    div.all div.desc{
        display: block;
    }
</style>

<input id="s" value="0" type="hidden">
<input type="text">
<link rel="stylesheet" href="css/goods.css">
<script src="Script/goods.js"></script>
<script src="Script/goods_desc.js"></script>

<link rel="stylesheet" href="css/fancybox.css">
<script src="Script/fancybox.js"></script>
<style type="text/css">
    * html,* html body /* 修正IE6振动bug */{background-image:url(Images/about:blank);background-attachment:fixed;}
    * html .fixed-top /* IE6 头部固定 */{position:absolute;left:auto;top:expression(eval(document.documentElement.scrollTop > 690 ? document.documentElement.scrollTop : 690));}
</style>


<div id="main2">
  <div id="bread_crumb">
    <div class="position">当前位置: <a href="http://www.sxgoing.com" rel="nofollow">首页</a> <code>&gt;</code> <a href="http://www.sxgoing.comepos-watches/">爱宝时EPOS</a> <code>&gt;</code> <a href="http://www.sxgoing.comepos-watches/list-s257616.html">爱宝时Passion系列</a> <code>&gt;</code> 爱宝时3412.183.24.30.27 手动机械男士表 </div>


    <span class="others"> <a href="http://www.sxgoing.comepos-watches/" title="更多EPOS手表" target="_blank" class="more_goods"></a> </span> </div>
  <div class="clearfix"></div>
  <div style="margin-top:25px;"></div>
  <div class="list_banner"> <a href="http://data.wbiao.cn/ad.php?ad_id=1138" target="_blank" rel="nofollow" onclick="_gaq.push(['_trackEvent','quan-zhan','heng-fu__1','http://data.wbiao.cn/ad.php?ad_id=1138']);"><img src="http://img2.wbiao.cn/ad/201403/21/139536510192630.jpg" class="lazy" data-original="http://img2.wbiao.cn/ad/201403/21/139536510192630.jpg" alt="招行特惠" style="display: inline;"></a> </div>
  <div style="clear:both">&nbsp;</div>
  <!--banner结束-->
  <div id="goods" style="width:1225px">
    <div class="main_info v-1223-998 v-intro-bg"><div class="all_info v-870-646"><div class="info v-634-410"><h1>
           
            <!-- 瑞士爱宝时（EPOS）-Passion系列 3412.183.20.34.25 机械男表 -->
           <?php echo $goods['goods_name'] ?>
    </h1>
    <span class="guide">
        经典唯美透窗表盘设计！全球限量888枚的它是也是迎合大众审限量款，喜悦手表也是迎合大众审美的畅销款！
    </span><div class="clearfix"></div><div class="sa s13" id="act_price_container" style="display:none">
    <span class="sl red">活动价</span>
    <span class="sr w260"><b class="s20 cd6 f30" id="act_price">-</b><i class="discount" id="act_discount">-</i></span></div><div class="sa s13" id="wbiao_price">
    <span class="sr w260"><b class="s20 cd6 f30" id="price"><font class="f12">
    ￥</font>
        <!-- 商品价格 -->
        <font class="s20 cd6 f30" id="shop_price">
       <?= $goods['shop_price'] ?>
       </font>
    </b>
    <a href="" id="depreciate_pop" class="blue inbl fancybox.iframe">(促销通知)</a></span></div>
    <div class="clear"></div><div class="sa s13 w260" id="market_price_container" style="display:none;">
    <span class="sl">市场价</span>
    <span class="sr"><del class="gray" id="market_price"><font class="f12">￥</font>8850</del></span></div><div class="sa s13 w260" id="fen_qi_jia_container">
    <span class="sl">分期价</span>
    <span class="sr" id="fen_qi_jia">
        <!-- 平均值 -->
         ￥<font id="average">355</font>×12期
    </span>
    </div>
    <div id="promote-info" class="hide"></div><div class="sb s13 w100 clearfix mt5">
    



    <a href="" style="margin-left:66px;text-decoration:underline;color:#900;">如需了解更多活动详情或推荐，请咨询在线客服！</a></div><div class="sb s13 w100 clearfix" id="shipping_container">
    <span class="sl">配送至</span>
    <span class="sr" id="shipping">中国大陆，下单后17点前支付，当天发货<span id="is_post_pay" style="display:none;">，支持<i class="yellow bold" style="font-style:normal;" data="喜悦手表网独家代理的15个欧洲名表品牌+天梭、浪琴等热销表款，价格在2万元以内，均可申请使用货到付款。">货到付款</i></span></span></div><div class="clear"></div><div class="line"></div><div><div class="sa s13 w100 h104">
    <span class="sl fl" style="vertical-align:top;">颜色</span><span class="sr cc fl"><a href="javascript:void(0);" class="on"><u style="background-image:url('Images/3412_183_20_34_25_12063.jpg')"></u>
    <span></span></a><a href="http://www.sxgoing.comepos-g25523.html"><u style="background-image:url('Images/3412_183_24_30_27_27885.jpg')"></u>
    <span></span></a><a href="http://www.sxgoing.comepos-g29269.html"><u style="background-image:url('Images/3412_183_22_99_27_58689.jpg')"></u>
    <span></span></a></span>
 
    </div>
     <br>
        <!-- 展示该类表所有的属性 -->
    <?php foreach ($showAttr as $key => $value): ?>
     <?php empty($i)?$i=1:$i++ ?>
       <?php foreach ($value as $values): ?>
    <input type="button"  class="changered" value=<?=$values?> dif="<?=$i?>" >
       <?php endforeach ?>
        <br>
        <!-- 获取这类属性被选定的值 -->
        <input type="hidden" class="attrNum"  id="thisValue<?=$i?>" value="">
    <?php endforeach ?>
    
    <input type="hidden" value="<?php echo \Yii::$app ->getRequest() ->getCsrfToken();?>" name="_csrf" />
        

    <!-- 本人初始载入js -->
    <script>//生成平均值
$(function() {
	var shop_price = $('#shop_price').html();
	$('#average').html(Math.round(shop_price / 12));
});

//属性赋值，都有值就进行获取
$('.changered').on('click', function() {
			var num = $('#attrNum').val();

			//获取当前这种类别
			var dif = $(this).attr("dif");
			$('input[dif=' + dif + ']').css('color', 'black');
			$(this).css('color', 'red');

			//获取值，设置值
			var value = $(this).val();
			$('#thisValue' + dif).val(value);

			res = 0;
			postVal = new Array();
			$(".attrNum").each(function() {
				if(!($(this).val())) {
					res = 'fa';
					return false;
				}
				postVal[res] = $(this).val();
				res++;
			})

			if(res == 'fa') {
				return false;
			}

			var csrfToken = $('input[name="_csrf"]').val();
			//传属性值进行给商品价格赋值
			$.post("<?= Url::toRoute(['home/goods-show/get-val'])?> ", {
 	'postVal': postVal,
 	'_csrf': csrfToken
 },
 function(data) {

 	if(data['res'] == 0) {
 		$('#shop_price').html(data['msg']);
 		$('#fen_qi_jia').html(' ');
 	} else {
 		$('#shop_price').html(data['msg']);
 		var num = Math.round(data['msg'] / 12);
 		str = '￥<font id="average">' + num + '</font>×12期';
 		$('#fen_qi_jia').html(str);
 		$('#cart').css('display', 'block')
 	}
 }, 'json');
 });</script>


    <br>

    <div class="sa s13 w100 h21">
    <span class="sl">数量</span>

    <span class="sr bn">
    <span class="btn minus" onclick="addorminus('minus','25521')"></span>
    <input id="goods_number_25521" class="quantity" maxlength="4" size="2" value="1" 
    name="goods_number" type="text">
    <span class="btn add" onclick="addorminus('add','25521')"></span></span></div>
    <script type="text/javascript">var is_test = 1;</script>
    <br>
    
    <button id="cart"  style="display:none">加入购物车</button>
    <input type="hidden" id="goods_id" value=<?=$goods['g_id'] ?>>
    <script>// 判断是否登陆，如果登陆了就添加，没有就提示登陆

function getNum() {
	return $('input[name="goods_number"]').val();
};

function setNum(num) {
	$('input[name="goods_number"]').val(num);
}

$('.minus').on('click', function() {
	var nowNum = getNum();
	if(nowNum > 1) {
		nowNum--;
		setNum(nowNum);
	}
});

$('.add').on('click', function() {
	var nowNum = getNum();
	if(nowNum >= 1) {
		nowNum++;
		setNum(nowNum);
	}
});

$('#cart').on('click', function() {
			var user_id = "<?= \Yii::$app->session->get('user_id') ?>";
var goods_num = getNum();
if(!user_id) {
	alert('请登录后继续操作');
} else {
	$.get("<?= Url::toRoute('home/goods-show/cart') ?>", {
	'goods_num': goods_num
},
function(data) {
	alert(data)
});
}

});</script>
    <div class="buy"><div id="clt_msg"></div>
    <input name="goods_id" id="goods_id" value="25521" type="hidden"><input name="ssid" id="ssid" value="" type="hidden"><a rel="nofollow" id="buy_now" class="g__btn g__buy_now" title="立即购买" style="display:none;">&nbsp;</a>
    <a rel="nofollow" id="real_buy_now" class="fancybox.iframe iframe" href="" style="display:none;">检查登录</a>
    <a rel="nofollow" id="add_to_cart" href="javascript:void(0);" class="g__btn g__add_to_cart" onclick="javascript:var gn=$('#goods_number_25521').val();addToCartT(25521,gn,2);" title="加入购物车" style="display:none;">&nbsp;</a>
    <a rel="nofollow" id="pre_sale" class="g__btn g__pre_sale" title="预售中，我要购买" style="display:none"></a>
    <a rel="nofollow" id="replenish" class="g__btn g__replenish" title="补货中，我要预订" style="display:none"></a>
    <a rel="nofollow" id="stop_pro" class="g__btn g__stop_pro" title="已停产" style="display:none"></a>
    <a rel="nofollow" id="real_pre_sale" href="http://www.sxgoing.comgoods/pop_booking/?goods_id=25521" class="fancybox.iframe" style="display:none"></a>
    <a rel="nofollow" id="sale_out" class="g__btn g__sale_out" title="已售完" style="display:none"></a>
    <a rel="nofollow" id="no_sale" class="g__btn g__no_sale" title="暂不出售" style="display:none"></a></div></div></div></div>
    <div class="images">
    <div class="big">
    <a href="http://imga.wbiao.cn/201303/01/3412_183_20_34_25_12063.jpg" rel="gal1" id="image" onclick="javascript:$('#lookOver').trigger('click');">
          
        <!-- 图片展示区      -->
        <img 
        src="http://www.xiyue.com/public/admin/upload_files/goods/cdk_1488246321.jpeg" class="lazy" data-original="http://imgi12.wbiao.cn/201303/01/3412_183_20_34_25_12063.jpg" alt="瑞士爱宝时（EPOS）-Passion系列 3412.183.20.34.25 机械男表" style="display: inline;" width="350" height="350">
    </a>
    <a href="" id="lookOver" class="fancybox.iframe"></a></div>
    <div class="thumbs">
    <div class="context"><ul id="sImg"><li><a href="javascript:void(0);" rel="{gallery:'gal1',smallimage:'http://imgi12.wbiao.cn/201303/01/3412_183_20_34_25_12063.jpg',largeimage:'http://imga.wbiao.cn/201303/01/3412_183_20_34_25_12063.jpg'}"><img src="http://imgd12.wbiao.cn/201303/01/3412_183_20_34_25_12063.jpg" class="lazy" data-original="http://imgd12.wbiao.cn/201303/01/3412_183_20_34_25_12063.jpg" alt="瑞士爱宝时（EPOS）-Passion系列 3412.183.20.34.25 机械男表" style="display: block;"></a></li><li>
    <a href="javascript:void(0);" rel="{gallery:'gal1',smallimage:'http://imgi13.wbiao.cn/201402/11/3412_183_20_34_25_27910.jpg',largeimage:'http://imga13.wbiao.cn/201402/11/3412_183_20_34_25_27910.jpg'}"><img src="http://imgd13.wbiao.cn/201402/11/3412_183_20_34_25_27910.jpg" class="lazy" data-original="http://imgd13.wbiao.cn/201402/11/3412_183_20_34_25_27910.jpg" alt="瑞士爱宝时（EPOS）-Passion系列 3412.183.20.34.25 机械男表" style="display: block;"></a></li>
    <li><a href="javascript:void(0);" rel="{gallery:'gal1',smallimage:'http://imgi13.wbiao.cn/201402/11/3412_183_20_34_25_82122.jpg',largeimage:'http://imga13.wbiao.cn/201402/11/3412_183_20_34_25_82122.jpg'}"><img src="http://imgd13.wbiao.cn/201402/11/3412_183_20_34_25_82122.jpg" class="lazy" data-original="http://imgd13.wbiao.cn/201402/11/3412_183_20_34_25_82122.jpg" alt="瑞士爱宝时（EPOS）-Passion系列 3412.183.20.34.25 机械男表" style="display: block;"></a></li>
    <li><a href="javascript:void(0);" rel="{gallery:'gal1',smallimage:'http://imgi13.wbiao.cn/201402/11/3412_183_20_34_25_95305.jpg',largeimage:'http://imga13.wbiao.cn/201402/11/3412_183_20_34_25_95305.jpg'}"><img src="http://imgd13.wbiao.cn/201402/11/3412_183_20_34_25_95305.jpg" class="lazy" data-original="http://imgd13.wbiao.cn/201402/11/3412_183_20_34_25_95305.jpg" alt="瑞士爱宝时（EPOS）-Passion系列 3412.183.20.34.25 机械男表" style="display: block;"></a></li>
    <li><a href="javascript:void(0);" rel="{gallery:'gal1',smallimage:'http://imgi13.wbiao.cn/201402/11/3412_183_20_34_25_32663.jpg',largeimage:'http://imga13.wbiao.cn/201402/11/3412_183_20_34_25_32663.jpg'}"><img src="http://imgd13.wbiao.cn/201402/11/3412_183_20_34_25_32663.jpg" class="lazy" data-original="http://imgd13.wbiao.cn/201402/11/3412_183_20_34_25_32663.jpg" alt="瑞士爱宝时（EPOS）-Passion系列 3412.183.20.34.25 机械男表" style="display: block;"></a></li>
    <li><a href="javascript:void(0);" rel="{gallery:'gal1',smallimage:'http://imgi13.wbiao.cn/201402/11/3412_183_20_34_25_38405.jpg',largeimage:'http://imga13.wbiao.cn/201402/11/3412_183_20_34_25_38405.jpg'}"><img src="http://imgd13.wbiao.cn/201402/11/3412_183_20_34_25_38405.jpg" class="lazy" data-original="http://imgd13.wbiao.cn/201402/11/3412_183_20_34_25_38405.jpg" alt="瑞士爱宝时（EPOS）-Passion系列 3412.183.20.34.25 机械男表" style="display: block;"></a></li></ul></div></div>
    <div class="clear"></div>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
                <link rel="stylesheet" href="css/style.css">
                <input name="_csrf" type="hidden" id="_csrf" value="<?= \Yii::$app->request->csrfToken ?>">
                <div class="gmtw">
                    <div class="gmt cl">
                        <a rel="nofollow" href="javascript:void(0)" title="收藏" class="g__add_to_fav">
                            <i>
                            </i>收藏</a>
                        <div id="click_count">关注：
                            <code class="red">31694</code>人</div></div>
                </div>
                <div class="cd-popup" display="none">
                    <div class="cd-popup-container">
                        <br>
                        <br>
                        <p>确认收藏改商品吗?</p>
                        <div class="cd-buttons">
                            <img src="Images/1-1447F_55779.jpg" height="100px">
                            <br>我是商品名
                            <br>￥价格
                            <br>
                            <button style="height:50px;width:100px" class="goods_collect_a">提交</button></div>
                        <a href="#0" class="cd-popup-close">关闭</a></div>
                </div>
                <script type="text/javascript">/*弹框JS内容*/
jQuery(document).ready(function($) {
	//打开窗口
	$('.g__add_to_fav').on('click',
		function(event) {
			event.preventDefault();
			$('.cd-popup').addClass('is-visible');
			//$(".dialog-addquxiao").hide()
		});
	$('.goods_collect_a').on('click',
		function() {
			var goods_id = 1;
			var goods_name = "商品";
			var shop_price = 1111;
			var market_price = 2222;
			var goods_img = "Images/1-1447F_55779.jpg";
			var _csrf = $('#_csrf').val();
			$.ajax({
				type: 'post',
				url: 'http://www.xiyue.com/index.php?r=home/goods-show/collect',
				data: {
					goods_id: goods_id,
					goods_name: goods_name,
					shop_price: shop_price,
					market_price: market_price,
					goods_img: goods_img,
					_csrf: _csrf,
				},
				dataType: 'json',
				success: function(data) {
					if(data.data == 1) {
						$('.cd-popup').removeClass('is-visible');
						alert(data.msg);
					} else {
						alert(data.msg);
					}
				}
			})
		});
	//关闭窗口
	$('.cd-popup').on('click',
		function(event) {
			if($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup')) {
				event.preventDefault();
				$(this).removeClass('is-visible');
			}
		});
	//ESC关闭
	$(document).keyup(function(event) {
		if(event.which == '27') {
			$('.cd-popup').removeClass('is-visible');
		}
	});

});</script></div></div>
    <!--main_info:end-->
    <script type="text/javascript">$.ajax({
	type: 'GET',
	cache: false,
	dataType: "jsonp",
	url: user_wbiao_cn + 'goods' + '/' + 'sell_status' + '/',
	data: { goods_id: $("#goods_id").val(), act: getQueryString('act'), token: "5fdbe7ca2ea3766235d59da6184113cc" },
	success: function(data) {
		//购物按钮
		show_buttons(parseInt(data.s));
		//显示是否支持到付
		if(parseInt(data.h) == 1 && data.p <= 20000)
			$('#is_post_pay').show();
		//data说明：
		//s销售状态，m市场价，t是否促销，r价格名称，o原价，p商品价格，f分期价，v节省，d折扣，i活动折扣，a活动价格，y闪电发货，n活动说明，x商品名称前缀，b是否独代, j促销信息数组

		//            $(price).after('<a id="promote_price_notice" href="/goods/promote_notice?goods_id='+$("#goods_id").val()+'&t='+(new Date().getTime())+'" class="iframe blue">&nbsp; (促销通知)</a>');

		//价格名称
		var price = $("#price");
		var price_name = $("#price_name");
		var promote_name = data.r;
		if(data.t == 1) {
			price_name.html((has_act_price ? '' : '<span style="color:red;">') + (promote_name == '' ? '促销价' : promote_name) + '' + (has_act_price ? '' : '</span>'));
		} else if(data.y == 1) {
			price_name.html((promote_name == '' ? '欧洲同步价' : promote_name));
		} else {
			price_name.html('喜悦手表价');
		}
		var price_html = data.p > 0 ? ('<font class="f12">￥</font>' + data.p) : '-';
		//促销通知
		price.html(price_html);

		//活动价
		var has_act_price = data.a > 0 && data.a != data.p;
		if(has_act_price) {
			price_name.text('活动价').addClass('red');
			price.html("<font class='f12'>￥</font>" + data.a);
			//$("#act_price").html("<font class='f12'>￥</font>" + data.a);
			//$("#act_discount").html(data.i + '折');
			//$("#act_price_container").show();
			//$("#wbiao_price").hide();
			//price.css("color", "#888").css("font-size", "12px").css("text-decoration", "line-through");
		}

		/*Begin 此处为促销信息 Cale*/
		low_price = 0;
		if(data.a > 0) { //市价-活动价
			low_price = data.m - data.a;
		} else if(data.p > 0) { //市价-促销价
			low_price = data.m - data.p;
		} else {
			low_price = 0;
		}

		var promote_info = $('#promote-info');
		promote_content = '';
		if(low_price > 0) {
			//promote_content += '<div><i>直降</i><ins>已优惠￥'+low_price+'</ins></div>';
		}
		if($.isEmptyObject(data.j) == false) { //返回是空数组不显示
			$promote_arr = data.j;
			for(var $i = 0; $i < $promote_arr[0].length; $i++) {
				if(typeof($promote_arr[3]) !== 'undefined' && typeof($promote_arr[4]) !== 'undefined') {
					if($promote_arr[3][$i] < data.z && $promote_arr[4][$i] > data.z) {
						promote_content += '<div>';
						promote_content += '<i>' + $promote_arr[0][$i] + '</i><ins>' + $promote_arr[1][$i] + '</ins>';
						promote_content += $promote_arr[2][$i] == '' ? '' : '&nbsp;&nbsp;<a href="' + $promote_arr[2][$i] + '" class="blue" style="font-family:宋体;" target="_blank">&gt;&gt;详细</a>';
						promote_content += '</div>';
					}
				}
			}
		}
		if(promote_content.length > 0) { //有内容才显示标题
			promote_info.html('<div class="sc s13"><span class="sl fl">促销</span><span class="sx fl">' + promote_content + '</span></div>').show();
		}
		/*End*/

		//折扣
		var discount = $("#discount");
		var discount_container = $("#discount_container");
		if(data.d > 0 && data.d < 10) {
			discount.html(data.d + '折');
			discount_container.show();
		} else {
			discount_container.hide();
		}

		//市场价
		var market_price = $("#market_price");
		var market_price_container = $("#market_price_container");
		if(data.p != data.m) {
			var market_price_html = data.m > 0 ? ('￥' + data.m) : '-';
			market_price.html(market_price_html);
			market_price_container.show();
		} else {
			market_price_container.hide();
		}

		//分期价
		var fen_qi_jia = $("#fen_qi_jia");
		var fen_qi_jia_container = $("#fen_qi_jia_container");
		if(data.f > 0) {
			fen_qi_jia.text('￥' + data.f + ' × 12期');
			fen_qi_jia_container.show();
		} else {
			fen_qi_jia.text('-');
			fen_qi_jia_container.hide();
		}

		//闪电发货
		if(data.y == 1) {
			$("#quick").show();
			//  $("#quick2").show();
			//  $("#quick3").show();
		} else {
			$("#quick").hide();
			//  $("#quick2").hide();
			//  $("#quick3").hide();
		}

		if(data.b == 1) {
			$('#image img').after('<span class="agency" style="display:block;">喜悦手表独家代理</span>');
		}

		//活动提示
		//if(data.n != '') $("#activity_note").html("<ul><li><i>【活动】</i>"+data.n+"</li></ul>").show();

		//商品名称前缀
		if(data.x != '' && data.a > 0 && data.a < data.p) $("#goods").find("h1").prepend(data.x);

		//促销通知弹出层
		$('#promote_price_notice').fancybox({
			'titleShow': false,
			'width': 504,
			'height': 305,
			'padding': 0,
			'margin': 0,
			'scrolling': 'no',
			'hideOnOverlayClick': false,
			'showCloseButton': false
		});

		$.ajax({
			type: 'GET',
			cache: false,
			dataType: "jsonp",
			url: user_wbiao_cn + 'goods' + '/' + 'update_click_count' + '/',
			data: { goods_id: $("#goods_id").val(), s: data.s, token: "5fdbe7ca2ea3766235d59da6184113cc" },
			success: function(data) {}
		});

	}
});
my_browse_history();

//立即购买
$("#buy_now").click(function() {
	var act = getQueryString('act');
	if(act == null) { act = ''; }
	var goodsNumbers = $('input[name="goods_number"]').val();
	$.post(www_domain + "/cart" + "/buy_now", { goods_id: $('#goods_id').val(), goods_number: goodsNumbers, is_ajax: "1", act: act },
		function(result) {
			if(result.errors != 0) {
				alert(result.message);
			} else {
				pop_login(result);
			}

		}, "json");
});

//立即购买
/*$("#real_buy_now").fancybox({
    'padding': 0,
    'titleShow': false,
    'width': 504,
    'height': 446,
    'padding': 0,
    'margin': 0,
    'scrolling':'no',
    'hideOnOverlayClick': false,
    'showCloseButton':false
});*/

function show_buttons(sell_status) {
	//jinzhong 2013-10-14 礼品的不上架 
	if($("#goods_id").val() == 27054 ||
		$("#goods_id").val() == 29393 ||
		$("#goods_id").val() == 29834 ||
		$("#goods_id").val() == 29833 ||
		$("#goods_id").val() == 29837 ||
		$("#goods_id").val() == 29838 ||
		$("#goods_id").val() == 27693
	) {
		sell_status = 4;
	}

	switch(sell_status) {
		case 1:
			show_buy_now_button(); //购买
			break;
		case 2:
			show_pre_sale_button(); //预订
			break;
		case 3:
			show_sale_out_button(); //售罄
			break;
		case 4:
			show_no_sale_button(); //暂无销售
			break;
		case 5:
			show_replenish_button(); //补货中
			break;
		case 6:
			show_stop_pro_button(); //停产
			break;
		default:
			alert("抱歉！找不到当前商品或当前商品已删除！");
			break;
	}
}

function show_buy_now_button() {
	$("#buy_now, #add_to_cart, #buy_now_son").show();
}

function show_pre_sale_button() {
	$("#buy_now, #add_to_cart, #buy_now_son").hide();

	//预售中，我要购买
	$("#real_pre_sale").fancybox({
		'titleShow': false,
		'width': 808,
		'height': 418,
		'padding': 0,
		'margin': 0,
		'scrolling': 'no',
		'hideOnOverlayClick': false,
		helpers: {
			overlay: {
				closeClick: false,
				fixed: !1
			}
		}
	});

	$("#pre_sale").click(function() {
		$("#real_pre_sale").click();
	}).show();
}

function show_sale_out_button() {
	$("#buy_now, #add_to_cart, #buy_now_son").hide();

	$("#sale_out").show(); //已售完
}

function show_no_sale_button() {
	$("#buy_now, #add_to_cart, #buy_now_son").hide();

	$("#no_sale").show(); //已售完
}

function show_replenish_button() {
	$("#buy_now, #add_to_cart, #buy_now_son").hide();

	//预售中，我要购买
	$("#real_pre_sale").fancybox({
		'titleShow': false,
		'width': 808,
		'height': 418,
		'padding': 0,
		'margin': 0,
		'scrolling': 'no',
		'hideOnOverlayClick': false,
		helpers: {
			overlay: {
				closeClick: false,
				fixed: !1
			}
		}
	});

	//补货中
	$("#replenish").click(function() {
		$("#real_pre_sale").click();
	}).show();

}

function show_stop_pro_button() {
	$("#buy_now, #add_to_cart, #buy_now_son").hide();

	$('#stop_pro').show(); //停产
}</script>
    <div class="clear"></div>
        <div id="rightArea" class="w995">
            <div id="fixed" class="w994 fixed-top">
                <ul class="subnav">
                    <li class="on" style="border-left:1px solid #ddd;"><a href="javascript:void(0);" id="d" alt="#desc">商品详情</a></li>
                    <li><a href="javascript:void(0);" id="q" alt="#quality">喜悦手表优势</a></li>
                    <li><a id="s2" alt="#story">品牌故事</a></li>
                    <li><a href="javascript:void(0);" id="n" alt="#nous">手表常识</a></li>
                    <li><a href="javascript:void(0);" id="c" alt="#comment">用户评价(<span class="red"><?php echo count($comment_list); ?></span>)</a></li>
                </ul>
            </div>
            <!-- 商品详情 Begin -->
                <div class="all">
                    <div id="desc" class="column desc">
                        <div class="null">&nbsp;</div>
                        <div class="tips">
                            <span>
                                <s class="light-icon"></s>喜悦手表网承诺：我们出售的每一枚手表均为原装正品、假一赔十、凭联保卡可享受全球联保，请放心购买。</span>
                        </div>
                        <div class="series w995">
                            <div class="t">基本参数：</div>
                            <ul>
                                <li style="width:22.4%;">系列：Passion系列</li>
                              <?php foreach ($goods['describe'] as $key => $value): ?>
                                   <li style="width:22.4%;"><?= $value ?></li>
                              <?php endforeach ?>
                        </div>
                        <div class="showImg">
                            <div class="clear"></div>
                            <a href="http://www.sxgoing.combrand_ad.php?brand_ad_id=94" target="_blank" rel="nofollow" onclick="_gaq.push(['_trackEvent','xiang-xi','pin-pai','/brand_ad.php?brand_ad_id=94']);" class="brand_ad" style="width:995px;">
                                <img src="Images/blank.gif" class="lazy" data-original="http://img2.wbiao.cn/brand_ad/201311/19/138485360823194.jpg" alt="瑞士爱宝时 男" /></a>
                            <img src="Images/blank.gif" class="lazy" data-original="http://qd.wbiao.cn/img/4.0/goods/declare.big.jpg?v03" alt="拍摄说明" /></div>
                        <div class="showImg goodsImg">
                            <div class="photo">&nbsp;</div>
                            <div class="pdtDtlSet">
                                <img alt="" src="Images/blank.gif" class="lazy" data-original="http://img.wbiao.cn/default/201303/01/1362125808366938793.jpg" style="width: 750px; height: 625px;" />
                                <img alt="" src="Images/blank.gif" class="lazy" data-original="http://img.wbiao.cn/default/201304/07/1365318524495680359.jpg" style="width: 750px; height: 1022px;" />
                                <img alt="" src="Images/blank.gif" class="lazy" data-original="http://img.wbiao.cn/default/201304/07/1365318557069344395.jpg" style="width: 750px; height: 1103px;" />
                                <img alt="" src="Images/blank.gif" class="lazy" data-original="http://img.wbiao.cn/default/201304/07/1365318571975451569.jpg" />
                                <img alt="" src="Images/blank.gif" class="lazy" data-original="http://img.wbiao.cn/default/201304/07/1365318584531279472.jpg" style="width: 750px; height: 1119px;" />
                                <img alt="瑞士爱宝时（EPOS）-Passion系列 3412.183.24.30.27 男士机械表" src="Images/blank.gif" class="lazy" data-original="http://img.wbiao.cn/default/201308/30/1377850837517834647.jpg" style="width:750px;height:500px;" />
                                <img alt="瑞士爱宝时（EPOS）-Passion系列 3412.183.24.30.27 男士机械表" src="Images/blank.gif" class="lazy" data-original="http://img.wbiao.cn/default/201308/30/1377850837271054902.jpg" style="width:750px;height:500px;" /></div>
                        </div>
                    </div>
                    <!-- 商品详情 End -->
                    <!--喜悦手表优势 Begin -->
                    <div id="quality" class="column">
                        <div class="null">&nbsp;</div>
                        <div class="tips">
                            <span>
                                <s class="light-icon"></s>fdsdfdsfdsfdsfdsffdsdfsdfdsfdsfds买。</span>
                        </div>
                    </div>
                    <!-- 喜悦手表优势 End -->
                    <div id="clear" class="column">
                        <div class="null">&nbsp;</div>
                        <div class="tips">
                            <span>
                                <s class="light-icon"></s>喜悦手表网承诺：我们出售的每一枚手表均为原装正品、假一赔十、凭联保卡可享受全球联保，请放心购买。</span>
                        </div>
                    </div>
                    <!-- 品牌故事 Begin -->
                    <div id="story" class="column">
                        <div class="null">&nbsp;</div>
                        <div class="tips">
                            <span>
                                <s class="light-icon"></s>喜悦手表网承诺：我们出售的每一枚手表均为原装正品、假一赔十、凭联保卡可享受全球联保，请放心购买。</span>
                        </div>
                    </div>
                    <!-- 品牌故事 End -->
                    <!-- 手表常识 Begin -->
                    <div id="nous" class="column">
                        <div class="null">&nbsp;</div>
                        <div class="tips">
                        <?php foreach ($comment_list as $key => $value): ?>
                            <div class="comment-content" style="width: 500px;"><?php echo $value['comment_content']?></div><br>
                            <div class="comment-img" style="float: left;"> <img src="<?php echo $value['comment_img1']?>" width="40px"></div>
                            <div class="comment-img" style="float: left;"><img src="<?php echo $value['comment_img2']?>" width="40px"></div>
                            <div class="comment-img" style="float: left;"><img src="<?php echo $value['comment_img3']?>" width="40px"></div>
                            <div class="comment-img" style="float: left;"><img src="<?php echo $value['comment_img4']?>" width="40px"></div>
                            <div class="comment-img"><img src="<?php echo $value['comment_img5']?>" width="40px"></div><br>
                            <div class="comment-date"><?php echo date('m.d',$value['time'])?></div><br>
                            <div class="comment-content" style="width: 500px;color: orange;"><?php echo $value['reply_content']?></div><br>
                            <hr><br>
                        <?php endforeach ?>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">$('.subnav li').click(function() {
	$(this).addClass('on').siblings().removeClass();
	var i = $(this).index();
	$('.column').eq(i).show().siblings().hide();
})</script>
    <!--rightArea:end-->
    <div id="leftArea">
      <!--hot:begin-->
      <div class="hot">
        <div class="h_top">
          <div class="h_tit">爱宝时表热销排行</div>
        </div>
        <div class="h_mid"> <a rel="nofollow" class="h_link" href="http://www.sxgoing.comepos-g25523.html" target="_blank"> <img src="Images/blank.gif" class="lazy" data-original="http://imgh12.wbiao.cn/201303/01/3412_183_24_30_27_27885.jpg" alt="瑞士爱宝时（EPOS）-Passion系列 3412.183.24.30.27 机械男表">
              <ul>
                <li style="margin-top:28px;"><b>爱宝时</b></li>
                <li>Passion系列</li>
                <li>男士机械表</li>
                <li style="margin-top:10px;" class="red f14 bold">￥9500</li>
                <li><del class="c666">￥9500</del></li>
              </ul>
          </a> <a rel="nofollow" class="h_link" href="http://www.sxgoing.comepos-g25521.html" target="_blank"> <img src="Images/blank.gif" class="lazy" data-original="http://imgh12.wbiao.cn/201303/01/3412_183_20_34_25_12063.jpg" alt="瑞士爱宝时（EPOS）-Passion系列 3412.183.20.34.25 机械男表">
            <ul>
              <li style="margin-top:28px;"><b>爱宝时</b></li>
              <li>Passion系列</li>
              <li>男士机械表</li>
              <li style="margin-top:10px;" class="red f14 bold">￥8850</li>
              <li><del class="c666">￥8850</del></li>
            </ul>
            </a> <a rel="nofollow" class="h_link" href="http://www.sxgoing.comepos-g25377.html" target="_blank"> <img src="Images/blank.gif" class="lazy" data-original="http://imgh12.wbiao.cn/201302/27/3387_152_20_20_15_63944.jpg" alt="瑞士爱宝时（EPOS）-Originale系列 3387.152.20.20.15 机械男表">
              <ul>
                <li style="margin-top:28px;"><b>爱宝时</b></li>
                <li>Originale系列</li>
                <li>男士机械表</li>
                <li style="margin-top:10px;" class="red f14 bold">￥6580</li>
                <li><del class="c666">￥6580</del></li>
              </ul>
              </a> <a rel="nofollow" class="h_link" href="http://www.sxgoing.comepos-g25533.html" target="_blank"> <img src="Images/blank.gif" class="lazy" data-original="http://imgh12.wbiao.cn/201303/01/3420_152_20_16_30_93382.jpg" alt="瑞士爱宝时（EPOS）-Originale系列 3420.152.20.16.30 机械男表">
                <ul>
                  <li style="margin-top:28px;"><b>爱宝时</b></li>
                  <li>Originale系列</li>
                  <li>男士机械表</li>
                  <li style="margin-top:10px;" class="red f14 bold">￥8100</li>
                  <li><del class="c666">￥8100</del></li>
                </ul>
                </a> <a rel="nofollow" class="h_link" href="http://www.wbiao.cn/epos-g25536.html" target="_blank"> <img src="Images/blank.gif" class="lazy" data-original="http://imgh12.wbiao.cn/201303/04/3420_152_24_14_15_59399.jpg" alt="瑞士爱宝时（EPOS）-Originale系列 3420.152.24.14.15 机械男表">
                  <ul>
                    <li style="margin-top:28px;"><b>爱宝时</b></li>
                    <li>Originale系列</li>
                    <li>男士机械表</li>
                    <li style="margin-top:10px;" class="red f14 bold">￥7300</li>
                    <li><del class="c666">￥7300</del></li>
                  </ul>
                </a> </div>
      </div>
      <!--hot:end-->

      <!-- 最新活动广告(左下) Begin -->
      <div style="margin-bottom:10px;"> <a href="http://data.wbiao.cn/ad.php?ad_id=988" target="_blank" rel="nofollow" onclick="_gaq.push(['_trackEvent','lie-biao','zuo-xia__1','http://data.wbiao.cn/ad.php?ad_id=988']);"><img src="Images/blank.gif" class="lazy" data-original="http://img2.wbiao.cn/ad/201403/28/139597912053582.jpg" alt="赫柏林"></a> </div>
      <div style="margin-bottom:10px;"> <a href="http://data.wbiao.cn/ad.php?ad_id=624" target="_blank" rel="nofollow" onclick="_gaq.push(['_trackEvent','lie-biao','zuo-xia__2','http://data.wbiao.cn/ad.php?ad_id=624']);"><img src="Images/blank.gif" class="lazy" data-original="http://img2.wbiao.cn/ad/201311/14/138442341925235.jpg" alt="CYS" width="210"></a> </div>
      <div style="margin-bottom:10px;"> <a href="http://data.wbiao.cn/ad.php?ad_id=1135" target="_blank" rel="nofollow" onclick="_gaq.push(['_trackEvent','lie-biao','zuo-xia__3','http://data.wbiao.cn/ad.php?ad_id=1135']);"><img src="Images/blank.gif" class="lazy" data-original="http://img2.wbiao.cn/ad/201403/20/139529428295444.jpg" alt="招行特惠"></a> </div>
      <!-- 最新活动广告(左下) End -->
      <!--history:begin-->
      <!--history:end-->
    </div>
    <!--leftArea:end-->
    <div id="fancybox-content" style="display: none"></div>
  </div>
  <!--goods:end-->
</div>
<!--main2:end-->

<link rel="stylesheet" href="css/jqzoom.css" type="text/css">
<script type="text/javascript" src="Script/jqzoom.js"></script>

<div id="dsp" style="display:none;">
<script type="text/javascript">var _mvq = _mvq || [];
_mvq.push(['$setAccount', 'm-25646-0']);

_mvq.push(['$setGeneral', 'goodsdetail', '', '', '', '0', '']);
_mvq.push(['$logConversion']);
_mvq.push(['$addGoods', '96', '176', '瑞士爱宝时（EPOS）-Passion系列 3412.183.24.30.27 机械男表', '25523', '9500.00', 'http://imgb12.wbiao.cn/201303/01/3412_183_24_30_27_27885.jpg', '男表', '爱宝时', '1', '9500.00', '22', '']);
_mvq.push(['$logData']);</script>
</div>
<div style="display:none;">
<script type="text/javascript">$(function() {
	$('#add_to_cart').click(function() {
		var goodsNumbers = parseInt($('input[name="goods_number"]').val());
		var n;
		if(isNaN(goodsNumbers)) {
			n = 1;
		} else {
			if(goodsNumbers <= 0)
				n = 1;
			else
				n = goodsNumbers;
		}
	});
});</script>
</div>



