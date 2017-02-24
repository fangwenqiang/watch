<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%goods}}".
 *
 * @property integer $g_id
 * @property integer $category_id
 * @property string $goods_sn
 * @property string $goods_name
 * @property integer $click_count
 * @property integer $brand_id
 * @property integer $g_number
 * @property string $g_weight
 * @property integer $market_price
 * @property integer $shop_price
 * @property string $keywords
 * @property string $describe
 * @property string $g_img
 * @property string $g_thumb
 * @property integer $is_show
 * @property integer $is_recommend
 * @property integer $is_promote
 * @property integer $promote_price
 * @property string $promote_start_date
 * @property string $promote_end_date
 * @property string $author
 * @property string $add_time
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goods}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'click_count', 'brand_id', 'g_number', 'market_price', 'shop_price', 'is_show', 'is_recommend', 'is_promote', 'promote_price'], 'integer'],
            [['goods_sn', 'goods_name'], 'string', 'max' => 255],
            [['g_weight', 'keywords'], 'string', 'max' => 30],
            [['describe', 'author'], 'string', 'max' => 50],
            [['g_img', 'g_thumb'], 'string', 'max' => 60],
            [['promote_start_date', 'promote_end_date', 'add_time'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'g_id' => 'G ID',
            // 'category_id'=>'以前的category_id',
            'type_id' => '类型id',
            'goods_sn' => '商品货号',
            'goods_name' => '商品名称',
            'click_count' => '点击量',
            'brand_id' => '品牌id',
            'g_number' => '商品数量',
            'g_weight' => '商品重量',
            'market_price' => '市场价格',
            'shop_price' => '商品价格',
            'keywords' => '关键词',
            'describe' => '描述',
            'g_img' => '添加图片',
            'g_thumb' => '缩略图',
            'is_show' => '是否展示',
            'is_recommend' => '是否推荐',
            'is_promote' => '是否促销',
            'promote_price' => '促销价格',
            'promote_start_date' => '促销开始时间',
            'promote_end_date' => '促销结束时间',
            'author' => '作者',
            'add_time' => '添加时间',
        ];
    }
}
