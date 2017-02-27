<?php 
namespace app\models\gongyang;





/*
* 外部模板扩展层
*
	1调用文件信息
*	
*/
class Abroad 
{
	

	// 载入bootstrap文件
	static public function IncludeBootstrap()
	{
        $includeFile = '<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">'
                       .'<script src="bootstrap/js/bootstrap.min.js"></script> ';

        return $includeFile; 
	}
	
}


















