<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/23
 * Time: 11:48
 */

namespace app\models;


use yii\base\Model;
/*
 * 节点表单模型
 * */
class NodeForm extends Model{

    public $co_ac;
    public $node_name;
    public $node_id;


    /*
     * 验证
     * */
    public function rules()
    {
        return [
          [['node_name'],'required','message'=>'{attribute}不能为空'],
        ];
    }

    /*
     * 添加权限入库
     * */
    public function create()
    {
        $node_id = \Yii::$app->request->post('node_id');
        $co_ac = \Yii::$app->request->post()['NodeForm']['co_ac'];
        $transaction = \Yii::$app->db->beginTransaction();
        try{
            $model = new Node();
            $model->node_name = $this->node_name;
            $model->co_ac = $co_ac;
            $model->parent_id = $node_id;
            if(!$model->save()){
                return \Exception('添加失败');
            }
            $transaction->commit();
            return true;
        }catch (\Exception $e){
            $transaction->rollBack();
            \Yii::$app->session->setFlash('waring',$e->getMessage());
            return false;
        }
    }

    /*
     * 修改权限表
     * */
    public function update()
    {
        $node_id = \Yii::$app->request->post()['NodeForm']['node_id'];;
        $parent_id = \Yii::$app->request->post('parent_id');
        $co_ac = \Yii::$app->request->post()['NodeForm']['co_ac'];
        $transaction = \Yii::$app->db->beginTransaction();
        try{
            $model = Node::findOne($node_id);
            $model->node_name = $this->node_name;
            $model->co_ac = $co_ac;
            $model->parent_id = $parent_id;
            if(!$model->save()){
                return \Exception('修改失败');
            }
            $transaction->commit();
            return true;
        }catch (\Exception $e){
            $transaction->rollBack();
            \Yii::$app->session->setFlash('waring',$e->getMessage());
            return false;
        }
    }


    /*
     * 指定名称
     * */
    public function attributeLabels()
    {
        return [
            'co_ac'=>'地址',
            'node_name'=>'权限名称',
            'node_id'=>'权限ID',
        ];
    }


}