<?php

// echo '<pre>';
$detect = new AppDetect();
$getOS = $detect->getOS();
// echo '</pre>';

?>


<!DOCTYPE html>
<html lang="id" style="height: auto; min-height: 100%; max-height: 50%;">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<title>Login Admin – Kuesioner CAT COPD</title>
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,700&family=Mulish:wght@400;500;600;700&display=swap" rel="stylesheet" />

	<link rel="manifest" href="<?= BASE_URL ?>manifest.json">
	<link rel="icon" href="<?= BASE_URL; ?>cdn/images/logo.jpg" type="image/png">

	<meta name="Description" content="Aplikasi CAT PERUMDA Kota Tangerang" />
	<!-- Mendeklarasikan warna yang muncul pada address bar Chrome versi seluler -->
	<meta name="theme-color" content="#414f57" />
	<!-- Mendeklarasikan ikon untuk iOS -->
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="default" />
	<meta name="apple-mobile-web-app-title" content="Aplikasi CAT" />
	<link rel="apple-touch-icon" href="<?= BASE_URL; ?>cdn/images/logo.jpg" />
	<!-- Mendeklarasikan ikon untuk Windows -->
	<meta name="msapplication-TileImage" content="<?= BASE_URL; ?>cdn/images/logo.jpg" />
	<meta name="msapplication-TileColor" content="#000000" />

	<!-- Bootstrap 3.3.7 -->
	<!-- <link rel="stylesheet" href="<?= BASE_URL; ?>cdn/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= BASE_URL; ?>cdn/bower_components/bootstrap/dist/css/bootstrap.css"> -->
	<!-- Font Awesome -->
	<!-- <link rel="stylesheet" href="<?= BASE_URL; ?>cdn/fonts/fontawesome/css/all.min.css"> -->
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?= BASE_URL; ?>cdn/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<!-- <link rel="stylesheet" href="<?= BASE_URL; ?>cdn/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="<?= BASE_URL; ?>cdn/css/scss/ArcReactor/style.css" />
	<link rel="stylesheet" href="<?= BASE_URL; ?>cdn/css/Custom-Loading1/style.css?<?= filemtime("cdn/css/Custom-Loading1/style.css"); ?>"> -->

	<!-- Google Font -->
	<!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> -->
	<link rel="stylesheet" href="<?= BASE_URL; ?>cdn/fonts/Source-Sans-Pro-300_400_600_700_300italic_400italic_600italic/Source-Sans-Pro-300_400_600_700_300italic_400italic_600italic.css">
	<link rel="stylesheet" href="<?= BASE_URL; ?>cdn/css/login/admin.css">
	<!-- Custom Javascript -->
	<!-- <script>const BASE_URL = '<?= BASE_URL; ?>';</script>
        <script type="text/javascript" src="<?= BASE_URL; ?>cdn/js/notifikasi.js?<?= filemtime('cdn/js/notifikasi.js'); ?>"></script>
        <script type="text/javascript" src="<?= BASE_URL; ?>cdn/js/script.js?<?= filemtime('cdn/js/script.js'); ?>" defer></script> -->

	<!-- Sweet Alert 2 -->
	<script src="cdn/plugins/sweetalert2/sweetalert2.js" async></script>
	<!-- jQuery 3.6.4 -->
	<script src="<?= BASE_URL; ?>cdn/plugins/jquery-3.6.4/jquery-3.6.4.min.js"></script>
</head>

<body class="login-page">

	<!-- ═══ LEFT ═══ -->
	<div class="left">
		<div class="waves">
			<div class="w w1"></div>
			<div class="w w2"></div>
			<div class="w w3"></div>
		</div>

		<!-- brand -->
		<div class="brand">
			<div class="brand-ico">
				<!-- lungs icon -->
				<!-- <svg
					width="26"
					height="26"
					viewBox="0 0 24 24"
					fill="none"
					stroke="#fff"
					stroke-width="1.8"
					stroke-linecap="round"
					stroke-linejoin="round">
					<path d="M6.5 8C5 8 3 9.5 3 13c0 4 2 7 4 7s2-2 2-4V8" />
					<path d="M17.5 8C19 8 21 9.5 21 13c0 4-2 7-4 7s-2-2-2-4V8" />
					<path d="M9 8V5a3 3 0 016 0v3" />
					<line x1="12" y1="5" x2="12" y2="16" />
				</svg> -->
				<img src="<?= BASE_URL; ?>cdn/images/logo.jpg" width="26" height="26" alt="">
			</div>
			<div class="brand-txt">
				<!-- <div class="name">Kuesioner CAT</div>
				<div class="sub">Assessment Test</div> -->
				<div class="name">CAT UJIAN SELEKSI PDAM</div>
				<div class="sub">KOTA TANGERANG TIRTA BENTENG</div>
			</div>
		</div>

		<!-- badge -->
		<div class="badge">
			<div class="badge-dot"></div>
			<span>Transparan · Akuntabel · Berbasis Digital</span>
		</div>

		<!-- hero -->
		<div class="hero">
			<h1>Aplikasi <em>CAT</em> PDAM<br /> Kota Tangerang</h1>
			<p>
				Sistem aplikasi Computer Assisted Test (CAT) resmi PDAM Kota Tangerang Tirta
				Benteng untuk pelaksanaan ujian seleksi pegawai yang terstandardisasi,
				transparan, dan real-time, guna menyaring calon pegawai terbaik.
			</p>
		</div>

		<!-- features -->
		<div class="features">
			<div class="feat">
				<div class="feat-ico">
					<svg
						width="14"
						height="14"
						fill="none"
						viewBox="0 0 24 24"
						stroke="#fff"
						stroke-width="2.5"
						stroke-linecap="round"
						stroke-linejoin="round">
						<path d="M9 11l3 3L22 4" />
						<path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" />
					</svg>
				</div>
				Sistem Ujian CAT terstandarisasi untuk transparansi
			</div>
			<div class="feat">
				<div class="feat-ico">
					<svg
						width="14"
						height="14"
						fill="none"
						viewBox="0 0 24 24"
						stroke="#fff"
						stroke-width="2.5"
						stroke-linecap="round"
						stroke-linejoin="round">
						<polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
					</svg>
				</div>
				Skor otomatis & pengumuman hasil real-time
			</div>
			<div class="feat">
				<div class="feat-ico">
					<svg
						width="14"
						height="14"
						fill="none"
						viewBox="0 0 24 24"
						stroke="#fff"
						stroke-width="2.5"
						stroke-linecap="round"
						stroke-linejoin="round">
						<rect x="3" y="3" width="18" height="18" rx="2" />
						<path d="M9 9h6M9 12h6M9 15h4" />
					</svg>
				</div>
				Sertifikat & riwayat hasil seleksi tersimpan aman
			</div>
		</div>

		<div class="footer-icons">
			<div class="icon-item"><i class="fa-solid fa-user-tie"></i> REKRUTMEN</div>
			<div class="icon-item"><i class="fa-solid fa-laptop-code"></i> UJIAN</div>
			<div class="icon-item"><i class="fa-solid fa-chart-line"></i> HASIL</div>
		</div>
	</div>
	<!-- .left -->

	<!-- ═══ RIGHT ═══ -->
	<div class="right">
		<div class="form-box">
			<form action="admin/process" method="post" id="form_login" autocomplete="false" >

				<div class="tagline">Selamat Datang</div>
				<h1 class="form-title">Masuk ke<br />Dashboard Admin CAT</h1>
				<p class="form-desc">
					Silakan masukkan username / email dan kata sandi untuk mengakses Aplikasi CAT PDAM.
				</p>

				<!-- error alert -->
				<div class="alert" id="alert">
					<svg
						width="17"
						height="17"
						viewBox="0 0 24 24"
						fill="none"
						stroke="currentColor"
						stroke-width="2.5"
						stroke-linecap="round"
						stroke-linejoin="round">
						<circle cx="12" cy="12" r="10" />
						<line x1="12" y1="8" x2="12" y2="12" />
						<line x1="12" y1="16" x2="12.01" y2="16" />
					</svg>
					<span id="alert-msg">Username / Email atau kata sandi salah. Silakan coba kembali.</span>
				</div>

				<!-- phone -->
				<div class="field">
					<label for="phone">Username / Email</label>
					<div class="inp-wrap">
						<span class="inp-ico">
							<svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
						</span>
						<input type="text" id="username" name="username" placeholder="Masukkan username atau email" autocomplete="username" required/>
					</div>
				</div>

				<!-- password -->
				<div class="field">
					<label for="pass">Kata Sandi</label>
					<div class="inp-wrap">
						<span class="inp-ico">
							<svg
								width="16"
								height="16"
								viewBox="0 0 24 24"
								fill="none"
								stroke="currentColor"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round">
								<rect x="3" y="11" width="18" height="11" rx="2" />
								<path d="M7 11V7a5 5 0 0110 0v4" />
							</svg>
						</span>
						<input
							type="password"
							id="password"
                            name="password"
							placeholder="Masukkan kata sandi"
							autocomplete="current-password" />
						<button
							type="button"
							class="eye-btn"
							id="eyeBtn"
							onclick="togglePw()"
							aria-label="Lihat password">
							<svg
								id="eyeIco"
								width="16"
								height="16"
								viewBox="0 0 24 24"
								fill="none"
								stroke="currentColor"
								stroke-width="2"
								stroke-linecap="round"
								stroke-linejoin="round">
								<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
								<circle cx="12" cy="12" r="3" />
							</svg>
						</button>
					</div>
				</div>

				<!-- remember / forgot -->
				<div class="row-extra">
					<label class="remember">
						<input type="checkbox" id="remember" />
						Ingat saya
					</label>
					<a href="#" class="forgot">Lupa Kata Sandi?</a>
				</div>

				<!-- login -->
				<button type="submit" class="btn-primary">Masuk sebagai Admin</button>

				<!-- divider -->
				<!-- <div class="divider">
					<hr />
					<span>atau</span>
					<hr />
				</div> -->

				<!-- register -->
				<!-- <a href="#" class="btn-outline">Belum Memiliki Akun? Daftar</a> -->

				<!-- footer -->
				<div class="form-foot">
					Butuh bantuan? <a href="#">Hubungi Administrator</a>
				</div>
			</form>
		</div>
	</div>

	<script>
		function togglePw() {
			const inp = document.getElementById("password");
			const ico = document.getElementById("eyeIco");
			const show = inp.type === "password";
			inp.type = show ? "text" : "password";
			ico.innerHTML = show ?
				`<line x1="1" y1="1" x2="23" y2="23"/><path d="M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19"/><path d="M6.53 6.53A18.46 18.46 0 001 12s4 8 11 8a9.09 9.09 0 007.45-3.87"/>` :
				`<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>`;
		}
	</script>

	<?php $Flash = Flasher::Flash(); if ($Flash) echo $Flash; // Show Flasher if exist  ?>

</body>

</html>