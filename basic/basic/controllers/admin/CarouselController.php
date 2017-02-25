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
use yii\data\Pagination;


class CarouselController extends CommonController
{
    //后台公共视图
    public  $layout = '/background';

    /*
     * 轮播图主页
     * @return html 
     */
    public function actionIndex()
    {
        $thisUrl = \yii\helpers\Url::toRoute(['admin/carousel/index']);
        $carousel = new Carousel();
        $request = Yii::$app->request;
        $sortStatus = $request->get('sortStatus',0);
        if (Yii::$app->request->isPost) {
            $carousel->image = UploadedFile::getInstance($carousel, 'image');

            if ($path=$carousel->upload()) {
                $sort = $request->post('sort');
                $isShow = $request->post('is_show');
                //判断排序数据类型
                if(!preg_match("/^\d{1,10}$/",$sort)) {
                    unlink($path);
                    return '请输入1-10位排序数字<br>程序2秒后返回'.'<meta http-equiv="Refresh" content="2;url='.$thisUrl.'"/>';
                }
                $carousel = new CarouselForm();
                $carousel->path = $path;
                $carousel->is_show = $isShow;
                $carousel->sort = $sort;
                $carousel->save();
                $id = $carousel->carousel_id;
//                $id = $this->add(['sort'=>$sort,'is_show'=>$isShow,'path'=>$path]);
//                var_dump($id);
//                exit;
                if(!$id) {
                    unlink($path);
                    return '添加失败<br>程序2秒后返回'.'<meta http-equiv="Refresh" content="2;url='.$thisUrl.'"/>';
                } else {
                    return '添加成功<br>程序2秒后返回'.'<meta http-equiv="Refresh" content="2;url='.$thisUrl.'"/>';

                }
            }
        }
        $list = $this->select($sortStatus);
        $list['carousel'] = $carousel;
        return $this->render('carousel',$list);
       
    }

    /**
     * 查询
     * @param $data array 添加的数据
     * @return mixed
     */
    protected function add($data)
    {
        $carousel = new CarouselForm();
        $carousel->isNewRecord = true;
        $carousel->setAttributes($data);
        return $carousel->save()->createCommand()->getRawSql();

     return $carousel->carousel_id;

    }

    /**
     * 查询
     * @param $sortStatus int 是否排序
     * @return mixed
     */
      protected function select($sortStatus)
     {
         $order = 'carousel_id';
         if($sortStatus) $order = 'sort';
         $query = CarouselForm::find()->orderBy($order,'DESC');
         $pages = new Pagination(['totalCount' => $query->count(),'defaultPageSize' => 5]);
         $data = $query->offset($pages->offset)
             ->limit($pages->limit)
             ->asArray()
             ->all();
         return ['page'=>$pages,'data'=>$data];

     }

    /**
     * 即点击该
     */
    public function actionEdit()
    {
        $carousel = new CarouselForm();
        $request = Yii::$app->request;

        $val   = $request->post('val');
        $id    = $request->post('id');
        $field = $request->post('field');
        if($field == 'sort'){
            if($val == '是') $val = 1;
            if($val == '否') $val = 0;
        }
        $res=$carousel->updateAll(["$field"=>$val],'carousel_id=:id',[':id'=>$id]);
        return $res;
    }

    /**
     * 删除
     */
    public function actionDelete()
    {
        $id    = yii::$app->request->post('id');
        $carousel = new CarouselForm();
        $res   = $carousel->deleteAll('carousel_id=:id',[':id'=>$id]);
        return $res;
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
