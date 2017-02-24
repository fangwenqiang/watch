<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

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
    public function upload()
    {
        $path = 'uploads/'.date('Y-m-d').'/';
        $imageName = time();
        //不存在则创建目录，以用户ID为名
        if(!file_exists($path)){
            mkdir($path,0777,true);
            chmod($path,0777);
        }
        if ($this->validate()) {
            $this->image->saveAs($path . $this->image->baseName . '.' . $this->image->extension);
            return $path . $imageName . '.' . $this->image->extension;
        } else {
            return false;
        }
    }
}