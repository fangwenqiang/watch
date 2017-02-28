<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GoodsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-search" style="float:left; width:500px; margin-left:200px;">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'g_id') ?>

    <?= $form->field($model, 'gt_id') ?>

    <?= $form->field($model, 'goods_sn') ?>

    <?= $form->field($model, 'goods_name') ?>

    <?= $form->field($model, 'click_count') ?>

    <?php // echo $form->field($model, 'brand_id') ?>

    <?php // echo $form->field($model, 'g_number') ?>

    <?php // echo $form->field($model, 'g_weight') ?>

    <?php // echo $form->field($model, 'market_price') ?>

    <?php // echo $form->field($model, 'shop_price') ?>

    <?php // echo $form->field($model, 'keywords') ?>

    <?php // echo $form->field($model, 'describe') ?>

    <?php // echo $form->field($model, 'g_img') ?>

    <?php // echo $form->field($model, 'g_thumb') ?>

    <?php // echo $form->field($model, 'is_show') ?>

    <?php // echo $form->field($model, 'is_recommend') ?>

    <?php // echo $form->field($model, 'is_promote') ?>

    <?php // echo $form->field($model, 'promote_price') ?>

    <?php // echo $form->field($model, 'promote_start_date') ?>

    <?php // echo $form->field($model, 'promote_end_date') ?>

    <?php // echo $form->field($model, 'author') ?>

    <?php // echo $form->field($model, 'add_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
