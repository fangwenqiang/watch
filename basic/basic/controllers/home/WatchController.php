<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/27
 * Time: 8:46
 */

namespace app\controllers\home;

use app\models\Brand;
use app\models\Goods;
use yii\data\Pagination;

class WatchController extends CommonController{

    public $layout = '/proscenium';
    public $onePage = '8';  //每页显示条数

    /*
     * 男士手表展示
     * */
    public function actionBoylist()
    {
        $gt_id = 2; //男士手表分类ID
        $goods = new Goods();   //商品
        $order = 'ASC';
        $data['goodsList'] = $goods->showType(2,$order);
        $data['brandList'] = $this->BrandAll(); //查询品牌
        $count = Goods::find()->where(['is_show'=>'1','gt_id'=>$gt_id])->count();    //数据总条数
        $data['pageStr'] = $this->pageStr($count,$this->onePage);
        return $this->render('boy',['data'=>$data,'gt_id'=>$gt_id]);
    }

    /*
     * 女士手表展示
     * */
    public function actionGirllist()
    {
        $gt_id = 3; //女士手表分类ID
        $goods = new Goods();   //商品
        $order = 'ASC';
        $data['goodsList'] = $goods->showType(3,$order);
        $data['brandList'] = $this->BrandAll(); //查询品牌
        $count = Goods::find()->where(['is_show'=>'1','gt_id'=>$gt_id])->count();    //数据总条数
        $data['pageStr'] = $this->pageStr($count,$this->onePage);
        return $this->render('girl',['data'=>$data,'gt_id'=>$gt_id]);
    }

    /*
     * 特价手表展示
     * */
    public function actionSpeciallist()
    {
        $this->onePage = '12';
        $goods = new Goods();   //商品
        $order = 'ASC';
        $data['goodsList'] = $goods->speciallistShow($this->onePage); //查询处理展示商品
        $count = Goods::find()->where(['is_promote'=>'1'])->count();    //数据总条数
        $data['pageStr'] = $this->pageStr($count,$this->onePage);
        return $this->render('tejia',['data'=>$data]);
    }

    /*
     * 展示品牌等级  名称
     * */
    public function BrandAll()
    {
        $brand = new Brand();
        $brandList = $brand->brandWhere('is_show','1');
        foreach($brandList as $key=>$val){
            if($val['sort'] == 1){
                $brandList[$key]['sort'] = '[顶级]';
            }elseif($val['sort'] == 2){
                $brandList[$key]['sort'] = '[高档]';
            }elseif($val['sort'] == 3){
                $brandList[$key]['sort'] = '[中档]';
            }elseif($val['sort'] == 4){
                $brandList[$key]['sort'] = '[时尚]';
            }
        }
        return $brandList;
    }

    /*
     * 搜索 排序
     * */
    public function actionSearch()
    {
        $goods = new Goods();   //商品
        $brand = new Brand();   //品牌
        $request = \Yii::$app->request;
        $data = $request->get();
        //如果是男士或者女士手表展示界面 则分类查询商品
        if(!empty($data['gt_id'])){
            $gt_id = $data['gt_id'];
            $gt_name = 'gt_id';
        }
        // 如果是促销界面  则查询促销产品
        if(!empty($data['limit'])){
            $this->onePage = $data['limit'];
            $gt_name = 'is_promote';
            $gt_id = '1';
        }
        $p = $data['p'];    //当前页

        $brand_id = isset($data['brand_id']) ? $data['brand_id'] : null;  //品牌ID

        // 根据商品名称获取商品ID
        if(!empty($data['brand_name'])){
            $dataBrand = $brand->brandId($data['brand_name']);
            if(empty($dataBrand)){
                die(json_encode(array('res'=>'1','msg'=>'暂时没有该相似品牌')));
            }else{
                $brand_id = $dataBrand['brand_id'];
            }
        }
        //判断排序方式
        $order = 'DESC';    //默认排序方式
        if(!empty($data['sort'])){
            if($data['sort'] == 0){
                $orderField = 'shop_price';
            }else if($data['sort'] == 1){
                $orderField = 'shop_price';
                $order = 'ASC';
            }else if($data['sort'] == 2){
                $orderField = 'click_count';
            }else if($data['sort'] == 3){
                $orderField = 'add_time';
            }
        }else{
            $orderField = 'shop_price'; //默认排序字段
        }

        // 获取当前页 计算偏移量
        if(empty($p)){
            $limit = '0';
        }else{
            $limit = ($p-1)*$this->onePage; //偏移量
        }
        $data['goodsList']= $goods->showBrand($order,$orderField,'brand_id',$brand_id,$limit,$gt_name,$gt_id,$this->onePage);

        if(empty($data['goodsList'])){
            die(json_encode(array('res'=>'1','msg'=>'该品牌下暂时没有商品')));
        }
        // 判断是否有条件 获取相应的商品数量
        if(is_numeric($brand_id)){
            $count = Goods::find()->where(['is_show'=>'1','gt_id'=>$gt_id,'brand_id'=>$brand_id])->count();    //数据总条数
        }else{
            $count = Goods::find()->where(['is_show'=>'1',$gt_name=>$gt_id])->count();    //数据总条数
        }

        $data['pageStr'] = $this->pageStr($count,$this->onePage,$p);
        die(json_encode($data));
    }

    /*
     * 分页
     * */
    function pageStr($count,$onePage,$p= 1)
    {
        $sunPage = ceil($count/$onePage) ;//总页数
        $limitPage = 5; //想要显示的页码数
        $offsetPage = ($limitPage-1)/2; //显示页码数偏移量
        $start = '1';   //初始化起始位置
        $end = $sunPage;    //结束位置
        //上一页
        $upPage = $p - 1 < 1 ? 1 : $p - 1;
        //下一页
        $nextPage = $p + 1 > $sunPage ? $sunPage : $p + 1;
        $pageStr = '<div class="page">';
        if($p > 1){
            $pageStr .='<a href="javascript:page(1)">首页</a>&nbsp;';
            $pageStr .='<a href="javascript:page('.$upPage.')">上一页</a>&nbsp;';
        }else{
            $pageStr .='<span class="disable">首页</span>';
            $pageStr .='<span class="disable">上一页</span>';
        }
        //总页数大于想要显示的页码数
        if($sunPage > $limitPage){
            //当前页大于显示页码偏移量前面加省略号
            if($p > $offsetPage+1){
                $pageStr .= '...';
            }
            //如果当前页大于 显示页码偏移量 开始位置为当前页-显示页码偏移量
            if($p > $offsetPage){
                $start = $p-$offsetPage;
                $end = $sunPage > $p+$offsetPage ? $p+$offsetPage : $sunPage;
            }else{
                $start = 1;
                $end = $sunPage > $limitPage ? $limitPage : $sunPage;
            }
            if($p + $offsetPage > $sunPage){
                $start = $start - ($p + $offsetPage - $end);
            }
        }
        //显示页码
        for($i = $start; $i<=$end; $i++){
            if($p == $i){
                $pageStr .= '<span class="current">'.$i.'</span>';
            }else{
                $pageStr .= '<a href="javascript:page('.$i.')">'.$i.'</a>';
            }
        }
        if($sunPage > $limitPage && $sunPage > $p + $offsetPage){
            $pageStr .= '...';
        }
        if($p < $sunPage){
            $pageStr .='<a href="javascript:page('.$nextPage.')">下一页</a>&nbsp;';
            $pageStr .='<a href="javascript:page('.$sunPage.')">尾页</a>&nbsp;';
        }else{
            $pageStr .='<span class="disable">下一页</span>';
            $pageStr .='<span class="disable">尾页</span>';
        }
        $pageStr .='第'.$p.'页/共'.$sunPage.'页';
        $pageStr .='</div>';
        return $pageStr;
    }

}