<?php

namespace app\controllers\admin;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Log;  //模型层

class LogController extends Controller
{
    public $log_model;
    //后台公共视图
    public $layout = '/background';

    public function init()
    {
        $this->log_model = new Log();
    }
    /*
     * 日志设置
     */
    public function actionIndex()
    {

        $data = $this->log_model->select_all();
        return $this->render('log',array('data'=>$data));
    }


    /*
     * 记录日志操作
     */
    public function Write($msg)
    {
        $session = Yii::$app->session;
        $data['log_msg'] = $msg;
        $data['log_time'] = time();
        $data['log_ip'] = $_SERVER['REMOTE_ADDR'];
        $data['admin_id'] = $session->get('admin_id');
        $this->log_model->write($data);
    }
}