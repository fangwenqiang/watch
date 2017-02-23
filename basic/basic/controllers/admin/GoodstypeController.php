<?php

namespace app\controllers\admin;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Goodstype;  //模型层
use app\models\Attribute;  //模型层


class GoodstypeController extends Controller
{

	//后台公共视图
    public  $layout = '/background';
    public  $model;


    public function init()
    {
        $this->model = new Goodstype();
    }


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
            $res = $this->model->addData($request->post());
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
        $data = $this->model->selectData();

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
        $request = Yii::$app->request;
        if ($request->isPost) {
            $data = $request->post();
            $res = $this->model->updateData($data);
            if($res){
                return $this->redirect(['admin/goodstype/msg', ['msg' => '修改成功','url'=>'/admin/goodstype/show']]);
            }else{
                return $this->redirect(['admin/goodstype/msg',['msg' => '修改失败','url'=>'/admin/goodstype/show']]);
            }
        }else{
            $type_id = $request->get('type_id');
            $data = $this->model->findData(['type_id'=>$type_id]);

            return $this->render('update',['data'=>$data]);  
        }
    }



     /**
     * 商品类型删除
     *
     * @param 
     * @author pjp
     */
    public function actionDelete()
    {
        $request = Yii::$app->request;
        $type_id = $request->get('type_id');
        $res = $this->model->deleteData($type_id);
        if($res){
          return $this->redirect(['admin/goodstype/msg', ['msg' => '删除成功','url'=>'/admin/goodstype/show']]);
        }else{
          return $this->redirect(['admin/goodstype/msg',['msg' => '删除失败','url'=>'/admin/goodstype/show']]);
        }
    }



     /**
     * 商品属性列表
     *
     * @param 
     * @author pjp
     */
    public function actionAttribute_show()
    {
        //查询属性数据
        $attribute = new Attribute();
        $data = $attribute->selectData();

        return $this->render('attribute_show',['data'=>$data]);
    }


     /**
     * 商品属性添加
     *
     * @param 
     * @author pjp
     */
    public function actionAttribute_add()
    {
        $request = Yii::$app->request;
        $attribute = new Attribute();
        if ($request->isPost){
            $res = $attribute->addData($request->post());
            if($res){
              return $this->redirect(['admin/goodstype/msg', ['msg' => '添加成功','url'=>'/admin/goodstype/attribute_show']]);
            }else{
              return $this->redirect(['admin/goodstype/msg',['msg' => '添加失败','url'=>'/admin/goodstype/attribute_add']]);
            }
        }else{
            //查询商品类型
            $data = $this->model->selectData();

            return $this->render('attribute_add',['data'=>$data]);    
        }
    }


     /**
     * 商品属性修改
     *
     * @param 
     * @author pjp
     */
    public function actionAttribute_update()
    {
        $attribute = new Attribute();
        $request = Yii::$app->request;
        if ($request->isPost) {
            $data = $request->post();
            $res = $attribute->updateData($data);
            if($res){
                return $this->redirect(['admin/goodstype/msg', ['msg' => '修改成功','url'=>'/admin/goodstype/attribute_show']]);
            }else{
                return $this->redirect(['admin/goodstype/msg',['msg' => '修改失败','url'=>'/admin/goodstype/attribute_show']]);
            }
        }else{
            $attr_id = $request->get('attr_id');
            $data = $attribute->findData(['attr_id'=>$attr_id]);
            //查询商品类型
            $goodstype = $this->model->selectData();

            return $this->render('attribute_update',['data'=>$data,'goodstype'=>$goodstype]);  
        }
    }



     /**
     * 商品属性删除
     *
     * @param 
     * @author pjp
     */
    public function actionAttribute_delete()
    {
        $request = Yii::$app->request;
        $attr_id = $request->get('attr_id');
        $attribute = new Attribute();
        $res = $attribute->deleteData($attr_id);
        if($res){
          return $this->redirect(['admin/goodstype/msg', ['msg' => '删除成功','url'=>'/admin/goodstype/attribute_show']]);
        }else{
          return $this->redirect(['admin/goodstype/msg',['msg' => '删除失败','url'=>'/admin/goodstype/attribute_show']]);
        }
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