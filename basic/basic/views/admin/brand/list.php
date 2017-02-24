<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div id="dcMain">
   <!-- 当前位置 -->
    <div id="urHere">DouPHP 管理中心<b>></b><strong>商品品牌</strong> </div>   
    <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?php echo Url::to(['admin/brand/add'])?>" class="actionBtn add">添加品牌</a>商品品牌</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
        <tr>
            <th width="240" align="left">品牌名称</th>
            <th width="240" align="left">品牌logo</th>
            <th width="240" align="left">品牌描述</th>
            <th width="60" align="center">排序</th>
            <th width="80" align="center">操作</th>
        </tr>
        <?php foreach($brand_list as $key=>$value):?>
        <tr>
            <td align="left"> <a href="product.php?cat_id=1"><?php echo $value['brand_name']?></a></td>
            <td><img src="<?php echo $value['brand_logo']?>" height="100px"></td>
            <td align="center"><?php echo $value['brand_desc']?></td>
            <td align="center"><?php echo $value['sort']?></td>
            <td align="center">
                <a href="<?php echo Url::to(['admin/brand/update','id'=>$value['brand_id']])?>">编辑</a> | 
                <a href="<?php echo Url::to(['admin/brand/delete','id'=>$value['brand_id']])?>">删除</a>
            </td>
        </tr>
        <?php endforeach; ?>
        </table>
    </div>
</div>