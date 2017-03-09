<?php

namespace app\controllers\home;

use Yii;
use app\models\Consignment;  //模型层
use app\models\Bargain;  //模型层
use app\models\Order;  //模型层
use app\lib\Pay;
class OrderController extends CommonController
{

    public function actionIndexs()
    {
        return $this->renderPartial('indexs');
    }
    /*
     *
     */
    public function actionIndex()
    {
        $request = \Yii::$app->request;
        $car = $request->post('car');
        if(empty($car)){
            return  $this->redirect('/');
        }
        $order_model = new Order();
        //查询购物车
        $data =  (new \yii\db\Query())->from('mb_cart')->where("cart_id in(".substr($car,1).")")->all();
        return $this->renderPartial('index',array('data'=>$data,'car'=>substr($car,1),'prices'=>$order_model->prices1($data)));
    }


    public function actionIndex_2()
    {
        //处理订单
        $request = \Yii::$app->request;
        $order_model = new Order();
        $data = $request->post();
        if(!empty($data)){
            //添加订单
            $order_id = $order_model->OrderInserts($data['address']);
            if($order_id) {
                //添加商品详情
                if($order_model->OrderGoodsInserts($data,$order_id)){
                    //删除商品
                   $order_model->DeleteGoods($data['car']);
                }
            }
        } else {
            //查询订单
            $order_id = $request->get('order_id');
            if(empty($order_id)){
                return  $this->redirect('/');
            }
        }
        $arr = $order_model->SelectOrder($order_id);
        $pay_class=new Pay();
        $prices = $order_model->prices($order_id);
        $pay_link=$pay_class->pay_url($arr['order_sn'],$prices);
        if(($arr['over_time']-time()) < 0){
           return $this->qt_success('/','该订单已失效');
       }
        return $this->renderPartial('index_2',array('prices'=>$prices,
            'link'=>$pay_link,
            'order_sn'=>$arr['order_sn'],
            'time'=>($arr['over_time']-time())));
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

}
