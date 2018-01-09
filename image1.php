<?php
    $kp_pzfl="shishi";
    $kp_hp=12;
    $kp_fali=12;
    $kp_sh=12;

    $kp_name="克尔苏加德12";
    $kp_info="复活本局对战的随从";

    $bg = imagecreatetruecolor(400, 563);
	$im = imagecreatetruecolor(400, 563);
    $touxiang =imagecreatetruecolor(200, 363);
	$bg_color = imagecolorallocate($bg, 230, 211, 168);
    $red = imagecolorallocate($bg, 255, 255, 255);
    $black=imagecolorallocate($bg,0,0,0);
    $huise=imagecolorallocate($bg,30,23,16);
	$touxiang=imagecreatefromjpeg("images/tuku3.jpg");
    $im = imagecreatefrompng("images/putong/pt_suicong_nozz.png");
    imagesavealpha($im,true);
	imagesavealpha($touxiang,true);
	imagefill($bg, 0, 0, $bg_color);

    imagecopy($bg, $touxiang, 92, 28, 0, 0, 230, 330);
    imagecopy($bg,$im, 0, 20, 0, 0, 400, 563);
    imagefttext($bg, 48, 0,28, 98, $red , "simhei.ttf", $kp_hp);

    imagefttext($bg, 32, 0,98, 329, $black , "lishu.ttf", $kp_name);
    imagefttext($bg, 32, 0,100, 330, $black , "lishu.ttf", $kp_name);
    imagefttext($bg, 30, 0,100, 330, $red , "lishu.ttf", $kp_name);
    imagefttext($bg, 18, 0,100, 420, $black,"simhei.ttf  ", $kp_info);
	header('Content-type: image/jpeg');

    imagepng($bg);
    imagedestroy($bg);




