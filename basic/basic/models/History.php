<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/23
 * Time: 11:46
 */
namespace app\models;
use Yii;

use yii\db\ActiveRecord;
/*
 * 节点表模型
 * */
class History extends ActiveRecord{

    static public function tableName()
    {
        return '{{%history}}';
    }

    /*
     * 查询数据
     * */
    public function history_find($user_id,$goods_id)
    {
        return $this->find()->where(['user_id'=>$user_id,'goods_id'=>$goods_id])->asArray()->one();
    }

    /*
     * 收藏商品
     * */
    public function history_update($history)
    {
    	$res = Yii::$app->db->createCommand()->update('mb_history',$history, 'history_id=:id', array(':id' => $history['history_id']))->execute();
    	if($res)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
    public function history_add($history)
    {
    	$res = Yii::$app->db->createCommand()->insert('mb_history', $history)->execute();
    	if($res)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }



}