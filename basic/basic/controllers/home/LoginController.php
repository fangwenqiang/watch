<?php

namespace app\controllers\home;

use app\models\User;
use app\models\Reg;
use app\models\Admin;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
use app\models\Nav;  //模型层
/*
 * 前台登录注册
 * */

class LoginController extends CommonController
{
    // 前台公共视图
    public $layout = '/proscenium';

//登录
    public function actionLogin()
    {

        return $this->render('login');
    }

//注册

    public function actionReg()
    {
        $model = new Reg();
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        if($model->load(\Yii::$app->request->post()) && $model->validate()) {
             echo"1";
            return $this->render('login');
        }
        return $this->render('reg',['model'=>$model]);
    }


//登录
    public function actionLogto()
    {
        $request = \Yii::$app->request->get();
        $user = $request['user'];
        $pwd = substr(md5($request['pwd']), 0, 20);
        $model = new User();
        $where['username'] = $user;
        $data = $model->select($where);
        if (empty($data)) {
            return 1;
        } else {
            if ($data[0]['password'] != $pwd) {
                return 2;
            } else {
                if ($data[0]['is_login'] == 0) {
                    return 3;
                } else {
                    $session = \Yii::$app->session;
                    $session->set('user_name', $user);
                    $session->set('user_id', $data[0]['user_id']);
                    return 0;
                }
            }
        }
    }

    //退出登录
    public
    function actionLogout()
    {
        $session = \Yii::$app->session;
        $a = $session->remove('user_name');
        $b = $session->remove('user_id');
        if ($a and $b) {
            return 1;
        } else {
            return 0;
        }
    }


    /**
     * 页面跳转提示
     */
    public
    function actionMsg()
    {
        $layout = '/background';
        $request = \Yii::$app->request;
        return $this->render('/error/msg', $request->get('1'));
    }


    /**
     * 判断是否登录(ajax)
     */
    public
    function actionLogin_status()
    {
        $session = \Yii::$app->session;
        $user = $session->get('user_name');

        return $user ? $user : 0;
    }


}