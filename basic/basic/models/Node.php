<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/23
 * Time: 11:46
 */

namespace app\models;

use yii\db\ActiveRecord;
/*
 * 节点表模型
 * */
class Node extends ActiveRecord{

    static public function tableName()
    {
        return '{{%node}}';
    }

    /*
     * 查询数据
     * */
    public function show($id = null)
    {
        if(!empty($id)){
            return $this->find()->where(['node_id'=>$id])->asArray()->one();
        }else{
            return $this->find()->asArray()->all();
        }
    }

    /*
    * 删除指定ID数据
    * */
    public function del($id)
    {
        $nodeAll = Role_node::find()->where(['node_id' => $id])->all();
        if (!empty($nodeAll)) {
            return 3;
        } else {
            $transaction = \Yii::$app->db->beginTransaction();
            try {
                $request = $this->find()->where(['node_id' => $id])->one();
                $request->delete(); //删除权限表
                foreach ($nodeAll as $v) {
                    $v->delete();   //删除权限 角色 关联表
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


    /*
     * 查询权限等级
     * */
    public static function getAllnode()
    {
        $cat = ['0'=>'顶级分类'];
        $res = self::find()->asArray()->all();
        if($res)
        {
            foreach($res as $key => $val)
            {
                $cat[$val['node_id']] = $val['node_name'];
            }
            return $cat;
        }
    }



}