<?php

namespace app\controllers\home;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Collect;  //模型层


class GoodsShowController extends Controller
{
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
}
