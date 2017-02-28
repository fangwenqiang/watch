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
        $view = YII::$app->view;
        $nav_model = new Nav();
        $view->params['system'] = json_decode(file_get_contents('systemConfig.txt'),true);
        $view->params['nav'] = $nav_model->recursion();

        //获取分类数据
        $Category = new Category();
        $view->params['categoryData'] = $Category->rank_select();

    }

}