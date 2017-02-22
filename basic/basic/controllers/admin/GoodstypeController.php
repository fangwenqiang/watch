<?php

namespace app\controllers\admin;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Goodstype;  //模型层


class GoodstypeController extends Controller
{

	//后台公共视图
    public  $layout = '/background';


	 /**
	 * 商品类型添加
	 *
	 * @param 
	 * @author pjp
	 */
    public function actionAdd()
    {
        $request = Yii::$app->request;
        if ($request->isPost){
            $model = new Goodstype();
            $res = $model->add($request->post());
            if($res){
              return $this->redirect(['admin/goodstype/msg', ['msg' => '添加成功','url'=>'/admin/goodstype/show']]);
            }else{
              return $this->redirect(['admin/goodstype/msg',['msg' => '添加失败','url'=>'/admin/goodstype/add']]);
            }
        }else{

            return $this->render('add');    
        }
    }


     /**
     * 商品类型展示
     *
     * @param 
     * @author pjp
     */
    public function actionShow()
    {
        //查询数据
        $model = new Goodstype();
        $data = $model->select();

        return $this->render('show',['data'=>$data]);
    }



     /**
     * 商品类型修改
     *
     * @param 
     * @author pjp
     */
    public function actionUpdate()
    {
        //查询数据
        $model = new Goodstype();
        $data = $model->select();

        return $this->render('show',['data'=>$data]);
    }



     /**
     * 商品类型删除
     *
     * @param 
     * @author pjp
     */
    public function actionDelete()
    {
        //查询数据
        $model = new Goodstype();
        $data = $model->select();

        return $this->render('show',['data'=>$data]);
    }


    /**
    * 页面跳转提示
    *
    * @param
    * @author pjp
    */
    public function actionMsg()
    {
        $request = Yii::$app->request;

        return $this->render('/error/msg',$request->get('1'));
    }


}