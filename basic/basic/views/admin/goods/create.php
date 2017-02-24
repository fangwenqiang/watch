<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Goods */

$this->title = '添加商品';
$this->params['breadcrumbs'][] = ['label' => 'Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="goods-create " style="float:left; width:500px; margin-left:200px;">

    <h1 style="margin-left:200px;"><?= Html::encode($this->title) ?></h1>


<input class="btn btn-info" type="button" value="设置商品" id="setGoods">
<input class="btn btn-info" type="button" value="设置属性" id="setAttribute">
<br>


<form class="form-horizontal" action="" method="post">

<input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">

	<!-- 设置描述 -->
<div id="describe">
<select class="form-control" name="goods[type_id]">
	<option value="0">请选择类型</option>
<?php foreach ($goodsType as $key => $value) {?>
	<option value="<?php echo $value['type_id'] ?>">
		<?php echo  $value['type_name']?>
	</option>
<?php } ?>
</select>
<br>
<select class="form-control" name="goods[brand_id]">
	<option value="0">请选择品牌</option>
	<?php foreach ($goodsBrand as $key => $value): ?>
		<option  value=<?php echo $value['brand_id'] ?>><?php echo $value['brand_name'] ?></option>
	<?php endforeach ?>
</select>
	<!-- 设置属性 -->
<div id="attribute">

</div>
<br>
<input class="form-control " type="text" name="goods[describe]" placeholder="商品描述格式固定如：
出厂日期：xxx  。	多个属性逗号分隔">

<br/>
<input class="form-control " type="text" name="group[sku]" placeholder="数量">
<br/>
<input class="form-control " type="text" name="group[group_price]" placeholder="价格">
<br/>
<br>
<input class="form-control " type="text" name="goods[g_number]" placeholder="商品数量">
<br>
<input class="form-control " type="text" name="goods[g_weight]" placeholder="商品重量">
<br>
<input class="form-control " type="text" name="goods[market_price]" placeholder="市场价格">
<br>
<input class="form-control " type="text" name="goods[shop_price]" placeholder="商品价格">
</div>
	

	



	<!-- 设置商品 -->
<div id="goods">
<br>
<input class="form-control " type="text" name="goods[goods_name]" placeholder="商品名称">
<br>
<input class="form-control " type="text" name="goods[keywords]" placeholder="关键词">
<br>
<input class="form-control " type="file" name="goods[g_img]" placeholder="添加图片">
<br>
 是否展示：
<label class="radio-inline">
  <input type="radio" name="goods[is_show]" id="inlineRadio1" value="1"> 是
</label>
<label class="radio-inline">
  <input type="radio" name="goods[is_show]" id="inlineRadio2" value="2"> 否
</label>


<br>
 是否推荐：
<label class="radio-inline">
  <input type="radio" name="goods[is_recommend]" id="inlineRadio1" value="1"> 是
</label>
<label class="radio-inline">
  <input type="radio" name="goods[is_recommend]" id="inlineRadio2" value="2"> 否
</label>

<br>
 是否促销：
<label class="radio-inline">
  <input type="radio" name="goods[is_promote]" id="inlineRadio1" value="1"> 是
</label>
<label class="radio-inline">
  <input type="radio" name="goods[is_promote]" id="inlineRadio2" value="2"> 否
</label>

<br>
<input class="form-control " type="text" name="goods[promote_price]" placeholder="促销价格">
<br>
<input class="form-control " type="text" name="goods[promote_start_date]" placeholder="促销开始时间">
<br>
<input class="form-control " type="text" name="goods[promote_end_date]" placeholder="促销结束时间">
<br>
<input class="form-control " type="text" name="goods[author]" placeholder="作者">
<br>
</div>


<button type="submit" class="btn btn-success">添加</button> 
</form>

</div>

<script>
		
$(function(){

	$("#describe").hide();
	$("#attribute").hide();


	$("#setAttribute").on('click',function(){
		$("#describe").show();
		$("#attribute").show();
		$("#goods").hide();
	});

	$("#setGoods").on('click',function(){
		$("#describe").hide();
		$("#attribute").hide();
		$("#goods").show();
	});


	//类型更改
	$('select[name="goods[type_id]"]').on('change',function(){
			
		var type_id = $('select[name="goods[type_id]"]').val();

		$.get('http://www.xiyue.com/index.php?r=admin/goods/get-type',{'type_id':type_id},function(data)
			{

			var str = " " ; 
			var strs = " ";
			var stre = " "
				for (var i = data.length - 1; i >= 0; i--) {
					if (data[i]['attr_input_type'] == 0){
				
		stre = '请选择'+data[i]['attr_name']+':<input class="form-control" type="text" name="attr_value[]" placeholder="请填入具体值">';

						// 类型1 可选参数


					}else if(data[i]['attr_input_type'] == 1){
					//可选属性值
				 stre = '请选择'+data[i]['attr_name']+':<select class="form-control" name="attr_value[]">';

				 strs = data[i]['attr_values'].split("\r\n"); 

						for (var y=0;  y <= strs.length - 1;y++) {
							stre+='<option value='+data[i]["attr_id"]+','+strs[y]+'>'+strs[y]+'</option>';
						}
					stre +='</select><br/>';
					str += stre;
					}else{	


						// 类型3

					}
				}

				$('#attribute').html(str);

			},'json');

	});
















});



</script>
