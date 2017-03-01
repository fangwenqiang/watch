<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/22
 * Time: 19:38
 */

namespace app\models;

use yii\db\ActiveRecord;
/*
 *管理员表model层
 * */

class Region extends ActiveRecord
{

    static public function tableName()
    {
        return "{{%region}}";
    }

    /*
     * 查询地区
     * */
    public function show($id)
    {
        return $this->find()->where(['parent_id' => $id])->asArray()->all();
    }






}