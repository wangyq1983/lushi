<?php
	if (function_exists("imagegif")) {              //判断生成GIF格式图像的函数是否存在
		header("Content-type: image/gif");          //发送标头信息设置MIME类型为image/gif
		imagegif($im);                          	//以GIF格式将图像输出到浏览器
	} elseif (function_exists("imagejpeg")) {       //判断生成JPEG格式图像的函数是否存在
		header("Content-type: image/jpeg");         //发送标头设置MIME类型为image/jpeg
		imagejpeg($im, "", 0.5);                  	//以JPEG格式将图像输出到浏览器
	} elseif (function_exists("imagepng")) {        //判断生成PNG格式图像的函数是否存在
		header("Content-type: image/png");         	//发送标头设置MIME类型为image/png
		imagepng($im);                         		//以PNG格式将图像输出到浏览器
	} elseif (function_exists("imagewbmp")) {       //判断生成WBMP格式图像的函数是否存在
		header("Content-type: image/vnd.wap.wbmp");	//设置MIME类型为image/vnd.wap.wbmp
		imagewbmp($im);                       		//以WBMP格式将图像输出到浏览器
	} else {                                     	//如果没有可以使用的生成图像函数
		die("在PHP服务器中，不支持图像");     		//则PHP不支持图像操作，退出
	} 

