<?php 
// header("Cache-Control: no-cache, must-revalidate");
// header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
// header("Cache-Control: post-check=0, pre-check=0", false);
// header("Pragma: no-cache");
// clearstatcache();

// Atur header untuk caching selama 1 jam (3600 detik) 
header('Cache-Control: max-age=3600');
header('Expires: ' . gmdate('D, d M Y H:i:s', time() + 3600) . ' GMT');
// Tambahkan header Content-Type
// header('Content-Type: application/javascript');

// header("Cache-Control: max-age=2592000");
header('Expires: '.gmdate('D, d M Y H:i:s \G\M\T', time() + 86400 * 30)); // 1 hour
ini_set('memory_limit', '-1');
ini_set('max_execution_time', 0);
ini_set('date.timezone', 'Asia/Jakarta');
// ini_set('session.gc_maxlifetime', 600*60);
// error_reporting("E_ALL ^ E_NOTICE");
// set_time_limit(0);

if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) {
    ob_start("ob_gzhandler");
    header("Content-Encoding: gzip");
}
else {
    ob_start();
} 


// $CRMSESSID = $_COOKIE["CRMSESSID"] ?? '';
// setcookie('CRMSESSID', $CRMSESSID, "Session", "/", '', true, true);


date_default_timezone_set("Asia/Jakarta"); 
define('BASE_PATH', $_SERVER['DOCUMENT_ROOT']);
// define('CRMSESSID', $CRMSESSID);
define('BASE_SRV',$_SERVER['SERVER_NAME']);

$referer = $_SERVER['HTTP_REFERER'] ?? 'http://localhost'; // Default jika kosong
$url_parts = parse_url($referer);

define('BASE_REF', ($url_parts['scheme'] ?? 'http') . "://" . ($url_parts['host'] ?? 'localhost'));define('HOST',$_SERVER['HTTP_HOST']);

define('BASE_URL', 'http://cat.test/'); 

if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) 
{
    $uri = 'https://';
}
else 
{
    $uri = 'http://';
}

$uri .= $_SERVER['HTTP_HOST'];

if (session_status() === PHP_SESSION_NONE) {
    $session_lifetime = 60 * 60 * 24; // 24 jam

    ini_set('session.gc_maxlifetime', $session_lifetime);
    ini_set('session.cookie_lifetime', $session_lifetime);

    session_set_cookie_params([
        'lifetime' => $session_lifetime,
        'path' => '/',
        'secure' => false, // true kalau pakai HTTPS
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
    session_start();
}

// Cek Cookie dengan nilai default string kosong jika tidak ada

define('OS', $_COOKIE['OS'] ?? '');
define('pwaAlert', $_COOKIE['pwaAlert'] ?? '');
define('APP_TYPE', $_COOKIE['APP_TYPE'] ?? '');

// Cek Session dengan nilai default null atau kosong jika belum login
define('USERID', $_SESSION['userid'] ?? null);
define('USERNAME', $_SESSION['username'] ?? 'Guest');
define('USERPICT', $_SESSION['userpict'] ?? 'default.png');
define('IDGROUPS', $_SESSION['IdGroups'] ?? null);
define('NMGROUPS', $_SESSION['NmGroups'] ?? null);
define('INISIAL', $_SESSION['KdSales'] ?? '');
define('IDDEPT', $_SESSION['id_department'] ?? null);