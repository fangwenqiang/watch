<?php

namespace app\controllers\home;

use Yii;
use app\models\Consignment;  //模型层
use app\models\Bargain;  //模型层
use app\Lib\Functions\Filtration;
class ConsignmentController extends CommonController
{

    //前台公共视图
    public  $layout = '/proscenium';
    /*
     * 什么是寄卖
     */
    public function actionConsign_1()
    {
        return $this->render('consign_1');
    }

    /*
   * 寄卖方式与流程
   */
    public function actionConsign_2()
    {
        return $this->render('consign_2');
    }
    /*
     * 寄卖铺
     */
    public function actionIndex()
    {
        $session = Yii::$app->session;
        if($session->get('user_id') == ''){
            return $this->qt_success('home/login/login','请先登录');
        }
       //查询寄卖品
        $consignment_model = new Consignment();
        if(empty($_GET['search'])){
            $data['data'] = $consignment_model->selectAll(10,'','');
            $data['type'] = 0;
        } elseif($_GET['search'] == 'new'){
            $data['data'] = $consignment_model->selectAll(10,array('add_time'=>SORT_DESC),'');
            $data['type'] = 1;
        } elseif($_GET['search'] == 'credit'){
            $data['data'] = $consignment_model->selectAll(10,array('credit'=>SORT_DESC),'');
            $data['type'] = 2;
        } elseif($_GET['search'] == 'price'){
            $data['data'] = $consignment_model->selectAll(10,array('shop_price'=>SORT_DESC),'');
            $data['type'] = 3;
        }
        $data['page'] = $this->page(Consignment::find()->count(),10);

        return $this->render('index',$data);
    }
    /*
     * 搜索
     */
    public function actionSearch()
    {
        $consignment_model = new Consignment();
        $request = \Yii::$app->request;
        $data = $request->get();
        $where = $data['type'];
        $p = $data['p'];    //当前页
        //偏移量
        if(empty($p)){
            $offset = '';
        } else {
            $offset = ($p-1)*10;
        }
        if($where == 0){
            $data['data'] = $consignment_model->selectAll(10,'',$offset);
        } elseif($where == 1){
            $data['data'] = $consignment_model->selectAll(10,array('add_time'=>SORT_DESC),$offset);
        } elseif($where == 2){
            $data['data'] = $consignment_model->selectAll(10,array('credit'=>SORT_DESC),$offset);
        } elseif($where == 3){
            $data['data'] = $consignment_model->selectAll(10,array('shop_price'=>SORT_DESC),$offset);
        }
        $data['page'] = $this->page(Consignment::find()->count(),10,$p);
        die(json_encode($data));

    }


    /*
     * 我的寄卖
     */
    public function actionMy_apply()
    {
        $request = \Yii::$app->request;
        $type = $request->get('type');
        $session = Yii::$app->session;
        //查询寄卖品
        $consignment_model = new Consignment();
        $data = $consignment_model->selectAll2(3);
        $data['all_count'] = Consignment::find()->where(array('user_id'=>$session->get('user_id')))->count();
        $bargain_model = new Bargain();
        $data['yijia'] = $bargain_model->all();
        $data['yijia_count'] = count($bargain_model->all());
        $data['type'] = 0;
        //查询议价表
        if($type == 1){
            $data['type'] = 1;
        }
        return $this->render('my_apply',$data);
    }

   /*
    * 寄卖说明
    */
    public function actionConsult()
    {
        return $this->render('consult');
    }


    /*
     * 立即寄卖
     */
    public function actionApply()
    {
        $session = Yii::$app->session;
        if($session->get('user_id') == ''){
            return $this->qt_success('home/login/login','请先登录');
        }
        return $this->render('apply');
    }

    /*
     * 添加寄卖品
     */
    public function actionAdd()
    {
        $consignment_model = new Consignment();
        $request =  \Yii::$app->request->post();
        $session = Yii::$app->session;
        $path = Filtration::image_upload('./uploads/',time().'.jpg',$_FILES['g_img']);
        if($path){
            array_pop($request);
            $request['g_img'] = '../.'.$path;
            $request['add_time'] = time();
            $request['user_id'] = $session->get('user_id');
            if($consignment_model->dataInsert($request)){
                 return $this->qt_success('home/consignment/index','寄卖成功，请等待审核');
            } else {
                return $this->qt_error('寄卖失败');
            }
        } else {
            return $this->qt_error('寄卖失败');
        }
    }

   /*
    * 分页连接
    */
    public function page($count,$limit,$p=1)
    {
        //总页数
        $pages = ceil($count/$limit);
        //上一页
        $pre = $p -1 <= 1 ? 1:$p-1;
        //下一页
        $nex = $p +1 >= $pages ? $pages:$p+1;

        $str ='<div id="page_nav"><a href="javascript:page('.$pre.')">上一页</a>&nbsp;<a href="javascript:page('.$nex.')">下一页</a>&nbsp;</div>';

        return $str;
    }


    /*
     * 商品详情
     */
    public function actionGoods()
    {
        $request = \Yii::$app->request;
        $id = $request->get('id');
        $consignment_model = new Consignment();
        $data = $consignment_model->one($id);
        return $this->render('goods',array('data'=>$data));
    }

    //议价
    public function actionBargain()
    {
        $bargain_model = new Bargain();
        $request = \Yii::$app->request;
        $session = Yii::$app->session;
        $id = $request->post('id');
        $price = $request->post('price');
        //判断是否议价
        $consignment_model = new Consignment();
        $arr = $consignment_model->one($id);
        if($session->get('user_id') == $arr['user_id']){
             echo -2;
        } elseif($bargain_model->one($id) != ''){
            echo -1;
        } else {
            if($bargain_model->add($id,$arr['user_id'],$price)){
                echo 1;
            } else {
                echo 0;
            }
        }
    }
}
