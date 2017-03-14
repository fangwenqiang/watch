<?php
/**
 * 订单管理
 */
namespace app\controllers\admin;

use Yii;
use yii\web\Controller;
use app\models\Order;
use yii\data\Pagination;

class OrderController extends Controller
{
    //后台公共视图
    public $layout = '/background';

    /*
     * 订单列表
     * @access public
     * @return html
     */
    public function actionList()
    {
        $request = Yii::$app->request;
        $str = '';
        $order_sn = '';
        $first_Time = '';
        $lastTime = '';
        $order_status = '';
        $pay_status = '';
        if (Yii::$app->request->isPost) {
            $str = $this->getWhere($request->post());
            $order_sn = addslashes($request->post('orderSn'));
            $first_Time = addslashes($request->post('firstTime'));
            $lastTime = addslashes($request->post('lastTime'));
            $order_status = addslashes($request->post('orderStatus'));
            $pay_status = addslashes($request->post('payStatus'));
        }

        $orderList = (new \yii\db\Query())
            ->select(['order_id', 'order_sn', 'pay_status', 'order_status', 'add_time', 'goods_total_prices'])
            ->where($str)
            ->from('{{%order_info}}');

        $pages = new Pagination(['totalCount' => $orderList->count(), 'defaultPageSize' => 20]);
        $data = $orderList->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('order_list_all', [
            'data' => $data,
            'page' => $pages,
            'order_sn'=>$order_sn,
            'first_Time'=>$first_Time,
            'lastTime'=>$lastTime,
            'order_status'=>$order_status,
            'pay_status'=>$pay_status
        ]);

    }

    /**
     * 获取查询条件
     * @access protected
     * @param  array $data 条件
     * @return array
     */
    protected function getWhere($data)
    {
        $arr = ['and'];
        $order_sn = addslashes($data['orderSn']);
        $first_Time = addslashes($data['firstTime']);
        $lastTime = addslashes($data['lastTime']);
        $order_status = addslashes($data['orderStatus']);
        $pay_status = addslashes($data['payStatus']);

        $first_Time = strtotime($first_Time);
        $lastTime = strtotime($lastTime);

        if (!empty($order_sn)) array_push($arr, "order_sn='$order_sn'");
        if ($order_status != -1) array_push($arr, 'order_status=' . $order_status);
        if ($pay_status != -1) array_push($arr, 'pay_status=' . $pay_status);
        if (!empty($first_Time)) {
            if (!empty($lastTime)) {
                array_push($arr, ['between', 'add_time', $first_Time, $lastTime]);
            } else {
                array_push($arr, ['between', 'add_time', $first_Time, time()]);
            }
        }
        return $arr;
    }

    /**
     * 订单详情
     * @access public
     */
    public function actionInfo()
    {
        $order = new Order();
        $request = Yii::$app->request;
        $orderId = $request->get('orderId');

        //订单信息
        $orderInfo = $order->selectAll($orderId, '{{%order_info}}');
        //订单商品信息
        $orderGoods = $order->selectAll($orderInfo['order_id']);
        $goodsId = array_column($orderGoods, 'goods_id');
        //商品信息
        $goodsInfo = (new \yii\db\Query())
            ->select(['g_id', 'g_thumb'])->from('{{%goods}}')
            ->where(['in', 'g_id', $goodsId])->all();
        //处理商品图片
        foreach ($orderGoods as $k => $v) {
            foreach ($goodsInfo as $m => $n) {
                if ($v['goods_id'] == $n['g_id']) $orderGoods[$k]['img'] = $n['g_thumb'];
            }
        }

        return $this->render('order_info', [
            'orderGoods' => $orderGoods,
            'orderInfo' => $orderInfo
        ]);


    }

    /**
     * 确认、取消确认订单
     * @access public
     * @return mixed
     */
    public function actionEdit()
    {
        $order = new Order();
        $id = yii::$app->request->post('id');
        $status = yii::$app->request->post('status'); //确认、取消确认（1/0）
        return $order->updateOrderStatus($id, $status);
    }

}
