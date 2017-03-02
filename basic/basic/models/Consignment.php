<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/22
 * Time: 19:38
 */

namespace app\models;

use yii\db\ActiveRecord;
use \yii\data\Pagination;
/*
 *管理员表model层
 * */

class Consignment extends ActiveRecord
{

    static public function tableName()
    {
        return "{{%consignment}}";
    }

    /*
     * 添加数据
     * */
    public function dataInsert($arr)
    {
       return \Yii::$app->db ->createCommand() ->insert('mb_consignment',$arr) ->execute();
    }
    /*
     * 自带分页查询数据
     */
    public function selectAll2($p)
    {
        $arr = (new \yii\db\Query())->from('mb_consignment')
            ->select(array('consignment_id','author','shop_price','g_brand','is_bargain','describe','g_img','add_time','mb_user.user_id','shop_status','credit','is_bargain'))
            ->innerJoin('mb_user',"mb_consignment.user_id=mb_user.user_id")->where(['mb_consignment.user_id'=>1]);
        $pages = new Pagination(['totalCount' =>$arr->count(), 'pageSize' =>$p]);
        $data['data'] = $arr->offset($pages->offset)->limit($pages->limit)->all();
        $data['page'] = $pages;
        return $data;
    }
    /*
     * 自己写的分页查询
     */
    public function selectAll($limit,$order,$offset,$where='')
    {
        $arr = (new \yii\db\Query())
            ->from('mb_consignment')
            ->select(array('consignment_id','author','shop_price','g_brand','describe','is_bargain','g_img','add_time','mb_user.user_id','shop_status','credit'))
            ->innerJoin('mb_user',"mb_consignment.user_id=mb_user.user_id")
            ->where($where)
            ->offset($offset)
            ->limit($limit)
            ->orderBy($order)
            ->all();

        return $arr;
    }

    public function one($id)
    {
        return (new \yii\db\Query())
            ->from('mb_consignment')
            ->select(array('consignment_id','author','shop_price','g_brand','describe','g_img','is_bargain','add_time','mb_user.user_id','shop_status','credit'))
            ->innerJoin('mb_user',"mb_consignment.user_id=mb_user.user_id")
            ->where(array('consignment_id'=>$id))
            ->one();
    }



}