
 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>商品类型</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?= \yii\helpers\Url::toRoute(['admin/goodstype/add']);?>" class="actionBtn add">添加类型</a>商品类型</h3>
    <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic" >
      <tr>
        <th width="120" align="left">类型id</th>
        <th align="left">类型名称</th>
        <th align="left">属性数</th>
        <th width="180" align="center">操作</th>
     </tr>
    <?php foreach ($data as $key => $value) {?>
      <tr>
        <td align="left"><a href="product.php?cat_id=4"><?=$value['type_id']?></a></td>
        <td align="left"><a href="product.php?cat_id=4"><?=$value['type_name']?></a></td>
        <td>智能手机销售</td>
        <td align="center">
          <a href="product_category.php?rec=edit&cat_id=4">属性列表</a> |
          <a href="product_category.php?rec=edit&cat_id=4">编辑</a> | 
          <a href="product_category.php?rec=del&cat_id=4">删除</a></td>
     </tr>
    <?php } ?>
    </table>
  </div>
 </div>
