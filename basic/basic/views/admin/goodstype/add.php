<div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>添加商品类型</strong> </div>   <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
    <h3><a href="<?= \yii\helpers\Url::toRoute(['admin/goodstype/show']);?>" class="actionBtn">列表展示</a>添加商品类型</h3>
    <form action="<?= \yii\helpers\Url::toRoute(['admin/goodstype/add']);?>" method="post">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="100" align="right">类型名称</td>
       <td>
        <input type="text" name="type_name" size="40" class="inpMain" />
       </td>
       <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">

      </tr>
      <tr>
       <td></td>
       <td>
        <input type="hidden" name="token" value="5a58b748" />
        <input type="submit" name="submit" class="btn" value="提交" />
       </td>
      </tr>
     </table>
    </form>
                   </div>
 </div>