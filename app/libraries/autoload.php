<?php

/* Browser Detection */
require_once 'php-browser-detection-master/src/BrowserDetection.php';

/* Convert Images to WEBP */
require_once 'img-to-webp/img_to_webp.php';

/* Google Login */
// require_once 'google-client/Google_Client.php';
// require_once 'google-client/contrib/Google_Oauth2Service.php';

/* DOM PDF */
require_once 'dompdf/autoload.inc.php';

/* Image resize & compress */
require_once 'php-image-resize-master/lib/ImageResize.php';
require_once 'php-image-resize-master/lib/ImageResizeException.php';
use \Gumlet\ImageResize;

/* Uglify (JS Compress) */
require_once 'php-uglifyjs-master/lib/JavascriptPacker.php';

/* PHP Mailer */
include_once 'PHPMailer-master/src/Exception.php';
include_once 'PHPMailer-master/src/PHPMailer.php';
include_once 'PHPMailer-master/src/POP3.php';
include_once 'PHPMailer-master/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

/* CSS Minify */
// require_once 'minify-master/src/Minify.php';
// require_once 'minify-master/src/CSS.php';
// require_once 'minify-master/src/JS.php';
// require_once 'minify-master/src/path-converter-master/src/ConverterInterface.php';
// require_once 'minify-master/src/path-converter-master/src/Converter.php';
// use MatthiasMullie\Minify;