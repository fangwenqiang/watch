<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii;

/**
 * @var UploadedFile
 */
class Carousel extends Model
{
    public $image;
    public $sort;
    public $is_show;

    public function rules()
    {
        return [
            ['image', 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg,jpeg'],
        ];
    }

    /**
     * 文件上传
     * @return bool|string
     */
    public function upload()
    {
        $path = 'uploads/' . date('Y-m-d') . '/';
        $imageName = time();
        //不存在则创建目录，以用户ID为名
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
            chmod($path, 0777);
        }
        if ($this->validate()) {
            $this->image->saveAs($path . $imageName . '.' . $this->image->extension);
            return $path . $imageName . '.' . $this->image->extension;
        } else {
            return false;
        }
    }

    /**
     * @param $path string 图片路径
     * @param $maxWidth int 图片宽度
     * @param $maxHeight int 图片高度
     */
    public function getThumb($path, $maxWidth = 80, $maxHeight = 60)
    {
        $fileName = substr($path, strrpos($path, '/') + 1);
        $filePath = substr($path, 0, strrpos($path, '/'));
        $arr = explode('.', $fileName);
        $newFileName = $filePath . '/' . $arr[0] . '_thumb.' . $arr[1];

        if (!in_array(strtolower($arr[1]),['jpg','jpeg']))
            return['status'=>false,'message'=>'只支持jpg和jpeg格式','path'=>''];

        if (!file_exists($newFileName)) {
            $info = getimagesize($path);    //获取原图的图像信息(长、宽、格式等)
            $srcWidth = $info[0];
            $srcHeight = $info[1];

            unset($info);
            $scale = min($maxWidth / $srcWidth, $maxHeight / $srcHeight); // 计算缩放比例
            if ($scale >= 1)
            {
                //超过原图
                return ['status'=>false,'message'=>'ok','path'=>$path];
            } else {
                // 缩略图尺寸
                $width = (int)($srcWidth * $scale);
                $height = (int)($srcHeight * $scale);

                //源图象连接资源
                $srcImg = imagecreatefromjpeg($path);


                //创建缩略图
                $thumbImg = imagecreatetruecolor($width, $height);
                // 复制图片
                if (function_exists("ImageCopyResampled"))
                    imagecopyresampled($thumbImg, $srcImg, 0, 0, 0, 0, $width, $height, $srcWidth, $srcHeight);
                else
                    imagecopyresized($thumbImg, $srcImg, 0, 0, 0, 0, $width, $height, $srcWidth, $srcHeight);


                $imageFun = 'image' . $arr[1];
                $imageFun($thumbImg, $newFileName);

                //第四步：关闭画布
                imagedestroy($thumbImg);
                imagedestroy($srcImg);
                return $newFileName;
            }

            return $srcImg;
        } else {
            return $newFileName;
        }

    }
function create($img, $thumbname, $type = '', $maxWidth = 200, $maxHeight = 50)
{
$info = getimagesize($img);    //获取原图的图像信息(长、宽、格式等)
if ($info !== false)
{
$srcWidth = $info['width'];
$srcHeight = $info['height'];
$type = empty($type) ? $info['type'] : $type;
$type = strtolower($type);
$interlace = $interlace ? 1 : 0;
unset($info);
$scale = min($maxWidth / $srcWidth, $maxHeight / $srcHeight); // 计算缩放比例
if ($scale >= 1)
{
    // 超过原图大小不再缩略
$width = $srcWidth;
$height = $srcHeight;
}

else {
    // 缩略图尺寸
    $width = (int)($srcWidth * $scale);
    $height = (int)($srcHeight * $scale);
}

// 载入原图（在原图的基础上创建画布，为第一步）
$createFun = 'ImageCreateFrom' . ($type == 'jpg' ? 'jpeg' : $type);
if (!function_exists($createFun)) {
    return false;
}
$srcImg = $createFun($image);

//第二步开始
//创建缩略图
if ($type != 'gif' && function_exists('imagecreatetruecolor'))
    $thumbImg = imagecreatetruecolor($width, $height);
else
    $thumbImg = imagecreate($width, $height);
//png和gif的透明处理 by luofei614
if ('png' == $type) {
    imagealphablending($thumbImg, false);//取消默认的混色模式（为解决阴影为绿色的问题）
    imagesavealpha($thumbImg, true);//设定保存完整的 alpha 通道信息（为解决阴影为绿色的问题）    
} elseif ('gif' == $type) {
    $trnprt_indx = imagecolortransparent($srcImg);
    if ($trnprt_indx >= 0) {
        //its transparent
        $trnprt_color = imagecolorsforindex($srcImg, $trnprt_indx);
        $trnprt_indx = imagecolorallocate($thumbImg, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
        imagefill($thumbImg, 0, 0, $trnprt_indx);
        imagecolortransparent($thumbImg, $trnprt_indx);
    }
}
// 复制图片
if (function_exists("ImageCopyResampled"))
    imagecopyresampled($thumbImg, $srcImg, 0, 0, 0, 0, $width, $height, $srcWidth, $srcHeight);
else
    imagecopyresized($thumbImg, $srcImg, 0, 0, 0, 0, $width, $height, $srcWidth, $srcHeight);

//第三步：输出图像
// 生成图片
$imageFun = 'image' . ($type == 'jpg' ? 'jpeg' : $type);
$imageFun($thumbImg, $thumbname);

//第四步：关闭画布
imagedestroy($thumbImg);
imagedestroy($srcImg);
return $thumbname;
}
return false;

}


}