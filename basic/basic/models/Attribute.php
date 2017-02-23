<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%attribute}}".
 *
 * @property integer $attr_id
 * @property integer $type_id
 * @property string $attr_name
 * @property integer $attr_index
 * @property integer $attr_input_type
 * @property string $attr_values
 */
class Attribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%attribute}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type_id', 'attr_index', 'attr_input_type'], 'integer'],
            [['attr_values'], 'string'],
            [['attr_name'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'attr_id' => 'Attr ID',
            'type_id' => 'Type ID',
            'attr_name' => 'Attr Name',
            'attr_index' => 'Attr Index',
            'attr_input_type' => 'Attr Input Type',
            'attr_values' => 'Attr Values',
        ];
    }


    /**
    * 查询商品属性
    *
    * @param 
    * @author pjp
    */
    public function selectData()
    {
        return $this->find()->asArray()->all();
    }



    /**
    * 查询单条商品属性
    *
    * @param  $where 查询条件
    * @author pjp
    */
    public function findData($where)
    {
        return $this->find()->where($where)->asArray()->one();
    }


    /**
    * 添加商品属性
    *
    * @param  $data 添加数据
    * @author pjp
    */
    public function addData($data)
    {
        $this->type_id = $data['type_id'];
        $this->attr_name = $data['attr_name'];
        $this->attr_index = $data['attr_index'];
        $this->attr_input_type = $data['attr_input_type'];
        $this->attr_values = $data['attr_values'];

        return $this->save();
    }



    /**
    * 修改商品属性
    *
    * @param  $data 修改的数据
    * @author pjp
    */
    public function updateData($data)
    {
        $obj = $this->findOne($data['attr_id']);
        $obj->type_id = $data['type_id'];
        $obj->attr_name = $data['attr_name'];
        $obj->attr_index = $data['attr_index'];
        $obj->attr_input_type = $data['attr_input_type'];
        $obj->attr_values = $data['attr_values'];

        return $obj->save();
    }


    /**
    * 删除商品属性
    *
    * @param  $attr_id int 属性id
    * @author pjp
    */
    public function deleteData($attr_id)
    {
        $object = $this->findOne($attr_id);

        return $object->delete();
    }

}
