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

class User extends ActiveRecord
{

    static public function tableName()
    {
        return "{{%user}}";
    }

    /*
     * 查询数据
     * */
    public function show($id = null)
    {
        if (isset($id)) {
            return $this->find()->where(['admin_id' => $id])->asArray()->one();
        } else {

            return $this->find()->asArray()->all();
        }
    }

    //按条件查找
    public function select($where = null)
    {
        return $this->find()->where($where)->asArray()->all();
    }

    /*
     * 修改
     * */
    public function up($id, $val)
    {
        $User = User::findOne($id);

        $User->is_login = $val;

        return $User->save();


    }


}