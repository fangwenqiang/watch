<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Goods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-form" style="float:left; width:500px; margin-left:200px;">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'gt_id')->textInput() ?>

    <?= $form->field($model, 'goods_sn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'goods_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'click_count')->textInput() ?>

    <?= $form->field($model, 'brand_id')->textInput() ?>

    <?= $form->field($model, 'g_number')->textInput() ?>

    <?= $form->field($model, 'g_weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'market_price')->textInput() ?>

    <?= $form->field($model, 'shop_price')->textInput() ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'describe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_img')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_thumb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_show')->textInput() ?>

    <?= $form->field($model, 'is_recommend')->textInput() ?>

    <?= $form->field($model, 'is_promote')->textInput() ?>

    <?= $form->field($model, 'promote_price')->textInput() ?>

    <?= $form->field($model, 'promote_start_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'promote_end_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'add_time')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
