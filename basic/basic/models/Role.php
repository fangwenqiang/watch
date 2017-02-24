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
        $adminAll = Role_admin::find()->where(['role_id'=>$id])->all(); //角色管理员表
        $nodeAll = Role_node::find()->where(['role_id'=>$id])->all();   //角色权限表
        if(!empty($adminAll)){
            return 3;
        }else{
            $transaction = \Yii::$app->db->beginTransaction();
            try {
                $request = $this->find()->where(['role_id' => $id])->one();
                $request->delete(); //删除角色表
                foreach ($nodeAll as $v) {
                    $v->delete();   //删除权限 角色 关联表
                }
                foreach($adminAll as $v){
                    $v->delete();   //删除 角色 管理员关联表
                }
                $transaction->commit();
                return 0;
            } catch (\Exception $e) {
                $transaction->rollBack();
                \Yii::$app->session->setFlash('waring', $e->getMessage());
                return 1;
            }
        }
    }

}