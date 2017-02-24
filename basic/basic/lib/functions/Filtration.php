<?php
namespace app\Lib\Functions;
class Filtration
{
    /*
  * 数组过滤
  */
    public static function check_arr($data)
    {
        $arr = array();
        foreach($data as $key=>$val)
        {
            $arr[$key] = self::check_str($val);
        }
        return $arr;
    }
    /**
     * 检查输入的字符是否合法，合法返回对应id，否则返回false
     * @param string $string
     * @return mixed
     * @author zyb <zyb_icanplay@163.com>
     */
    public static function check_str( $string ) {
        $result = false;
        $var = self::filter_keyword( $string ); // 过滤sql与php文件操作的关键字
        if ( !empty( $var ) ) {
            if ( !get_magic_quotes_gpc() ) {    // 判断magic_quotes_gpc是否为打开
                $var = addslashes( $string );    // 进行magic_quotes_gpc没有打开的情况对提交数据的过滤
            }
            //$var = str_replace( "_", "\_", $var );    // 把 '_'过滤掉
            $var = str_replace( "%", "\%", $var );    // 把 '%'过滤掉
            $var = nl2br( $var );    // 回车转换
            $var = htmlspecialchars( $var );    // html标记转换
            $result = $var;
        }
        return $result;
    }

    /**
     * 检查输入的数字是否合法，合法返回对应id，否则返回false
     * @param integer $id
     * @return mixed
     * @author zyb <zyb_icanplay@163.com>
     */
    public static function check_id( $id ) {
        $result = false;
        if ( $id !== '' && !is_null( $id ) ) {
            $var = self::filter_keyword( $id ); // 过滤sql与php文件操作的关键字
            if ( $var !== '' && !is_null( $var ) && is_numeric( $var ) ) {
                $result = intval( $var );
            }
        }
        return $result;
    }

    /**
     * 过滤sql与php文件操作的关键字
     * @param string $string
     * @return string
     * @author zyb <zyb_icanplay@163.com>
     */
    public static function filter_keyword( $string ) {
        $keyword = 'select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile';
        $arr = explode( '|', $keyword );
        $result = str_ireplace( $arr, '', $string );
        return $result;
    }

    /*
     * 上传图片
     *
     */
    public static function image_upload($path,$filename,$files)
    {
        if(!file_exists($path)){ mkdir($path,0777,true);}
        if (move_uploaded_file($files['tmp_name'],$path.$filename)){
            return $path.$filename;
        } else {
            return false;
        }
    }
    /*
     * 图片缩略
     */
    public static function breviary($new_file,$width)
    {
        //源图片长宽
        $image_info = getimagesize($new_file);
        $dst_w = $width; //目标图片的宽
        $dst_h = ($image_info[1]/($image_info[0]/$width)); //目标图片的长
        $dst_image = imagecreatetruecolor ($dst_w , $dst_h ) ;

        $src_image = imagecreatefromjpeg($new_file);
        $dst_x = 0; //目标图片的起始x坐标
        $dst_y = 0; //目标图片的起始y坐标
        $src_x = 0;//源图片的起始x坐标
        $src_y = 0;//源图片的起始y坐标
        $src = getimagesize($new_file); //获取源图片大小，以数组方式返回宽高等信息，具体用var_damp（）输出查看
        //var_dump($src);
        $src_w = $src[0];
        $src_h = $src[1];

        imagecopyresampled ( $dst_image , $src_image , $dst_x , $dst_y ,$src_x ,  $src_y , $dst_w , $dst_h ,  $src_w , $src_h );
        $newfile = dirname($new_file).'/cdk_'.basename($new_file);
        imagejpeg($dst_image, $newfile, 100);
        imagedestroy($dst_image );
        imagedestroy($src_image );  //释放和暂存图片的内存
        return $newfile;
    }
}