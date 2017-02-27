<?php

namespace app\controllers\home;


use Yii;
use yii\web\Controller;
use app\models\Nav;


class CommonController extends Controller
{

    public function init()
    {

        $nav_model = new Nav();
        $cache = \Yii::$app->cache;
        $info = json_decode($cache->get("systemConfig"),true);
        $nav_data = $nav_model->recursion();
        $view = YII::$app->view;
        $view->params['system'] = $info;
        $view->params['nav'] =    array_slice($nav_data,0,14);

//
//        $session = \Yii::$app->session;
//        $user_session = $session->get('user');
//        $admin_id = $session->get('admin_id');
//        if (!isset($user_session)) {
//            $this->redirect(array('/admin/login/login'));
//        }



    }

}