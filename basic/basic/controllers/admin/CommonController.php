<?php

namespace app\controllers\admin;

use app\models\Role_admin;
use Yii;
use yii\web\Controller;

class CommonController extends Controller
{

    public function init()
    {
         $session = \Yii::$app->session;
         $user_session = $session->get('user');
         $admin_id = $session->get('admin_id');
         $role_admin = new Role_admin();
         $nodeName = $role_admin->roleAll($admin_id); //查询用户拥有的权限
         $request_url = str_replace('%2F','/',$_SERVER['REQUEST_URI']);
         $request_url = substr($request_url,strpos($request_url,'?')+3);

         $res = '';
         foreach($nodeName as $val){
             if(strpos($val,$request_url)){
                 $res = '1';
             }
         }
         if (!isset($user_session)) {
             $this->redirect(array('/admin/login/login'));
         }else  if($res != 1 ){
             die('没权限访问');
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