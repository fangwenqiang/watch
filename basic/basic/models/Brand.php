<?php
namespace app\models;
use Yii;

class Brand extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'mb_brand';
    }
    /*
     * 测试的方法
     */
    public function test()
    {
        return "欢迎使用后台模型";
    }
    /*
     * 品牌-->查看单挑数据
     */
    public function brandOne($id)
    {
    	$data = Brand::find()->where(['brand_id'=>$id])->one(); 
    	if($data)
    	{
    		return $data;
    	}
    	else
    	{
    		return false;
    	}
    }
    /*
     * 品牌-->修改操作
     */
    public function brandUpdate($post)
    {
    	
    	$res = Yii::$app->db->createCommand()->update('mb_brand',$post, 'brand_id=:id', array(':id' => $post['brand_id']))->execute();
    	if($res)
    	{
    		return true;
    	}
    	else
    	{
    		return false;
    	}
    }
    /*
     * 品牌-->查看全部数据
     */
    public function brandAll()
    {
    	$data = Brand::find()->asArray()->all(); 
    	if($data)
    	{
    		return $data;
    	}
    	else
    	{
    		return false;
    	}
    }
    /*
     * 品牌-->删除单条数据
     */
    public function brandDel($id)
    {
        $res = Yii::$app->db->createCommand()->delete('mb_brand','brand_id=:id', array(':id' => $id))->execute();
        if($res)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    /*
     * 品牌-->添加数据
     */
    public function brandAdd($post)
    {
        $res = Yii::$app->db->createCommand()->insert('mb_brand', $post)->execute();
        if($res) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }
    /*
     * 品牌-->上传文件
     */
    public function brandUpload($file)
    {
        //修改文件名
        $file['name'] = time().'.'.substr($file['name'],strrpos($file['name'], '.')+1);
        //上传文件
        move_uploaded_file($file["tmp_name"],"./public/admin/images/" . $file["name"]);

        //调用缩小图片的方法
        $this->sanbai($file);

        return "images/sanbai/" . $file["name"];
    }
    public function sanbai($file,$max=300)
    {
        $filename = "./public/admin/images/". $file["name"];
        //因为PHP只能对资源进行操作，所以要对需要进行缩放的图片进行拷贝，创建为新的资源
        $src = imagecreatefromjpeg($filename);

        //取得源图片的宽度和高度
        $size_src = getimagesize($filename);
        $w = $size_src['0'];
        $h = $size_src['1'];

        //指定缩放出来的最大的宽度（也有可能是高度）
        $max=300;

        //根据最大值为300，算出另一个边的长度，得到缩放后的图片宽度和高度
        if($w > $h) {
            $w = $max;
            $h = $h*($max/$size_src['0']);
        } else {
            $h = $max;
            $w = $w*($max/$size_src['1']);
        }
        //声明一个$w宽，$h高的真彩图片资源
        $image=imagecreatetruecolor($w, $h);

        //关键函数，参数（目标资源，源，目标资源的开始坐标x,y,源资源的开始坐标x,y,目标资源的宽高w,h,源资源的宽高w,h）
        imagecopyresampled($image, $src, 0, 0, 0, 0, $w, $h, $size_src['0'], $size_src['1']);
        
        //告诉浏览器以图片形式解析
        // header('content-type:image/png');
        // imagepng($image);
        imagepng($image,"./public/admin/images/sanbai/". $file['name']);
        //销毁资源
        imagedestroy($image);
    }

    /*
     * 根据条件查找品牌数据
     * */
    public function brandWhere($field,$val)
    {
        $data = Brand::find()
            ->select(array('brand_id','brand_name','sort'))
            ->where([$field=>$val])
            ->asArray()
            ->all();
        if($data)
        {
            return $data;
        }
        else
        {
            return false;
        }
    }

    /*
     * 根据品牌名称查询商品
     * */
    public function brandGoods($brand_name,$gt_id)
    {
        //品牌ID
        $brand_id = Brand::find()->select('brand_id')->where(['like','brand_name',$brand_name])->asArray()->one()['brand_id'];
        return Goods::find()
            ->select(array('g_id','gt_id','goods_name','brand_id','shop_price','keywords','g_img'))
            ->where(['brand_id'=>$brand_id])
            ->andWhere(['gt_id'=>$gt_id])
            ->andWhere(['is_show'=>'1'])
            ->asArray()
            ->all();
    }
}