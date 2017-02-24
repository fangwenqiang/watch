<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/22
 * Time: 16:46
 */
namespace app\models;

use yii\base\Model;
/*
 * 角色表单模型
 * */
class RoleForm extends Model{

    public $role_id;
    public $role_name;

    /*
     * 验证
     * */
    public function rules()
    {
        return [
            [['role_name'],'required','message'=>'{attribute}不能为空'],
        ];
    }

    /*
     * 添加数据入库
     * */
    public function create()
    {
        $transaction = \Yii::$app->db->beginTransaction();
        try{
            $model = new Role();
            $model->role_name = $this->role_name;
            if(!$model->save()){
                return \Exception('注册失败');
            }
            $transaction->commit();
            return true;
        }catch (\Exception $e){
            $transaction->rollBack();
            \Yii::$app->session->setFlash('waring',$e->getMessage());
            return false;
        }
    }

    /*
     * 修改数据
     * */
    public function update()
    {
        $role_id = \Yii::$app->request->post()['RoleForm']['role_id'];
        $transaction = \Yii::$app->db->beginTransaction();
        try{
            $model = Role::findOne($role_id);
            $model->role_name = $this->role_name;
            if(!$model->save()){
                return \Exception('修改失败');
            }
            $transaction->commit();
            return true;
        }catch (\Exception $e){
            $transaction->rollBack();
            \Yii::$app->session->setFlash('waring',$e->getMessage());
            return false;
        }
    }

    /*
     * 指定名称
     * */
    public function attributeLabels()
    {
        return[
            'role_id'=>'ID',
            'role_name'=>'角色名称',
        ];
    }


}