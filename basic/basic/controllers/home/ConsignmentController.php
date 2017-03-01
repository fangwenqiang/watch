<?php

namespace app\controllers\home;

use Yii;
use app\models\Consignment;  //模型层
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
        //查询寄卖品
        $consignment_model = new Consignment();
        $data = $consignment_model->selectAll2(3);
        return $this->render('my_apply',$data);
    }

   /*
    * 寄卖说明
    */
    public function actionConsult()
    {
        return $this->render('consult');
    }

   public function sort($a,$filed)
    {
        return $a['data'];
      $score=array();

    }
    /*
     * 立即寄卖
     */
    public function actionApply()
    {

        return $this->render('apply');
    }

    /*
     * 添加寄卖品
     */
    public function actionAdd()
    {
        $consignment_model = new Consignment();
        $session = Yii::$app->session;
        $request =  \Yii::$app->request->post();
        $path = Filtration::image_upload('./uploads/',time().'.jpg',$_FILES['g_img']);
        if($path){
            array_pop($request);
            $request['g_img'] = '../.'.$path;
            $request['add_time'] = time();
//            $request['user_id'] = $session->get('user_id');
            $request['user_id'] = 1;
            if($consignment_model->dataInsert($request)){
                 echo "添加成功";
            } else {
                echo '添加失败';
            }
        } else {
            echo '添加失败';
        }
    }


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


}
