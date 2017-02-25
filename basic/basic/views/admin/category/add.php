<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div id="dcMain">
    <!-- 当前位置 -->
    <div id="urHere">DouPHP 管理中心<b>></b><strong>添加分类</strong></div>
    <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?php echo Url::to(['admin/category/list'])?>" class="actionBtn">商品分类</a>添加分类</h3>
        <form action="<?php echo Url::to(['admin/category/add'])?>" method="post">
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <td width="80" align="right">分类名称</td>
                    <td>
                        <input type="text" name="gt_name" value="" size="40" class="inpMain" required=""/>
                    </td>
                </tr>
                <input name="_csrf" type="hidden" id="_csrf" value="<?= \Yii::$app->request->csrfToken ?>">
                <tr>
                    <td align="right">上级分类</td>
                    <td>
                        <select name="gt_pid">
                            <option value="0">无</option>
                            <?php foreach ($cate as $key => $value):?>
                            <option value="<?php echo $value['gt_id'];?>"><?php echo $value['str'];?><?php echo $value['gt_name'];?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td align="right">链接地址</td>
                    <td>
                        <input type="text" name="gt_outlink" value="" size="40" class="inpMain" required=""/>
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
                        <input type="text" name="gt_sort" value="" size="5" class="inpMain" required="" />
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