<?php

namespace app\controllers\admin;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Session;
use app\models\Admin\Test;  //模型层


class IndexController extends  CommonController
{
    //后台公共视图
    public $layout = '/background';

    /*
     * 导航-->首页
     */
    public function actionIndex()
    {
        $session = \Yii::$app->session;
        $user = $session->get('user');
        if (empty($user)) {
            $this->layout = false;
            return $this->render('../login/login');
        } else {
            return $this->render('index');
        }

    }

    /*
     * 导航-->系统设置
     */
    public function actionSystem()
    {
        return $this->render('nav');
    }

    /*
     * 使用模型层
     */
    public function actionTest()
    {
        $model = new Test();
        echo $model->test();
    }
}
