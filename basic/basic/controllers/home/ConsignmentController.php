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
        $data = $consignment_model->selectAll(10);
        return $this->render('index',$data);
    }
    /*
     * 我的寄卖
     */
    public function actionMy_apply()
    {
        //查询寄卖品
        $consignment_model = new Consignment();
        $data = $consignment_model->selectAll(3);
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
      $score=array();
      foreach($a as $k => $v){
          $score[$k]=$v[$filed];
      }
      array_multisort($score,$a);
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



}
