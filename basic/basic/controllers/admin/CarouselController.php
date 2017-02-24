<?php
/** 
  * 轮播图
  */
namespace app\controllers\admin;

use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\Carousel;
use app\models\CarouselForm;


class CarouselController extends Controller
{
    //后台公共视图
    public  $layout = '/background';

    /*
     * 轮播图主页
     * @return html 
     */
    public function actionIndex()
    {
        $carousel = new Carousel();
        if (Yii::$app->request->isPost) {

            $carousel->image = UploadedFile::getInstance($carousel, 'image');

            var_dump($_POST);exit;
            if ($path=$carousel->upload()) {
                // 文件上传成功
                echo "<script>alert('上传成功');</script>";
            }
        }
        return $this->render('carousel',['carousel'=>$carousel]);
       
    }

    /**
     * 图片上传
     * @return string
     */
    public function actionUpload()
    {
        $carousel = new Carousel();
        $carousel->image = UploadedFile::getInstance($carousel, 'image');
        if ($path=$carousel->upload()) {
            // 文件上传成功
            echo "<script>alert('上传成功');</script>";
        }else{
            echo 'shib';
        }
    }

 
}
