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

class Bargain extends ActiveRecord
{

    static public function tableName()
    {
        return "{{%bargain}}";
    }

    /*
     * 查询单条
     * */
    public function one($id)
    {
        return Bargain::find()->where(array('goods_id'=>$id,'user_id'=>1))->asArray()->one();
    }

    //增加议价
    public function add($id,$price)
    {
        $data['bargain_price'] = $price;
        $data['goods_id'] = $id;
        $data['bargain_status'] = 0;
        $data['user_id'] = 1;
        return \Yii::$app->db ->createCommand() ->insert('mb_bargain',$data) ->execute();
    }



}