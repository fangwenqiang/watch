<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/23
 * Time: 20:35
 */

namespace app\models;


use yii\db\ActiveRecord;
use yii\db\Query;

/*
 * 角色  管理员 关联
 * */
class Role_admin extends ActiveRecord{

    static public function tableName()
    {
        return '{{%role_admin}}';
    }

    /*
     * 查询数据
     * */
    public function show($admin_id)
    {
        $data = $this->find()->where(['admin_id'=>$admin_id])->asArray()->all();
        return array_column($data,'role_id');
    }

    /*
     * 查询用户拥有的权限
     * */
    public function roleAll($admin_id)
    {
        $roleAll = $this->find()->where(['admin_id'=>$admin_id])->asArray()->all();
        $role_id = array_column($roleAll,'role_id');    //获取用户拥有的角色ID
        $node_id = Role_node::find()->where(['IN','role_id',$role_id])->asArray()->all();
        $node_id = array_column($node_id,'node_id');    //获取用户拥有的权限ID
        $nodeAll = Node::find()->where(['IN','node_id',$node_id])->asArray()->all();
        return array_column($nodeAll,'co_ac');
    }


}