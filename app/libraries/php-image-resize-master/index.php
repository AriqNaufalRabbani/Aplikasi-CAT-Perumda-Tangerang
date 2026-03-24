<?php
	include "lib/ImageResize.php";
	use \Gumlet\ImageResize;

	/* Generate image from dir */
	$image = new ImageResize('img/Picture1.png');
	/* Generate image from string */
	// $image = ImageResize::createFromString(file_get_contents('http://localhost/img-resize/php-image-resize-master/img/Picture1.png'));

	/* Resize to 180px */
	$image->resizeToWidth(180);
	/* Resize image (scale 50%) */
	// $image->scale(50);
	/* Compress image (scale 100%) */
	// $image->scale(100);
	
	/* Save image */
	$image->save('img/Picture.png');
	/* Show image */
	// $image->output();
