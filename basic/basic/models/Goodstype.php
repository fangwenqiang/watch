<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%goodstype}}".
 *
 * @property integer $type_id
 * @property string $type_name
 */
class Goodstype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%goodstype}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'type_id' => 'Type ID',
            'type_name' => 'Type Name',
        ];
    }


    /**
    * 添加商品类型
    *
    * @param  $data 添加数据
    * @author pjp
    */
    public function add($data)
    {
        $this->type_name = $data['type_name'];

        return $this->save();
    }


    /**
    * 查询商品类型
    *
    * @param 
    * @author pjp
    */
    public function select()
    {
        return $this->find()->asArray()->all();
    }
}
