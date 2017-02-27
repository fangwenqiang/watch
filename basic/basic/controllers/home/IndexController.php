<?php

namespace app\controllers\home;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Nav;  //模型层



class IndexController extends CommonController
{
    //前台公共视图
    public  $layout = '/proscenium';


    /**
    * 首页
    * 
    * @param 
    * @author pjp
    */
    public function actionIndex()
    {
        return $this->render('index');
    }



}
