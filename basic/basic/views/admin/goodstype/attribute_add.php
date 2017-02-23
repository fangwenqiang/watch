 <div id="dcMain">
   <!-- 当前位置 -->
<div id="urHere">DouPHP 管理中心<b>></b><strong>添加属性</strong> </div>   <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
            <h3><a href="<?= \yii\helpers\Url::toRoute(['admin/goodstype/attribute_show']);?>" class="actionBtn">属性列表</a>添加属性</h3>
    <form action="<?= \yii\helpers\Url::toRoute(['admin/goodstype/attribute_add']);?>" method="post">
     <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
      <tr>
       <td width="80" align="right">属性名称</td>
       <td>
        <input type="text" name="attr_name" value="" size="40" class="inpMain" />
       </td>
      </tr>
      <tr>
       <td align="right">所属类型</td>
       <td>
        <select name="type_id">
          <?php foreach ($data as $key => $value) {?>
            <option value="<?=$value['type_id']?>"><?=$value['type_name']?></option>
          <?php } ?>
        </select>
       </td>
      </tr>
      <tr>
       <td align="right" width='120'>属性是否可选</td>
       <td>
        <input type="radio" name="attr_index" value="0" size="40" checked class="inpMain" />参数
        <input type="radio" name="attr_index" value="1" size="40" class="inpMain" />规格
       </td>
      </tr>
      <tr>
       <td align="right">录入方式</td>
       <td>
         <input type="radio" name="attr_input_type" value="0" size="40" checked class="inpMain" /> 手工录入 
         <input type="radio" name="attr_input_type" value="1" size="40" class="inpMain" /> 从下面列表中选择(一行代表一个可选值) 
         <input type="radio" name="attr_input_type" value="2" size="40" class="inpMain" /> 多行文本框
        </td>
      </tr>
      <tr>
       <td align="right">可选值列表</td>
       <td>
        <textarea name="attr_values" cols="60" rows="4" class="textArea"></textarea>
       </td>
      </tr>
      <input name="_csrf" type="hidden" id="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
      <tr>
       <td></td>
       <td>
        <input type="hidden" name="token" value="25bfda40" />
        <input type="hidden" name="cat_id" value="" />
        <input name="submit" class="btn" type="submit" value="提交" />
       </td>
      </tr>
     </table>
    </form>
       </div>
 </div>
