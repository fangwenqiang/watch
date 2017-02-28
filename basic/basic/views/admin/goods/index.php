<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GoodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Goods';
$this->params['breadcrumbs'][] = $this->title;
?>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.min.js"></script>
<div class="goods-index " style="float:left;">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Goods', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'g_id',
           // 'category_id',
           // 'goods_sn',
            'goods_name',
            'click_count',
            // 'brand_id',
            // 'g_number',
            // 'g_weight',
            // 'market_price',
            // 'shop_price',
            // 'keywords',
            // 'describe',
            // 'g_img',
            // 'g_thumb',
            // 'is_show',
            // 'is_recommend',
            // 'is_promote',
            // 'promote_price',
            // 'promote_start_date',
            // 'promote_end_date',
            // 'author',
            // 'add_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
