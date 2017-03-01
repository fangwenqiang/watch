<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/3/1
 * Time: 15:06
 */

namespace app\models;


use yii\db\ActiveRecord;

class Comment extends ActiveRecord{

    public static function tableName()
    {
        return '{{%comment}}';
    }
}