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
    public function selectAll()
    {
        $command=\Yii::$app->db->createCommand("SELECT author,shop_price,g_img,add_time,credit FROM `mb_consignment` inner join mb_user on mb_consignment.user_id=mb_user.user_id where mb_consignment.user_id=1");
        return $command->queryAll();
    }


}