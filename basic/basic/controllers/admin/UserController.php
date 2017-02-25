<?php

namespace app\controllers\admin;


use app\models\User;
use yii\web\Controller;

/*
 * RBAC 权限管理
 * */

class UserController extends CommonController
{
    // 后台公共视图

    /*haoba */
    public $layout = '/background';

    /*
     * *用户列表
     */
    public function actionUser()
    {
        $model = new User();
        $data = $model->show();
        return $this->render('user', ['data' => $data]);
    }

    /*
     * 修改用户登录权限
     * */
    public function actionUpuser()
    {
        $id = \Yii::$app->request->get('id');
        $val = \Yii::$app->request->get('val');
        $model = new User();
        $data = $model->up($id, $val);
        if ($data) {
            return 1;
        } else {
            return 0;
        }
    }


}