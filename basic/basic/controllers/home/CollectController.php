<?php

namespace app\controllers\home;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Home\Test;  //模型层


class CollectController extends Controller
{
    //前台公共视图
    public  $layout = '/proscenium';

    /*
     * 使用模型层
     */
    public function actionCollect()
    {
    	return 1;
    }
}
