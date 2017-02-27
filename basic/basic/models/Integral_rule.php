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
class Integral_rule extends ActiveRecord{

    static public function tableName()
    {
        return '{{%integral_rule}}';
    }

    /*
     * 查询数据
     * */
    public function rule_show($user_id = null)
    {
        return $this->find()->asArray()->All();	
    }



}