<?php
$pzfl=empty($_POST['pzfl']) ? 'xiyou' : $_POST['pzfl'];
$fali=empty($_POST['fali']) ? '1': $_POST['fali'];
$hp=empty($_POST['hp']) ? '1': $_POST['hp'];
$sh=empty($_POST['sh']) ? '1': $_POST['sh'];
$kp_name = empty($_POST['kp_name']) ? 'name' : $_POST['kp_name'];
$kp_info = empty($_POST['kpinfo_text']) ? 'text' : $_POST['kpinfo_text'];
$kp_img=empty($_POST['img_path1']) ? 'images/no.jpg' : $_POST['img_path1'];
include('image.php');
$name_array= mbStrSplit($kp_name);
$img = getImage($pzfl,$fali,$hp,$sh,$kp_name, $kp_info,$kp_img);
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>炉石传说--卡牌生成器</title>
</head>
<body>
    <?php

    echo $_POST['img_path1'];
    $name_xh= count($name_array);
    echo $name_xh;
    echo $kp_info."<br>";
    echo strlen($kp_info)."<br>";

    echo $pzfl;
    //print_r(array_diff($kpword[1],$kpword[0]));
    /*print_r($name_array)."<br>";
    $name_xh= count($name_array);
    $base_number=ceil($name_xh/2-1);
    echo $base_number;
    echo $name_array[$base_number];
    echo $name_array[$base_number+1];
    echo $name_array[$base_number-1];
    echo $name_array[$base_number+2];
    echo $name_array[$base_number-2];
*/

    ?>
    <img src="http://localhost/lushi/<?php echo $img;?>">
    <a href="http://localhost/lushi/<?php echo $img;?>">http://localhost/lushi/<?php echo $img;?>;</a>

</body>
</html>