<?php
header("Content-type:text/html;charset=utf-8");
header("Content-type: image/jpeg");

	$im = imagecreate(100,100);

	$background = imagecolorallocate($im, 255, 0, 0);    	//第一次调用即为画布设置背景颜色
	//设定一些颜色
	$white = imagecolorallocate($im, 255, 255, 255);     	//返回由十进制整数设置为白色的标识符
	$black = imagecolorallocate($im, 0, 0, 0);          	//返回由十进制整数设置为黑色的标识符
	//十六进制方式
	$white = imagecolorallocate($im, 0xFF, 0xFF, 0xFF); 	//返回由十六进制整数设置为白色的标识符
	$black = imagecolorallocate($im, 0x00, 0x00, 0x00);  	//返回由十六进制整数设置为黑色的标识符
    imagepng($im);


    // imagedestroy()函数销毁图像资源
    imagedestroy($im);
    ?>
