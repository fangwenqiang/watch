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
    public function show($id = null)
    {
        if(!empty($id)){
            return $this->find()->where(['admin_id'=>$id])->asArray()->one();
        }else{
            return $this->find()->asArray()->all();
        }
    }

    /*
     * 删除指定ID数据
     * */
    public function del($id)
    {
        $request = $this->find()->where(['admin_id' => $id])->one();
        if($request->delete()){
            return 0;
        }else{
            return 1;
        }
    }
}