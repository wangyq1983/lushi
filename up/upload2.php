<?php
$tmp_name = $_FILES['img']['tmp_name'];
$name = $_FILES['img']['name'];
move_uploaded_file($tmp_name, './upload/'.$name);
$img = './upload/'.$name;
?>





<div id="pic">
    <img src="<?php echo $img; ?>" />
</div>


