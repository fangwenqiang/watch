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
    public function addData($data)
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
    public function selectData()
    {
        return $this->find()->asArray()->all();
    }


    /**
    * 查询单条商品类型
    *
    * @param  $where 查询条件
    * @author pjp
    */
    public function findData($where)
    {
        return $this->find()->where($where)->asArray()->one();
    }


    /**
    * 修改商品类型
    *
    * @param  $data 修改的数据
    * @author pjp
    */
    public function updateData($data)
    {
        $obj = $this->findOne($data['type_id']);
        $obj->type_name = $data['type_name'];
        
        return $obj->save();
    }



    /**
    * 删除商品类型
    *
    * @param  $type_id int 类型id
    * @author pjp
    */
    public function deleteData($type_id)
    {
        $object = $this->findOne($type_id);

        return $object->delete();
    }
}
