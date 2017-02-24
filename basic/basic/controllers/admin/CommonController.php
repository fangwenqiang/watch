<?php

namespace app\controllers\admin;

use Yii;
use app\models\Admin;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\Session;


class CommonController extends Controller
{

    public function init()
    {
        $session = \Yii::$app->session;
        $user_session = $session->get('user');
        if (!isset($user_session)) {
            $this->redirect(array('/admin/login/login'));
        }

    }
}