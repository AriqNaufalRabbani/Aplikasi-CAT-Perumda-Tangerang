<?php
	function upload_image($file, $path, $allow_tipe, $nm_file){
	    $uploadTo 		= $path; 
	    $allowImageExt 	= explode(",", trim($allow_tipe));
	    $imageName 		= $file['name'];
	    $tempPath 		= $file["tmp_name"];
	    $imageSize 		= $file["size"];
	    $imageQuality 	= 100;
	    // $basename  		= basename($imageName);
	    $basename		= $nm_file.'.'.pathinfo($imageName, PATHINFO_EXTENSION);
	    $originalPath 	= $uploadTo.$basename; 
	    $imageExt  		= pathinfo($originalPath, PATHINFO_EXTENSION); 
	    if(!empty($imageName))
	    { 	   
		    if(in_array($imageExt, $allowImageExt)){ 
		    	$compressedImage = compress_image($tempPath, $originalPath, $imageQuality, $path);
		   }else{
		     return "Jenis file tidak diizinkan";
		   }
		} 
	}

	function compress_image($tempPath, $originalPath, $imageQuality, $path){
	  
	    // Get image info 
	    $imgInfo = getimagesize($tempPath); 
	    $mime = $imgInfo['mime']; 
	     
	    // Create a new image from file 
	    switch($mime){ 
	        case 'image/jpeg': 
	            $image = imagecreatefromjpeg($tempPath); 
	            break; 
	        case 'image/png': 
	            $image = imagecreatefrompng($tempPath); 
	            break; 
	        case 'image/gif': 
	            $image = imagecreatefromgif($tempPath); 
	            break; 
	        default: 
	            $image = imagecreatefromjpeg($tempPath); 
	    } 
	     
	    // Save image 
	    imagejpeg($image, $originalPath, $imageQuality);    
	    // Return compressed image 
	    return move_uploaded_file($originalPath, $path); 
	}
?>