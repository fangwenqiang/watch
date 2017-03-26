<?php

namespace app\controllers\home;

use Yii;
use app\models\Consignment;  //模型层
use app\models\Bargain;  //模型层
use app\models\Order;  //模型层
use app\models\Goods;  //模型层
use app\models\Cart;  //模型层
use app\lib\Pay;
use app\lib\periods;

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
        if($id){
            $data =   (new \yii\db\Query())->from('mb_cart')->where(array("user_id"=>$id))->all();
            //把购物车商品存入session
            $session->set('car',json_encode($data));
        }else{
            $data = $this->actionAddcookie();
        }

        return $this->render('carList',array('data'=>$data));
    }


    //cookie值加入购物车
    public function actionAddcookie()
    {
        $arr = array();
        $Cart = new \app\lib\cart();
        $res = $Cart->checkCart();
        if($res){
            $goods_desc = $Cart->CartView();
            foreach ($goods_desc[0] as $key => $value){
                $data[$key] = array_column($goods_desc,$key);
            }
            foreach ($data as $key => $value) {
                $arr[$key]['goods_id'] = $value[0];
                $arr[$key]['goods_name'] = $value[1];
                $arr[$key]['goods_sn'] = rand(1000,999999);
                $arr[$key]['prices'] = $value[3]*$value[5];
                $arr[$key]['price'] = $value[3];
                $arr[$key]['num'] = $value[5];
                $arr[$key]['type_attr_id'] = rand(1,9);
            }
        }
        
        return $arr;
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
     *订单页面（适用分期购买）
     */
    public function actionOrder_stages()
    {
        $request = \Yii::$app->request;
        $g_id = $request->get('g_id');
        $periods = $request->get('periods');
        $goods_data = Goods::find()->where(['g_id'=>$g_id])->asArray()->all();
        $goods_data[0]['price'] =  $goods_data[0]['shop_price'];
        $goods_data[0]['num'] =  1;

        //查询期数数据
        $Periods = new periods;
        $periods_data = $Periods->assignStages($goods_data[0]['shop_price'],$periods);

        //查询快递方式
        $express =  (new \yii\db\Query())->from('mb_express')->all();

        return $this->render('Orderperiods',[
            'data'=>$goods_data,
            'express' => $express,
            'periods'=>$periods,
            'periods_data'=>$periods_data
        ]);
    }


    /**
    * 验证支付密码
    * 
    * @param 
    * @author 
    */
    public function actionVerifypwd()
    {
        $request = \Yii::$app->request;
        $pwd = $request->get('pwd');
        if($pwd==123456)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }


    /*
     * 提交订单
     */
    public function actionSubmit_order()
    {
        $request = \Yii::$app->request;
        $user_id =  \Yii::$app->session->get('user_id');
        $connection=\Yii::$app->db;
        $order_model = new Order();
        $goods_model = new Goods();
        $cart_model = new Cart();
        $post = $request->post();
        if(empty($post)){
            return $this->redirect(['home/order/car_list']);
        }

        unset($post['_csrf']);
        $goods_desc = \Yii::$app->db->createCommand("select * from mb_goods where g_id=".$post['g_id'])->queryAll()[0]; 
        if(isset($post['stages'])){
            //查询商品信息
            $post['stages']['goods_price'] = $goods_desc['shop_price'];
        }else{
            $post['stages'] = '';
        }
        //开启事务
        $connection=\Yii::$app->db;
        $transaction = $connection->beginTransaction();

        try {

            //处理订单 -- 订单入库
            $submitPut = $order_model->OrderInserts($post['address'],$post['stages']);
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
            if(!empty($post['stages'])){
                $periods = new periods;
                $periods_data = $periods->assignStages($goods_desc['shop_price'],$post['stages']['periods']);
                $serve = $periods_data['terminally_serviceCharge']>0?'(含手续费)':'(不含手续费)';
                //商品分期表数据
                $data['g_id'] = $goods_desc['g_id'];
                $data['user_id'] = $user_id;
                $data['g_name'] = $goods_desc['goods_name'];
                $data['periods_info'] = "¥ ".$periods_data['terminally_price'].'×'.$post['stages']['periods'].$serve;
                $data['unpaid_periods'] = $post['stages']['periods'];
                $data['order_sn'] = $order_sn;

                $db=\Yii::$app->db->createCommand()->insert('mb_periods',$data)->execute(); 
                //还款记录表数据
                if($db)
                {
                    //获取分期表的自增id
                    $periods_id = \Yii::$app->db->getLastInsertID();
                    $str = "INSERT INTO mb_refund(periods_id,goods_name,periods,money,abort_date,user_id) value";
                    for ($i=1;$i<=$post['stages']['periods'];$i++) { 
                        $str.= "(";
                        $str.= $periods_id.',';
                        $str.= "'".$goods_desc['goods_name']."',";
                        $str.= $i.',';
                        $str.= $periods_data['terminally_price'].",";
                        $str.= "'".date("Y-m-d H:i:s",strtotime("+".$i." months",time()))."',";
                        $str.= $user_id;
                        $str.= "),";
                    }
                    $str = substr($str,0,-1);
                    \Yii::$app->db->createCommand($str)->execute();
                }
                return $this->qt_success('/home/watch/speciallist','恭喜您，成功购买！');
            }else{
                return $this->redirect(['home/order/pay_order','order_sn'=>"$order_sn"]);
            }
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
