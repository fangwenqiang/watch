<?php 
namespace app\models\gongyang;
use app\lib\Functions\Filtration;
use app\models\History; 
/**
* 
*/
class Goods 
{
	static private $db;


	//需要加入的set 初始化值
	static public function set($addSet=null)
	{
		$set = [
					'session'=>\Yii::$app->session,
					'request'=>	\Yii::$app->request,
				];

		if(!empty($addSet)) 
			foreach ($addSet as $key => $value) {
				$set[$key] = $value;
			}	
		
		return $set;
	}


	//传入需要的 参数值，最后执行的方法
	public function sql($param,$execFun="queryAll")
	{
		self::$db?self::$db:self::$db=\Yii::$app->db;

		//如果只有一条sql语句
		if (!is_array($param)) {
			return self::$db->createCommand($param)->$execFun();
		}else{
				$fun = reset(array_keys($param));

	

			return self::$db->createCommand()->$fun();
		}

	}

}