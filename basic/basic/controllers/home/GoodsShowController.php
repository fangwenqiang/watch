<?php 
namespace app\controllers\home;
use yii\web\Controller;
use app\lib\Functions\Filtration;
use yii\db\Query; 
use app\models\Collect;
use app\models\History;
use app\models\Comment; 
use yii\web\NotFoundHttpException;
use app\model\Goodstype;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/*
* 前台商品展示控制器
  0227	龚洋
*/
class GoodsShowController extends CommonController
{
	static public $chainMysql;
	public  $layout = './proscenium';
    public function actionCollect()
    {
        $post = \Yii::$app->request->post();
        $post['user_id'] = 2;
        $post['collect_date'] = time();
        $model = new Collect();
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
		self::$chainMysql?self::$chainMysql:\Yii::$app->db->createCommand();
		$id = $_GET['g_id'];
		$user_id = Filtration::check_id($_GET['user_id']);
		$goodsId = Filtration::check_id($id);
		$typeId = Filtration::check_id(4);
		
		$model = new History();
        $res = $model->history_find($user_id,$goodsId);
        if($res)
        {
            $res['browse_num']=$res['browse_num']+1;
            $model->history_update($res);
        }
        else{
            $history['goods_id'] = $goodsId;
            $history['user_id'] = $user_id;
            $history['goods_name'] = $goods['goods_name'];
            $history['shop_price'] = $goods['shop_price'];
            $history['market_price'] = $goods['market_price'];
            $history['goods_img'] = $goods['g_img'];
            $model->history_add($history);
        }
        $comment = new Comment();
		$comment_list=$comment->show($goodsId);



		//查询该类商品所有属性
		$sql = 'select attr_id,attr_name,attr_values from mb_attribute where type_id ='.$typeId;
		$attrArr = \Yii::$app->db->createCommand($sql)->queryAll();
		foreach ($attrArr as $key => $value) {
			 $abc = explode("\r\n",$value['attr_values']);
			 $showAttr[$value['attr_name']] = $abc;
		}

		//查询这个商品的详细属性
		$sql = 'select * from mb_goods where g_id ='.$goodsId;
		$goods = \Yii::$app->db->createCommand($sql)->queryAll();
		$goods = $goods[0];

		//判断是否有商品的详细描述信息
		if (empty($goods['describe'])) {
			$goods['describe'] = ['1'=> '暂时没有详细的商品信息'];
		}
		// print_r($attrArr);die;		
		return $this->render('show',compact('showAttr','goods','comment_list'));
	}		



	//获取组合的价格，后期加入商品id 筛选
	public function actionGetVal()
	{	
		$post = \Yii::$app->request->post();
		$query = new Query();

		$id = 2;
		// 循环查询值
		$attr_list = [];

		//循环添加过来的值，进行循环查找，有的话就查group
		foreach ($post['postVal'] as $key=>$value) {
			$selectValue = $query->select(['type_attr_id'])
    			->from('mb_type_attr')
    			->where(['attr_value'=> $value,'goods_id'=>$id])
    			->one();
    			//只要有一条是空，就返回没有
    			if (empty($selectValue)) {
    				return json_encode(['res'=>0,'msg'=>'该商品售罄']);
    			}else{
    				//echo $selectValue['type_attr_id'];
    				$attr_list[] = $selectValue['type_attr_id'];
    			}
		}

			sort($attr_list);
			$attr_list = implode(',', $attr_list);


		//根据列表查出该有的值	
		$returnValue = $query->select(['group_price'])
		    			->from('mb_group')
		    			->where(['attr_list'=> $attr_list,'goods_id'=>$id])
		    			->one();
	    if (empty($returnValue['group_price'])) {
	    	return json_encode(['res'=>0,'msg'=>'该商品售罄']);			
	    }			

		echo json_encode(['res'=>1,'msg'=>$returnValue['group_price']]);			
		
	}




}










