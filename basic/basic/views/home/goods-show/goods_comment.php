<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<script src="js/jquery.js"></script>
<br />
<br />
<br />
<form action="<?php echo Url::to(['home/goods-show/add_comment'])?>" method="post" enctype="multipart/form-data" onsubmit="return fileCountCheck(this);">
	<table align="center">
		<tr>
			<td><span style="color: orange;">*</span>评价内容：</td>
			<td><textarea name="comment_content" rows="10" cols="50"></textarea></td>
		</tr>
		<tr>
			<td><span style="color: orange;">*</span>评论等级：</td>
			<td>
				<input type="radio" name="comment_rank" id="comment_rank" value="好评" />好评
				<input type="radio" name="comment_rank" id="comment_rank" value="中评" />中评
				<input type="radio" name="comment_rank" id="comment_rank" value="差评" />差评
				
			</td>
		</tr>
		<tr>
			<td>晒图片：</td>
			<td>
				<input type="file" name="file[]" multiple="multiple" required="required"/>只能选择5个图片
			</td>
		</tr>
		<input type="hidden" name="goods_id" id="goods_id" value="<?php echo $goods_id;?>"/>
		<input name="_csrf" type="hidden" id="_csrf" value="<?= \Yii::$app->request->csrfToken ?>">
		<script>
			function fileCountCheck(objForm) {
				if(window.File && window.FileList) {
					var fileCount = objForm["file[]"].files.length;
					if(fileCount > 5) {
						window.alert('文件数不能超过5个，你选择了' + fileCount + '个');
						return false;
					} else {
						window.alert('符合规定');
					}
				} else {
					window.alert('抱歉，你的浏览器不支持FileAPI，请升级浏览器！');
					return false;
				}
			}
		</script>
		<tr>
			<td>&nbsp;</td>
			<td></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<input type="submit" value="提交评价"/>
			</td>
		</tr>
	</table>
</form>