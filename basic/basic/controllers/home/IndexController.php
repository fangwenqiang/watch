<?php

namespace app\controllers\home;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Nav;  //模型层


class IndexController extends Controller
{
    //前台公共视图
    public  $layout = '/proscenium';
    /*
     * 导航-->首页
     */
    public function actionIndex()
    {
        $nav_model = new Nav();
        $info = json_decode(file_get_contents('systemConfig.txt'),true);
        $nav_data = $nav_model->recursion();
        $view = YII::$app->view;
        $view->params['system'] = $info;
        $view->params['nav'] =    array_slice($nav_data,0,14);
;
        return $this->render('index');
    }

    /*
     * 导航-->本期特价
     */
    public function actionSpecial()
    {
        return $this->render('special');
    }

    /*
     * 使用模型层
     */
    public function actionTest()
    {
        $model=new Test();
        echo $model->test();
    }
}
