<?php

namespace app\controllers\admin;

use Yii;
use yii\filters\AccessControl;
use \yii\data\Pagination;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Test;  //模型层
use app\models\Category;  //模型层


class CategoryController extends Controller
{
    //后台公共视图
    public  $layout = '/background';

    /*
     * 分类-->展示页面
     */
    public function actionIndex()
    {
        return $this->render('add');
    }

    /*
     * 分类-->展示页面
     */
    public function actionList()
    {
        $model=new Category;
        $cate_data=$model->cateAll();
        return $this->render('list',['cate_data'=>$cate_data]);
    }

    /*
     * 分类-->修改操作
     */
    public function actionUpdate()
    {
        $model = new Category();
        if(Yii::$app->request->isPost && $model->validate()) {
            $post = Yii::$app->request->post();
            if(empty($post['gt_name'])) {
                die('分类名称不能为空');
            }
            if(empty($post['gt_outlink'])) {
                die('链接地址不能为空');
            }
            if(empty($post['gt_sort'])) {
                die('排序不能为空');
            }
            unset($post['_csrf']);
            $res = $model->cateUpdate($post);
            if($res) {
                Yii::$app->session->addFlash('success','修改成功');
                $this->redirect(\yii\helpers\Url::toRoute(['list']));
            } else {
                Yii::$app->session->addFlash('error','修改失败');
                $this->redirect(\yii\helpers\Url::toRoute(['list']));
            }

        } else {
            $id = Yii::$app->request->get('id');
            
            $cate = $model->cateOne($id);
            $cate_data=$model->cateAll();
            $name = $model->getall($cate_data);
            return $this->render('update',['cate'=>$cate,'name'=>$name]);
        }
    }

    /*
     * 分类-->修改操作
     */
    public function actionDelete()
    {
        $id = Yii::$app->request->get('id');
        $model = new Category();
        $res = $model->cateDel($id);
        if($res) {
            Yii::$app->session->addFlash('success','删除成功');
            $this->redirect(\yii\helpers\Url::toRoute(['list']));
        } else {
            Yii::$app->session->addFlash('error','删除失败');
            $this->redirect(\yii\helpers\Url::toRoute(['list']));
        }
    }
    /*
     * 分类-->添加操作
     */
    public function actionAdd()
    {
        $model = new Category();
        if(Yii::$app->request->isPost && $model->validate())
        {
            $post=Yii::$app->request->post();
            if(empty($post['gt_name'])) {
                die('分类名称不能为空');
            }
            if(empty($post['gt_outlink'])) {
                die('链接地址不能为空');
            }
            if(empty($post['gt_sort'])) {
                die('排序不能为空');
            }
            unset($post['_csrf']);
            $res=$model->cateAdd($post);
            if($res)
            {
                Yii::$app->session->addFlash('success','添加成功');
                $this->redirect(\yii\helpers\Url::toRoute(['list']));
            }
            else
            {
                Yii::$app->session->addFlash('error','添加失败');
                $this->redirect(\yii\helpers\Url::toRoute(['list']));
            }
            
        } else {
            $cate_data=$model->cateAll();
            $cate=$model->getall($cate_data);
            return $this->render('add',['cate'=>$cate]);
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
        $model = new Test();
        echo $model->test();
    }
    
}
