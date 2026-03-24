<?php

	class IMG2WEBP {
		public function convert($dir, $name) {
			$raw_img 	= $dir . $name;
			$FILENAME 	= pathinfo($raw_img, PATHINFO_FILENAME);
			$EXTENSION  = strtolower(pathinfo($raw_img, PATHINFO_EXTENSION));
			$webp_img 	= $dir . $FILENAME . '.webp';
			$acceptExt	= array("png", "gif", "jpg", "jpeg");
			
			// If web browser support WEBP and file extension in array
			if (strpos($_SERVER['HTTP_ACCEPT'], 'image/webp') !== false && in_array($EXTENSION, $acceptExt)) {
				// If WEBP Image Does'n Exist, Compress Image
				if (!file_exists($webp_img)) {
					$img = @imagecreatefrompng($raw_img);
					
					if (!$img) {
						$img = @imagecreatefromjpeg($raw_img);
					}

					if (!$img) {
						$img = @imagecreatefromgif($raw_img);
					}

					if ($img) {
						imagepalettetotruecolor($img);
						imagealphablending($img, true);
						imagesavealpha($img, true);
						imagewebp($img, $webp_img);
						imagedestroy($img);
						$result = $webp_img;
					}
					else {
						$result = $raw_img;
					}
				}
				else {
					// file_get_contents(filename);

					$result = $webp_img;
				}
			}
			else {
				$result = $raw_img;
			}
			return $result . "?" . filemtime($result);
		}
	}