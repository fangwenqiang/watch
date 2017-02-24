<?php

namespace app\controllers\admin;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Nav;  //模型层
use app\lib\Filtration;


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
        $cache = \Yii::$app->cache;
        if(!empty($_POST)){
            $new_file = Filtration::image_upload('./upload_files/','logo.gif',$_FILES['site_logo']);
            if ($new_file){
                $data = Filtration::check_arr(array_slice($_POST,0,12));
                $data ['site_logo'] = $new_file;
                $data ['site_logo_cdk'] = Filtration::breviary($new_file);
                if($cache->set('systemConfig',json_encode($data))){
                    return "配置成功";
                } else {
                    return "配置失败";
                }
            } else {
                return "图片配置失败";
            }
        }
        $info = json_decode($cache->get("systemConfig"),true);
        if(!empty($info)){
            $data['code'] = 1;
            $data['msg'] = $info;
        } else {
            $data['code'] = 0;
        }
        return $this->render('system',array('data'=>$data));
    }

}