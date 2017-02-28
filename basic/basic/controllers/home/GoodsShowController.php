<?php 
namespace app\controllers\home;
use Yii;
use yii\web\Controller;
use app\lib\Functions\Filtration;
use app\models\Collect;
use app\models\History; 
/*
* 前台商品展示控制器
  0227  龚洋
*/
class GoodsShowController extends CommonController
{
    static public $chainMysql;

    // 后台公共视图
    public  $layout = '/proscenium';
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
        self::$chainMysql?self::$chainMysql:\Yii::$app->db->createCommand();
        $user_id=2;
        $goodsId = Filtration::check_id(2);
        $typeId = Filtration::check_id(4);

        //查询该商品所有属性
        $sql = 'select attr_id,attr_name,attr_values from mb_attribute where type_id ='.$typeId;
        $attrArr = \Yii::$app->db->createCommand($sql)->queryAll();
        $sql = 'select * from mb_goods where g_id ='.$goodsId;
        $goods = \Yii::$app->db->createCommand($sql)->queryAll();
        $goods = $goods[0];
        $model=new History();
        $res=$model->history_find($user_id,$goodsId);
        if($res)
        {
            $res['browse_num']=$res['browse_num']+1;
            $model->history_update($res);
        }
        else{
            $history['goods_id']=$goodsId;
            $history['user_id']=$user_id;
            $history['goods_name']=$goods['goods_name'];
            $history['shop_price']=$goods['shop_price'];
            $history['market_price']=$goods['market_price'];
            $history['goods_img']=$goods['g_img'];
            $model->history_add($history);
        }

        //判断是否有商品的详细描述信息
        if (explode(',', $goods['describe']) && (!empty($goods['describe'])) ) {
            $goods['describe'] =  explode(',', $goods['describe']);
        }else{
            $goods['describe'] = ['1'=> '暂时没有详细的商品信息'];
        }



        // print_r($attrArr);die;       
        return $this->render('show',compact('attrArr','goods'));

    }       

    //获取组合的价格
    public function actionGetGroupPrice()
    {   
        

    }




}





















