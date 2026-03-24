<!DOCTYPE html>
<html>
<head>
	<title>UglyJS</title>
</head>
<body>
	<?php
		$jquery = file_get_contents('jquery.js');
		// echo "<br>Before Compress: " . number_format(strlen($jquery), 0, ",", ".") . "Bytes";

		require_once 'lib/JavascriptPacker.php';
		$myPacker = new GK\JavascriptPacker($jquery, 62, false, true);
		echo $packed = $myPacker->pack();

		// echo "<br>After Compress: " . number_format(strlen($packed), 0, ",", ".") . "Bytes";
	?>
</body>
</html>