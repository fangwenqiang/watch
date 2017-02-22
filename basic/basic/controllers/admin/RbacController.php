<?php

namespace app\controllers\admin;

use app\models\Admin;
use app\models\AdminForm;
use yii\web\Controller;

/*
 * RBAC 权限管理
 * */
class RbacController extends Controller
{
	// 后台公共视图
    public  $layout = '/background';
	
    /*
     * 管理员
     * */
	public function actionAdmin()
	{
        $model = new Admin();
        $data = $model->show();
		return $this->render('manager',['data'=>$data]);
	}
	
    /*
     * 管理员添加
     * */
	public function actionAddadmin()
	{
        $model = new AdminForm();
        if($model->load(\Yii::$app->request->post()) && $model->validate()) {
            if($model->create()){
                return $this->redirect('?r=admin/rbac/admin');
            }else{
                exit(\Yii::$app->session->getFlash('waring'));
            }
        }
        return $this->render('addmanager',['model'=>$model]);
	}
	
	
}