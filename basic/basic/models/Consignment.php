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
     * 查询数据
     */
    public function selectAll($p)
    {
        $arr = (new \yii\db\Query())->from('mb_consignment')->innerJoin('mb_user',"mb_consignment.user_id=mb_user.user_id")->where(['mb_consignment.user_id'=>1]);
        $pages = new Pagination(['totalCount' =>$arr->count(), 'pageSize' =>$p]);
        $data['data'] = $arr->offset($pages->offset)->limit($pages->limit)->all();
        $data['page'] = $pages;
        return $data;
    }


}