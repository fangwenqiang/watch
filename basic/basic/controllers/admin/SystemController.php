<?php

namespace app\controllers\admin;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Nav;  //模型层


class SystemController extends Controller
{
    public $nav_model;
    //后台公共视图
    public $layout = '/background';
    /*
     * 系统设置
     */
    public function actionIndex()
    {
        if(!empty($_POST)){
            $data = $this->check_arr(array_slice($_POST,0,12));
            $cache = \Yii::$app->cache;
            if($cache->set('systemConfig',json_encode($data))){
                return "配置成功";
            } else {
                return "配置失败";
            }
        }
        return $this->render('system');
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