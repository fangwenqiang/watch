<?php
/**
 * Created by PhpStorm.
 * User: 她说他叫强哥
 * Date: 2017/2/23
 * Time: 21:01
 */
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Order extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_goods}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_goods_id' => 'order_goods_id',
            'order_id' => 'order_id',
            'goods_id' => 'goods_id',
            'goods_name' => 'goods_name',
            'goods_sn' => 'goods_sn',
            'group_id' => 'group_id',
            'buy_number' => 'buy_number',
            'buy_price' => 'buy_price',
            'goods_attr' => 'goods_attr',
            'type_attr_id' => 'type_attr_id'
        ];
    }

    /**
     * 修改订单状态
     * @access public
     * @param $id int 自增ID
     * @param $status string 状态，确认还是取消
     * @return mixed
     */
    public function updateOrderStatus($id, $status)
    {
        $connection = \Yii::$app->db;
        $val = ($status == 'up') ? 1 : 0;
        return $connection->createCommand()
            ->update('{{%order_info}}', ['order_status' => $val], 'order_id =' . $id)
            ->execute();
    }

    /**
     * 查询不同表数据
     * @access public
     * @param string|array $id 订单ID
     * @param string $table 默认当订单商品表 要查询的表
     * @return array
     */

    public function selectAll($id, $table = '',$field=[])
    {
        if ($table == '') {
            return $this->find()->where(['order_id' => $id])->asArray()->all();
        } else {
            return (new \yii\db\Query())
                ->select(['order_id', 'order_sn', 'user_id', 'order_status', 'express_status', 'express_id', 'express_name', 'pay_id', 'pay_name', 'pay_status', 'goods_total_prices', 'add_time', 'country', 'province', 'city', 'district', 'address', 'mobile'])
                ->from($table)
                ->where(['order_id' => $id])
                ->one();
        }

    }

}
