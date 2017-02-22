<?php
namespace app\models\Home;
use Yii;

class Test extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'message';
    }

    public function test()
    {
        return "欢迎使用前台模型";
    }
}