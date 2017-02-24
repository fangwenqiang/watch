<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

?>
<div id="dcMain">
    <!-- 当前位置 -->
    <div id="urHere">DouPHP 管理中心<b>></b><strong>网站管理员</strong> </div>   <div id="manager" class="mainBox" style="height:auto!important;height:550px;min-height:550px;">
        <h3><a href="<?=url::to(['admin/rbac/node']) ?>" class="actionBtn">返回列表</a>权限添加</h3>
        <?php $form = ActiveForm::begin([
            'method'=>'post'
        ]); ?>
        <table  width="100%" border="0" cellpadding="8" cellspacing="0" class="tableBasic">
            <tr>
                <td width="100" align="right">父级权限</td>
                <td >
                    <select name="node_id">
                        <option value="0">顶级权限</option>
                        <?php foreach($data as $key=>$val ){ ?>
                            <option value="<?=$val['node_id']?>"><?=str_repeat('---',$val['level']).$val['node_name']?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="100" align="right">权限名称</td>
                <td >
                    <?=$form->field($model,'node_name')->input('test',['class' => 'inpMain','size'=>'40'])->label('')?>
                </td>
            </tr>
            <tr>
                <td width="100" align="right">地址</td>
                <td >
                    <?=$form->field($model,'co_ac')->input('test',['class' => 'inpMain','size'=>'40'])->label('')?>
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