<?php

namespace app\controllers\admin;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Session;
use app\models\Admin\Test;  //模型层


class IndexController extends  Controller
{
    //后台公共视图
    public $layout = '/background';

    /*
     * 导航-->首页
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /*  
     * 导航-->系统设置
     */
    public function actionSystem()
    {
        return $this->render('nav');
    }


    /**
    * 生成首页
    * 
    * @param
    * @author pjp
    */
    public function actionCreate_index()
    {
        // $index = $this->renderPartial('/home/index/index');
        // var_dump($index);
    }
}
