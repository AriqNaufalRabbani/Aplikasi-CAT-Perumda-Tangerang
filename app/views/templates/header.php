<?php
defined('BASE_PATH') or exit('No direct script access allowed');

if (!isset($_SESSION['userid'])) header("Location: " . BASE_URL . 'Login');

?>

<!DOCTYPE html>
<html>

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SIKAT — E-Learning ASN</title>
	<link rel="icon" href="<?= BASE_URL; ?>cdn/images/logo.jpg" type="image/png">

	<!-- Tell the browser to be responsive to screen width -->
	<!-- <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> -->
	<!-- <meta content="width=device-width" name="viewport"> -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="manifest" href="<?= BASE_URL ?>manifest.json">

	<!-- <meta name="Description" content="Aplikasi Supernova Custumer Relation Management" /> -->
	<!-- Mendeklarasikan warna yang muncul pada address bar Chrome versi seluler -->
	<meta name="theme-color" content="#414f57" />
	<!-- Mendeklarasikan ikon untuk iOS -->
	<meta name="apple-mobile-web-app-capable" content="no" />
	<meta name="apple-mobile-web-app-status-bar-style" content="default" />
	<meta name="apple-mobile-web-app-title" content="Supernova CRM" />
	<link rel="apple-touch-icon" href="<?= BASE_URL; ?>cdn/images/Logo_CRM/PNG/crm-sq-blue-bg.png" />
	<!-- Mendeklarasikan ikon untuk Windows -->
	<meta name="msapplication-TileImage" content="<?= BASE_URL; ?>cdn/images/Logo_CRM/PNG/crm-sq-blue-bg.png" />
	<meta name="msapplication-TileColor" content="#000000" />

	<!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->

	<link rel="icon" href="<?= BASE_URL; ?>cdn/images/Logo_CRM/PNG/crm-sq-blue-bg.png" type="image/png">
	<!-- Bootstrap 3.3.7 -->
	<!-- <link rel="stylesheet" media="all" href="<?= BASE_URL; ?>cdn/bower_components/bootstrap/dist/css/bootstrap.min.css?<?= filemtime("cdn/bower_components/bootstrap/dist/css/bootstrap.min.css"); ?>"> -->
	<!-- Font Awesome -->
	<link rel="stylesheet" media="all" href="<?= BASE_URL; ?>cdn/fonts/fontawesome/css/all.min.css?<?= filemtime("cdn/fonts/fontawesome/css/all.min.css"); ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" media="all" href="<?= BASE_URL; ?>cdn/bower_components/Ionicons/css/ionicons.min.css?<?= filemtime("cdn/bower_components/Ionicons/css/ionicons.min.css"); ?>">

	<!-- iCheck for checkboxes and radio inputs -->
	<link rel="stylesheet" media="all" href="<?= BASE_URL; ?>cdn/plugins/iCheck/all.css?<?= filemtime("cdn/plugins/iCheck/all.css"); ?>">
	<!-- Select2 -->
	<link rel="stylesheet" media="all" href="<?= BASE_URL; ?>cdn/plugins/select2/select2.min.css?<?= filemtime("cdn/plugins/select2/select2.min.css"); ?>">
	<!-- ViewerJS -->
	<link rel="stylesheet" href="<?= BASE_URL; ?>cdn/plugins/viewerjs/viewer.min.css?<?= filemtime("cdn/plugins/viewerjs/viewer.min.css"); ?>">
	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@600&family=Inter:wght@400;500;600;700&display=swap">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Golos+Text:wght@600&family=Poppins:wght@400;500;600;700&display=swap">
	<!-- BoxIcons -->
	<!-- <link rel="preload" href="<?= BASE_URL; ?>cdn/fonts/boxicons.css?<?= filemtime("cdn/fonts/boxicons.css"); ?>" as="style" onload="this.rel='stylesheet'" media="all"/> -->

	<!-- Theme style -->
	<!-- <link rel="stylesheet" media="all" href="<?= BASE_URL; ?>cdn/dist/css/AdminLTE.min.css?<?= filemtime("cdn/dist/css/AdminLTE.min.css"); ?>" media="all"> -->
	<!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
	<!-- <link rel="stylesheet" media="all" href="<?= BASE_URL; ?>cdn/dist/css/skins/_all-skins.min.css?<?= filemtime("cdn/dist/css/skins/_all-skins.min.css"); ?>" media="all"> -->

	<!-- Custom Style -->
	<!-- <link rel="stylesheet" href="<?= BASE_URL; ?>cdn/css/style.css?<?= filemtime("cdn/css/style.css"); ?>" media="all">
	<link rel="stylesheet" href="<?= BASE_URL; ?>cdn/css/style2.css?<?= filemtime("cdn/css/style2.css"); ?>" media="all"> -->
	<!-- scss -->
	<!-- <link rel="stylesheet" media="all" href="<?= BASE_URL; ?>cdn/css/scss/animate.css?<?= filemtime("cdn/css/scss/animate.css"); ?>"/> -->
	<!-- <link rel="stylesheet" href="<?= BASE_URL; ?>cdn/css/scss/ArcReactor/style.css"/> -->

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Sora:wght@400;600;700&display=swap" rel="stylesheet">

	<!-- Font Awesome 6 -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

	<!-- Bootstrap 5 -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="<?= BASE_URL; ?>cdn/css/template/style.css?<?= filemtime("cdn/css/template/style.css"); ?>">


	<!-- Sweet Alert 2 -->
	<script src="<?= BASE_URL; ?>cdn/plugins/sweetalert2/sweetalert2.js"></script>
	<!-- <link rel="stylesheet" href="<?= BASE_URL; ?>cdn/plugins/sweetalert2/sweetalert2.css"> -->


	<!-- jQuery 3.6.4 -->
	<script src="<?= BASE_URL; ?>cdn/plugins/jquery-3.6.4/jquery-3.6.4.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="<?= BASE_URL; ?>cdn/bower_components/jquery-ui/jquery-ui.min.js"></script>

	<!-- jQuery UI -->
	<link rel="stylesheet" href="<?= BASE_URL; ?>cdn/plugins/jQueryUI/jquery-ui.css">
	<script src="<?= BASE_URL; ?>cdn/plugins/jQueryUI/jquery-ui.js"></script>

	<!-- Bootstrap 3.3.7 -->
	<!-- <script src="<?= BASE_URL; ?>cdn/bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>



	<!-- DataTables -->
	<link rel="stylesheet" href="<?= BASE_URL; ?>cdn/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css?<?= filemtime("cdn/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"); ?>">
	<link rel="stylesheet" href="<?= BASE_URL; ?>cdn/plugins/dataTables/fixedHeader.dataTables.min.css">
	<!-- <link rel="stylesheet" href="cdn/plugins/dataTables/fixedColumns.dataTables.min.css"> -->
	<link rel="stylesheet" href="<?= BASE_URL; ?>cdn/plugins/dataTables/jquery.dataTables.min.css">
	<link rel="stylesheet" href="<?= BASE_URL; ?>cdn/plugins/dataTables/buttons.dataTables.min.css">

	<!-- DataTables -->
	<script src="<?= BASE_URL; ?>cdn/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
	<script src="<?= BASE_URL; ?>cdn/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
	<script src="<?= BASE_URL; ?>cdn/plugins/dataTables/jquery.dataTables.min.js"></script>
	<script src="<?= BASE_URL; ?>cdn/plugins/dataTables/dataTables.buttons.min.js"></script>

	<script src="<?= BASE_URL; ?>cdn/plugins/dataTables/dataTables.fixedColumns.min.js"></script>
	<script src="<?= BASE_URL; ?>cdn/plugins/dataTables/dataTables.fixedHeader.min.js"></script>

	<script src="<?= BASE_URL; ?>cdn/plugins/dataTables/buttons.html5.min.js"></script>
	<script src="<?= BASE_URL; ?>cdn/plugins/dataTables/buttons.print.min.js"></script>

	<!-- iCheck 1.0.1 -->
	<script src="<?= BASE_URL; ?>cdn/plugins/iCheck/icheck.min.js" defer></script>
	<!-- Select2 -->
	<script src="<?= BASE_URL; ?>cdn/plugins/select2/select2.full.min.js"></script>
	<!-- Session Timeout -->
	<script src="<?= BASE_URL; ?>cdn/plugins/session-timeout/dist/bootstrap-session-timeout.min.js" defer></script>
	<!-- ViewerJS -->
	<script type="text/javascript" src="<?= BASE_URL; ?>cdn/plugins/viewerjs/viewer.min.js" defer></script>
	<!-- Bootstrap 3 Validator -->
	<script src="<?= BASE_URL; ?>cdn/js/validator.min.js" defer></script>

	<!-- Autosuggest -->
	<!-- <script type="text/javascript" src="<?= BASE_URL; ?>cdn/plugins/auto_suggest/js/jquery-ui-1.8.2.custom.min.js"></script>
	<link 	rel="stylesheet" href="<?= BASE_URL; ?>cdn/plugins/auto_suggest/css/smoothness/jquery-ui-1.8.2.custom.css" /> -->


	<!-- Typeahead -->
	<link rel="stylesheet" href="<?= BASE_URL; ?>cdn/plugins/typeahead-js/typeahead.css?<?= filemtime("cdn/plugins/typeahead-js/typeahead.css"); ?>" />
	<script src="<?= BASE_URL; ?>cdn/plugins/typeahead-js/typeahead.js?<?= filemtime("cdn/plugins/typeahead-js/typeahead.js"); ?>" defer></script>

	<!-- Perfect-Scrollbar -->
	<link rel="preload" href="<?= BASE_URL; ?>cdn/plugins/perfect-scrollbar/perfect-scrollbar.css?<?= filemtime("cdn/plugins/perfect-scrollbar/perfect-scrollbar.css"); ?>" as="style" onload="this.rel='stylesheet'" />
	<script src="<?= BASE_URL; ?>cdn/plugins/perfect-scrollbar/perfect-scrollbar.min.js?<?= filemtime("cdn/plugins/perfect-scrollbar/perfect-scrollbar.min.js"); ?>" defer></script>

	<!-- Loading-Overlay -->
	<script src="<?= BASE_URL; ?>cdn/plugins/loading-overlay/loadingoverlay.min.js"></script>

	<!-- AdminLTE App -->
	<!-- <script src="<?= BASE_URL; ?>cdn/dist/js/adminlte.min.js" defer></script> -->
	<!-- AdminLTE for demo purposes -->
	<!-- <script src="<?= BASE_URL; ?>cdn/dist/js/demo.js" defer></script> -->

	<!-- <script src="<?= BASE_URL; ?>cdn/js/fiture.js" defer></script> -->


	<!-- Helpers JS -->
	<script src="<?= BASE_URL; ?>cdn/js/helpers.js?<?= filemtime("cdn/js/helpers.js"); ?>" defer></script>

	<!-- Custom Javascript -->
	<script>
		const BASE_URL = '<?= BASE_URL; ?>';
	</script>
	<!-- <script type="text/javascript" src="<?= BASE_URL; ?>cdn/js/notifikasi.js?<?= filemtime('cdn/js/notifikasi.js'); ?>"></script>
	<script type="text/javascript" src="<?= BASE_URL; ?>cdn/js/script.js?<?= filemtime('cdn/js/script.js'); ?>" defer></script> -->



	<!-- <script src="<?= BASE_URL; ?>cdn/js/crm-firebase-app.js" defer></script>
    <script src="<?= BASE_URL; ?>cdn/js/crm-firebase-messaging.js" defer></script>
	<script src="<?= BASE_URL; ?>cdn/js/crm-firebase-controller.js" defer></script> -->
	<!-- <script type="module" src="<?= BASE_URL; ?>cdn/js/firebase-database.js"></script> -->
	<!-- <script type="module" src="https://www.gstatic.com/firebasejs/9.22.1/firebase-app.js"></script>
	<script type="module" src="https://www.gstatic.com/firebasejs/9.22.1/firebase-messaging.js"></script>
	<script type="module" src="https://www.gstatic.com/firebasejs/9.22.1/firebase-database.js"></script> -->


	<!-- Firebase Cloud Messaging -->
	<!-- <script src="firebase-app.js"></script>
    <script src="firebase-messaging.js"></script> -->
	<!-- <script type="text/javascript" src="<?= BASE_URL; ?>cdn/js/crm-firebase-controller.js" async></script> -->

</head>

<body onload="$('#ModalLoader').hide()">
	<div id="custom-loader1" style="position: fixed; height: 100%; width: 100%; background-color: rgba(0, 0, 0, 0.8); z-index: 2222; display:none;">
		<div class="loader1">
			<div class="inner one"></div>
			<div class="inner two"></div>
			<div class="inner three"></div>
			<div class="loader-text">
				<span>Loading...</span>
			</div>
		</div>
	</div>


	<!-- Modal Loader -->
	<!-- <div id="ModalLoader" style="display: block; position: fixed; z-index: 999999; padding-top: 100px; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0, 0, 0, 0.9);">
		<div id="loader"></div>
	</div> -->

	<div class="sikat-root" id="sikatRoot">
		<!-- Overlay (mobile) -->
		<div class="sikat-overlay" id="sikatOverlay"></div>

		<!-- ══════════════════════════════════════════
       TOPBAR  (always visible, full width)
       ══════════════════════════════════════════ -->
		<header class="sikat-topbar">
			<!-- Left: brand + toggle -->
			<div class="sikat-topbar-left">
				<a class="sikat-brand" href="#">
					<div class="sikat-brand-icon">S</div>
					<div class="sikat-brand-text">
						<strong>SIKAT</strong>
						<span>E-Learning ASN</span>
					</div>
				</a>
				<!-- Toggle button — collapses sidebar on desktop, opens it on mobile -->
				
			</div>

			<!-- Right: search + actions + user -->
			<div style="display: flex; align-items: center; justify-content: space-between; width: 100%;">
				<button
					class="sikat-toggle-btn"
					id="sikatToggleBtn"
					type="button"
					title="Toggle Sidebar">
					<i class="fa-solid fa-bars-staggered"></i>
				</button>

				<div class="sikat-topbar-right">
					<div></div>
					<div class="sikat-topbar-search">
						<i class="fa-solid fa-magnifying-glass"></i>
						<input type="text" placeholder="Cari modul, materi..." />
					</div>
	
					<button class="sikat-topbar-btn" title="Notifikasi">
						<i class="fa-regular fa-bell"></i>
						<span class="sikat-notif-dot"></span>
					</button>
	
					<button class="sikat-topbar-btn" title="Pesan">
						<i class="fa-regular fa-envelope"></i>
					</button>
	
					<button class="sikat-topbar-btn" title="Bantuan">
						<i class="fa-regular fa-circle-question"></i>
					</button>
	
					<div class="sikat-topbar-user" id="sikatTopbarUser">
						<div class="sikat-topbar-avatar">
							<img src="<?= BASE_URL; ?>cdn/images/user.png" width="20" height="20" alt="user">
						</div>
						<span class="sikat-topbar-uname"><?php echo $_SESSION['fullname'];?></span>
						<i class="fa-solid fa-chevron-down"></i>
					</div>
				</div>
			</div>
		</header>

		<!-- ══════════════════════════════════════════
       SIDEBAR
       ══════════════════════════════════════════ -->
		<aside class="sikat-sidebar" id="sikatSidebar" aria-label="Menu Navigasi">
			<nav class="sikat-sidebar-nav">
				<!-- Menu Utama -->
				<div class="sikat-nav-section">
					<span class="sikat-nav-label">Menu Utama</span>
					<a
						class="sikat-nav-item sikat-active"
						href="#"
						data-tooltip="Beranda">
						<i class="sikat-nav-icon fa-solid fa-house"></i>
						<span class="sikat-nav-text">Beranda</span>
					</a>
					<a class="sikat-nav-item" href="#" data-tooltip="Modul Pelatihan">
						<i class="sikat-nav-icon fa-solid fa-book-open"></i>
						<span class="sikat-nav-text">Modul Pelatihan</span>
					</a>
					<a class="sikat-nav-item" href="#" data-tooltip="Ujian & Kuis">
						<i class="sikat-nav-icon fa-solid fa-pen-to-square"></i>
						<span class="sikat-nav-text">Ujian &amp; Kuis</span>
					</a>
					<a class="sikat-nav-item" href="#" data-tooltip="Sertifikat">
						<i class="sikat-nav-icon fa-solid fa-certificate"></i>
						<span class="sikat-nav-text">Sertifikat</span>
					</a>
				</div>

				<div class="sikat-nav-divider"></div>

				<!-- Progres -->
				<div class="sikat-nav-section">
					<span class="sikat-nav-label">Progres</span>
					<a class="sikat-nav-item" href="#" data-tooltip="Laporan Belajar">
						<i class="sikat-nav-icon fa-solid fa-chart-bar"></i>
						<span class="sikat-nav-text">Laporan Belajar</span>
					</a>
					<a class="sikat-nav-item" href="#" data-tooltip="Target Kompetensi">
						<i class="sikat-nav-icon fa-solid fa-bullseye"></i>
						<span class="sikat-nav-text">Target Kompetensi</span>
					</a>
					<a class="sikat-nav-item" href="#" data-tooltip="Jadwal Pelatihan">
						<i class="sikat-nav-icon fa-solid fa-calendar-days"></i>
						<span class="sikat-nav-text">Jadwal Pelatihan</span>
					</a>
				</div>

				<div class="sikat-nav-divider"></div>

				<!-- Master Data -->
				<div class="sikat-nav-section">
					<span class="sikat-nav-label">Master Data</span>
					<a class="sikat-nav-item" href="MasterModul" data-tooltip="Master Modul">
						<i class="sikat-nav-icon fa-solid fa-layer-group"></i>
						<span class="sikat-nav-text">Master Modul</span>
					</a>
				</div>

				<div class="sikat-nav-divider"></div>

				<!-- Lainnya -->
				<div class="sikat-nav-section">
					<span class="sikat-nav-label">Lainnya</span>
					<a class="sikat-nav-item" href="#" data-tooltip="Forum Diskusi">
						<i class="sikat-nav-icon fa-solid fa-comments"></i>
						<span class="sikat-nav-text">Forum Diskusi</span>
					</a>
					<a class="sikat-nav-item" href="#" data-tooltip="Pengumuman">
						<i class="sikat-nav-icon fa-solid fa-bullhorn"></i>
						<span class="sikat-nav-text">Pengumuman</span>
					</a>
					<a class="sikat-nav-item" href="#" data-tooltip="Pengaturan">
						<i class="sikat-nav-icon fa-solid fa-gear"></i>
						<span class="sikat-nav-text">Pengaturan</span>
					</a>
					<a class="sikat-nav-item" href="Logout" data-tooltip="Keluar">
						<i class="sikat-nav-icon fa-solid fa-sign-out"></i>
						<span class="sikat-nav-text">Keluar</span>
					</a>
				</div>
			</nav>

			<!-- User footer -->
			<div class="sikat-sidebar-footer">
				<div class="sikat-sidebar-user" data-tooltip="Profil Saya">
					<div class="sikat-avatar-sm"><img src="<?= BASE_URL; ?>cdn/images/user.png" width="20" height="20" alt="user"></div>
					<div class="sikat-sidebar-user-info">
						<div class="sikat-user-name"><?php echo $_SESSION['fullname'];?></div>
						<div class="sikat-user-role">Peserta</div>
					</div>
				</div>
			</div>
		</aside>

		<!-- ══════════════════════════════════════════
       MAIN
       ══════════════════════════════════════════ -->
		<main class="sikat-main">
			<div class="sikat-content">

				
			
