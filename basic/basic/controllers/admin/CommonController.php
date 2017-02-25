<?php

namespace app\controllers\admin;

use app\models\Role_admin;
use Yii;
use app\models\Admin;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Session;


class CommonController extends Controller
{

    public function init()
    {
        $session = \Yii::$app->session;
        $user_session = $session->get('user');
        $admin_id = $session->get('admin_id');
        if (!isset($user_session)) {
            $this->redirect(array('/admin/login/login'));
        }

        $role_admin = new Role_admin();
        $nodeName = $role_admin->roleAll($admin_id); //查询用户拥有的权限
        $request_url = str_replace('%2F','/',$_SERVER['REQUEST_URI']);
        $request_url = substr($request_url,strpos($request_url,'?'));

            if(!in_array($request_url,$nodeName)){
                die('没权限访问');
//                return $this->redirect([$this->actionMsg(), ['msg' => '没有权限访问','url'=>'/admin/index']]);
            }
    }

    /**
     * 页面跳转提示
     */
    public function actionMsg()
    {
        $request = \Yii::$app->request;
        return $this->render('/error/msg',$request->get('1'));
    }
}