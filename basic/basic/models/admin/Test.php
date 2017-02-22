<?php
namespace app\models\Admin;
use Yii;

class Test extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'message';
    }

    public function test()
    {
        return "欢迎使用后台模型";
    }
}