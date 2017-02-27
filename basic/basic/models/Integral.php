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
class Integral extends ActiveRecord{

    static public function tableName()
    {
        return '{{%integral}}';
    }

    /*
     * 查询数据
     * */
    public function show($user_id = null)
    {
        return $this->find()->where(['user_id'=>$user_id])->asArray()->All();
    }

    public function rule_show()
    {
        return Yii::$app->db->createCommand()->select('mb_intrgral_rule')->execute(); 
    }



}