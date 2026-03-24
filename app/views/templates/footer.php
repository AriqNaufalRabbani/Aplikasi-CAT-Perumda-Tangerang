		
				</div>
				<!-- /sikat-content -->
			</main>
		</div>
		<!-- Main Modal -->
		<div id="MainModal" data-easein="swoopIn" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true"></div>

		<!-- Add Modal -->
		<div id="AddModal" data-easein="swoopIn" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true"></div>

		<!-- Edit Modal -->
		<div id="EditModal" data-easein="swoopIn" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true"></div>

		<!-- Detail Modal -->
		<div id="DetailModal" data-easein="swoopIn" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true"></div>

		<!-- Report Modal -->
		<div id="ReportModal" data-easein="swoopIn" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true"></div>

		<!-- Progress Modal -->
		<div class="modal fade" id="ModalProgress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			<div style="display:table; height: 100%; min-width: 300px; margin: auto;">
				<div class="modal-dialog" style="display: table-cell; vertical-align: middle;">
					<div class="modal-content">
						<div class="modal-body">
							<button type="button" class="close" data-dismiss="modal" style="display: none;">&times;</button>
							<p class="progress-status" style="text-align: center; font-weight: bold;"></p>
							<div class="progress" style="margin-bottom: 0px;">
								<div class="progress-bar active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
									0%
								</div>
							</div>
							<p class="text-center progress-text" style="margin-top: 1rem; margin-bottom: 0px;"></p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="progress_modal" style="display: none;position: fixed;z-index: 9999;padding: 100px;left: 0;top: 0;width: 100%;height: 100%;overflow: auto;background-color: rgba(0, 0, 0, 0.4);">
			<div style="display: flex;justify-content: center;height: 100%;align-items: center;">
				<div class="panel panel-default" style="
		            width: 100%;
		            max-width: 720px;">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-12" align="center">
								<button type="button" class="close" aria-label="Close" id="progress_close" style="display: none;">
									<span aria-hidden="true">×</span>
								</button>
								<h3 id="progress_status" style="margin: 1rem 0;">Menyimpan...</h3>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12" align="center">
								<div class="progress">
									<div class="progress-bar progress-bar-striped" id="progress_bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
										0%
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12" align="center">
								<pre id="progress_message" style="max-height: 300px;"></pre>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Custom Modal 1 -->
		<div id="CustomModal1" style="transform:scale(1); z-index:1040;" data-easein="swoopIn" class="" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="myModalLabel" aria-hidden="true">
		</div>


		<!-- Morris chart -->
		<link rel="stylesheet" media="all" href="<?= BASE_URL ?>cdn/bower_components/morris.js/morris.css">
		<!-- jvectormap -->
		<link rel="stylesheet" media="all" href="<?= BASE_URL ?>cdn/bower_components/jvectormap/jquery-jvectormap.css">
		<!-- Date Picker -->
		<link rel="stylesheet" media="all" href="<?= BASE_URL ?>cdn/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
		<!-- Daterange picker -->
		<link rel="stylesheet" media="all" href="<?= BASE_URL ?>cdn/bower_components/bootstrap-daterangepicker/daterangepicker.css">
		<!-- bootstrap wysihtml5 - text editor -->
		<link rel="stylesheet" media="all" href="<?= BASE_URL ?>cdn/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<!-- Morris.js charts -->
		<script src="<?= BASE_URL ?>cdn/bower_components/raphael/raphael.min.js" defer></script>
		<script src="<?= BASE_URL ?>cdn/bower_components/morris.js/morris.min.js" defer></script>
		<!-- jvectormap -->
		<script src="<?= BASE_URL ?>cdn/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" defer></script>
		<script src="<?= BASE_URL ?>cdn/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" defer></script>
		<!-- Sparkline -->
		<script src="<?= BASE_URL ?>cdn/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js" defer></script>
		<!-- jQuery Knob Chart -->
		<script src="<?= BASE_URL ?>cdn/bower_components/jquery-knob/dist/jquery.knob.min.js" defer></script>
		<!-- daterangepicker -->
		<script src="<?= BASE_URL ?>cdn/bower_components/moment/min/moment.min.js" defer></script>
		<script src="<?= BASE_URL ?>cdn/bower_components/bootstrap-daterangepicker/daterangepicker.js" defer></script>
		<!-- datepicker -->
		<script src="<?= BASE_URL ?>cdn/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js" defer></script>
		<!-- Bootstrap WYSIHTML5 -->
		<script src="<?= BASE_URL ?>cdn/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" defer></script>
		<!-- Slimscroll -->
		<script src="<?= BASE_URL ?>cdn/bower_components/jquery-slimscroll/jquery.slimscroll.min.js" defer></script>
		<!-- FastClick -->
		<script src="<?= BASE_URL ?>cdn/bower_components/fastclick/lib/fastclick.js" defer></script>


		<?= Flasher::Flash(); ?>
		</div>

		<script>
			$(function() {
				var $root = $("#sikatRoot");
				var $sidebar = $("#sikatSidebar");
				var $overlay = $("#sikatOverlay");
				var $toggle = $("#sikatToggleBtn");
				var isMobile = function() {
					return $(window).width() <= 900;
				};

				/* ── Sidebar toggle ─────────────────────────────────────── */
				$toggle.on("click", function() {
					if (isMobile()) {
						// Mobile: slide in/out from off-canvas
						var isOpen = $sidebar.hasClass("sikat-open");
						if (isOpen) {
							$sidebar.removeClass("sikat-open");
							$overlay.removeClass("sikat-visible");
							$("body").css("overflow", "");
						} else {
							$sidebar.addClass("sikat-open");
							$overlay.addClass("sikat-visible");
							$("body").css("overflow", "hidden");
						}
					} else {
						// Desktop: collapse / expand (mini rail ↔ full)
						$root.toggleClass("sikat-collapsed");
					}
				});

				$overlay.on("click", function() {
					$sidebar.removeClass("sikat-open");
					$overlay.removeClass("sikat-visible");
					$("body").css("overflow", "");
				});

				$(window).on("resize", function() {
					if (!isMobile()) {
						// clean up mobile state when resizing to desktop
						$sidebar.removeClass("sikat-open");
						$overlay.removeClass("sikat-visible");
						$("body").css("overflow", "");
					} else {
						// clean up desktop collapsed state on mobile
						$root.removeClass("sikat-collapsed");
					}
				});

				/* ── Active nav item ────────────────────────────────────── */
				$(".sikat-nav-item").on("click", function(e) {
					// e.preventDefault();
					// $(".sikat-nav-item").removeClass("sikat-active");
					// $(this).addClass("sikat-active");
					if (isMobile()) {
						$sidebar.removeClass("sikat-open");
						$overlay.removeClass("sikat-visible");
						$("body").css("overflow", "");
					}
				});

				/* ── Animate progress bars ──────────────────────────────── */
				setTimeout(function() {
					$(".sikat-progress-fill").each(function() {
						$(this).css("width", $(this).data("width") + "%");
					});
				}, 380);

				/* ── Card click → SweetAlert2 ───────────────────────────── */
				$(".sikat-module-card").on("click", function() {
					var title = $(this).data("title");
					var desc = $(this).data("desc");
					var pct = parseInt($(this).data("pct"), 10);

					var icon, btnLabel, statusHtml;

					if (pct === 100) {
						icon = "success";
						btnLabel =
							'<i class="fa-solid fa-award"></i>&nbsp; Lihat Sertifikat';
						statusHtml =
							'<span style="color:#047857;font-weight:700;font-size:13px;"><i class="fa-solid fa-circle-check"></i> Modul telah selesai</span>';
					} else if (pct > 0) {
						icon = "info";
						btnLabel =
							'<i class="fa-solid fa-play"></i>&nbsp; Lanjutkan Belajar';
						statusHtml =
							'<span style="color:#c2410c;font-weight:700;font-size:13px;"><i class="fa-solid fa-hourglass-half"></i> Berlangsung &mdash; ' +
							pct +
							"% selesai</span>";
					} else {
						icon = "question";
						btnLabel = '<i class="fa-solid fa-rocket"></i>&nbsp; Mulai Belajar';
						statusHtml =
							'<span style="color:#64748b;font-weight:600;font-size:13px;"><i class="fa-regular fa-circle"></i> Belum dimulai</span>';
					}

					Swal.fire({
						title: title,
						html: '<p style="font-size:13px;color:#64748b;line-height:1.65;margin-bottom:12px;">' +
							desc +
							"</p>" +
							'<div style="margin-top:8px;">' +
							statusHtml +
							"</div>",
						icon: icon,
						confirmButtonText: btnLabel,
						confirmButtonColor: "#2563eb",
						showCancelButton: true,
						cancelButtonText: "Tutup",
						cancelButtonColor: "#94a3b8",
						customClass: {
							popup: "sikat-swal"
						},
					});
				});
			});
		</script>

		<script>
			// $(document).ready(function() {
			// 	const connection = navigator.connection || navigator.mozConnection || navigator.webkitConnection;
			// 	let type = connection.effectiveType;
			// 	const updateConnectionStatus = () => {
			// 		$('.NetChange').html(`Connection type changed from ${type} to ${connection.effectiveType}`);
			// 		// console.log(`Connection type changed from ${type} to ${connection.effectiveType}`);
			// 		type = connection.effectiveType;
			// 	}
			// 	connection.addEventListener('change', updateConnectionStatus);
			// 	NetworkInfo();

			// })

			// function NetworkInfo() {
			// 	var con = navigator.connection;
			// 	var downlink = navigator.connection.downlink;
			// 	var rtt = navigator.connection.rtt;
			// 	var effective_type = navigator.connection.effectiveType;

			// 	$('.EffNetType').html(effective_type);
			// 	$('.Downlink').html(`${downlink} mbps`);
			// 	$('.RTT').html(`${rtt} ms`);

			// 	if (navigator.onLine == true) {
			// 		$('.online_status').html("<p class='text-green' style='margin:0;'>: Online</p>");
			// 		// $('.btn').prop("disabled",false);

			// 		if (downlink < 1) {
			// 			$('#waveContain').removeClass();
			// 			$('#waveContain').addClass("waveStrength-2");

			// 			$('.wave').css("border-top-color", "#C0392B");
			// 			$('.waveStrength-2 .wv4.wave').css("border-top-color", "gray");
			// 			$('.waveStrength-2 .wv3.wave').css("border-top-color", "gray");
			// 		} else if (downlink < 3) {
			// 			$('#waveContain').removeClass();
			// 			$('#waveContain').addClass("waveStrength-3");

			// 			$('.wave').css("border-top-color", "#F39C12");
			// 			$('.waveStrength-3 .wv4.wave').css("border-top-color", "gray");
			// 		} else {
			// 			$('#waveContain').removeClass();
			// 			$('#waveContain').addClass("waveStrength-4");

			// 			$('.wave').css("border-top-color", "#2ECC71");
			// 		}
			// 	} else {
			// 		$('.online_status').html("<p class='text-red' style='margin:0;'>: Offline</p>");
			// 		// $('.btn').prop("disabled",true);

			// 		$('#waveContain').removeClass();
			// 		$('#waveContain').addClass("waveStrength-2");

			// 		$('.wave').css("border-top-color", "#C0392B");
			// 		$('.waveStrength-2 .wv4.wave').css("border-top-color", "gray");
			// 		$('.waveStrength-2 .wv3.wave').css("border-top-color", "gray");
			// 	}

			// 	if (downlink < 1) {
			// 		$('#waveContain').removeClass();
			// 		$('#waveContain').addClass("waveStrength-2");

			// 		$('.wave').css("border-top-color", "#C0392B");
			// 		$('.waveStrength-2 .wv4.wave').css("border-top-color", "gray");
			// 		$('.waveStrength-2 .wv3.wave').css("border-top-color", "gray");
			// 	} else if (downlink < 3) {
			// 		$('#waveContain').removeClass();
			// 		$('#waveContain').addClass("waveStrength-3");

			// 		$('.wave').css("border-top-color", "#F39C12");
			// 		$('.waveStrength-3 .wv4.wave').css("border-top-color", "gray");
			// 	} else {
			// 		$('#waveContain').removeClass();
			// 		$('#waveContain').addClass("waveStrength-4");

			// 		$('.wave').css("border-top-color", "#2ECC71");
			// 	}



			// 	var seconds = 3;
			// 	setTimeout(function() {
			// 		NetworkInfo();
			// 	}, (1000 * seconds));
			// }

			$(document).ajaxError(function(event, jqxhr, settings, thrownError) {
				// console.log(jqxhr)
				if (jqxhr.status == 401) {
					window.location.replace("/login");
				}
			});
		</script>

		<script>
			$(function() {
				$(window).on('beforeunload', function() {
					// $('#custom-loader1').show();
				});
				$('#custom-loader1').hide();
				// DragTableResposive();
			});

			$('.signout').on('click', function() {
				localStorage.removeItem("pwaPrompt");
			});

			$(".modal").on("hidden.bs.modal", function() {
				$(this).html("");
			});
		</script>

		<script>
			/* Resolve conflict in jQuery UI tooltip with Bootstrap tooltip */
			$.widget.bridge('uibutton', $.ui.button);

			$(document).ajaxComplete(function() {
				// Required for Bootstrap tooltips in DataTables
				$('[data-toggle="tooltip"]').tooltip({
					container: 'body',
					"html": true,
					// "delay": {"show": 1000, "hide": 0},
				});

			});

			$(document).on('select2:open', function(e) {
				window.setTimeout(function() {
					document.querySelector('input.select2-search__field').focus();
				}, 0);
			});
		</script>

		</body>

		</html>