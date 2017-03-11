<?php

namespace app\models;

use Yii;

class Cart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cart}}';
    }


    /*
     * 删除商品
     */
    public function DeleteGoods($cart)
    {
        foreach($cart as $key=>$val){
            $res =   Cart::findone($val)->delete();
            if(!$res){
                return false;
            }
        }
        return true;
    }


}
