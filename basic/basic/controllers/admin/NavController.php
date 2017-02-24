<?php

namespace app\controllers\admin;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Nav;  //模型层
use app\lib\Filtration;

class NavController extends Controller
{
    public $nav_model;
    //后台公共视图
    public  $layout = '/background';
    /*
     * 导航-->系统设置
     */
    public function init()
    {
       $this->nav_model = new Nav();
    }
    /*
     * 子栏-->自定义导航栏
     */
    public function actionIndex()
    {
        return $this->render('nav',array('data'=>$this->nav_model->nav_List()));
    }

    /*
     * 删除
     */
    public function actionNav_del()
    {
        $id = Filtration::check_id($_POST['id']);
        return $this->nav_model->nav_del($id);
    }

    /*
     * 编辑页面  修改导航
     */
    public function actionNav_compile()
    {
        if(!empty($_POST)){
            if($this->nav_model->add_Nav(Filtration::check_arr($_POST),1)){
                return "修改成功";
            } else {
                return "修改失败";
            }
        }
        $id = Filtration::check_id($_GET['id']);
        $arr = $this->nav_model->selectOne($id);
        $data = $this->nav_model->nav_List("where nav_place=$arr[nav_place]");
        return $this->render('Navcompile',array('arr'=>$arr,'data'=>$data));
    }

    /*
     * 导航页面  添加导航
    */
    public function actionAdd_nav()
    {

        if(!empty($_POST)){
            if($this->nav_model->add_Nav(Filtration::check_arr($_POST),0)){
                return "添加成功";
            } else {
                return "添加失败";
            }
        }
        return $this->render('addnav');
    }

    /*
     * ajax 条件返回导航数据
     */
    public function actionNav_data()
    {
        $nav_place = Filtration::check_id($_POST['nav_place']);
        return json_encode($this->nav_model->nav_List("where nav_place=$nav_place"));
    }

}
