<?php
	// function requireAll($dir = '') {
	// 	$z = glob($dir . '/*.php');

	// 	if (count($z) > 0) {
	// 		foreach ($z as $filename) {
	// 		    include $filename;
	// 		}
	// 	}

	// 	$scan = scandir($dir);
	// 	if (($key = array_search('.', $scan)) !== false) {
	// 	    unset($scan[$key]);
	// 	}
	// 	if (($key = array_search('..', $scan)) !== false) {
	// 	    unset($scan[$key]);
	// 	}
	// 	$scan = array_values($scan);

	// 	for ($i = 0; $i < count($scan); $i++) {
	// 		$newdir = $dir . '/' . $scan[$i];

	// 		if (is_dir($newdir)) {
	// 			requireAll($newdir);
	// 		}
	// 	}
	// }
	// requireAll('src');

	require_once 'src/Minify.php';
	require_once 'src/CSS.php';
	require_once 'src/JS.php';
	require_once 'src/Exception.php';
	require_once 'src/Exceptions/BasicException.php';
	require_once 'src/Exceptions/FileImportException.php';
	require_once 'src/Exceptions/IOException.php';
	require_once 'src/path-converter-master/src/ConverterInterface.php';
	require_once 'src/path-converter-master/src/Converter.php';

	use MatthiasMullie\Minify;

	$sourcePath = 'all.css';
	echo 'original: ' . number_format(strlen(file_get_contents($sourcePath)), 0, ',', '.');
	$minifier = new Minify\CSS($sourcePath);

	// we can even add another file, they'll then be
	// joined in 1 output file
	// $sourcePath2 = '/path/to/second/source/css/file.css';
	// $minifier->add($sourcePath2);

	// or we can just add plain CSS
	// $css = 'body { color: #000000; }';
	// $minifier->add($css);

	// save minified file to disk
	$minifiedPath = 'all.min.css';
	// $minifier->minify($minifiedPath);

	// or just output the content
	$a = $minifier->minify();
	echo '<br>compressed: ' . number_format(strlen($a), 0, ',', '.');


	$sourcePath = 'all.js';
	echo '<br><br>original: ' . number_format(strlen(file_get_contents($sourcePath)), 0, ',', '.');
	$minifier = new Minify\JS($sourcePath);

	// we can even add another file, they'll then be
	// joined in 1 output file
	// $sourcePath2 = '/path/to/second/source/css/file.css';
	// $minifier->add($sourcePath2);

	// or we can just add plain CSS
	// $css = 'body { color: #000000; }';
	// $minifier->add($css);

	// save minified file to disk
	$minifiedPath = 'all.min.js';
	// $minifier->minify($minifiedPath);

	// or just output the content
	$a = $minifier->minify();
	echo '<br>compressed: ' . number_format(strlen($a), 0, ',', '.');
	
