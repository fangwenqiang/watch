<?php

namespace app\controllers\home;
use app\models\Admin;
use yii\web\Controller;
use  yii\web\Session;

/*
 * RBAC 权限管理
 * */

class LoginController extends Controller
{
    // 后台公共视图
    public $layout;

    /*
     * 管理员
     * */
    public function actionLogin()
    {

        $this->layout = false;
        $session = \Yii::$app->session;
        $session->open();
        $user = $session->get('user');
        return $this->render('login', ['user', $user]);
    }

    public function actionLogto()
    {
        $this->layout = false;
        $request = \Yii::$app->request->get();
        $user = $request['user'];
        $pwd = substr(md5($request['pwd']), 0, 20);
        $model = new Admin();
        $where['username'] = $user;
        $data = $model->select($where);
        if (empty($data)) {
            return 1;
        } else {
            if ($data[0]['password'] != $pwd) {
                return 2;
            } else {
                $session = \Yii::$app->session;
                $session->set('user', $user);
                $session->set('admin_id', $data[0]['admin_id']);
                return 0;
            }
        }
    }

    public function actionLogout()
    {
        $session = \Yii::$app->session;
        $a = $session->remove('user');
        $b = $session->remove('admin_id');
        if ($a & $b) {
            return 1;
        } else {
            return 0;
        }
    }


    /**
     * 页面跳转提示
     */
    public function actionMsg()
    {
        $layout = '/background';
        $request = \Yii::$app->request;
        return $this->render('/error/msg', $request->get('1'));
    }


}