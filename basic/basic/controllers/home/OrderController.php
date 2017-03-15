<?php

namespace app\controllers\home;

use Yii;
use app\models\Consignment;  //模型层
use app\models\Bargain;  //模型层
use app\models\Order;  //模型层
use app\models\Goods;  //模型层
use app\models\Cart;  //模型层
use app\lib\Pay;
class OrderController extends CommonController
{

    public  $layout = '/proscenium';

    /*
     * 购物车页面
     */
    public function actionCar_list()
    {
        $session = Yii::$app->session;
        $id = $session->get('user_id');
        $data =   (new \yii\db\Query())->from('mb_cart')->where(array("user_id"=>$id))->all();
        //把购物车商品存入session
        $session->set('car',json_encode($data));
        return $this->render('carList',array('data'=>$data));
    }
    /*
     *订单页面（先购物车再到订单）
     */
    public function actionOrder_centre()
    {
        $session = Yii::$app->session;
        $request = \Yii::$app->request;
        if($request->post('car') == ''){
            return $this->qt_success('home/order/car_list','请选择商品');
        }
        //提交的购物车id
        $carId = explode(',',substr($request->post('car'),1));
        $CheckCar = array();
        //选中的购物车
        foreach(json_decode($session->get('car'),true) as $key=>$val){
            for($i = 0;$i<count($carId);$i++){
                if(array_search($carId[$i],$val)){
                    $CheckCar[]=$val;
                }
            }

        }
        $order_model = new Order();
        //查询快递方式
        $express =  (new \yii\db\Query())->from('mb_express')->all();

        return $this->render('OrderCentre',[
            'data'=>$CheckCar,
            'express' => $express
        ]);
    }


      /*
     *订单页面（适用立即购买）
     */
    public function actionOrder_immediately()
    {
        $request = \Yii::$app->request;
        $g_id = $request->get('g_id');
        $nowNum = $request->get('nowNum');
        $goods_data = Goods::find()->where(['g_id'=>$g_id])->asArray()->all();
        $goods_data[0]['price'] =  $goods_data[0]['shop_price'];
        $goods_data[0]['num'] =  $nowNum;

        //查询快递方式
        $express =  (new \yii\db\Query())->from('mb_express')->all();

        return $this->render('OrderCentre',[
            'data'=>$goods_data,
            'express' => $express
        ]);
    }


    /*
     * 提价订单
     */
    public function actionSubmit_order()
    {
        $request = \Yii::$app->request;
        $connection=\Yii::$app->db;
        $order_model = new Order();
        $goods_model = new Goods();
        $cart_model = new Cart();
        $post = $request->post();
        if(empty($post)){
            return $this->redirect(['home/order/car_list']);
        }
//        $post = json_decode(file_get_contents('2.txt'),true);
        unset($post['_csrf']);
        //开启事务
        $connection=\Yii::$app->db;
        $transaction = $connection->beginTransaction();

        try {

            //处理订单 -- 订单入库
            $submitPut = $order_model->OrderInserts($post['address']);
            if(!empty($post['car']))
            {
                 //处理订单 -- 减少库存
                $reduceRepertory =   $goods_model->reduceRepertory(implode(',',$post['car']));
                //处理订单 -- 减少优惠卷
                // //处理订单 -- 订单入库
                // $submitPut = $order_model->OrderInserts($post['address']);
                //处理订单  -- 订单详情添加
                $orderDetails = $order_model->OrderGoodsInserts($post,$submitPut);
                //处理订单 -- 删除购物车
                $DeleteCar = $cart_model->DeleteGoods($post['car']);
            }
            else
            {      
                $orderDetails = $order_model->OrderGoodsOrder($post,$submitPut);
            }
            //处理订单 -- 减少优惠卷
            // ... 执行其他 SQL 语句 ...
            $transaction->commit();
            $order_sn = $order_model->SelectOrder(array('order_id'=>$submitPut),'order_sn');
            return $this->redirect(['home/order/pay_order','order_sn'=>"$order_sn"]);
        } catch(Exception $e) {
            $transaction->rollBack();
            return $this->qt_error('下单失败,请重新下单，如多次失败，请联系人工客服');
        }


    }



    /*
     * 支付订单
     */
    public function actionPay_order()
    {
        //订单
        $request = \Yii::$app->request;
        $order_sn = $request->get('order_sn');
        //查询订单信息 和总价格
        $order_model = new Order();
        $order = $order_model->SelectOrder(array('order_sn'=>$order_sn));
        $order['prices'] = $order_model->prices($order['order_id']);
        $pay_class=new Pay();
        $order['link'] = $pay_class->pay_url($order['order_sn'],$order['prices']);

        return $this->render('OrderPay',array('order'=>$order));
    }


     public function selectCar($id)
     {
         $car_model = new Car();
         return $car_model->one($id);
     }


    //订单失效
    public function actionOver_time()
    {
      //修改
        $request = \Yii::$app->request;
        $order = $request->get('order');
        \Yii::$app->db ->createCommand()->update('mb_order_info',['order_status'=>-1],array('order_sn'=>$order))->execute();
        return $this->qt_success('/','该订单已失效');
    }


    public function actionCheck_order()
    {
        //查找订单
        file_put_contents('zhifu.txt',json_encode($_GET));
        $arr =  (new \yii\db\Query())->from('mb_order_info')->where(array('order_sn'=>$_GET['out_trade_no']))->one();
        if($arr['order_status'] == 1){
            $data['out_trade_no'] = $_GET['out_trade_no'];
            $data['total_fee'] = $_GET['total_fee'];
            $data['type'] = 1;
            return $this->render('index_4',array('data'=>$data));
        } else {
            $data['type'] = 0;
            return $this->render('index_4',array('data'=>$data));
        }

    }


}
