<?php

namespace app\controllers\home;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Region;  //模型层


class ConsignmentController extends CommonController
{
    //前台公共视图
    public  $layout = '/proscenium';

    /*
     * 寄卖铺
     */
    public function actionIndex()
    {

        return $this->render('index');
    }

    /*
     * 立即寄卖
     */
    public function actionApply()
    {
        //查询地区
        return $this->render('apply');
    }

    //查询地区
    public function actionRegion()
    {
        $region_model = new Region();
        $id =  \Yii::$app->request->post('val');
        $data['select']=$region_model->show($id);
        echo json_encode($data);
    }
    /*
     * 添加寄卖品
     */
    public function actionAdd()
    {
        $request =  \Yii::$app->request->post();
        print_r($request);
    }



}
