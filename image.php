<?php
        function mbStrSplit ($string, $len=1) {
                $start = 0;
                $strlen = mb_strlen($string);
                while ($strlen) {
                        $array[] = mb_substr($string,$start,$len,"utf8");
                        $string = mb_substr($string, $len, $strlen,"utf8");
                        $strlen = mb_strlen($string);
                }
                return $array;
        }



    function getImage($pzfl,$fali,$hp,$sh,$name, $text,$img_path){
            $kp_pzfl=$pzfl;
            $kp_hp=$hp;
            $kp_fali=$fali;
            $kp_sh=$sh;
            $kp_name= $name;
            $name_array= mbStrSplit($name);//卡牌名称字符串转数组
            $name_xh= count($name_array);
            $base_number=ceil($name_xh/2-1);
            $kp_img=$img_path;
            $kp_info= $text;
            $bg = imagecreatetruecolor(400, 563);
        	$im = imagecreatetruecolor(400, 563);
            $touxiang =imagecreatetruecolor(200, 363);
        	$bg_color = imagecolorallocate($bg, 230, 211, 168);
            $red = imagecolorallocate($bg, 255, 255, 255);
            $black=imagecolorallocate($bg,0,0,0);
            $huise=imagecolorallocate($bg,30,23,16);
        	$touxiang=imagecreatefromjpeg($img_path);
            $im = imagecreatefrompng("images/putong/pt_suicong_nozz.png");


            switch ($pzfl)
            {
                    case "putong":
                            $pzfl_icon=imagecreatefrompng("images/jn1.png");
                            break;
                    case "xiyou":
                            $pzfl_icon=imagecreatefrompng("images/jn2.png");
                            break;
                    case "shishi":
                            $pzfl_icon=imagecreatefrompng("images/jn3.png");
                            break;
                    case "chuanshuo":
                            $pzfl_icon=imagecreatefrompng("images/jn4.png");
                            break;
            }
            imagesavealpha($pzfl_icon,true);
            imagesavealpha($im,true);
        	imagesavealpha($touxiang,true);
        	imagefill($bg, 0, 0, $bg_color);
            list($width, $height) = getimagesize($img_path);
            imagecopyresized($bg, $touxiang, 92, 28, 0, 0, 230, 330,$width,$height);

            //imagecopy($bg, $touxiang, 92, 28,0, 0, 230, 330);
            imagecopy($bg,$im, 0, 20, 0, 0, 400, 563);
            imagecopy($bg,$pzfl_icon, 194, 326, 0, 0, 33, 44);

            if(strlen($kp_hp)>1){
                    imagefttext($bg, 44, 0,314, 531, $black , "msyhbd.ttc", $kp_hp);
                    imagefttext($bg, 44, 0,312, 529, $red , "msyhbd.ttc", $kp_hp);
            }
            else{
                    imagefttext($bg, 44, 0,334, 531, $black , "msyhbd.ttc", $kp_hp);
                    imagefttext($bg, 44, 0,332, 529, $red , "msyhbd.ttc", $kp_hp);
            }
            if(strlen($kp_fali)>1){
                    imagefttext($bg, 44, 0,28, 101, $black , "msyhbd.ttc", $kp_fali);
                    imagefttext($bg, 44, 0,26, 99, $red , "msyhbd.ttc", $kp_fali);
            }
            else{
                    imagefttext($bg, 44, 0,48, 101, $black , "msyhbd.ttc", $kp_fali);
                    imagefttext($bg, 44, 0,46, 99, $red , "msyhbd.ttc", $kp_fali);
            }
            if(strlen($kp_sh)>1){
                    imagefttext($bg, 44, 0,30, 531, $black , "msyhbd.ttc", $kp_sh);
                    imagefttext($bg, 44, 0,28, 529, $red , "msyhbd.ttc", $kp_sh);
            }
            else{
                    imagefttext($bg, 44, 0,50, 531, $black , "msyhbd.ttc", $kp_sh);
                    imagefttext($bg, 44, 0,48, 529, $red , "msyhbd.ttc", $kp_sh);
            }

            if($name_xh%2==0){
                    //偶数名称
                    imagefttext($bg, 30, 6,176, 318, $black , "lishu.ttf", $name_array[$base_number]);
                    imagefttext($bg, 30, 6,178, 319, $black , "lishu.ttf", $name_array[$base_number]);
                    imagefttext($bg, 28, 6,178, 319, $red , "lishu.ttf", $name_array[$base_number]);
                    if(!empty($name_array[$base_number+1])){
                            imagefttext($bg, 30, 4,211, 314, $black , "lishu.ttf", $name_array[$base_number+1]);
                            imagefttext($bg, 30, 4,213, 314, $black , "lishu.ttf", $name_array[$base_number+1]);
                            imagefttext($bg, 28, 4,213, 315, $red , "lishu.ttf", $name_array[$base_number+1]);
                    }
                    if(!empty($name_array[$base_number-1])){
                            imagefttext($bg, 30, 8,143, 322, $black , "lishu.ttf", $name_array[$base_number-1]);
                            imagefttext($bg, 30, 8,145, 323, $black , "lishu.ttf", $name_array[$base_number-1]);
                            imagefttext($bg, 28, 8,145, 323, $red , "lishu.ttf", $name_array[$base_number-1]);
                    }
                    if(!empty($name_array[$base_number+2])){
                            imagefttext($bg, 30, 0,246, 312, $black , "lishu.ttf", $name_array[$base_number+2]);
                            imagefttext($bg, 30, 0,248, 313, $black , "lishu.ttf", $name_array[$base_number+2]);
                            imagefttext($bg, 28, 0,248, 313, $red , "lishu.ttf", $name_array[$base_number+2]);
                    }
                    if(!empty($name_array[$base_number-2])){
                            imagefttext($bg, 30, 8,106, 329, $black , "lishu.ttf", $name_array[$base_number-2]);
                            imagefttext($bg, 30, 8,108, 330, $black , "lishu.ttf", $name_array[$base_number-2]);
                            imagefttext($bg, 28, 8,108, 330, $red , "lishu.ttf", $name_array[$base_number-2]);
                    }

                    if(!empty($name_array[$base_number+3])){
                            imagefttext($bg, 30, -3,280, 312, $black , "lishu.ttf", $name_array[$base_number+3]);
                            imagefttext($bg, 30, -3,282, 314, $black , "lishu.ttf", $name_array[$base_number+3]);
                            imagefttext($bg, 28, -3,282, 314, $red , "lishu.ttf", $name_array[$base_number+3]);
                    }

                    if(!empty($name_array[$base_number-3])){
                            imagefttext($bg, 30, 2,68, 330, $black , "lishu.ttf", $name_array[$base_number-3]);
                            imagefttext($bg, 30, 2,70, 331, $black , "lishu.ttf", $name_array[$base_number-3]);
                            imagefttext($bg, 28, 2,70, 331, $red , "lishu.ttf", $name_array[$base_number-3]);
                    }

                    if(!empty($name_array[$base_number+4])){
                            imagefttext($bg, 30, -22,315, 312, $black , "lishu.ttf", $name_array[$base_number+4]);
                            imagefttext($bg, 30, -22,317, 313, $black , "lishu.ttf", $name_array[$base_number+4]);
                            imagefttext($bg, 28, -22,317, 313, $red , "lishu.ttf", $name_array[$base_number+4]);
                    }

                    if(!empty($name_array[$base_number-4])){
                            imagefttext($bg, 30, -3,49, 330, $black , "lishu.ttf", $name_array[$base_number-4]);
                            imagefttext($bg, 30, -3,51, 331, $black , "lishu.ttf", $name_array[$base_number-4]);
                            imagefttext($bg, 28, -3,51, 331, $red , "lishu.ttf", $name_array[$base_number-4]);
                    }
            }
            else{
                    //奇数名称
                    imagefttext($bg, 30, 9,188, 317, $black , "lishu.ttf", $name_array[$base_number]);
                    imagefttext($bg, 30, 9,190, 318, $black , "lishu.ttf", $name_array[$base_number]);
                    imagefttext($bg, 28, 9,190, 318, $red , "lishu.ttf", $name_array[$base_number]);
                    if(!empty($name_array[$base_number+1])){
                            imagefttext($bg, 30, 4,221, 313, $black , "lishu.ttf", $name_array[$base_number+1]);
                            imagefttext($bg, 30, 4,223, 314, $black , "lishu.ttf", $name_array[$base_number+1]);
                            imagefttext($bg, 28, 4,223, 314, $red , "lishu.ttf", $name_array[$base_number+1]);
                    }
                    if(!empty($name_array[$base_number-1])){
                            imagefttext($bg, 30, 8,153, 322, $black , "lishu.ttf", $name_array[$base_number-1]);
                            imagefttext($bg, 30, 8,155, 323, $black , "lishu.ttf", $name_array[$base_number-1]);
                            imagefttext($bg, 28, 8,155, 323, $red , "lishu.ttf", $name_array[$base_number-1]);
                    }
                    if(!empty($name_array[$base_number+2])){
                            imagefttext($bg, 30, 0,256, 312, $black , "lishu.ttf", $name_array[$base_number+2]);
                            imagefttext($bg, 30, 0,258, 313, $black , "lishu.ttf", $name_array[$base_number+2]);
                            imagefttext($bg, 28, 0,258, 313, $red , "lishu.ttf", $name_array[$base_number+2]);
                    }
                    if(!empty($name_array[$base_number-2])){
                            imagefttext($bg, 30, 8,118, 327, $black , "lishu.ttf", $name_array[$base_number-2]);
                            imagefttext($bg, 30, 8,120, 328, $black , "lishu.ttf", $name_array[$base_number-2]);
                            imagefttext($bg, 28, 8,120, 328, $red , "lishu.ttf", $name_array[$base_number-2]);
                    }

                    if(!empty($name_array[$base_number+3])){
                            imagefttext($bg, 30, -2,291, 312, $black , "lishu.ttf", $name_array[$base_number+3]);
                            imagefttext($bg, 30, -2,293, 313, $black , "lishu.ttf", $name_array[$base_number+3]);
                            imagefttext($bg, 28, -2,293, 313, $red , "lishu.ttf", $name_array[$base_number+3]);
                    }

                    if(!empty($name_array[$base_number-3])){
                            imagefttext($bg, 30, 8,85, 333, $black , "lishu.ttf", $name_array[$base_number-3]);
                            imagefttext($bg, 30, 8,87, 334, $black , "lishu.ttf", $name_array[$base_number-3]);
                            imagefttext($bg, 28, 8,87, 334, $red , "lishu.ttf", $name_array[$base_number-3]);
                    }

                    if(!empty($name_array[$base_number+4])){
                            imagefttext($bg, 30, -15,321, 312, $black , "lishu.ttf", $name_array[$base_number+4]);
                            imagefttext($bg, 30, -15,323, 313, $black , "lishu.ttf", $name_array[$base_number+4]);
                            imagefttext($bg, 28, -15,323, 313, $red , "lishu.ttf", $name_array[$base_number+4]);
                    }

                    if(!empty($name_array[$base_number-4])){
                            imagefttext($bg, 30, -3,49, 330, $black , "lishu.ttf", $name_array[$base_number-4]);
                            imagefttext($bg, 30, -3,51, 331, $black , "lishu.ttf", $name_array[$base_number-4]);
                            imagefttext($bg, 28, -3,51, 331, $red , "lishu.ttf", $name_array[$base_number-4]);
                    }
            }

            function autowrap($fontsize, $angle, $fontface, $string, $width) {
                    $content = "";
                    // 将字符串拆分成一个个单字 保存到数组 letter 中
                    for ($i=0;$i<mb_strlen($string);$i++) {
                            $letter[] = mb_substr($string, $i, 1,'utf-8');
                    }

                    foreach ($letter as $l) {
                            $teststr = $content." ".$l;
                            $testbox = imagettfbbox($fontsize, $angle, $fontface, $teststr);
                            // 判断拼接后的字符串是否超过预设的宽度
                            if (($testbox[2] > $width) && ($content !== "")) {
                                    $content .= "\n";
                            }
                            $content .= $l;
                    }
                    return $content;
            }

            $kp_info = autowrap(12, 0, "simsun.ttc", $kp_info, 160); // 自动换行处理

            imagefttext($bg, 18, 0,96, 400, $black,"simhei.ttf", $kp_info);
        	//header('Content-type: image/jpeg');
            //$img = imagepng($bg);
            $file_name = 'files/' . date('YmdHis') .'_' . rand(1, 1000) . '.png';
            imagepng($bg, $file_name);
            imagedestroy($bg);
            return $file_name;


    }

