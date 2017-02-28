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
class Collect extends ActiveRecord{

    static public function tableName()
    {
        return '{{%collect}}';
    }

    /*
     * 查询数据
     * */
    public function show($user_id = null)
    {
        return $this->find()->where(['user_id'=>$user_id])->asArray()->All();
    }

    /*
     * 收藏商品
     * */
    public function collect_add($post)
    {
        unset($post['_csrf']);
        $res = Yii::$app->db->createCommand()->insert('mb_collect',$post)->execute();
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