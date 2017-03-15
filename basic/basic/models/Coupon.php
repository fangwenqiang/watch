<?php
namespace app\models;
use Yii;

use yii\db\ActiveRecord;
use \yii\data\Pagination;

class Coupon extends ActiveRecord
{

    static public function tableName()
    {
        return "{{%coupon}}";
    }
	
	/*
     * 优惠券添加
     */
    public function couponAdd($post)
    {
    	unset($post['_csrf']);
        $res = Yii::$app->db->createCommand()->insert('mb_coupon', $post)->execute();
        if($res)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	
	/*
     * 获取登陆用户全部优惠券数据
     */
    public function CouponAll($user_id = "")
    {
        $data = $this->find()->select('*')->leftjoin('mb_user_coupon','mb_user_coupon.coupon_id=mb_coupon.coupon_id')->where(['user_id'=>$user_id])->asArray()->all();
        if($data)
        {
            return $data;
        }
        else
        {
            return false;
        }
    }
	
	/*
     * 获取全部优惠券数据
     */
    public function Coupon()
    {
        $arr = $this->find();
		$pages = new Pagination([
			//'totalCount' => $countQuery->count(),
			'totalCount' => $arr->count(),
			'pageSize'   => 20   //每页显示条数
		]);
		$models = $arr->offset($pages->offset)
			->limit($pages->limit)->asArray()
			->all();
		$data['models'] = $models;
		$data['pages']  = $pages;
		return $data;
    }
	
	/*
     * 优惠券删除
     */
    public function couponDel($id)
    {
        $res = Yii::$app->db->createCommand()->delete('mb_coupon','coupon_id=:id', array(':id' => $id))->execute();
        if($res)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	
	/*
     * 优惠券修改
     */
    public function couponUpdate($post)
    {
		//删除csrf 因为yii框架的方法不过率
        unset($post['_csrf']);
        $res = Yii::$app->db->createCommand()->update('mb_coupon',$post, 'coupon_id=:id', array(':id' => $post['coupon_id']))->execute();
        if($res)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
	
	/*
     * 查看单挑优惠券数据
     */
    public function couponOne($id)
    {
        $data = Coupon::find()->where(['coupon_id'=>$id])->one();
        if($data)
        {
            return $data;
        }
        else
        {
            return false;
        }
    }



}