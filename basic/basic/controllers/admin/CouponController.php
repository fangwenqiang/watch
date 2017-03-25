<?php

namespace app\controllers\admin;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Coupon;  //模型层

class CouponController extends CommonController
{
    //后台公共视图
    public  $layout = '/background';
	
    /*
     * 优惠卷展示页面
     */
    public function actionList()
    {
    	$model = new Coupon;
		$coupon_list = $model->coupon();
        return $this->render('list',['coupon_list'=>$coupon_list]);
    }
	
	/*
     * 优惠券添加页面
     */
    public function actionAdd()
    {
    	if(Yii::$app->request->isPost) {
    		//接收参数
    		$post=Yii::$app->request->post();
			$post['start_time'] = strtotime($post['start_time']);
			$post['expire_time'] = strtotime($post['expire_time']);
			if($post['coupon_sn'] == "") {
				$post['coupon_sn'] = 'yhj'.time();
			}
			//实例化model类
    		$model = new Coupon;
			//调用添加的方法
			$res=$model->couponAdd($post);
			if($res) {
                return $this->redirect(['admin/coupon/msg', ['msg' => '添加成功','url'=>'/admin/coupon/list']]);
            } else {
                return $this->redirect(['admin/coupon/msg',['msg' => '添加失败','url'=>'/admin/coupon/add']]);
            }
		} else {
			return $this->render('add');
		}
        
    }
	
	/*
     * 优惠券删除
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->get('coupon_id');
        $model=new Coupon();
        $res = $model->couponDel($id);
        if($res) {
            return $this->redirect(['admin/coupon/msg', ['msg' => '删除成功','url'=>'/admin/coupon/list']]);
        } else {
            return $this->redirect(['admin/coupon/msg',['msg' => '删除失败','url'=>'/admin/coupon/list']]);          
        }
    }
	
	/*
     * 优惠券修改操作
     */
    public function actionUpdate()
    {
        $model = new Coupon();
        if(Yii::$app->request->isPost && $model->validate()) {
        	//获取参数
            $post=Yii::$app->request->post();
			$post['start_time'] = strtotime($post['start_time']);
			$post['expire_time'] = strtotime($post['expire_time']);
			if($post['coupon_sn'] == "") {
				$post['coupon_sn'] = 'yhj'.time();
			}
            //调用修改方法
            $res=$model->couponUpdate($post);
            if($res) {
                return $this->redirect(['admin/coupon/msg', ['msg' => '修改成功','url'=>'/admin/coupon/list']]);
            } else {
                return $this->redirect(['admin/coupon/msg',['msg' => '修改失败','url'=>'/admin/coupon/list']]);
            }

        } else {
            $id = Yii::$app->request->get('coupon_id');
            //调用model层下的得到单条数据
            $coupon=$model->couponOne($id);
            return $this->render('update',['coupon'=>$coupon]);
        }
	}
		
    /*
     * 跳转页面
     */
    public function actionMsg()
    {
        $request = Yii::$app->request;

        return $this->render('/error/msg',$request->get('1'));
    }
    
}
