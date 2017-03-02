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
        return Bargain::find()->where(array('goods_id'=>$id,'buyer_id'=>1))->asArray()->one();
    }

    //增加议价
    public function add($id,$seller_id,$price)
    {
        $session = \Yii::$app->session;
        $data['bargain_price'] = $price;
        $data['goods_id'] = $id;
        $data['bargain_status'] = 0;
        $data['seller_id'] = $seller_id;
        $data['buyer_id'] = $session->get('user_id');
        $data['bargain_time'] = time();
        return \Yii::$app->db ->createCommand() ->insert('mb_bargain',$data) ->execute();
    }
    public function all()
    {
        $session = \Yii::$app->session;
        return (new \yii\db\Query())->from('mb_bargain')
            ->innerJoin('mb_consignment',"mb_consignment.consignment_id=mb_bargain.goods_id")->where(['mb_bargain.seller_id'=>$session->get('user_id')])->all();
    }



}