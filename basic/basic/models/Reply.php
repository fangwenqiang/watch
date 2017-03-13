<?php
namespace app\models;
use Yii;

class Reply extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%mb_reply}}';
    }
    /*
     * 品牌-->添加数据
     */
    public function replyAdd($post)
    {
    	unset($post['_csrf']);
        $res =Yii::$app->db->createCommand()->insert('mb_reply', $post)->execute();
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