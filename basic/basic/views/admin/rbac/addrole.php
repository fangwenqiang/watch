<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

?>
<div id="dcMain">
    <!-- 当前位置 -->
    <div id="urHere">DouPHP 管理中心<b>></b><strong>网站管理员</strong> </div>   <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?=url::to(['admin/rbac/admin']) ?>" class="actionBtn">返回列表</a>网站管理员</h3>
        <?php $form = ActiveForm::begin([
            'method'=>'post'
        ]); ?>

        <table  width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
            <tr>
                <td width="100" align="right">角色名称</td>
                <td >
                    <?=$form->field($model,'role_name')->input('test',['class' => 'inpMain','size'=>'40'])->label('')?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="hidden" class="_csrf" value="<?=Yii::$app->request->getCsrfToken() ?>">

                    <?= Html::submitButton('提交', ['class' => 'btn', 'name' => 'submit']) ?>
                </td>
            </tr>
        </table>
        <?php ActiveForm::end()?>
    </div>
</div>