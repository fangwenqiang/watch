<?php
namespace app\models;
use Yii;

use yii\db\ActiveRecord;
/*
 * 节点表模型
 * */
class Comment extends ActiveRecord{

    static public function tableName()
    {
        return '{{%comment}}';
    }

    /*
     * 查询数据
     * */
    public function show($goods_id)
    {
        return $this->find()
        ->select('*')
        ->leftJoin('mb_reply','mb_reply.comment_id=mb_comment.comment_id')
        ->where(['goods_id'=>$goods_id])->asArray()->All();
    }

    public function people_comment($usere_name)
    {
        return $this->find()
        ->select('mb_comment.*,mb_goods.goods_name,mb_goods.shop_price')
        ->leftJoin('mb_goods','mb_comment.goods_id=mb_goods.g_id')
        ->where(['comment_people'=>$usere_name])
        ->asArray()
        ->All();
    }


}