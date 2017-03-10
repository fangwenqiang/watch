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
use app\models\gongyang\Goods;

/*
 * 前台商品展示控制器
 * 0227	龚洋
 */
class GoodsShowController extends CommonController
{

	static public $chainMysql;
	
	public  $layout = './proscenium';
	

	static public  $startSet;
	static public $startModel; 

	//开始设置的参数
	public function start()
	{
		self::$startSet = Goods::set();
		self::$startModel = new Goods();
	}

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

    public function actionDelCart()
    {
    	$this->start();
    	$cart_id = self::$startSet['request']->get('id');
    	
    	
    	$res = \Yii::$app->db->createCommand()->delete('mb_cart', 'cart_id ='.$cart_id)->execute();

    	if ($res) {
    		echo 1;
    	}else{
    		echo 2;
    	}

    	

    }
	
	public function actionAdd_comment()
	{
		$post = \Yii::$app->request->post();
		$uploads_dir = './public/home/Images';
		foreach ($_FILES["file"]["error"] as $key => $error) { 
		    if ($error == UPLOAD_ERR_OK) {
		        $tmp_name = $_FILES["file"]["tmp_name"][$key]; 
		        $name = $_FILES["file"]["name"][$key];
						$post["comment_img".($key+1)]='images/14533_49442.jpg';
		        $res=move_uploaded_file($tmp_name, "$uploads_dir/$name"); 
		    }
		}
		$post['time']=time();
		$post['comment_people']=$_SESSION['user_name'];
		$model =new Comment();
		$res=$model->commentAdd($post);
		if($res){
			return $this->redirect(['admin/brand/msg',['msg' => '评论成功','url'=>'/home/personal/my_comment']]);
		}
		else{
			return $this->redirect(['admin/brand/msg',['msg' => '评论失败','url'=>'/home/personal/my_order']]);
		}
		
	}
		
    public function actionCarShow()
    {
		$user_id = Filtration::check_id(\Yii::$app->session->get('user_id'));
		$sql = 'select * from mb_cart where user_id ='.$user_id;
			$cartShow = \Yii::$app->db->createCommand($sql)->queryAll();
			$sql = 'SELECT sum(num*price) FROM `mb_cart` where user_id=1';
			$priceSum = \Yii::$app->db->createCommand($sql)->queryAll();
			$priceSum = $priceSum[0]['sum(num*price)'];
			
		return 	$this->render('car',compact('cartShow','priceSum'));
    }


	//商品展示
	public function actionShow()
	{
		self::$chainMysql?self::$chainMysql:\Yii::$app->db->createCommand();

		$id = $_GET['id'];
		$session = \Yii::$app->session;
		if(empty($session->get('user_id'))) {
				$user_id = 2;
		}else {
				$user_id =  $session->get('user_id');
		}

		$goodsId = Filtration::check_id($id);
		$typeId = Filtration::check_id(4);

		//查询这个商品的详细属性
		$sql = 'select * from mb_goods where g_id ='.$goodsId;
		$goods = \Yii::$app->db->createCommand($sql)->queryAll();
		$goods = $goods[0];
		
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
		$sql = 'select attr_id,attr_name,attr_values from mb_attribute where type_id = 4';
		$attrArr = self::$startModel->sql($sql);
		
		foreach ($attrArr as $key => $value) {
			 $abc = explode("\r\n",$value['attr_values']);
			 $showAttr[$value['attr_name']] = $abc;
		}

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
		$this->start();

		$post = self::$startSet['request']->post();
		$query = new Query();
		
		$id = 2;
		// 循环查询值
		$attr_list = [];
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
		$returnValue = $query->select(['group_price','goods_sn'])
		    			->from('mb_group')
		    			->where(['attr_list'=> $attr_list,'goods_id'=>$id])
		    			->one();

	    if (empty($returnValue['group_price'])) {
	    	return json_encode(['res'=>0,'msg'=>'该商品售罄']);			
	    }			

		self::$startSet['session']->set('goods_sn',$returnValue['goods_sn']);
		self::$startSet['session']->set('group_price',$returnValue['group_price']);

		echo json_encode(['res'=>1,'msg'=>$returnValue['group_price']]);			
		
	}



	public function actionCart()
	{
		$this->start();
		if (empty(self::$startSet['session']->get('user_id'))) {
			echo  "请先登陆";
		}

		$cartInsert['goods_sn'] = self::$startSet['session']->get('goods_sn');
		$cartInsert['price'] = self::$startSet['session']->get('group_price');
		$cartInsert['user_id'] = self::$startSet['session']->get('user_id');
		$cartInsert['num']	= self::$startSet['request']->get('goods_num');
		$res = \Yii::$app->db->createCommand()->insert('mb_cart',$cartInsert)->execute();
	
	
		$cartInsert['goods_sn'] = \Yii::$app->session->get('goods_sn');
		$cartInsert['price'] = \Yii::$app->session->get('group_price');
		$cartInsert['user_id'] = \Yii::$app->session->get('user_id');
		$cartInsert['num']	= Filtration::check_id($_GET['goods_num']);
		$res = \Yii::$app->db->createCommand()->insert('mb_cart',$cartInsert)->execute();
		if ($res) {
				echo '加入购物车成功';
		}else{
				echo '请登陆后试试';
		}
	}
	/*
     * 商品评论
     */
    public function actionGoods_comment()
    {
        $goods_id = \Yii::$app->request->get('goods_id');
		return $this->render('goods_comment',['goods_id'=>$goods_id]);
    }


}
