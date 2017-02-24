<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/23
 * Time: 20:35
 */

namespace app\models;


use yii\db\ActiveRecord;

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


}