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
    //收到出价
    public function all()
    {
        $session = \Yii::$app->session;
        return (new \yii\db\Query())->from('mb_bargain')
            ->innerJoin('mb_consignment',"mb_consignment.consignment_id=mb_bargain.goods_id")->where(['mb_bargain.seller_id'=>$session->get('user_id')])->all();
    }
    //我的出价
    public function oneselfAll()
    {
        $session = \Yii::$app->session;
        return (new \yii\db\Query())->from('mb_bargain')
            ->innerJoin('mb_consignment',"mb_consignment.consignment_id=mb_bargain.goods_id")->where(['mb_bargain.buyer_id'=>$session->get('user_id')])->all();
    }

    //议价
    public function consent_bargain($id,$type)
    {
        $session = \Yii::$app->session;
        $user_id = $session->get('user_id');
        return \Yii::$app->db ->createCommand()->update('mb_bargain',array('bargain_status'=>$type),array("seller_id"=>$user_id ,"bargain_id"=>$id)) ->execute();

    }

    //二次议价
    public function two_bargain($id,$price)
    {
        return \Yii::$app->db ->createCommand()->update('mb_bargain',array('bargain_status'=>0,'bargain_price'=>$price),array("bargain_id"=>$id)) ->execute();
    }


}