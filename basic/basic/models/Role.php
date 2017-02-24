<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/23
 * Time: 9:01
 */

namespace app\models;


use yii\db\ActiveRecord;

class Role extends ActiveRecord{

    static public function tableName()
    {
        return '{{%role}}';
    }

    /*
     * 查询数据
     * */
    public function show($id = null)
    {
        if(!empty($id)){
            return $this->find()->where(['role_id'=>$id])->asArray()->one();
        }else{
            return $this->find()->asArray()->all();
        }
    }

    /*
    * 删除指定ID数据
    * */
    public function del($id)
    {
        $request = $this->find()->where(['role_id' => $id])->one();
        if($request->delete()){
            return 0;
        }else{
            return 1;
        }
    }

}