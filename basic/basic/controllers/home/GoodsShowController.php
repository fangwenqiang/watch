<?php

namespace app\controllers\home;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Collect;  //模型层


class GoodsShowController extends Controller
{
   static public $chainMysql;

    //前台公共视图
    public  $layout = '/proscenium';
    /*
     * 商品-->商品详情
     */
    public function actionShow()
    {

        return $this->render('show');
    }
    public function actionCollect()
    {
    	$post=Yii::$app->request->post();
    	$post['user_id']=2;
    	$post['collect_date']=time();
    	$model=new Collect();
    	$res=$model->collect_add($post);
    	if($res)
    	{
    		$result['data']=1;
    		$result['msg']="收藏成功";
    		return json_encode($result);
    	}
    	else
    	{
    		$result['data']=0;
    		$result['msg']="收藏失败";
    		return json_encode($result);
    	}

    }

	//商品展示
	public function actionShow()
	{
		// self::$chainMysql?self::$chainMysql:\Yii::$app->db->createCommand();

		$goodsId = Filtration::check_id(2);
		$typeId = Filtration::check_id(4);


		//查询该商品所有属性
		$sql = 'select attr_id,attr_name,attr_values from mb_attribute where type_id ='.$typeId;
		$attrArr = \Yii::$app->db->createCommand($sql)->queryAll();
		print_r($attrArr);die;		
		$this->render('goods-show');

	}		

	//获取组合的价格
	public function actionGetGroupPrice()
	{	
		

	}




}




















