<?php

namespace app\controllers\home;


use Yii;
use yii\web\Controller;
use app\models\Nav;
use app\models\Category;  //模型层

class CommonController extends Controller
{

    public function init()
    {
        session_start();
        $nav_model = new Nav();
        $info = json_decode(file_get_contents('systemConfig.txt'),true);
        $nav_data = $nav_model->recursion();
        $view = YII::$app->view;
        $view->params['system'] = $info;

        $view->params['nav'] =    $nav_data;
        //获取分类数据
        $Category = new Category();
        $categoryData = $Category->rank_select();
        $view->params['categoryData'] = $categoryData;

    }

}