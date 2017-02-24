<?php

namespace app\controllers\admin;

use Yii;
use yii\filters\AccessControl;
use \yii\data\Pagination;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Test;  //模型层
use app\models\Brand;  //模型层


class BrandController extends CommonController
{
    //后台公共视图
    public  $layout = '/background';

    /*
     * 品牌-->展示页面
     */
    public function actionIndex()
    {
        return $this->render('add');
    }

    /*
     * 品牌-->展示页面
     */
    public function actionList()
    {
        $model=new Brand;
        //得到全部品牌下的数据
        $brand_list=$model->brandAll();
        return $this->render('list',['brand_list'=>$brand_list]);
    }

    /*
     * 品牌-->修改操作
     */
    public function actionUpdate()
    {
        $model=new Brand();
        if(Yii::$app->request->isPost && $model->validate()) {
            $post=Yii::$app->request->post();
            //调用上传方法
            $post['brand_logo']=$model->brandUpload($_FILES['brand_logo']);
            //判断前台接收的数据
            if(empty($post['brand_name'])) {
                return $this->redirect(['admin/brand/msg', ['msg' => '品牌名称不能为空','url'=>'/admin/brand/update']]);
            }
            if(empty($post['brand_desc'])) {
                return $this->redirect(['admin/brand/msg', ['msg' => '品牌介绍不能为空','url'=>'/admin/brand/update']]);
            }
            if(empty($post['sort'])) {
                return $this->redirect(['admin/brand/msg', ['msg' => '排序不能为空','url'=>'/admin/brand/update']]);
            }
            if(!is_integer($post['sort'])) {
                return $this->redirect(['admin/brand/msg', ['msg' => '排序必须为数字','url'=>'/admin/brand/update']]);
            }
            //删除csrf 因为yii框架的方法不过率
            unset($post['_csrf']);
            //调用修改方法
            $res=$model->brandUpdate($post);
            if($res) {
                return $this->redirect(['admin/brand/msg', ['msg' => '修改成功','url'=>'/admin/brand/list']]);
            } else {
                return $this->redirect(['admin/brand/msg',['msg' => '修改失败','url'=>'/admin/brand/update']]);
            }

        } else {
            $id = Yii::$app->request->get('id');
            //调用model层下的得到单条数据
            $brand=$model->brandOne($id);
            return $this->render('update',['brand'=>$brand]);
        }
    }

    /*
     * 品牌-->删除操作
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->get('id');
        $model=new Brand();
        $res = $model->brandDel($id);
        if($res) {
            return $this->redirect(['admin/brand/msg', ['msg' => '删除成功','url'=>'/admin/brand/list']]);
        } else {
            return $this->redirect(['admin/brand/msg',['msg' => '删除失败','url'=>'/admin/brand/list']]);          
        }
    }
    /*
     * 品牌-->添加操作
     */
    public function actionAdd()
    {
        $model = new Brand();
        if(Yii::$app->request->isPost && $model->validate()) {
            $post = Yii::$app->request->post();
            //调用上传方法
            $post['brand_logo']=$model->brandUpload($_FILES['brand_logo']);

            if(empty($post['brand_name'])) {
                return $this->redirect(['admin/brand/msg', ['msg' => '分类名称不能为空','url'=>'/admin/brand/add']]);
            }
            if(empty($post['brand_desc'])) {
                return $this->redirect(['admin/brand/msg', ['msg' => '链接地址不能为空','url'=>'/admin/brand/add']]);
            }
            if(empty($post['sort'])) {
                return $this->redirect(['admin/brand/msg', ['msg' => '排序不能为空','url'=>'/admin/brand/add']]);
            }
            if(!is_integer($post['sort'])) {
                return $this->redirect(['admin/brand/msg', ['msg' => '排序必须为数字','url'=>'/admin/brand/update']]);
            }
            unset($post['_csrf']);
            //调用添加方法
            $res = $model->brandAdd($post);
            if($res) {
                return $this->redirect(['admin/brand/msg', ['msg' => '添加成功','url'=>'/admin/brand/list']]);
            } else {
                return $this->redirect(['admin/brand/msg',['msg' => '添加失败','url'=>'/admin/brand/add']]);
            }
            
        } else {
            $cate_data = $model->brandAll();
            return $this->render('add');
        }
    }

    /*
     * 导航-->系统设置
     */
    public function actionSystem()
    {
        return $this->render('system');
    }

    /*
     * 使用模型层
     */
    public function actionTest()
    {
        $model=new Test();
        echo $model->test();
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
