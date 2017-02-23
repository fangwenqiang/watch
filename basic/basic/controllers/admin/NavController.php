<?php

namespace app\controllers\admin;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Nav;  //模型层


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
        $id = $this->check_id($_POST['id']);
        return $this->nav_model->nav_del($id);
    }

    /*
     * 编辑页面  修改导航
     */
    public function actionNav_compile()
    {
        if(!empty($_POST)){
            if($this->nav_model->add_Nav($this->check_arr($_POST),1)){
                return "修改成功";
            } else {
                return "修改失败";
            }
        }
        $id = $this->check_id($_GET['id']);
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
            if($this->nav_model->add_Nav($this->check_arr($_POST),0)){
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
        $nav_place = $this->check_id($_POST['nav_place']);
        return json_encode($this->nav_model->nav_List("where nav_place=$nav_place"));
    }


    /*
     * 数组过滤
     */
    public function check_arr($data)
    {
        $arr = array();
        foreach($data as $key=>$val)
        {
            $arr[$key] = $this->check_str($val);
        }
        return $arr;
    }
    /**
     * 检查输入的字符是否合法，合法返回对应id，否则返回false
     * @param string $string
     * @return mixed
     * @author zyb <zyb_icanplay@163.com>
     */
    protected function check_str( $string ) {
        $result = false;
        $var = $this->filter_keyword( $string ); // 过滤sql与php文件操作的关键字
        if ( !empty( $var ) ) {
            if ( !get_magic_quotes_gpc() ) {    // 判断magic_quotes_gpc是否为打开
                $var = addslashes( $string );    // 进行magic_quotes_gpc没有打开的情况对提交数据的过滤
            }
            //$var = str_replace( "_", "\_", $var );    // 把 '_'过滤掉
            $var = str_replace( "%", "\%", $var );    // 把 '%'过滤掉
            $var = nl2br( $var );    // 回车转换
            $var = htmlspecialchars( $var );    // html标记转换
            $result = $var;
        }
        return $result;
    }

    /**
     * 检查输入的数字是否合法，合法返回对应id，否则返回false
     * @param integer $id
     * @return mixed
     * @author zyb <zyb_icanplay@163.com>
     */
    protected function check_id( $id ) {
        $result = false;
        if ( $id !== '' && !is_null( $id ) ) {
            $var = $this->filter_keyword( $id ); // 过滤sql与php文件操作的关键字
            if ( $var !== '' && !is_null( $var ) && is_numeric( $var ) ) {
                $result = intval( $var );
            }
        }
        return $result;
    }

    /**
     * 过滤sql与php文件操作的关键字
     * @param string $string
     * @return string
     * @author zyb <zyb_icanplay@163.com>
     */
    private function filter_keyword( $string ) {
        $keyword = 'select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile';
        $arr = explode( '|', $keyword );
        $result = str_ireplace( $arr, '', $string );
        return $result;
    }
}
