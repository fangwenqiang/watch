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
use app\models\Goods;  //模型层

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
            'order_id' => 'order_id',
            'goods_id' => 'goods_id',
            'goods_name' => 'goods_name',
            'goods_sn' => 'goods_sn',
            'buy_number' => 'buy_number',
            'buy_price' => 'buy_price',
            'goods_attr' => 'goods_attr',
            'type_attr_id' => 'type_attr_id',
            'goods_intro' => 'goods_intro'
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

    //处理订单信息
    public function OrderInserts($address)
    {
        $user_id = 1;
        $addressArr = (new \yii\db\Query())->from('mb_address')->where("address_id=$address")->one();
        //订单表
        $order['order_sn'] = $this->make_order($user_id);
        $order['user_id'] = $user_id;
        $order['order_status'] = 0;
        $order['express_id'] = 1;
        $order['express_name'] = "顺丰快递";
        $order['pay_status'] = 0;
        $order['goods_total_prices'] = 0;
        $order['over_time'] = ((time())+300);
        $order['add_time'] = time();
        $order['country'] = $addressArr['country'];
        $order['province'] = $addressArr['province'];
        $order['city'] = $addressArr['city'];
        $order['district'] = $addressArr['district'];
        $order['address'] = $addressArr['detail_address'];
        $order['zipcode'] = $addressArr['zipcode'];
        $order['mobile'] = $addressArr['tel'];

        \Yii::$app->db ->createCommand() ->insert('mb_order_info',$order) ->execute();

        return \Yii::$app->db ->getLastInsertId();
    }

    //查询订单号
   public function SelectOrder($arr,$filed="")
   {
       $data =  (new \yii\db\Query())->from('mb_order_info')->where($arr)->one();
       if(empty($filed)){
           return $data;
       } else {
           return $data[$filed];
       }
   }

    //订单号生成
    public function make_order($user_id)
    {
        return mt_rand(10,99) . sprintf('%010d',time() - 946656000) . sprintf('%03d', (float) microtime() * 1000) . sprintf('%03d', (int) $user_id % 1000);
    }

    //商品详情
    public function OrderGoodsInserts($data,$order_id)
    {
        //查询订单号
        //价格
        $prices = 0;
        $goods = array();
        $goodsArr[] = $data['car'];
        $goodsArr[] = $data['intro'];
        for($i=0;$i<count($data['car']);$i++){
            $one = array_column($goodsArr, $i);
            //查询购物车
            $goodsCar = (new \yii\db\Query())->from('mb_cart')->where("cart_id=$one[0]")->one();
            $goods[$i]['order_id'] = $order_id;
            $goods[$i]['goods_id'] = $goodsCar['goods_id'];
            $goods[$i]['goods_name'] = $goodsCar['goods_name'];
            $goods[$i]['goods_sn'] = $goodsCar['goods_sn'];
            $goods[$i]['buy_number'] = $goodsCar['num'];
            $goods[$i]['buy_price'] = $goodsCar['price'];
            $goods[$i]['goods_attr'] = $goodsCar['goods_attr'];
            $goods[$i]['type_attr_id'] = $goodsCar['type_attr_id'];
            $goods[$i]['type_attr_id'] = $goodsCar['type_attr_id'];
            $goods[$i]['goods_intro'] = $one[1];
            $prices = $prices + ($goodsCar['num'] * $goodsCar['price']);
        }
        return Yii::$app->db->createCommand()->batchInsert(Order::tableName(),Order::attributeLabels(), $goods)->execute();
    }


    //根据订单号id询价格
    public function prices($order_id)
    {
        $prices = 0;
        $data =  (new \yii\db\Query())->from('mb_order_goods')->where(array('order_id'=>$order_id))->all();
        foreach($data as $key=>$val){
            $prices = $prices + ($val['buy_number']*$val['buy_price']);
        }
        return $prices;
    }


    public function prices1($data)
    {
        $prices = 0;
        foreach($data as $key=>$val){
            $prices = $prices + ($val['num']*$val['price']);
        }
        return $prices;
    }


}
