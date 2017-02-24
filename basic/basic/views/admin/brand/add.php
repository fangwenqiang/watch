<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div id="dcMain">
    <!-- 当前位置 -->
    <div id="urHere">DouPHP 管理中心<b>></b><strong>添加品牌</strong></div>
    <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?php echo Url::to(['admin/brand/list'])?>" class="actionBtn">商品品牌</a>添加品牌</h3>
        <form action="<?php echo Url::to(['admin/brand/add'])?>" method="post" enctype="multipart/form-data">
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <td width="80" align="right">品牌名称</td>
                    <td>
                        <input type="text" name="brand_name" value="" size="40" class="inpMain" required=""/>
                    </td>
                </tr>
                <tr>
                    <td width="80" align="right">品牌LOGO</td>
                    <td>
                        <input type="file" name="brand_logo" value="" size="40" class="inpMain" required=""/>
                    </td>
                </tr>
                <input name="_csrf" type="hidden" id="_csrf" value="<?= \Yii::$app->request->csrfToken ?>">
                <tr>
                    <td align="right">简单描述</td>
                    <td>
                        <textarea name="brand_desc" cols="60" rows="4" class="textArea"></textarea>
                    </td>
                </tr>
                <tr>
                    <td align="right">是否显示</td>
                    <td>
                        <input type="radio" name="is_show" value="1" size="40" class="inpMain">显示
                        <input type="radio" name="is_show" value="0" size="40" class="inpMain">隐藏
                    </td>
                </tr>
                <tr>
                    <td align="right">排序</td>
                    <td>
                        <input type="text" name="sort" value="" size="5" class="inpMain" required="" />
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input class="btn" type="submit" value="提交"/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>