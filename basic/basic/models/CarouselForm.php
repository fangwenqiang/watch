<?php
/**
 * Created by PhpStorm.
 * User: 她说他叫强哥
 * Date: 2017/2/23
 * Time: 21:01
 */
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class CarouselForm extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%carousel}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
       
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'carousel_id'=>'carousel id',
            'path'=>'Path',
            'is_show' => 'isShow',
            'sort' =>'Sort',
            'thumb' =>'Thumb',
        ];
    }

}
