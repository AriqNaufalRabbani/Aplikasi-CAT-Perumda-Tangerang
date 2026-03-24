<?php
$CRMSESSID = $_COOKIE["CRMSESSID"];
setcookie('CRMSESSID', $CRMSESSID, "Session", "/", '', true, true);

// $cookie_name = "CRMSESSID";
// $cookie_value = $CRMSESSID;
// $cookie_expire = "Session"; // Kadaluwarsa cookie (30 hari)
// $cookie_path = "/";
// $cookie_domain = "example.com";
// $cookie_secure = true;
// $cookie_httpOnly = true;
// $cookie_samesite = "Lax";
// header('Set-Cookie: '.$cookie_name.'='.$cookie_value.'; expires='.$cookie_expire.'; path='.$cookie_path.'; domain='.$cookie_domain.'; secure='.$cookie_secure.'; HttpOnly; SameSite='.$cookie_samesite);

// // setcookie('CRMSESSID', $CRMSESSID, [
// //     'expires' => "Session",
// //     'path' => '/',
// //     'domain' => 'https://crm.supernova-id.com/',
// //     'secure' => true,
// //     'httponly' => true,
// //     'SameSite' => 'Lax']);
?>


<!DOCTYPE html>
<html lang="id" style="height: auto; min-height: 100%; max-height: 50%;">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="robots" content="noindex nofollow nosnippet">
        <title>Kebijakan Privasi | CRM Supernova</title>
        <link rel="icon" href="<?= BASE_URL; ?>cdn/images/Logo_CRM/PNG/crm-sq-blue-bg.png" type="image/x-icon">

        <link rel="manifest" href="<?=BASE_URL?>manifest.json">

        <meta name="Description" content="Aplikasi Supernova Custumer Relation Management" />
        <!-- Mendeklarasikan warna yang muncul pada address bar Chrome versi seluler -->
        <meta name="theme-color" content="#414f57" />
        <!-- Mendeklarasikan ikon untuk iOS -->
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="default" />
        <meta name="apple-mobile-web-app-title" content="Supernova Mobile" />
        <link rel="apple-touch-icon" href="<?= BASE_URL; ?>cdn/images/Logo_CRM/PNG/crm-sq-blue-bg.png" />
        <!-- Mendeklarasikan ikon untuk Windows -->
        <meta name="msapplication-TileImage" content="<?= BASE_URL; ?>cdn/images/Logo_CRM/PNG/crm-sq-blue-bg.png" />
        <meta name="msapplication-TileColor" content="#000000" />

        <!-- <meta http-equiv="Content-Security-Policy" content="script-src 'self'">
        <meta http-equiv="Content-Security-Policy" content="style-src 'self'"> -->
        <!-- Tell the browser to be responsive to screen width -->
        <!-- <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> -->
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?= BASE_URL; ?>cdn/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= BASE_URL; ?>cdn/bower_components/bootstrap/dist/css/bootstrap.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= BASE_URL; ?>cdn/fonts/fontawesome/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?= BASE_URL; ?>cdn/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= BASE_URL; ?>cdn/dist/css/AdminLTE.min.css?<?=filemtime("cdn/dist/css/AdminLTE.min.css");?>">
        <!-- <link rel="stylesheet" href="<?= BASE_URL; ?>cdn/css/scss/ArcReactor/style.css"/> -->
        <link rel="stylesheet" href="<?= BASE_URL; ?>cdn/css/Custom-Loading1/style.css?<?=filemtime("cdn/css/Custom-Loading1/style.css");?>">

        <link rel="stylesheet" href="<?= BASE_URL; ?>cdn/css/style2.css?<?= filemtime("cdn/css/style2.css"); ?>" media="all">


        <!-- Google Font -->
        <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> -->
        <link rel="stylesheet" href="<?= BASE_URL; ?>cdn/fonts/Source-Sans-Pro-300_400_600_700_300italic_400italic_600italic/Source-Sans-Pro-300_400_600_700_300italic_400italic_600italic.css">
        <style>
            #loading-bg {
                width: 100%;
                height: 100%;
                position: fixed;
                /* text-align: center; */
                top: 0;
                left: 0;
                background-color: rgba(0, 0, 0, 0.4);
                z-index: 2222;
            }
            
            #loading-image {
                width: 100%;
                height: 100%;
                position: fixed;
                font-size: 200px;
                /* top: 50%; */
                display: flex;
                justify-content: center;
                align-items: center;
                
                color: white;
                /* left: 50%; */
                z-index: 2223;
            }

            .SubTitle{
                background: -webkit-linear-gradient(#1451E5, #0C318C);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                font-weight: bold;
            }
        </style>  
        <!-- Custom Javascript -->
        <script>const BASE_URL = '<?= BASE_URL; ?>';</script>

        <!-- Sweet Alert 2 -->
        <script src="cdn/plugins/sweetalert2/sweetalert2.js" async></script>
        <!-- jQuery 3.6.4 -->
        <script src="<?= BASE_URL; ?>cdn/plugins/jquery-3.6.4/jquery-3.6.4.min.js" ></script>
    </head>
    <body class="privacy-page" style="height: auto; min-height: 100%; 
        background-image: url('<?= BASE_URL; ?>cdn/images/plant/MM2100.jpg');
        background-position: center;
        background-repeat: repeat-y;
        background-size: cover;">


        <div id="custom-loader1" style="position: fixed; height: 100%; width: 100%; background-color: rgba(0, 0, 0, 0.8); z-index: 2222;">
            <div class="loader1">
                <div class="inner one"></div>
                <div class="inner two"></div>
                <div class="inner three"></div>
                <div class="loader-text">
                    <span>Loading...</span>
                </div>
            </div>
        </div>

        <div class="container">
            
            <div class="box" style="margin-top:40px;">
                <div class="box-body" style="padding:20px 40px;">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="<?php echo BASE_URL ;?>" style="float:left;" class="btn btn-danger-gradient">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                            </a>
                            <h3>Kebijakan Privasi</h3>
                        </div>           
                    </div>        
                    <hr>
                    <div class="row" style="text-align: justify; font-size: 16px; color: #6e6e6e;">
                        <div class="col-md-12">
                            <p>
                                Dengan mengakses situs https://crm.supernova-id.com/ ("Situs") ini, 
                                maka Anda dianggap telah membaca, memahami dan menyetujui seluruh kebijakan 
                                dan ketentuan yang diuraikan di dalam Kebijakan Privasi ("Kebijakan") ini, 
                                termasuk seluruh tata cara perolehan, pengumpulan, pengolahan, penganalisaan, penyimpanan, 
                                penggunaan, penyebarluasan dan pemusnahan dari data - data pribadi Anda sebagaimana yang 
                                telah dijelaskan di dalam Kebijakan ini.
                            </p>
                            <h4 class="SubTitle">1. Lingkup Kebijakan Privasi</h4>
                            <p style="margin-left:20px;">
                                Kebijakan ini merupakan bagian dari komitmen Kami untuk selalu transparan 
                                mengenai tata cara pengumpulan, penggunaan, pengungkapan dan cara kami (beserta dengan 
                                seluruh perusahaan afilisiasi serta perusahaan rekanan kami) untuk memproses serta 
                                melindungi setiap data dan informasi pribadi setiap pengguna. Kebijakan ini berlaku untuk 
                                seluruh tata cara komunikasi, penggunaan Situs serta penggunaan produk dan layanan yang kami 
                                berikan.
                            </p>
                            <p style="margin-left:20px;">
                                Kami menghargai privasi Anda dan kami ingin menjaga informasi pribadi Anda. 
                                Oleh karenanya, kami hanya akan mengumpulkan dan menggunakan data sesuai dengan Kebijakan ini 
                                dan semua data yang dikumpulkan tidak akan diperjualbelikan kepada pihak manapun melainkan 
                                hanya digunakan semata - mata untuk meningkatkan pengalaman pengguna saat berada di Situs ini 
                                dan untuk keperluan promosi. Kebijakan ini mematuhi seluruh peraturan perundang - undangan 
                                yang berlaku sehubungan tentang privasi data dan tidak akan mengungkapkan data - data Anda 
                                kecuali jika diwajibkan oleh peraturan perundang - undangan ataupun berdasarkan penetapan 
                                pengadilan.
                            </p>
                            <p style="margin-left:20px;">
                                Kami dapat sewaktu-waktu mengubah ketentuan Kebijakan ini tanpa pemberitahuan 
                                terlebih dahulu untuk menyesuaikan dengan keadaan dan situasi terkini. Kami menyarankan agar 
                                Anda membaca Kebijakan Privasi secara berkala untuk mengetahui apakah ada perubahan Kebijakan 
                                sejak kunjungan terakhir Anda. Selama menggunakan Situs ini, maka Anda secara eksplisit 
                                dianggap telah memberikan persetujuan atas Kebijakan ini dan/atau perubahan-perubahannya di 
                                kemudian hari.
                            </p>
                            <h4 class="SubTitle">2. Pengumpulan Data Pribadi</h4>
                            <p style="margin-left:20px;">
                                1. Kami dapat mengumpulkan data dan informasi pribadi Anda secara otomatis 
                                melalui peramban Situs (website browser) maupun secara offline, baik melalui:
                            </p>
                            <p style="margin-left:20px;">
                                <ol type="a" style="margin-left:20px;">
                                    <li>
                                        Informasi yang secara mandiri Anda berikan kepada kami pada saat ada:
                                    </li>
                                
                                    <ul>
                                        <li>Mendaftar dan/atau menggunakan layanan kami atau membuka sebuah akun di Situs;</li>
                                        <li>Mengirimkan data pribadi Anda kepada Kami untuk alasan apapun;</li>
                                        <li>Melakukan transaksi melalui Situs kami;</li>
                                        <li>Menyampaikan kritik dan saran atau keluhan kepada kami;</li>
                                        <li>Mengisi formulir/survei apapun yang berkaitan dengan layanan kami;</li>
                                    </ul>
                                    <li>
                                        Informasi yang kami kumpulkan melalui Cookies atau teknologi lainnya.
                                    </li>
                                </ol>
                            </p>
                            <!-- <p style="margin-left:20px;">
                                c. Informasi yang berasal dari sumber lain, termasuk dari:
                                    <ul style="margin-left:20px;">
                                        <li>
                                            Pengiklan tentang pengalaman atau interaksi Anda dengan penawaran mereka.
                                            Rekanan kami yang turut membantu dalam pengembangan, penyajian layanan, layanan pembayaran, logistik, infrastruktur situs dan rekanan lainnya.
                                            Informasi yang diberikan oleh pihak ketiga kepada kami dimana informasi tersebut mungkin berisi aktivitas Anda di situs web dan aplikasi lain.
                                            Sumber yang tersedia secara umum.
                                        </li>
                                    </ul>
                            </p> -->
                            <p style="margin-left:20px;">
                                2. Data dan informasi pribadi yang dapat dikumpulkan termasuk :
                                <ol type="a" style="margin-left:20px;">
                                    <li>
                                        Data identitas seperti nama, jenis kelamin, gambar profil dan tanggal lahir Anda.
                                    </li>
                                    <li>
                                        Data profil seperti nama pengguna (username) dan kata sandi Anda, preferensi, 
                                        respon atas tanggapan dan survei.
                                    </li>
                                    <li>
                                        Data kontak seperti alamat rumah, alamat surat elektronik, dan nomor telepon.
                                    </li>
                                    <li>
                                        Data biometrik seperti file suara ketika Anda menggunakan fungsi pencarian suara kami serta fitur wajah dan 
                                        tubuh lain dan suara Anda dan/atau orang lain yang difiturkan di video Anda ketika Anda mengunggah video ke Situs.
                                    </li>
                                    <li>
                                        Data teknis seperti alamat Internet protocol (IP), data login Anda, jenis dan versi browser, pengaturan zona waktu 
                                        dan lokasi, jenis dan versi browser plug-in, sistem operasi dan platform, identitas internasional perangkat seluler, 
                                        pengidentifikasi perangkat, IMEI, alamat MAC, cookies (jika berlaku) dan teknologi dan informasi lain pada perangkat 
                                        yang Anda gunakan untuk mengakses Situs.
                                    </li>
                                </ol>
                            </p>
                            <!-- <p style="margin-left:20px;">
                                3. Kami berasumsi bahwa informasi yang Anda berikan saat ini dan perubahan-perubahan yang Anda lakukan 
                                sekarang atau di masa mendatang adalah benar dan sah. Apabila informasi dan perubahan-perubahan yang diberikan tersebut 
                                ternyata terbukti tidak benar, maka Kami tidak bertanggung jawab atas segala akibat yang dapat terjadi 
                                sehubungan dengan pemberian informasi dan perubahan-perubahan yang tidak benar tersebut, termasuk kegagalan dalam 
                                melakukan verifikasi pesanan ataupun verifikasi pembayaran.
                            </p> -->
                            <h4 class="SubTitle">3. Penggunaan Data Pribadi</h4>
                            <p style="margin-left:20px;">
                                Informasi pribadi yang dikumpulkan dapat digunakan untuk tujuan penggunaan, 
                                contohnya: memberikan layanan, mengirim pemberitahuan, mengirim email, dll. 
                                Informasi Anda juga dapat digunakan untuk tujuan lain, seperti analisis data, 
                                peningkatan layanan, dll.
                            </p>
                            <h4 class="SubTitle">4. Pengungkapan Data dan Informasi Pribadi</h4>
                            <p style="margin-left:20px;">
                                Kami tidak akan membagikan informasi pribadi Anda kepada pihak ketiga, kecuali dengan izin Anda atau jika diperlukan oleh hukum.
                            </p>
                            <h4 class="SubTitle">5. Keamanan Data Pribadi</h4>
                            <p style="margin-left:20px;">
                                Kami memastikan bahwa semua informasi yang dikumpulkan akan disimpan dengan aman. Kami melindungi semua informasi pribadi Anda dengan:
                                <ul>
                                    <li>
                                        Membatasi akses terhadap informasi pribadi Anda hanya kepada pihak - pihak yang perlu untuk memastikan bahwa tujuan penggunaan data pribadi sebagaimana yang telah dijabarkan sebelumnya dapat tercapai.
                                    </li>
                                    <li>
                                        Menghapus data pribadi Anda sesuai dengan ketentuan hukum yang berlaku.
                                    </li>
                                </ul>
                            </p>
                            <h4 class="SubTitle">6. Hubungi Kami</h4>
                            <p style="margin-left:20px;">
                                Jika Anda memiliki pertanyaan atau komentar tentang Kebijakan Privasi kami, silakan hubungi kami melalui "itsupernovagroup@gmail.com".
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
		<?php $Flash = Flasher::Flash(); if ($Flash) echo $Flash; // Show Flasher if exist ?>


        <!-- <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" defer></script> -->
        <script>
            // if ('serviceWorker' in navigator) {
            //     window.addEventListener('load', () => {
            //     navigator.serviceWorker.register('/sw.js');
            //     });
            // }
        </script>

        <script>
            // $(function() {
            //     $('#loading-bg').hide();
            //     $('#loading-image').hide();

            //     $(window).on('beforeunload', function() {
            //         $('#loading-bg').show();
            //         $('#loading-image').show();
            //     });
            // });

            // $('#loading-Reactor').hide();
            $('#custom-loader1').hide();
			$(window).on('beforeunload', function() {
				// $('#loading-Reactor').show();
                $('#custom-loader1').show();
				// $('#loading-image').show();
			});

            // var onloadCallback = function(){
            //     let captchaMasuk;
            //     captchaMasuk = grecaptcha.render('captcha__masuk', {
            //         'sitekey' : '6LfChe8lAAAAAFO5XllgF3ZUuYZWTw6aKx7G3r31',
            //         'callback': function(token){
            //             $("#btn_login").removeAttr("disabled");
            //         },
            //         "expired-callback": function(token){
            //             $("#btn_login").attr("disabled", true);
            //         },
            //         "error-callback": function(token){
            //             $("#btn_login").attr("disabled", true);
            //         }
            //     });
            // };


            $("#forget").on('click', function(){
                Swal.fire({
                    icon: 'info',
                    text: 'Silakan menghubungi IT Helpdesk untuk reset password. Ext. 238'
                });
            });

            $('#btn_show_password').on('click', function(){
                var self = $(this);

                if (!self.hasClass('password-show')) {
                    $('#icon_pass').removeClass('fa-eye-slash');
                    $('#icon_pass').addClass('fa-eye');
                    $('#pass').attr('type', 'text');
                }
                else {
                    $('#icon_pass').removeClass('fa-eye');
                    $('#icon_pass').addClass('fa-eye-slash');
                    $('#pass').attr('type', 'password');
                }

                self.toggleClass('password-show');
            });

            $('#form_login').on('submit', function(e){
                // e.preventDefault();
                let that 		= $(".btn-Sign-In");
                // let g_recaptcha_response = that.closest('form').find('.g-recaptcha-response').val();
                
                // if(g_recaptcha_response == ''){
                //     Toast.fire({
                //         icon: 'info',
                //         title: "reCaptcha not valid!",
                //     });

                //     $(".btn-Sign-In").blur();
                //     return false;
                // }

            });
        </script>
    </body>
</html>