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

class Admin extends ActiveRecord
{

    static public function tableName()
    {
        return "{{%admin}}";
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
     * 删除指定ID数据
     * */
    public function del($id)
    {
        $transaction = \Yii::$app->db->beginTransaction();
        try{
            $request = $this->find()->where(['admin_id' => $id])->one();
            $request->delete(); //删除管理员表
            $role_admin = Role_admin::find()->where(['admin_id'=>$id])->all();
            foreach($role_admin as $v){
                $v->delete();
            }
            $transaction->commit();
            return 0;
        }catch (\Exception $e){
            $transaction->rollBack();
            \Yii::$app->session->setFlash('waring',$e->getMessage());
            return 1;
        }

    }


}