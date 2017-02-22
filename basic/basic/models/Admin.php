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
class Admin extends ActiveRecord{

    static public function tableName()
    {
        return "{{%admin}}";
    }

    /*
     * 查询数据
     * */
    public function show()
    {
        return $this->find()->asArray()->all();
    }

}