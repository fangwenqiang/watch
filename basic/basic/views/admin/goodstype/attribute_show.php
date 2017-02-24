
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>商品属性</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?= \yii\helpers\Url::toRoute(['admin/goodstype/attribute_add']);?>" class="actionBtn add">添加属性</a>商品属性</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic" >
      <tr>
        <th width="120" align="left">属性id</th>
        <th align="left">类型id</th>
        <th align="left">属性名称</th>
        <th align="left">属性是否可选</th>
        <th align="left">属性录入方式</th>
        <th align="left">属性值</th>
        <th width="180" align="center">操作</th>
     </tr>
    <?php foreach ($data as $key => $value) {?>
      <tr>
        <td align="left"><a href="product.php?cat_id=4"><?=$value['attr_id']?></a></td>
        <td align="left"><a href="product.php?cat_id=4"><?=$value['type_id']?></a></td>
        <td align="left"><a href="product.php?cat_id=4"><?=$value['attr_name']?></a></td>
        <td align="left"><a href="product.php?cat_id=4"><?=$value['attr_index']?></a></td>
        <td align="left"><a href="product.php?cat_id=4"><?=$value['attr_input_type']?></a></td>
        <td align="left"><a href="product.php?cat_id=4"><?=$value['attr_values']?></a></td>
        <td align="center">
          <a href="<?= \yii\helpers\Url::toRoute(['admin/goodstype/attribute_update']).'&attr_id='.$value['attr_id'];?>">编辑</a> | 
          <a href="<?= \yii\helpers\Url::toRoute(['admin/goodstype/attribute_delete']).'&attr_id='.$value['attr_id'];?>">删除</a>
        </td>
     </tr>
    <?php } ?>
    </table>
  </div>
 </div>
