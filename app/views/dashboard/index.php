<!-- Hero -->
<div class="sikat-hero">
    <div class="sikat-hero-deco">
        <i
            class="fa-solid fa-graduation-cap"
            style="font-size: 64px; color: rgba(255, 255, 255, 0.7)"></i>
    </div>
    <div class="sikat-hero-label">
        <i class="fa-solid fa-star"></i> Selamat Datang
    </div>
    <div class="sikat-hero-name"><?php echo $_SESSION['fullname']; ?></div>
    <div class="sikat-hero-meta">
        <i class="fa-solid fa-building-columns" style="opacity: 0.6"></i>
        <span>Peserta</span>
        <!-- <span class="sikat-meta-dot"></span> -->
        <!-- <i class="fa-solid fa-id-card" style="opacity: 0.6"></i>
						<span>NIP: 199001012015011001</span> -->
    </div>
    <div class="sikat-stats-row">
        <div class="sikat-stat-card">
            <div class="sikat-stat-value">3</div>
            <div class="sikat-stat-label">Modul Selesai</div>
        </div>
        <div class="sikat-stat-card">
            <div class="sikat-stat-value">86</div>
            <div class="sikat-stat-label">Rata-rata Nilai</div>
        </div>
        <div class="sikat-stat-card">
            <div class="sikat-stat-value">2</div>
            <div class="sikat-stat-label">Sertifikat Diterima</div>
        </div>
        <div class="sikat-stat-card">
            <div class="sikat-stat-value">5</div>
            <div class="sikat-stat-label">Modul Tersedia</div>
        </div>
    </div>
</div>

<!-- Section -->
<div class="sikat-section-header">
    <div class="sikat-section-title">
        <div class="sikat-section-icon">
            <i class="fa-solid fa-layer-group"></i>
        </div>
        Modul Pelatihan
    </div>
    <span class="sikat-section-badge">5 MODUL</span>
</div>

<!-- Cards -->
<div class="sikat-modules-grid">
    <?php
    if ($data['Modules']) {
        // echo '<pre>';
        // echo print_r($data);
        // echo '</pre>';
        foreach ($data['Modules'] as $key => $value) {
            $id             = $value['id'];
            $module         = $value['module'];
            $descr          = $value['descr'];
            $kategori       = $value['kategori'];
            $color          = $value['color'];
            $durasi         = $value['durasi'];
            $icon           = $value['icon'];
            $aktif          = $value['aktif'];
            $crtdt          = $value['crtdt'];
            $crtby          = $value['crtby'];
            $upddt          = $value['upddt'];
            $updby          = $value['updby'];
            $total_soal     = $value['total_soal'];
            $status_ujian   = $value['status_ujian'];
            ?>
            <div
                class="sikat-module-card"
                data-id="<?php echo $id;?>"
                data-title="<?php echo $module;?>"
                data-desc="<?php echo $descr;?>"
                data-pct="<?php echo $status_ujian;?>">
                <div class="sikat-card-top">
                    <div class="sikat-module-icon sikat-icon-<?php echo $color;?>">
                        <i class="fa-solid <?php echo $icon;?>"></i>
                    </div>
                    <div class="sikat-card-badges">
                        <span class="sikat-badge sikat-badge-<?php echo $color;?>"><?php echo $kategori;?></span>
                        <!-- <span class="sikat-badge sikat-badge-lulus"><i class="fa-solid fa-check"></i> Lulus</span> -->
                    </div>
                </div>
                <div class="sikat-module-title"><?php echo $module;?></div>
                <div class="sikat-module-desc">
                    <?php echo $descr;?>
                </div>
                <div class="sikat-card-meta">
                    <span class="sikat-meta-item"><i class="fa-solid fa-file-lines"></i> <?php echo $total_soal;?> Soal</span>
                    <span class="sikat-meta-item"><i class="fa-regular fa-clock"></i> <?php echo $durasi;?> Menit</span>
                </div>
                <div class="sikat-progress-track">
                    <div
                        class="sikat-progress-fill sikat-fill-full"
                        data-width="<?php echo $status_ujian;?>"></div>
                </div>
                <div class="sikat-progress-label"><?php echo $status_ujian;?>% selesai</div>
            </div>
            <?php
        }
    }
    ?>
</div>
<!-- /sikat-modules-grid -->

<script>
    $(function() {
        /* ── Animate progress bars ──────────────────────────────── */
        setTimeout(function() {
            $(".sikat-progress-fill").each(function() {
                $(this).css("width", $(this).data("width") + "%");
            });
        }, 380);

        /* ── Card click → SweetAlert2 ───────────────────────────── */
        $(".sikat-module-card").on("click", function() {
            var id      = $(this).data("id");
            var title   = $(this).data("title");
            var desc    = $(this).data("desc");
            var pct     = parseInt($(this).data("pct"), 10);

            var icon, btnLabel, statusHtml, url;
            var showConfirm = true;

            if (pct === 100) {
                icon = "success";
                showConfirm = false;
                // btnLabel =
                //     '<i class="fa-solid fa-award"></i>&nbsp; Lihat Sertifikat';
                statusHtml =
                    '<span style="color:#047857;font-weight:700;font-size:13px;"><i class="fa-solid fa-circle-check"></i> Modul telah selesai</span>';
            } else if (pct > 0) {
                icon = "info";
                btnLabel =
                    '<i class="fa-solid fa-play"></i>&nbsp; Lanjutkan';
                statusHtml =
                    '<span style="color:#c2410c;font-weight:700;font-size:13px;"><i class="fa-solid fa-hourglass-half"></i> Berlangsung &mdash; ' +
                    pct +
                    "% selesai</span>";
                
                url = "exam/" + id;
            } else {
                icon = "question";
                btnLabel = '<i class="fa-solid fa-rocket"></i>&nbsp; Mulai';
                statusHtml =
                    '<span style="color:#64748b;font-weight:600;font-size:13px;"><i class="fa-regular fa-circle"></i> Belum dimulai</span>';
                url = "exam/" + id;
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
                showConfirmButton: showConfirm,
                showCancelButton: true,
                cancelButtonText: "Tutup",
                cancelButtonColor: "#94a3b8",
                customClass: {
                    popup: "sikat-swal"
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url; // <-- redirect di sini
                }
            });
        });
    });
</script>