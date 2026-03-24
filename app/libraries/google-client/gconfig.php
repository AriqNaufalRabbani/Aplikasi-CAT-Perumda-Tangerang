<?php
    // session_start();

    // Include Librari Google Client (API)
    include_once 'Google_Client.php';
    include_once 'contrib/Google_Oauth2Service.php';

    $client_id = '393642085356-3tcj46iqo6blgnqv8fhbp3gruutftrk7.apps.googleusercontent.com'; // Google client ID
    $client_secret = 'u0evVNKZxn6sOFT_ljL5IKUH'; // Google Client Secret
    $redirect_url = 'https://www.supernovadigipack.com/beta/masuk/google'; // Callback URL

    // Call Google API
    $gclient = new Google_Client();
    $gclient->setApplicationName('Google Login'); // Set dengan Nama Aplikasi Kalian
    $gclient->setClientId($client_id); // Set dengan Client ID
    $gclient->setClientSecret($client_secret); // Set dengan Client Secret
    $gclient->setRedirectUri($redirect_url); // Set URL untuk Redirect setelah berhasil login

    $google_oauthv2 = new Google_Oauth2Service($gclient);
?>