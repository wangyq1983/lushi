<?php

/**
 * Jcrop image cropping plugin for jQuery
 * Example cropping script
 * @copyright 2008-2009 Kelly Hallman
 * More info: http://deepliquid.com/content/Jcrop_Implementation_Theory.html
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$targ_w = 230;
    $targ_h = 330;
    $jpeg_quality = 60;

	$src = $_POST['image_path'];
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'],
	$targ_w,$targ_h,$_POST['w'],$_POST['h']);

	header('Content-type: image/jpeg');
	imagejpeg($dst_r,null,$jpeg_quality);

	exit;
}

// If not a POST request, display page below:

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Live Cropping Demo</title>
  <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery.Jcrop.js"></script>
  <link rel="stylesheet" href="demo_files/main.css" type="text/css" />
  <link rel="stylesheet" href="demo_files/demos.css" type="text/css" />
  <link rel="stylesheet" href="../css/jquery.Jcrop.css" type="text/css" />

<script type="text/javascript">
    $(document).ready( function (){
        $( "#i_1" ).load( function(){
            url = $("#i_1" ).contents().find( "#pic").html();
            console.log(url);
            $( "#tag_img" ).html(url);
            var img_path=$("#tag_img img").attr("src");
            $("#cropbox").attr("src",img_path);
            $(".jcrop-holder img").attr("src",img_path);
            $("#image_path").val(img_path);
            $('#cropbox').Jcrop({
                aspectRatio: 1,
                onSelect: updateCoords,
                setSelect:[0,0,230,330],
                aspectRatio: 23 / 33
            });
        });
        function updateCoords(c)
        {
            $('#x').val(c.x);
            $('#y').val(c.y);
            $('#w').val(c.w);
            $('#h').val(c.h);
        };

        function checkCoords()
        {
            if (parseInt($('#w').val())) return true;
            alert('Please select a crop region then press submit.');
            return false;
        };

    });





</script>
<style type="text/css">
  #target {
    background-color: #ccc;
    width: 500px;
    height: 330px;
    font-size: 24px;
    display: block;
  }


</style>

</head>
<body>
<div id= "tag_img" STYLE="display: none">

</div>

<form enctype ="multipart/form-data" action= "upload2.php" method ="post" target= "upload_target">

    <input type= "file" name ="img" class= "file" value ="" />

    <input type= "submit" name ="uploadimg" value= "上传" />

</form>

<iframe id= "i_1" name = "upload_target" style="display: none"></iframe >
<div id="show_img">

</div>


		<img src=" " id="cropbox" />


		<form action="crop.php" method="post" onsubmit="return checkCoords();">
			<input type="hidden" id="x" name="x" />
			<input type="hidden" id="y" name="y" />
			<input type="hidden" id="w" name="w" />
			<input type="hidden" id="h" name="h" />
            <input type="hidden" id="image_path" name="image_path" />
			<input type="submit" value="Crop Image" class="btn btn-large btn-inverse" />
		</form>




	</body>

</html>
