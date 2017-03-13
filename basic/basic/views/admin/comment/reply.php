<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div id="dcMain">
    <!-- 当前位置 -->
    <div id="urHere">DouPHP 管理中心<b>></b><strong>回复评论</strong></div>
    <div class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?php echo Url::to(['admin/comment/list'])?>" class="actionBtn">评论列表</a>回复评论</h3>
        <form action="<?php echo Url::to(['admin/comment/reply'])?>" method="post">
            <table width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
                <tr>
                    <td align="right">回复内容</td>
                    <td>
                        <textarea name="reply_content" cols="60" rows="4" class="textArea"></textarea>
                    </td>
                </tr>
                <input name="comment_id" type="hidden" id="comment_id" value="<?php echo $comment_id;?>">
                <input name="_csrf" type="hidden" id="_csrf" value="<?= \Yii::$app->request->csrfToken ?>">
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