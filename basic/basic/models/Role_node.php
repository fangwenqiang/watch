<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/24
 * Time: 11:02
 */

namespace app\models;


use yii\db\ActiveRecord;
/*
 * 角色 权限 关联表
 * */
class Role_node extends ActiveRecord{


    static public function tableName()
    {
        return '{{%role_node}}';
    }

    /*
     * 查询数据
     * */
    public function show($role_id)
    {
        $data = $this->find()->where(['role_id'=>$role_id])->asArray()->all();
        return array_column($data,'node_id');
    }

}