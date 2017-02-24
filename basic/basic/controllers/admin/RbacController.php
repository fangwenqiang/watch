<?php

namespace app\controllers\admin;

use app\models\Admin;
use app\models\AdminForm;
use app\models\Node;
use app\models\NodeForm;
use app\models\Role;
use app\models\Role_admin;
use app\models\Role_node;
use app\models\RoleForm;
use yii\web\Controller;

/*
 * RBAC 权限管理
 * */
class RbacController extends CommonController
{
	// 后台公共视图
    public  $layout = '/background';
	
    /*
     * 管理员
     * */
	public function actionAdmin()
	{
        $admin = new Admin();
        $data = $admin->show();
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
            echo $res;
            exit;
        }elseif(!empty($node_id)){
            $model = new Node();
            $res = $model->del($node_id);
            echo $res;
            exit;
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
        $model = new Node();
        $data = $model->show();
        $data = $this->tree($data,$parent_id = 0,$level = 0);

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
        $list = $this->tree($model->show(),$parent_id = 0,$level = 0);
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

    /*
     * 给用户赋角色
     * */
    public function actionAddroad()
    {
        $connection = \Yii::$app->db;
        $request = \Yii::$app->request;
        $admin_id = $request->get('admin_id');
        $model = new Admin();   //管理员表对象
        $adminOne = $model->show($admin_id);    //管理员
        $roleList = Role::find()->asArray()->all(); //所有角色
        $role_admin = new Role_admin(); //关联表对象
        $role_id = $role_admin->show($admin_id);
        if($request->isPost){
            $data = \Yii::$app->request->post();
            $resAdmin = Role_admin::find()->where(['admin_id'=>$admin_id])->all();
            if(!empty($resAdmin)){
                $command1 = $connection->createCommand("DELETE FROM mb_role_admin WHERE admin_id=$admin_id");
                $res = $command1->execute();
            }
            if(isset($data['role_id'])){
                 foreach($data['role_id'] as $v){
                    $role_admin = new Role_admin(); //关联表对象
                    $role_admin->role_id = $v;
                    $role_admin->admin_id = $data['admin_id'];
                    $res = $role_admin->save();
                }
            }else{
                $res = 1;
            }
            if($res){
                return $this->redirect(['admin/rbac/msg', ['msg' => '赋值成功','url'=>'/admin/rbac/admin']]);
            }else{
                return $this->redirect(['admin/rbac/msg', ['msg' => '赋值失败','url'=>'/admin/rbac/admin']]);
            }
        }
        return $this->render('road',['adminOne'=>$adminOne,'roleList'=>$roleList,'role_id'=>$role_id]);
    }

    /*
     * 给角色赋权限
     * */
    public function actionAddrono()
    {
        $role_node = new Role_node(); //关联表对象
        $connection = \Yii::$app->db;
        $request = \Yii::$app->request;
        $role_id = $request->get('role_id');    //角色ID
        $role = new Role();
        $node = new Node();
        $roleOne = $role->show($role_id);    //角色信息
        $nodeList = $this->tree($node->show(),$parent_id = 0,$level = 0);   //权限信息
        $node_id = $role_node->show($role_id);
        if($request->isPost){
            $data = $request->post();
            $resRole = Role_node::find()->where(['role_id'=>$role_id])->all();  //角色 权限表
            if(!empty($resRole)){
                $command1 = $connection->createCommand("DELETE FROM mb_role_node WHERE role_id=$role_id");
                $command1->execute();
            }
            if(isset($data['node_id'])){
                foreach($data['node_id'] as $v){
                    $role_node = new Role_node(); //关联表对象
                    $role_node->node_id = $v;
                    $role_node->role_id = $data['role_id'];
                    $res = $role_node->save();
                }
            }else{
                $res = 1;
            }
            if($res){
                return $this->redirect(['admin/rbac/msg', ['msg' => '赋权成功','url'=>'/admin/rbac/role']]);
            }else{
                return $this->redirect(['admin/rbac/msg', ['msg' => '赋权失败','url'=>'/admin/rbac/role']]);
            }
        }
        return $this->render('rono',['roleOne'=>$roleOne,'nodeList'=>$nodeList,'node_id'=>$node_id]);
    }

}