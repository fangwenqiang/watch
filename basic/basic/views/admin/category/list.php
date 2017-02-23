<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div id="dcMain">
   <!-- 当前位置 -->
    <div id="urHere">DouPHP 管理中心<b>></b><strong>商品分类</strong> </div>   
    <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?php echo Url::to(['admin/category/add'])?>" class="actionBtn add">添加分类</a>商品分类</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
        <tr>
            <th width="240" align="left">分类名称</th>
            <th width="240" align="left">链接地址</th>
            <th width="60" align="center">排序</th>
            <th width="80" align="center">操作</th>
        </tr>
        <?php foreach($cate_data as $key=>$value):?>
        <tr>
            <td align="left"> <a href="product.php?cat_id=1"><?php echo $value['gt_name']?></a></td>
            <td><?php echo $value['gt_outlink']?></td>
            <td align="center"><?php echo $value['gt_sort']?></td>
            <td align="center">
                <a href="<?php echo Url::to(['admin/category/update','id'=>$value['gt_id']])?>">编辑</a> | 
                <a href="<?php echo Url::to(['admin/category/delete','id'=>$value['gt_id']])?>">删除</a>
            </td>
        </tr>
        <?php endforeach; ?>
        </table>
    </div>
</div>