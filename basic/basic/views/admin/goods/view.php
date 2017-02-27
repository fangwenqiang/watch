<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Goods */

$this->title = $model->g_id;
$this->params['breadcrumbs'][] = ['label' => 'Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-view" style="float:left; width:500px; margin-left:200px;">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->g_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->g_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'g_id',
            'gt_id',
            'goods_sn',
            'goods_name',
            'click_count',
            'brand_id',
            'g_number',
            'g_weight',
            'market_price',
            'shop_price',
            'keywords',
            'describe',
            'g_img',
            'g_thumb',
            'is_show',
            'is_recommend',
            'is_promote',
            'promote_price',
            'promote_start_date',
            'promote_end_date',
            'author',
            'add_time',
        ],
    ]) ?>

</div>
