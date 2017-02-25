<?php

namespace app\controllers\admin;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Nav;  //模型层
use app\lib\Functions\Filtration;


class SystemController extends CommonController
{
    public $nav_model;
    //后台公共视图
    public $layout = '/background';
    /*
     * 系统设置
     */
    public function actionIndex()
    {
        $data = Filtration::check_arr(array_slice($_POST,0,12));
        $cache = \Yii::$app->cache;
        if(!empty($_POST)){
            //判断是否上传文件,是的话读取原文件内容
            if($_FILES['site_logo']['tmp_name'] == ''){
                $new_file = true;
                $info = json_decode($cache->get("systemConfig"),true);
                $data ['site_logo'] = $info['site_logo'];
                $data ['site_logo_cdk'] = $info['site_logo_cdk'];
            } else {
                $new_file = Filtration::image_upload('./public/admin/upload_files/','logo.gif',$_FILES['site_logo']);
                $data ['site_logo'] = "upload_files/logo.gif";
                Filtration::breviary($new_file,240);
                $data ['site_logo_cdk'] = "upload_files/cdk_logo.gif";
            }
           //判断文件是否上传成功
            if ($new_file){
                if($cache->set('systemConfig',json_encode($data))){
                    return $this->success('admin/system/index');
                } else {
                    return $this->error('配置失败');

                }
            } else {
                return $this->error('图片配置失败');
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