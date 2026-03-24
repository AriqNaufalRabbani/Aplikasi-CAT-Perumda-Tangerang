<?php 

    // header('X-Permitted-Cross-Domain-Policies: none');
    // header('X-XSS-Protection: 1; mode=block');
    // header("Feature-Policy: microphone 'none'; camera 'none';");
    // header('Expect-CT: max-age=0, report-uri="https://crm.supernova-id.com"');
    // header('Cross-Origin-Embedder-Policy: (unsafe-none|require-corp); report-to="default"');
    // header('Cross-Origin-Opener-Policy: (same-origin|same-origin-allow-popups|unsafe-none); report-to="default"');
    // header('Cross-Origin-Resource-Policy: (same-site|same-origin|cross-origin)');   
    // header('Access-Control-Allow-Origin: https://crm.supernova-id.com/ http://apiv2.jne.co.id/ http://system.supernova.co.id/ https://10.20.107.19/');
    // header("Content-Security-Policy: default-src * data:; script-src https: 'unsafe-inline' 'unsafe-eval'; style-src https: 'unsafe-inline'");
    // // header("Content-Security-Policy: frame-ancestors 'self' https://istsurvey.supernova-id.com");
    // // header("Content-Security-Policy: default-src * data:; script-src https: 'unsafe-inline' 'unsafe-eval'; style-src https: 'unsafe-inline'; frame-src https://docs.google.com/");
    // // header("Content-Security-Policy: default-src * data:; script-src https: 'unsafe-inline' 'unsafe-eval'; style-src https: 'unsafe-inline'; 'unsafe-inline'; object-src 'none'; base-uri 'none'; font-src 'self' https://fonts.googleapis.com; frame-src 'self' https://docs.google.com/; report-uri https://crm.supernova-id.com/; frame-ancestors 'self' docs.google.com;");
    // // header("Content-Security-Policy: default-src 'self' data:; script-src https: https://www.google.com https://www.gstatic.com 'unsafe-inline' 'unsafe-eval'; style-src https: 'unsafe-inline'; frame-src 'self' https://www.google.com https://docs.google.com; connect-src 'self' https://www.google.com https://www.gstatic.com; font-src 'self' https: data:; img-src 'self' https: data:; media-src 'self' https: data:; object-src 'none'; frame-ancestors 'self' https://docs.google.com;");
    // header('X-Powered-By: IT Supernova development team');
    // header("X-Frame-Options: SAMEORIGIN");
    // // header("X-Frame-Options: ALLOW-FROM https://istsurvey.supernova-id.com,");
    // header("X-Content-Type-Options: nosniff");
    // header('Strict-Transport-Security: max-age=31536000');
    // header("Referrer-Policy: same-origin");
    // // header("Permissions-Policy:  picture-in-picture=*, geolocation=*, camera=* , microphone=()");
    // ini_set('session.gc_maxlifetime', 600*60);
    
    

    if (!session_id()) session_start(); 

    // $pwa 	        =	$_GET['standalone'];
    // @$APP_TYPE      =   $_COOKIE['APP_TYPE'];
    // $SERVER_NAME    =   $_SERVER['SERVER_NAME'];

    require_once 'app/init.php'; 
    $app = new App;   

   

?>