<?php
namespace app\models;
use Yii;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/23
 * Time: 13:54
 */


class Log extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%log}}';
    }
    public function write($data)
    {
        return \Yii::$app->db ->createCommand() ->insert('mb_log',$data) ->execute();
    }
    public function select_all()
    {
        $command=\Yii::$app->db->createCommand("SELECT * FROM `mb_log` inner join mb_admin on mb_log.admin_id=mb_admin.admin_id");
        return $command->queryAll();
    }
}