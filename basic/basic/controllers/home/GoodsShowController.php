<?php 
namespace app\controllers\home;
use yii\web\Controller;
use app\lib\Functions\Filtration;

/*
* 前台商品展示控制器
  0227	龚洋
*/
class GoodsShowController extends Controller
{
	static public $chainMysql;

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



















