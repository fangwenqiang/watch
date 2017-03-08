<?php

namespace app\controllers\home;

use Yii;
use app\models\Consignment;  //模型层
use app\models\Bargain;  //模型层
use app\lib\Pay;
class OrderController extends CommonController
{

    /*
     *
     */
    public function actionIndex()
    {
        return $this->renderPartial('index');
    }

    public function actionIndex_2()
    {
        $pay_class=new Pay();
        $pay_link=$pay_class->pay_url('121313','0.01');
        return $this->renderPartial('index_2',array('link'=>$pay_link));
    }


}
