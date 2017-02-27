<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/27
 * Time: 8:46
 */

namespace app\controllers\home;

use app\models\Brand;
use app\models\Nav;
use yii\web\Controller;

class WatchController extends Controller{

    public $layout = '/proscenium';

    public function actionBoylist()
    {
        $data['brandList'] = $this->BrandAll(); //查询品牌

        return $this->render('boy',['data'=>$data]);
    }

    /*
     * 根据品牌搜索
     * */
    public function actionSearchbrand()
    {

    }

    /*
     * 品牌 搜索 展示
     * */
    public function BrandAll()
    {
        $brand = new Brand();
        $brandList = $brand->brandWhere('is_show','1');

        foreach($brandList as $key=>$val){
            if($val['sort'] == 1){
                $brandList[$key]['sort'] = '[顶级]';
            }elseif($val['sort'] == 2){
                $brandList[$key]['sort'] = '[高档]';
            }elseif($val['sort'] == 3){
                $brandList[$key]['sort'] = '[中档]';
            }elseif($val['sort'] == 4){
                $brandList[$key]['sort'] = '[时尚]';
            }
        }
        return $brandList;
    }
}