<?php
	list($width, $height, $type, $attr) = getimagesize("image/brophp.jpg");
	
	echo '<img src="image/brophp.jpg" '.$attr.'>'