<?php
namespace app\models;
use Yii;

class History extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%history}}';
    }


    /*
     * 查看单条数据
     */
    public function history_find($user_id,$goods_id)
    {
		$data = History::find()->where(['user_id'=>$user_id,'goods_id'=>$goods_id])->one(); 
    	if($data)
    	{
    		return $data;
    	}
    	else
    	{
    		return false;
    	}
    }

    /*
     * 查看该用户下的历史记录全部数据
     */
    public function history_all($user_id)
    {
        $data = History::find()->where(['user_id'=>$user_id])->asArray()->All(); 
        if($data)
        {
            return $data;
        }
        else
        {
            return false;
        }
    }
    /*
     * 修改历史记录
     */
    public function history_update($post)
    {
    	$res = Yii::$app->db->createCommand()->update('mb_history',$post, 'history_id=:id', array(':id' => $post['history_id']))->execute();
    	if($res)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }

    /*
     * 添加历史记录
     */
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