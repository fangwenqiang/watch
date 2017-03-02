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
use app\lib\getThumb;


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
        $request = Yii::$app->request;
        $sortStatus = $request->get('sortStatus',0);  //是否排序

        if (Yii::$app->request->isPost) {
            $carousel->image = UploadedFile::getInstance($carousel, 'image');

            if ($path=$carousel->upload()) {
                $sort = $request->post('sort');
                $isShow = $request->post('is_show');
                //判断排序数据类型
                if(!preg_match("/^\d{1,10}$/",$sort)) {
                    unlink($path);
                    return $this->error('请输入1-10位排序数字');
                }
                //编辑缩略图名称
                $imgName = substr($path,strrpos($path,'/')+1);
                $imgPath = substr($path,0,strrpos($path,'/'));
                $arr = explode( '.',$imgName);
                $thumbName = $imgPath.'/'.$arr[0].'_thumb.'.$arr[1];
                //缩略图
                $getThumb = new getThumb();
                $getThumb->set_config(['width' => 80,'height' => 60, ]);
                $flag=$getThumb->create_thumb($path, $thumbName);
                if(!$flag) {
                    unlink($path);
                    return $this->error('创建缩略图失败');
                }
                //数据添加
                $id = $this->add(['sort'=>$sort,'isShow'=>$isShow,'path'=>$path,'thumbName'=>$thumbName]);
                if(!$id) {
                    unlink($path);
                    return $this->error('出错了');
                } else {
                    return $this->success('admin/carousel/index');
                }
            }
        }
        $list = $this->select($sortStatus);
        $list['carousel'] = $carousel;
        return $this->render('carousel',$list);
       
    }

    /**
     * 添加
     * @param $data array 添加的数据
     * @return mixed
     */
    protected function add($data)
    {
        $carousel = new CarouselForm();
//        $carousel->isNewRecord = true;
//        $carousel->setAttributes($data);
//        return $carousel->save();
//        ->createCommand()->getRawSql()
        $carousel->path = $data['path'];
        $carousel->is_show = $data['isShow'];
        $carousel->sort = $data['sort'];
        $carousel->thumb = $data['thumbName'];
        $carousel->save();
        return $carousel->carousel_id;

    }

    /**
     * 查询
     * @param $sortStatus int 是否排序
     * @return mixed
     */
      protected function select($sortStatus)
     {
         $order = 'sort';
         if($sortStatus) $order = 'sort desc';
         $query = CarouselForm::find()->orderBy($order);
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
        if ($field == 'is_show'){
            if($val == '是') {
                $val = 1;
            }elseif($val == '否'){
                $val = 0;
            } else{
                return 0;
            }
        } elseif ($field == 'sort') {
            if(!preg_match("/^\d{1,10}$/",$val)) return 0;
        }
        $res=$carousel->updateAll([$field=>$val],'carousel_id=:id',[':id'=>$id]);
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
