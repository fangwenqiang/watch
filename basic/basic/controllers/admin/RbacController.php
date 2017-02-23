<?php

namespace app\controllers\admin;

use app\models\Admin;
use app\models\AdminForm;
use app\models\Node;
use app\models\NodeForm;
use app\models\Role;
use app\models\RoleForm;
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
                return $this->redirect(['admin/rbac/msg', ['msg' => '添加成功','url'=>'/admin/rbac/admin']]);
            }else{
                exit(\Yii::$app->session->getFlash('waring'));
            }
        }
        return $this->render('addmanager',['model'=>$model]);
	}

    /**
     * 页面跳转提示
     */
    public function actionMsg()
    {
        $request = \Yii::$app->request;
        return $this->render('/error/msg',$request->get('1'));
    }

    /*
     * 删除
     * */
    public function actionDelete()
    {
        $admin_id = \Yii::$app->request->post('admin_id');  //管理员ID
        $role_id = \Yii::$app->request->post('role_id');    //角色ID
        $node_id = \Yii::$app->request->post('node_id');    //角色ID
        if(!empty($admin_id)){
            $model = new Admin();
            $res = $model->del($admin_id);
            die($res);
        }elseif(!empty($role_id)){
            $model = new Role();
            $res = $model->del($role_id);
            die($res);
        }elseif(!empty($node_id)){
            $model = new Node();
            $res = $model->del($node_id);
            die($res);
        }
    }

    /*
     * 修改管理员信息
     * */
    public function actionUpdate()
    {
        $admin_id = \Yii::$app->request->get('admin_id');
        $model = new Admin();
        $modelForm = new AdminForm();
        $data = $model->show($admin_id);
        if($modelForm->load(\Yii::$app->request->post()) && $modelForm->validate()) {
            if($modelForm->update()){
                return $this->redirect(['admin/rbac/msg', ['msg' => '修改成功','url'=>'/admin/rbac/admin']]);
            }else{
                exit(\Yii::$app->session->getFlash('waring'));
            }
        }
        return $this->render('upmanager',['data'=>$data,'model'=>$modelForm]);
    }

    /*
     * 角色列表
     * */
    public function actionRole()
    {
        $model = new Role();
        $data = $model->show();
        return $this->render('role',['data'=>$data]);
    }

    /*
     * 添加角色
     * */
    public function actionAddrole()
    {
        $model = new RoleForm();
        if($model->load(\Yii::$app->request->post()) && $model->validate()) {
            if($model->create()){
                return $this->redirect(['admin/rbac/msg', ['msg' => '添加成功','url'=>'/admin/rbac/role']]);
            }else{
                exit(\Yii::$app->session->getFlash('waring'));
            }
        }
        return $this->render('addrole',['model'=>$model]);
    }

    /*
     * 修改角色信息
     * */
    public function actionUpdaterole()
    {
        $role_id = \Yii::$app->request->get('role_id');
        $model = new Role();
        $modelForm = new RoleForm();
        $data = $model->show($role_id);
        if($modelForm->load(\Yii::$app->request->post()) && $modelForm->validate()) {
            if($modelForm->update()){
                return $this->redirect(['admin/rbac/msg', ['msg' => '修改成功','url'=>'/admin/rbac/role']]);
            }else{
                exit(\Yii::$app->session->getFlash('waring'));
            }
        }
        return $this->render('uprole',['data'=>$data,'model'=>$modelForm]);
    }

    /*
     * 权限列表
     * */
    public function actionNode()
    {
        $model = new Node();
        $data = $model->show();
        $data = $this->tree($data,$parent_id = 0,$level = 0);
        return $this->render('node',['data'=>$data]);
    }

    /*
     * 添加权限表
     * */
    public function actionAddnode()
    {
        $modelForm = new NodeForm();
        $data = Node::getAllnode();
        if($modelForm->load(\Yii::$app->request->post()) && $modelForm->validate()) {
            if($modelForm->create()){
                return $this->redirect(['admin/rbac/msg', ['msg' => '添加成功','url'=>'/admin/rbac/node']]);
            }else{
                exit(\Yii::$app->session->getFlash('waring'));
            }
        }
        return $this->render('addnode',['model'=>$modelForm,'data'=>$data]);
    }

    /*
     * 修改权限表
     * */
    public function actionUpnode()
    {
        $node_id = \Yii::$app->request->get('node_id');
        $model = new Node();
        $list = $model->getAllnode();
        $modelForm = new NodeForm();
        $data = $model->show($node_id);
        $data['list'] = $list;
        if($modelForm->load(\Yii::$app->request->post()) && $modelForm->validate()) {
            if($modelForm->update()){
                return $this->redirect(['admin/rbac/msg', ['msg' => '修改成功','url'=>'/admin/rbac/node']]);
            }else{
                exit(\Yii::$app->session->getFlash('waring'));
            }
        }
        return $this->render('upnode',['data'=>$data,'model'=>$modelForm]);
    }

    /*
    * 递归
    * */
    public function tree($arr,$parent_id = 0,$level = 0)
    {
        static $data = array();
        foreach($arr as $key => $val)
        {
            if($val['parent_id'] == $parent_id)
            {
                $val['level'] = $level;
                $data[] = $val;
                $this->tree($arr,$val['node_id'],$level+1);
            }
        }
        return $data;
    }



}