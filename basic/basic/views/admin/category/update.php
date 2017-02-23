<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div id="dcMain">
    <!-- 当前位置 -->
    <div id="urHere">DouPHP 管理中心<b>></b><strong>修改修改</strong></div>
    <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="product_category.php" class="actionBtn">商品分类</a>修改分类</h3>
        <form action="<?php echo Url::to(['admin/category/update'])?>" method="post">
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <td width="80" align="right">分类名称</td>
                    <td>
                        <input type="text" name="gt_name" value="<?php echo $cate['gt_name'];?>" size="40" class="inpMain" required=""/>
                    </td>
                </tr>
                <input name="_csrf" type="hidden" id="_csrf" value="<?= \Yii::$app->request->csrfToken ?>">
                <input name="gt_id" type="hidden" id="gt_id" value="<?php echo $cate['gt_id'];?>">
                <tr>
                    <td align="right">上级分类</td>
                    <td>
                        <select name="gt_pid">
                            <option value="0">无</option>
                            <?php foreach ($name as $key => $value):?>
                            <option value="<?php echo $value['gt_id'];?>" <?php if($value['gt_id']==$cate['gt_id']){?>disabled="disabled"<?php } else {?><?php }?> ><?php echo $value['str'];?><?php echo $value['gt_name'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right">链接地址</td>
                    <td>
                        <input type="text" name="gt_outlink" value="<?php echo $cate['gt_outlink'];?>" size="40" class="inpMain" required=""/>
                    </td>
                </tr>
                <tr>
                    <td align="right">是否显示</td>
                    <td>
                        <input type="radio" name="is_show" value="1" size="40" class="inpMain" <?php if($cate['is_show']==1){?>checked="checked"<?php } else {?><?php }?>>显示
                        <input type="radio" name="is_show" value="0" size="40" class="inpMain" <?php if($cate['is_show']==0){?>checked="checked"<?php } else {?><?php }?>>隐藏
                    </td>
                </tr>
                <tr>
                    <td align="right">排序</td>
                    <td>
                        <input type="text" name="gt_sort" value="<?php echo $cate['gt_sort'];?>" size="5" class="inpMain" required="" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="btn" type="submit" value="修改"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>