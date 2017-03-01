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



}