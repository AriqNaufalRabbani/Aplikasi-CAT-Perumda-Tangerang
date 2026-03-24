<style>
    /* ── Page header ──────────────────────────────────────────── */
    .sikat-page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 22px;
        flex-wrap: wrap;
        gap: 12px;
    }

    .sikat-page-title-wrap {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .sikat-page-icon {
        width: 44px;
        height: 44px;
        background: linear-gradient(135deg, var(--sikat-blue-500), #6366f1);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 19px;
        box-shadow: 0 4px 14px rgba(59, 130, 246, 0.3);
    }

    .sikat-page-title {
        font-family: "Sora", sans-serif;
        font-size: 20px;
        font-weight: 700;
        color: var(--sikat-text);
        margin: 0;
    }

    .sikat-page-subtitle {
        font-size: 13px;
        color: var(--sikat-text-muted);
        margin: 2px 0 0;
    }

    .sikat-breadcrumb {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        color: var(--sikat-text-muted);
    }

    .sikat-breadcrumb a {
        color: var(--sikat-blue-600);
        text-decoration: none;
        font-weight: 500;
    }

    .sikat-breadcrumb a:hover {
        text-decoration: underline;
    }

    /* ── Card panel ───────────────────────────────────────────── */
    .sikat-panel {
        background: var(--sikat-surface);
        border: 1px solid var(--sikat-border);
        border-radius: var(--sikat-radius);
        box-shadow: var(--sikat-shadow-sm);
        overflow: hidden;
        margin-bottom: 20px;
    }

    .sikat-panel-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 20px;
        border-bottom: 1px solid var(--sikat-border);
        background: linear-gradient(90deg,
                var(--sikat-blue-50) 0%,
                var(--sikat-surface) 100%);
        flex-wrap: wrap;
        gap: 10px;
    }

    .sikat-panel-title {
        font-family: "Sora", sans-serif;
        font-size: 14px;
        font-weight: 700;
        color: var(--sikat-text);
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .sikat-panel-title i {
        color: var(--sikat-blue-500);
        font-size: 15px;
    }

    .sikat-panel-body {
        padding: 20px;
    }

    /* ── Buttons ──────────────────────────────────────────────── */
    .sikat-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 9px 18px;
        border-radius: var(--sikat-radius-sm);
        font-family: "Plus Jakarta Sans", sans-serif;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        border: none;
        transition: all 0.2s ease;
        white-space: nowrap;
        text-decoration: none !important;
    }

    .sikat-btn-primary {
        background: var(--sikat-blue-600);
        color: #fff;
        box-shadow: 0 3px 10px rgba(37, 99, 235, 0.3);
    }

    .sikat-btn-primary:hover {
        background: var(--sikat-blue-700);
        transform: translateY(-1px);
        box-shadow: 0 6px 16px rgba(37, 99, 235, 0.35);
    }

    .sikat-btn-success {
        background: #059669;
        color: #fff;
        box-shadow: 0 3px 10px rgba(5, 150, 105, 0.25);
    }

    .sikat-btn-success:hover {
        background: #047857;
        transform: translateY(-1px);
    }

    .sikat-btn-danger {
        background: #dc2626;
        color: #fff;
        box-shadow: 0 3px 10px rgba(220, 38, 38, 0.25);
    }

    .sikat-btn-danger:hover {
        background: #b91c1c;
        transform: translateY(-1px);
    }

    .sikat-btn-warning {
        background: var(--sikat-gold);
        color: #fff;
        box-shadow: 0 3px 10px rgba(245, 158, 11, 0.25);
    }

    .sikat-btn-warning:hover {
        background: #d97706;
        transform: translateY(-1px);
    }

    .sikat-btn-outline {
        background: transparent;
        color: var(--sikat-blue-600);
        border: 1.5px solid var(--sikat-blue-200);
    }

    .sikat-btn-outline:hover {
        background: var(--sikat-blue-50);
    }

    .sikat-btn-ghost {
        background: transparent;
        color: var(--sikat-text-muted);
        border: 1.5px solid var(--sikat-border);
    }

    .sikat-btn-ghost:hover {
        background: var(--sikat-blue-50);
        color: var(--sikat-text);
    }

    .sikat-btn-sm {
        padding: 6px 12px;
        font-size: 12px;
        gap: 5px;
    }

    .sikat-btn-icon {
        padding: 7px;
        width: 32px;
        height: 32px;
        justify-content: center;
    }

    /* ── Table ────────────────────────────────────────────────── */
    .sikat-table-wrap {
        overflow-x: auto;
        border-radius: var(--sikat-radius-sm);
        border: 1px solid var(--sikat-border);
    }

    .sikat-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 13px;
    }

    .sikat-table thead th {
        background: linear-gradient(90deg, var(--sikat-blue-50), #edf2ff);
        color: var(--sikat-text);
        font-weight: 700;
        padding: 11px 14px;
        border-bottom: 1px solid var(--sikat-border-2);
        white-space: nowrap;
        font-size: 12px;
        letter-spacing: 0.02em;
        text-transform: uppercase;
    }

    .sikat-table tbody td {
        padding: 11px 14px;
        border-bottom: 1px solid var(--sikat-border);
        color: var(--sikat-text);
        vertical-align: middle;
    }

    .sikat-table tbody tr:last-child td {
        border-bottom: none;
    }

    .sikat-table tbody tr:hover td {
        background: var(--sikat-blue-50);
    }

    .sikat-table .sikat-col-actions {
        display: flex;
        gap: 4px;
        align-items: center;
    }

    /* ── Status badges ────────────────────────────────────────── */
    .sikat-status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 10.5px;
        font-weight: 700;
        padding: 3px 10px;
        border-radius: 20px;
        letter-spacing: 0.04em;
        text-transform: uppercase;
    }

    .sikat-status-active {
        background: #ecfdf5;
        color: #047857;
        border: 1px solid #a7f3d0;
    }

    .sikat-status-inactive {
        background: #fff1f2;
        color: #be123c;
        border: 1px solid #fecdd3;
    }

    .sikat-status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: currentColor;
        display: inline-block;
    }

    /* ── Form ─────────────────────────────────────────────────── */
    .sikat-form-group {
        margin-bottom: 16px;
    }

    .sikat-form-label {
        display: block;
        font-size: 12.5px;
        font-weight: 700;
        color: var(--sikat-text);
        margin-bottom: 6px;
    }

    .sikat-form-label .sikat-req {
        color: var(--sikat-red);
        margin-left: 2px;
    }

    .sikat-form-control {
        width: 100%;
        padding: 9px 13px;
        border: 1.5px solid var(--sikat-border-2);
        border-radius: var(--sikat-radius-sm);
        font-family: "Plus Jakarta Sans", sans-serif;
        font-size: 13px;
        color: var(--sikat-text);
        background: var(--sikat-surface);
        transition:
            border-color 0.2s,
            box-shadow 0.2s;
        outline: none;
    }

    .sikat-form-control:focus {
        border-color: var(--sikat-blue-500);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.12);
    }

    .sikat-form-control::placeholder {
        color: var(--sikat-text-light);
    }

    select.sikat-form-control {
        cursor: pointer;
    }

    .sikat-form-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 14px;
    }

    .sikat-form-row-3 {
        grid-template-columns: repeat(3, 1fr);
    }

    .sikat-form-row-4 {
        grid-template-columns: repeat(4, 1fr);
    }

    .sikat-icon-preview {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: 6px;
    }

    .sikat-icon-preview-box {
        width: 38px;
        height: 38px;
        border-radius: 9px;
        background: var(--sikat-blue-50);
        border: 1.5px solid var(--sikat-blue-200);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        color: var(--sikat-blue-600);
    }

    .sikat-icon-preview-label {
        font-size: 11px;
        color: var(--sikat-text-muted);
    }

    /* ── Tabs ─────────────────────────────────────────────────── */
    .sikat-tabs {
        display: flex;
        gap: 4px;
        border-bottom: 2px solid var(--sikat-border);
        margin-bottom: 20px;
    }

    .sikat-tab-item {
        padding: 10px 16px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        border-radius: var(--sikat-radius-sm) var(--sikat-radius-sm) 0 0;
        color: var(--sikat-text-muted);
        transition: all 0.2s;
        display: flex;
        align-items: center;
        gap: 7px;
        border: none;
        background: transparent;
        position: relative;
        bottom: -2px;
    }

    .sikat-tab-item:hover {
        color: var(--sikat-blue-600);
        background: var(--sikat-blue-50);
    }

    .sikat-tab-item.sikat-tab-active {
        color: var(--sikat-blue-700);
        background: var(--sikat-surface);
        border: 2px solid var(--sikat-border);
        border-bottom: 2px solid var(--sikat-surface);
        font-weight: 700;
    }

    .sikat-tab-count {
        background: var(--sikat-blue-100);
        color: var(--sikat-blue-700);
        font-size: 10px;
        font-weight: 700;
        padding: 1px 7px;
        border-radius: 20px;
    }

    .sikat-tab-pane {
        display: none;
    }

    .sikat-tab-pane.sikat-tab-pane-active {
        display: block;
    }

    /* ── Question builder ─────────────────────────────────────── */
    .sikat-question-card {
        border: 1.5px solid var(--sikat-border);
        border-radius: var(--sikat-radius-sm);
        margin-bottom: 14px;
        overflow: hidden;
        transition: border-color 0.2s;
        background: var(--sikat-surface);
    }

    .sikat-question-card:hover {
        border-color: var(--sikat-blue-300, #93c5fd);
    }

    .sikat-question-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 16px;
        background: linear-gradient(90deg,
                var(--sikat-blue-50),
                var(--sikat-surface));
        cursor: pointer;
        border-bottom: 1px solid var(--sikat-border);
        gap: 10px;
    }

    .sikat-question-head-left {
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 0;
        flex: 1;
    }

    .sikat-question-seq {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: var(--sikat-blue-500);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 700;
        flex-shrink: 0;
    }

    .sikat-question-preview {
        font-size: 13px;
        font-weight: 600;
        color: var(--sikat-text);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .sikat-question-toggle-icon {
        flex-shrink: 0;
        color: var(--sikat-text-muted);
        font-size: 13px;
        transition: transform 0.25s;
    }

    .sikat-question-card.sikat-open .sikat-question-toggle-icon {
        transform: rotate(180deg);
    }

    .sikat-question-body {
        padding: 16px;
        display: none;
    }

    .sikat-question-card.sikat-open .sikat-question-body {
        display: block;
    }

    /* Answer rows */
    .sikat-answer-row {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 10px;
        border-radius: 8px;
        margin-bottom: 6px;
        border: 1.5px solid var(--sikat-border);
        background: var(--sikat-bg);
        transition:
            border-color 0.2s,
            background 0.2s;
    }

    .sikat-answer-row.sikat-answer-correct {
        border-color: #a7f3d0;
        background: #f0fdf4;
    }

    .sikat-answer-row:hover {
        border-color: var(--sikat-blue-200);
    }

    .sikat-answer-radio {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: var(--sikat-green);
        flex-shrink: 0;
    }

    .sikat-answer-input {
        flex: 1;
        border: none;
        background: transparent;
        font-family: "Plus Jakarta Sans", sans-serif;
        font-size: 13px;
        color: var(--sikat-text);
        outline: none;
    }

    .sikat-answer-input::placeholder {
        color: var(--sikat-text-light);
    }

    .sikat-answer-label {
        font-size: 11px;
        font-weight: 700;
        color: var(--sikat-text-muted);
        background: var(--sikat-border);
        padding: 2px 7px;
        border-radius: 5px;
        min-width: 22px;
        text-align: center;
        flex-shrink: 0;
    }

    .sikat-answer-correct-label {
        color: var(--sikat-green);
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    /* ── Search & filter bar ──────────────────────────────────── */
    .sikat-filter-bar {
        display: flex;
        gap: 10px;
        align-items: center;
        flex-wrap: wrap;
        margin-bottom: 16px;
    }

    .sikat-search-box {
        display: flex;
        align-items: center;
        gap: 8px;
        background: var(--sikat-bg);
        border: 1.5px solid var(--sikat-border-2);
        border-radius: var(--sikat-radius-sm);
        padding: 8px 13px;
        flex: 1;
        min-width: 200px;
        max-width: 320px;
    }

    .sikat-search-box i {
        color: var(--sikat-text-muted);
        font-size: 13px;
    }

    .sikat-search-box input {
        all: unset;
        font-family: "Plus Jakarta Sans", sans-serif;
        font-size: 13px;
        color: var(--sikat-text);
        width: 100%;
    }

    .sikat-search-box input::placeholder {
        color: var(--sikat-text-light);
    }

    /* ── Stats strip ──────────────────────────────────────────── */
    .sikat-stats-strip {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        margin-bottom: 22px;
    }

    .sikat-stat-box {
        background: var(--sikat-surface);
        border: 1px solid var(--sikat-border);
        border-radius: 14px;
        padding: 16px 20px;
        flex: 1;
        min-width: 130px;
        display: flex;
        align-items: center;
        gap: 14px;
        box-shadow: var(--sikat-shadow-sm);
        transition: transform 0.2s;
    }

    .sikat-stat-box:hover {
        transform: translateY(-2px);
        box-shadow: var(--sikat-shadow);
    }

    .sikat-stat-box-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }

    .sikat-stat-box-icon.blue {
        background: var(--sikat-blue-50);
        color: var(--sikat-blue-600);
    }

    .sikat-stat-box-icon.green {
        background: #ecfdf5;
        color: #059669;
    }

    .sikat-stat-box-icon.amber {
        background: #fffbeb;
        color: #d97706;
    }

    .sikat-stat-box-icon.purple {
        background: #f5f3ff;
        color: #7c3aed;
    }

    .sikat-stat-box-val {
        font-family: "Sora", sans-serif;
        font-size: 22px;
        font-weight: 700;
        color: var(--sikat-text);
        line-height: 1;
    }

    .sikat-stat-box-lbl {
        font-size: 11.5px;
        color: var(--sikat-text-muted);
        font-weight: 500;
        margin-top: 3px;
    }

    /* ── Misc ─────────────────────────────────────────────────── */
    .sikat-empty {
        text-align: center;
        padding: 48px 20px;
        color: var(--sikat-text-muted);
    }

    .sikat-empty i {
        font-size: 36px;
        display: block;
        margin-bottom: 12px;
        opacity: 0.4;
    }

    .sikat-empty p {
        font-size: 13px;
        margin: 0;
    }

    .sikat-badge {
        font-size: 10px;
        font-weight: 700;
        padding: 3px 8px;
        border-radius: 20px;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        display: inline-block;
        vertical-align: baseline !important;
        line-height: 1.5 !important;
        font-family: "Plus Jakarta Sans", sans-serif !important;
    }

    .sikat-badge-wajib {
        background: var(--sikat-blue-50);
        color: var(--sikat-blue-700);
        border: 1px solid var(--sikat-blue-200);
    }

    .sikat-badge-teknis {
        background: #fffbeb;
        color: #b45309;
        border: 1px solid #fde68a;
    }

    .sikat-badge-strategis {
        background: #f5f3ff;
        color: #6d28d9;
        border: 1px solid #ddd6fe;
    }

    .sikat-divider {
        height: 1px;
        background: var(--sikat-border);
        margin: 16px 0;
    }

    @keyframes sikat-fade-up {
        from {
            opacity: 0;
            transform: translateY(14px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .sikat-panel {
        animation: sikat-fade-up 0.4s ease both;
    }
</style>

<!-- Page Header -->
<div class="sikat-page-header">
    <div class="sikat-page-title-wrap">
        <div class="sikat-page-icon">
            <i class="fa-solid fa-layer-group"></i>
        </div>
        <div>
            <h1 class="sikat-page-title">Master Modul</h1>
            <div class="sikat-breadcrumb">
                <i class="fa-solid fa-house" style="font-size: 11px"></i>
                <a href="#">Beranda</a>
                <i
                    class="fa-solid fa-chevron-right"
                    style="font-size: 9px; color: var(--sikat-text-light)"></i>
                <a href="#">Master Data</a>
                <i
                    class="fa-solid fa-chevron-right"
                    style="font-size: 9px; color: var(--sikat-text-light)"></i>
                <span>Master Modul</span>
            </div>
        </div>
    </div>
    <button class="sikat-btn sikat-btn-primary" id="btnTambahModul">
        <i class="fa-solid fa-plus"></i> Tambah Modul
    </button>
</div>

<!-- Stats strip -->
<div class="sikat-stats-strip">
    <div class="sikat-stat-box">
        <div class="sikat-stat-box-icon blue">
            <i class="fa-solid fa-layer-group"></i>
        </div>
        <div>
            <div class="sikat-stat-box-val" id="statTotalModul">0</div>
            <div class="sikat-stat-box-lbl">Total Modul</div>
        </div>
    </div>
    <div class="sikat-stat-box">
        <div class="sikat-stat-box-icon green">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        <div>
            <div class="sikat-stat-box-val" id="statAktif">0</div>
            <div class="sikat-stat-box-lbl">Modul Aktif</div>
        </div>
    </div>
    <div class="sikat-stat-box">
        <div class="sikat-stat-box-icon amber">
            <i class="fa-solid fa-circle-question"></i>
        </div>
        <div>
            <div class="sikat-stat-box-val" id="statTotalSoal">0</div>
            <div class="sikat-stat-box-lbl">Total Soal</div>
        </div>
    </div>
    <div class="sikat-stat-box">
        <div class="sikat-stat-box-icon purple">
            <i class="fa-solid fa-list-check"></i>
        </div>
        <div>
            <div class="sikat-stat-box-val" id="statTotalJawaban">0</div>
            <div class="sikat-stat-box-lbl">Total Jawaban</div>
        </div>
    </div>
</div>

<!-- ── List Modul Panel ─────────────────────────────────── -->
<div class="sikat-panel" id="panelList">
    <div class="sikat-panel-header">
        <div class="sikat-panel-title">
            <i class="fa-solid fa-table-list"></i> Daftar Modul
        </div>
        <div
            style="
                  display: flex;
                  gap: 8px;
                  align-items: center;
                  flex-wrap: wrap;
                ">
            <div class="sikat-search-box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input
                    type="text"
                    id="searchModul"
                    placeholder="Cari nama modul..." />
            </div>
            <select
                class="sikat-form-control"
                id="filterKategori"
                style="width: 140px; padding: 7px 10px">
                <option value="">Semua Kategori</option>
                <?php
                foreach ($data['Kategori'] as $key => $value) {
                    $Text = $value['name'];
                ?>
                    <option value="<?php echo strtoupper($Text); ?>"><?php echo strtoupper($Text); ?></option>
                <?php
                }
                ?>
            </select>
            <select
                class="sikat-form-control"
                id="filterAktif"
                style="width: 120px; padding: 7px 10px">
                <option value="">Semua Status</option>
                <option value="Y">Aktif</option>
                <option value="N">Nonaktif</option>
            </select>
        </div>
    </div>
    <div class="sikat-panel-body" style="padding: 0">
        <div class="sikat-table-wrap">
            <table class="sikat-table" id="tableModul">
                <thead>
                    <tr>
                        <th style="width: 44px">No</th>
                        <th>Nama Modul</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>Durasi</th>
                        <th>Icon</th>
                        <th>Soal</th>
                        <th>Status</th>
                        <th style="width: 130px">Aksi</th>
                    </tr>
                </thead>
                <tbody id="tbodyModul">
                    <!-- populated by JS -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ── Form Panel (Add / Edit Modul) ───────────────────── -->
<div class="sikat-panel" id="panelForm" style="display: none">
    <div class="sikat-panel-header">
        <div class="sikat-panel-title">
            <i class="fa-solid fa-pen-to-square"></i>
            <span id="formPanelTitle">Tambah Modul</span>
        </div>
        <button
            class="sikat-btn sikat-btn-ghost sikat-btn-sm"
            id="btnBatalForm">
            <i class="fa-solid fa-xmark"></i> Batal
        </button>
    </div>
    <div class="sikat-panel-body">
        <!-- Tabs -->
        <div class="sikat-tabs">
            <button
                class="sikat-tab-item sikat-tab-active"
                data-tab="tabInfo">
                <i class="fa-solid fa-circle-info"></i> Info Modul
            </button>
            <button
                class="sikat-tab-item"
                data-tab="tabSoal"
                id="tabBtnSoal">
                <i class="fa-solid fa-circle-question"></i> Soal &amp; Jawaban
                <span class="sikat-tab-count" id="soalCount">0</span>
            </button>
        </div>

        <!-- Tab: Info Modul -->
        <div class="sikat-tab-pane sikat-tab-pane-active" id="tabInfo">
            <form id="formModul" autocomplete="off">
                <input type="hidden" id="fModulId" />
                <div class="sikat-form-row sikat-form-row-3">
                    <div class="sikat-form-group" style="grid-column: span 2">
                        <label class="sikat-form-label">Nama Modul <span class="sikat-req">*</span></label>
                        <input type="text" class="sikat-form-control" id="fModulNama" placeholder="Contoh: Integritas & Etika ASN" maxlength="100" />
                    </div>
                    <div class="sikat-form-group">
                        <label class="sikat-form-label">Kategori <span class="sikat-req">*</span></label>
                        <select class="sikat-form-control" id="fModulKategori">
                            <option value="">-- Pilih --</option>
                            <?php
                            foreach ($data['Kategori'] as $key => $value) {
                                $Text = $value['name'];
                            ?>
                                <option value="<?php echo strtoupper($Text); ?>"><?php echo strtoupper($Text); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="sikat-form-group">
                    <label class="sikat-form-label">Deskripsi</label>
                    <textarea class="sikat-form-control" id="fModulDeskripsi" rows="2" placeholder="Deskripsi singkat modul..." maxlength="200" style="resize: vertical"></textarea>
                </div>
                <div class="sikat-form-row sikat-form-row-3">
                    <div class="sikat-form-group">
                        <label class="sikat-form-label">Durasi (menit) <span class="sikat-req">*</span></label>
                        <input type="number" class="sikat-form-control" id="fModulDurasi" placeholder="25" min="1" max="300" step="any" />
                    </div>
                    <div class="sikat-form-group">
                        <label class="sikat-form-label">Icon (Font Awesome)
                            <span class="sikat-req">*</span></label>
                        <input type="text" class="sikat-form-control" id="fModulIcon" placeholder="fa-solid fa-scale-balanced" />
                        <div class="sikat-icon-preview">
                            <div class="sikat-icon-preview-box">
                                <i id="iconPreview" class="fa-solid fa-layer-group"></i>
                            </div>
                            <span class="sikat-icon-preview-label">Preview icon</span>
                        </div>
                    </div>
                    <div class="sikat-form-group">
                        <label class="sikat-form-label">Status</label>
                        <select class="sikat-form-control" id="fModulAktif">
                            <option value="Y">Aktif</option>
                            <option value="N">Nonaktif</option>
                        </select>
                    </div>
                </div>
                <div class="sikat-divider"></div>
                <div
                    style="display: flex; gap: 10px; justify-content: flex-end">
                    <button
                        type="button"
                        class="sikat-btn sikat-btn-ghost"
                        id="btnBatalForm2">
                        <i class="fa-solid fa-xmark"></i> Batal
                    </button>
                    <button
                        type="button"
                        class="sikat-btn sikat-btn-primary"
                        id="btnSimpanModul">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan &amp;
                        Lanjut ke Soal
                    </button>
                </div>
            </form>
        </div>

        <!-- Tab: Soal & Jawaban -->
        <div class="sikat-tab-pane" id="tabSoal">
            <div
                style="
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    margin-bottom: 16px;
                    flex-wrap: wrap;
                    gap: 10px;
                  ">
                <div style="font-size: 13px; color: var(--sikat-text-muted)">
                    <i class="fa-solid fa-circle-info" style="color: var(--sikat-blue-500)"></i>
                    Tandai <strong>satu</strong> jawaban benar per soal. Minimal
                    2 pilihan jawaban.
                </div>
                <button
                    class="sikat-btn sikat-btn-primary sikat-btn-sm"
                    id="btnTambahSoal">
                    <i class="fa-solid fa-plus"></i> Tambah Soal
                </button>
            </div>

            <div id="soalContainer">
                <!-- question cards injected here -->
                <div class="sikat-empty" id="soalEmpty">
                    <i class="fa-regular fa-circle-question"></i>
                    <p>
                        Belum ada soal. Klik <strong>Tambah Soal</strong> untuk
                        mulai menambahkan.
                    </p>
                </div>
            </div>

            <div class="sikat-divider"></div>
            <div
                style="display: flex; gap: 10px; justify-content: flex-end">
                <button class="sikat-btn sikat-btn-ghost" id="btnBatalSoal">
                    <i class="fa-solid fa-xmark"></i> Batal
                </button>
                <button
                    class="sikat-btn sikat-btn-success"
                    id="btnSimpanSemua">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Semua
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    /* ============================================================
      SIKAT — Master Modul  (jQuery + SweetAlert2)
      In-memory data store simulates DB tables:
        modules[]   → modules
        questions[] → questions (id_module FK)
        answers[]   → answers   (id_question FK)
      ============================================================ */

    /* ── Utilities ────────────────────────────────────────────── */
    function uuid() {
        return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(
            /[xy]/g,
            function(c) {
                var r = (Math.random() * 16) | 0,
                    v = c == "x" ? r : (r & 0x3) | 0x8;
                return v.toString(16);
            },
        );
    }

    function now() {
        return new Date().toISOString().replace("T", " ").substr(0, 19);
    }

    function esc(s) {
        return $("<div>")
            .text(s || "")
            .html();
    }

    /* ── In-memory "database" ─────────────────────────────────── */
    var DB = {
        modules: [],
        questions: [],
        answers: [],
    };

    /* Seed data */
    // (function seedData() {
    //     var mods = [{
    //             id: uuid(),
    //             module: "Integritas & Etika ASN",
    //             descr: "Kode etik dan standar integritas ASN.",
    //             kategori: "Wajib",
    //             durasi: 25,
    //             icon: "fa-solid fa-scale-balanced",
    //             aktif: "true",
    //             crtdt: now(),
    //             crtby: "admin",
    //             upddt: null,
    //             updby: null,
    //         },
    //         {
    //             id: uuid(),
    //             module: "Pengadaan Barang & Jasa",
    //             descr: "Regulasi pengadaan barang/jasa pemerintah.",
    //             kategori: "Wajib",
    //             durasi: 25,
    //             icon: "fa-solid fa-clipboard-list",
    //             aktif: "true",
    //             crtdt: now(),
    //             crtby: "admin",
    //             upddt: null,
    //             updby: null,
    //         },
    //         {
    //             id: uuid(),
    //             module: "Pengelolaan Keuangan Daerah",
    //             descr: "Prinsip keuangan daerah yang akuntabel.",
    //             kategori: "Teknis",
    //             durasi: 25,
    //             icon: "fa-solid fa-coins",
    //             aktif: "true",
    //             crtdt: now(),
    //             crtby: "admin",
    //             upddt: null,
    //             updby: null,
    //         },
    //         {
    //             id: uuid(),
    //             module: "Standar Pelayanan Publik",
    //             descr: "Inovasi pelayanan prima masyarakat.",
    //             kategori: "Teknis",
    //             durasi: 20,
    //             icon: "fa-solid fa-handshake",
    //             aktif: "true",
    //             crtdt: now(),
    //             crtby: "admin",
    //             upddt: null,
    //             updby: null,
    //         },
    //         {
    //             id: uuid(),
    //             module: "Tata Kelola Pemerintahan",
    //             descr: "Good governance dan reformasi birokrasi.",
    //             kategori: "Strategis",
    //             durasi: 25,
    //             icon: "fa-solid fa-landmark",
    //             aktif: "false",
    //             crtdt: now(),
    //             crtby: "admin",
    //             upddt: null,
    //             updby: null,
    //         },
    //     ];

    //     mods.forEach(function(m) {
    //         DB.modules.push(m);
    //     });

    //     // seed a few questions for first module
    //     var mid = DB.modules[0].id;
    //     var qIds = [];
    //     [
    //         "Apa pengertian integritas?",
    //         "Contoh pelanggaran etika ASN?",
    //         "Kode etik ASN diatur dalam?",
    //     ].forEach(function(q, i) {
    //         var qid = uuid();
    //         var aIds = [uuid(), uuid(), uuid(), uuid()];
    //         qIds.push(qid);
    //         DB.questions.push({
    //             id: qid,
    //             id_module: mid,
    //             question: q,
    //             seqno: i + 1,
    //             image: null,
    //             key_answer: aIds[0],
    //             aktif: "true",
    //             crtdt: now(),
    //             crtby: "admin",
    //             upddt: null,
    //             updby: null,
    //         });
    //         ["Pilihan A", "Pilihan B", "Pilihan C", "Pilihan D"].forEach(
    //             function(a, j) {
    //                 DB.answers.push({
    //                     id: aIds[j],
    //                     id_question: qid,
    //                     answer: a + (j === 0 ? " (benar)" : ""),
    //                     seqno: j + 1,
    //                     image: null,
    //                     aktif: "true",
    //                     crtdt: now(),
    //                     crtby: "admin",
    //                     upddt: null,
    //                     updby: null,
    //                 });
    //             },
    //         );
    //     });
    // })();

    /* ── State ────────────────────────────────────────────────── */
    var state = {
        editId: null, // module being edited
        soalData: [], // [{ id, question, seqno, answers:[{id,answer,seqno,isKey}], key_answer }]
    };

    // /* ── Sidebar / topbar toggle ──────────────────────────────── */
    // $(function() {
    //     var $root = $("#sikatRoot"),
    //         $sidebar = $("#sikatSidebar"),
    //         $overlay = $("#sikatOverlay");
    //     var isMobile = function() {
    //         return $(window).width() <= 900;
    //     };

    //     $("#sikatToggleBtn").on("click", function() {
    //         if (isMobile()) {
    //             var open = $sidebar.hasClass("sikat-open");
    //             $sidebar.toggleClass("sikat-open", !open);
    //             $overlay.toggleClass("sikat-visible", !open);
    //             $("body").css("overflow", open ? "" : "hidden");
    //         } else {
    //             $root.toggleClass("sikat-collapsed");
    //         }
    //     });
    //     $overlay.on("click", function() {
    //         $sidebar.removeClass("sikat-open");
    //         $overlay.removeClass("sikat-visible");
    //         $("body").css("overflow", "");
    //     });
    //     $(window).on("resize", function() {
    //         if (!isMobile()) {
    //             $sidebar.removeClass("sikat-open");
    //             $overlay.removeClass("sikat-visible");
    //             $("body").css("overflow", "");
    //         } else {
    //             $root.removeClass("sikat-collapsed");
    //         }
    //     });
    //     $(".sikat-nav-item").on("click", function(e) {
    //         e.preventDefault();
    //         $(".sikat-nav-item").removeClass("sikat-active");
    //         $(this).addClass("sikat-active");
    //         if (isMobile()) {
    //             $sidebar.removeClass("sikat-open");
    //             $overlay.removeClass("sikat-visible");
    //             $("body").css("overflow", "");
    //         }
    //     });
    // });

    /* ── Tab switching ────────────────────────────────────────── */
    $(document).on("click", ".sikat-tab-item", function() {
        var tab = $(this).data("tab");
        $(".sikat-tab-item").removeClass("sikat-tab-active");
        $(this).addClass("sikat-tab-active");
        $(".sikat-tab-pane").removeClass("sikat-tab-pane-active");
        $("#" + tab).addClass("sikat-tab-pane-active");
    });

    /* ── Stats counter ────────────────────────────────────────── */
    function updateStats() {
        $("#statTotalModul").text(DB.modules.length);
        $("#statAktif").text(
            DB.modules.filter(function(m) {
                return m.aktif == "Y";
            }).length,
        );
        $("#statTotalSoal").text(DB.questions.length);
        $("#statTotalJawaban").text(DB.answers.length);
    }

    /* ── Render module table ──────────────────────────────────── */
    function renderTable() {
        updateStats();
        var search = $("#searchModul").val().toLowerCase();
        var kat = $("#filterKategori").val();
        var aktif = $("#filterAktif").val();

        // console.log(DB)

        var list = DB.modules.filter(function(m) {
            return (
                (!search ||
                    m.module.toLowerCase().includes(search) ||
                    (m.descr && m.descr.toLowerCase().includes(search))) &&
                (!kat || m.kategori == kat) &&
                (!aktif || m.aktif == aktif)
            );
        });

        var $tbody = $("#tbodyModul").empty();

        if (!list.length) {
            $tbody.append(
                '<tr><td colspan="9"><div class="sikat-empty"><i class="fa-regular fa-folder-open"></i><p>Tidak ada data modul.</p></div></td></tr>',
            );
            return;
        }

        list.forEach(function(m, i) {
            var qCount = DB.questions.filter(function(q) {
                return q.id_module === m.id;
            }).length;
            var katBadge = "sikat-badge-" + (m.color ?? 'blue');
            // if (m.kategori === "Wajib") katBadge = "sikat-badge-wajib";
            // else if (m.kategori === "Teknis") katBadge = "sikat-badge-teknis";
            // else katBadge = "sikat-badge-strategis";

            var statusHtml =
                m.aktif === "Y" ?
                '<span class="sikat-status sikat-status-active"><span class="sikat-status-dot"></span>Aktif</span>' :
                '<span class="sikat-status sikat-status-inactive"><span class="sikat-status-dot"></span>Nonaktif</span>';

            $tbody.append(
                '<tr data-id="' +
                m.id +
                '">' +
                '<td style="text-align:center;color:var(--sikat-text-muted);font-weight:600">' +
                (i + 1) +
                "</td>" +
                '<td><div style="font-weight:700;color:var(--sikat-text)">' +
                esc(m.module) +
                "</div></td>" +
                '<td style="color:var(--sikat-text-muted);max-width:220px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap">' +
                esc(m.descr || "-") +
                "</td>" +
                '<td><span class="sikat-badge ' +
                katBadge +
                '">' +
                esc(m.kategori) +
                "</span></td>" +
                '<td><i class="fa-regular fa-clock" style="color:var(--sikat-blue-400,#60a5fa)"></i> ' +
                m.durasi +
                " mnt</td>" +
                '<td><span class="sikat-module-icon sikat-icon-' + (m.color ?? 'blue') + '" style="width:30px; height:30px; font-size: 14px;" title="' +
                esc(m.icon) +
                '"><i class="fa-solid ' +
                esc(m.icon) +
                '"></i></span></td>' +
                '<td><span style="background:var(--sikat-blue-50);color:var(--sikat-blue-700);border-radius:20px;padding:2px 10px;font-size:12px;font-weight:700">' +
                qCount +
                " soal</span></td>" +
                "<td>" +
                statusHtml +
                "</td>" +
                "<td>" +
                '<div class="sikat-col-actions">' +
                '<button class="sikat-btn sikat-btn-outline sikat-btn-icon sikat-btn-sm btn-edit-modul" title="Edit"><i class="fa-solid fa-pen"></i></button>' +
                '<button class="sikat-btn sikat-btn-outline sikat-btn-icon sikat-btn-sm btn-soal-modul" title="Kelola Soal" style="color:var(--sikat-green);border-color:#a7f3d0"><i class="fa-solid fa-list-check"></i></button>' +
                '<button class="sikat-btn sikat-btn-danger sikat-btn-icon sikat-btn-sm btn-hapus-modul" title="Hapus"><i class="fa-solid fa-trash"></i></button>' +
                "</div>" +
                "</td>" +
                "</tr>",
            );
        });
    }

    function loadModules() {
        showLoading();

        $.ajax({
            url: 'MasterModul/loadModules',
            method: 'GET',
            dataType: 'json',
            success: function(res) {
                console.log(res)
                // asumsi response array
                DB.modules = res.modules;
                DB.questions = res.questions;
                DB.answers = res.answers;

                renderTable();
            },
            error: function(err) {
                $("#tbodyModul").html(`
                    <tr>
                        <td colspan="9" style="text-align:center;color:red">
                            Gagal load data
                        </td>
                    </tr>
                `);
                console.error(err);
            }
        });
    }

    function showLoading() {
        let html = '';
        for (let i = 0; i < 5; i++) {
            html += `
                <tr>
                    <td colspan="9">
                        <div style="height:20px;background:#eee;border-radius:6px;animation:pulse 1.5s infinite"></div>
                    </td>
                </tr>
            `;
        }
        $("#tbodyModul").html(html);
    }

    /* ── Show / hide form ─────────────────────────────────────── */
    function showForm(title) {
        $("#panelList").hide();
        $("#panelForm").show();
        $("#formPanelTitle").text(title);
        // reset to info tab
        $(".sikat-tab-item").removeClass("sikat-tab-active");
        $('[data-tab="tabInfo"]').addClass("sikat-tab-active");
        $(".sikat-tab-pane").removeClass("sikat-tab-pane-active");
        $("#tabInfo").addClass("sikat-tab-pane-active");
        $("html,body").animate({
            scrollTop: 0
        }, 200);
    }

    function hideForm() {
        $("#panelForm").hide();
        $("#panelList").show();
        clearForm();
        state.editId = null;
        state.soalData = [];
    }

    function clearForm() {
        $(
            "#fModulId,#fModulNama,#fModulDeskripsi,#fModulDurasi,#fModulIcon",
        ).val("");
        $("#fModulKategori,#fModulAktif").val("");
        $("#fModulAktif").val("Y");
        $("#iconPreview").attr("class", "fa-solid fa-layer-group");
        state.soalData = [];
        renderSoal();
    }

    /* ── Icon live preview ────────────────────────────────────── */
    $(document).on("input", "#fModulIcon", function() {
        var cls = "fa-solid " + $(this).val().trim() || "fa-solid fa-layer-group";
        $("#iconPreview").attr("class", cls);
    });

    /* ── Tambah Modul button ──────────────────────────────────── */
    $("#btnTambahModul").on("click", function() {
        state.editId = null;
        clearForm();
        showForm("Tambah Modul");
    });

    /* ── Batal ────────────────────────────────────────────────── */
    $("#btnBatalForm,#btnBatalForm2,#btnBatalSoal").on("click", function() {
        if (state.soalData.length > 0) {
            Swal.fire({
                title: "Batalkan perubahan?",
                text: "Data yang belum disimpan akan hilang.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, batalkan",
                cancelButtonText: "Tidak",
                confirmButtonColor: "#dc2626",
                cancelButtonColor: "#94a3b8",
                customClass: {
                    popup: "sikat-swal"
                },
            }).then(function(r) {
                if (r.isConfirmed) hideForm();
            });
        } else {
            hideForm();
        }
    });

    /* ── Search / filter ──────────────────────────────────────── */
    $("#searchModul,#filterKategori,#filterAktif").on(
        "input change",
        function() {
            renderTable();
        },
    );

    /* ── Edit Modul ───────────────────────────────────────────── */
    $(document).on("click", ".btn-edit-modul", function(e) {
        e.stopPropagation();
        var id = $(this).closest("tr").data("id");
        var m = DB.modules.find(function(x) {
            return x.id === id;
        });
        if (!m) return;
        state.editId = id;
        $("#fModulId").val(m.id);
        $("#fModulNama").val(m.module);
        $("#fModulDeskripsi").val(m.descr || "");
        $("#fModulKategori").val(m.kategori);
        $("#fModulDurasi").val(m.durasi);
        $("#fModulIcon").val(m.icon);
        $("#iconPreview").attr("class", "fa-solid " + m.icon || "fa-solid fa-layer-group");
        $("#fModulAktif").val(m.aktif || "Y");
        // load soal
        loadSoalFromDB(id);
        showForm("Edit Modul");
    });

    /* ── Kelola Soal button ───────────────────────────────────── */
    $(document).on("click", ".btn-soal-modul", function(e) {
        e.stopPropagation();
        var id = $(this).closest("tr").data("id");
        var m = DB.modules.find(function(x) {
            return x.id === id;
        });
        if (!m) return;
        state.editId = id;
        $("#fModulId").val(m.id);
        $("#fModulNama").val(m.module);
        $("#fModulDeskripsi").val(m.descr || "");
        $("#fModulKategori").val(m.kategori);
        $("#fModulDurasi").val(m.durasi);
        $("#fModulIcon").val(m.icon);
        $("#iconPreview").attr("class", m.icon || "fa-solid fa-layer-group");
        $("#fModulAktif").val(m.aktif || "Y");
        loadSoalFromDB(id);
        showForm("Kelola Soal — " + m.module);
        // auto-switch to soal tab
        setTimeout(function() {
            $(".sikat-tab-item").removeClass("sikat-tab-active");
            $('[data-tab="tabSoal"]').addClass("sikat-tab-active");
            $(".sikat-tab-pane").removeClass("sikat-tab-pane-active");
            $("#tabSoal").addClass("sikat-tab-pane-active");
        }, 50);
    });

    /* ── Hapus Modul ──────────────────────────────────────────── */
    // $(document).on("click", ".btn-hapus-modul", function(e) {
    //     e.stopPropagation();
    //     var id = $(this).closest("tr").data("id");
    //     var m = DB.modules.find(function(x) {
    //         return x.id === id;
    //     });
    //     if (!m) return;
    //     Swal.fire({
    //         title: "Hapus Modul?",
    //         html: '<span style="font-size:14px">Modul <strong>' +
    //             esc(m.module) +
    //             "</strong> beserta semua soal dan jawabannya akan dihapus.</span>",
    //         icon: "warning",
    //         showCancelButton: true,
    //         confirmButtonText: '<i class="fa-solid fa-trash"></i> Hapus',
    //         cancelButtonText: "Batal",
    //         confirmButtonColor: "#dc2626",
    //         cancelButtonColor: "#94a3b8",
    //         customClass: {
    //             popup: "sikat-swal"
    //         },
    //     }).then(function(r) {
    //         if (r.isConfirmed) {
    //             DB.modules = DB.modules.filter(function(x) {
    //                 return x.id !== id;
    //             });
    //             var qids = DB.questions
    //                 .filter(function(q) {
    //                     return q.id_module === id;
    //                 })
    //                 .map(function(q) {
    //                     return q.id;
    //                 });
    //             DB.questions = DB.questions.filter(function(q) {
    //                 return q.id_module !== id;
    //             });
    //             DB.answers = DB.answers.filter(function(a) {
    //                 return !qids.includes(a.id_question);
    //             });
    //             renderTable();
    //             Swal.fire({
    //                 title: "Berhasil!",
    //                 text: "Modul berhasil dihapus.",
    //                 icon: "success",
    //                 timer: 1800,
    //                 showConfirmButton: false,
    //                 customClass: {
    //                     popup: "sikat-swal"
    //                 },
    //             });
    //         }
    //     });
    // });
    $(document).on("click", ".btn-hapus-modul", function(e) {
        e.stopPropagation();

        var $btn = $(this);
        var id = $btn.closest("tr").data("id");

        var m = DB.modules.find(x => x.id === id);
        if (!m) return;

        Swal.fire({
            title: "Hapus Modul?",
            html: '<span style="font-size:14px">Modul <strong>' +
                esc(m.module) +
                "</strong> beserta semua soal dan jawabannya akan dihapus.</span>",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: '<i class="fa-solid fa-trash"></i> Hapus',
            cancelButtonText: "Batal",
            confirmButtonColor: "#dc2626",
            cancelButtonColor: "#94a3b8",
            customClass: {
                popup: "sikat-swal"
            },
        }).then(function(r) {
            if (!r.isConfirmed) return;

            // 🔥 disable button (optional)
            $btn.prop("disabled", true);

            // 🔥 loading
            Swal.fire({
                title: "Menghapus...",
                text: "Mohon tunggu",
                allowOutsideClick: false,
                didOpen: () => Swal.showLoading(),
                customClass: {
                    popup: "sikat-swal"
                },
            });

            $.ajax({
                url: "/MasterModul/deleteModule", // 🔥 endpoint
                method: "POST",
                data: JSON.stringify({
                    id: id
                }),
                contentType: "application/json",

                success: function(res) {
                    Swal.close();

                    // 🔥 reload data dari server
                    loadModules();

                    Swal.fire({
                        title: "Berhasil!",
                        text: "Modul berhasil dihapus.",
                        icon: "success",
                        timer: 1500,
                        showConfirmButton: false,
                        customClass: {
                            popup: "sikat-swal"
                        },
                    });
                },

                error: function() {
                    Swal.close();

                    Swal.fire({
                        title: "Error!",
                        text: "Gagal menghapus modul",
                        icon: "error",
                        customClass: {
                            popup: "sikat-swal"
                        },
                    });
                },

                complete: function() {
                    $btn.prop("disabled", false);
                },
            });
        });
    });

    /* ── Simpan Modul (info tab) ──────────────────────────────── */
    // $("#btnSimpanModul").on("click", function() {
    //     var nama = $.trim($("#fModulNama").val());
    //     var kat = $("#fModulKategori").val();
    //     var dur = parseInt($("#fModulDurasi").val());
    //     var icon = $.trim($("#fModulIcon").val());

    //     if (!nama) {
    //         alert("Nama modul wajib diisi.");
    //         $("#fModulNama").focus();
    //         return;
    //     }
    //     if (!kat) {
    //         alert("Kategori wajib dipilih.");
    //         $("#fModulKategori").focus();
    //         return;
    //     }
    //     if (!dur || dur < 1) {
    //         alert("Durasi harus lebih dari 0.");
    //         $("#fModulDurasi").focus();
    //         return;
    //     }
    //     if (!icon) {
    //         alert("Icon wajib diisi.");
    //         $("#fModulIcon").focus();
    //         return;
    //     }

    //     if (state.editId) {
    //         var idx = DB.modules.findIndex(function(x) {
    //             return x.id === state.editId;
    //         });
    //         if (idx > -1) {
    //             DB.modules[idx].module = nama;
    //             DB.modules[idx].descr = $.trim($("#fModulDeskripsi").val());
    //             DB.modules[idx].kategori = kat;
    //             DB.modules[idx].durasi = dur;
    //             DB.modules[idx].icon = icon;
    //             DB.modules[idx].aktif = $("#fModulAktif").val();
    //             DB.modules[idx].upddt = now();
    //             DB.modules[idx].updby = "admin";
    //         }
    //     } else {
    //         var newId = uuid();
    //         state.editId = newId;
    //         $("#fModulId").val(newId);
    //         DB.modules.push({
    //             id: newId,
    //             module: nama,
    //             descr: $.trim($("#fModulDeskripsi").val()),
    //             kategori: kat,
    //             durasi: dur,
    //             icon: icon,
    //             aktif: $("#fModulAktif").val(),
    //             crtdt: now(),
    //             crtby: "admin",
    //             upddt: null,
    //             updby: null,
    //         });
    //     }

    //     renderTable();
    //     // switch to soal tab
    //     $(".sikat-tab-item").removeClass("sikat-tab-active");
    //     $('[data-tab="tabSoal"]').addClass("sikat-tab-active");
    //     $(".sikat-tab-pane").removeClass("sikat-tab-pane-active");
    //     $("#tabSoal").addClass("sikat-tab-pane-active");

    //     Swal.fire({
    //         title: "Modul Disimpan!",
    //         text: "Sekarang tambahkan soal dan jawaban.",
    //         icon: "success",
    //         timer: 1500,
    //         showConfirmButton: false,
    //         customClass: {
    //             popup: "sikat-swal"
    //         },
    //     });
    // });
    $("#btnSimpanModul").on("click", function() {
        var $btn = $(this);

        var nama = $.trim($("#fModulNama").val());
        var kat = $("#fModulKategori").val();
        var dur = parseInt($("#fModulDurasi").val());
        var icon = $.trim($("#fModulIcon").val());

        if (!nama) {
            alert("Nama modul wajib diisi.");
            $("#fModulNama").focus();
            return;
        }
        if (!kat) {
            alert("Kategori wajib dipilih.");
            $("#fModulKategori").focus();
            return;
        }
        if (!dur || dur < 1) {
            alert("Durasi harus lebih dari 0.");
            $("#fModulDurasi").focus();
            return;
        }
        if (!icon) {
            alert("Icon wajib diisi.");
            $("#fModulIcon").focus();
            return;
        }

        var payload = {
            id: state.editId ?? null,
            module: nama,
            descr: $.trim($("#fModulDeskripsi").val()),
            kategori: kat,
            durasi: dur,
            icon: icon,
            aktif: $("#fModulAktif").val(),
        };

        // 🔥 loading state button
        $btn.prop("disabled", true).html(`
            <span class="spinner-border spinner-border-sm"></span> Menyimpan...
        `);

        // 🔥 Swal loading
        Swal.fire({
            title: "Menyimpan...",
            text: "Mohon tunggu",
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading(),
            customClass: {
                popup: "sikat-swal"
            },
        });

        $.ajax({
            url: "/MasterModul/saveModules", // 🔥 ganti sesuai endpoint kamu
            method: "POST",
            data: JSON.stringify(payload),
            contentType: "application/json",
            dataType: "json",
            success: function(res) {
                Swal.close();

                if (res.id) {
                    state.editId = res.id;
                    $("#fModulId").val(res.id); // optional
                }

                // optional: reload data dari server
                loadModules();

                // pindah tab
                $(".sikat-tab-item").removeClass("sikat-tab-active");
                $('[data-tab="tabSoal"]').addClass("sikat-tab-active");
                $(".sikat-tab-pane").removeClass("sikat-tab-pane-active");
                $("#tabSoal").addClass("sikat-tab-pane-active");

                Toast.fire({
                    icon: 'success',
                    title: "Modul berhasil disimpan!",
                });
            },
            error: function(err) {
                Swal.close();

                Swal.fire({
                    title: "Error!",
                    text: "Gagal menyimpan modul",
                    icon: "error",
                    customClass: {
                        popup: "sikat-swal"
                    },
                });
            },
            complete: function() {
                // 🔥 reset button
                $btn.prop("disabled", false).html("Simpan Modul");
            },
        });
    });

    /* ══════════════════════════════════════════════════════════
   SOAL & JAWABAN  (in-memory state.soalData)
   ══════════════════════════════════════════════════════════ */

    function loadSoalFromDB(moduleId) {
        state.soalData = [];
        var qs = DB.questions
            .filter(function(q) {
                return q.id_module === moduleId;
            })
            .sort(function(a, b) {
                return a.seqno - b.seqno;
            });
        qs.forEach(function(q) {
            var ans = DB.answers
                .filter(function(a) {
                    return a.id_question === q.id;
                })
                .sort(function(a, b) {
                    return a.seqno - b.seqno;
                });
            state.soalData.push({
                id: q.id,
                question: q.question,
                seqno: q.seqno,
                key_answer: q.key_answer,
                answers: ans.map(function(a) {
                    return {
                        id: a.id,
                        answer: a.answer,
                        seqno: a.seqno,
                        isKey: a.id === q.key_answer,
                    };
                }),
            });
        });
        renderSoal();
    }

    function renderSoal() {
        var $c = $("#soalContainer");
        $c.find(".sikat-question-card").remove();
        $("#soalEmpty").toggle(state.soalData.length === 0);
        $("#soalCount").text(state.soalData.length);

        state.soalData.forEach(function(soal, si) {
            var $card = $('<div class="sikat-question-card sikat-open">');

            // Header
            var $head = $('<div class="sikat-question-head">');
            var $left = $('<div class="sikat-question-head-left">');
            $left.append(
                '<div class="sikat-question-seq">' + (si + 1) + "</div>",
            );
            $left.append(
                '<div class="sikat-question-preview">' +
                esc(soal.question || "Pertanyaan baru...") +
                "</div>",
            );
            $head.append($left);

            var $headActions = $(
                '<div style="display:flex;gap:6px;align-items:center">',
            );
            $headActions.append(
                '<button class="sikat-btn sikat-btn-danger sikat-btn-icon sikat-btn-sm btn-hapus-soal" data-si="' +
                si +
                '" title="Hapus soal"><i class="fa-solid fa-trash"></i></button>',
            );
            $headActions.append(
                '<i class="fa-solid fa-chevron-down sikat-question-toggle-icon"></i>',
            );
            $head.append($headActions);
            $card.append($head);

            // Body
            var $body = $('<div class="sikat-question-body">');

            // question text
            var $qrow = $(
                '<div class="sikat-form-row" style="margin-bottom:12px">',
            );
            $qrow.append(
                '<div class="sikat-form-group" style="grid-column:span 3">' +
                '<label class="sikat-form-label"><i class="fa-solid fa-circle-question" style="color:var(--sikat-blue-500)"></i> Pertanyaan <span class="sikat-req">*</span></label>' +
                '<input type="text" class="sikat-form-control soal-question-input" data-si="' +
                si +
                '" value="' +
                esc(soal.question) +
                '" placeholder="Tulis pertanyaan di sini..." maxlength="200">' +
                "</div>",
            );
            $body.append($qrow);

            // answers
            var $ansLabel = $(
                '<label class="sikat-form-label"><i class="fa-solid fa-list" style="color:var(--sikat-green)"></i> Pilihan Jawaban <span style="font-size:11px;font-weight:400;color:var(--sikat-text-muted)">(pilih radio = jawaban benar)</span></label>',
            );
            $body.append($ansLabel);

            var $ansContainer = $(
                '<div class="sikat-answer-container" data-si="' + si + '">',
            );
            soal.answers.forEach(function(ans, ai) {
                $ansContainer.append(buildAnswerRow(si, ai, ans));
            });
            $body.append($ansContainer);

            var $addAns = $(
                '<button class="sikat-btn sikat-btn-outline sikat-btn-sm btn-tambah-jawaban" data-si="' +
                si +
                '" style="margin-top:6px"><i class="fa-solid fa-plus"></i> Tambah Jawaban</button>',
            );
            $body.append($addAns);

            $card.append($body);
            $c.append($card);
        });
    }

    function buildAnswerRow(si, ai, ans) {
        var labels = ["A", "B", "C", "D", "E", "F"];
        var lbl = labels[ai] || String(ai + 1);
        var checked = ans.isKey ? "checked" : "";
        var rowClass =
            "sikat-answer-row" + (ans.isKey ? " sikat-answer-correct" : "");
        return $(
            '<div class="' +
            rowClass +
            '">' +
            '<span class="sikat-answer-label">' +
            lbl +
            "</span>" +
            '<input type="radio" class="sikat-answer-radio" name="key_' +
            si +
            '" data-si="' +
            si +
            '" data-ai="' +
            ai +
            '" ' +
            (checked ? "checked" : "") +
            ">" +
            '<input type="text" class="sikat-answer-input soal-answer-input" data-si="' +
            si +
            '" data-ai="' +
            ai +
            '" value="' +
            esc(ans.answer) +
            '" placeholder="Tulis jawaban..." maxlength="200">' +
            (ans.isKey ?
                '<span class="sikat-answer-correct-label"><i class="fa-solid fa-circle-check"></i> Benar</span>' :
                "") +
            '<button class="sikat-btn sikat-btn-danger sikat-btn-icon sikat-btn-sm btn-hapus-jawaban" data-si="' +
            si +
            '" data-ai="' +
            ai +
            '" title="Hapus jawaban"><i class="fa-solid fa-xmark"></i></button>' +
            "</div>",
        );
    }

    /* ── Toggle question accordion ────────────────────────────── */
    $(document).on("click", ".sikat-question-head", function(e) {
        if ($(e.target).closest("button").length) return;
        $(this).closest(".sikat-question-card").toggleClass("sikat-open");
    });

    /* ── Live update question text in preview ─────────────────── */
    $(document).on("input", ".soal-question-input", function() {
        var si = $(this).data("si");
        state.soalData[si].question = $(this).val();
        $(this)
            .closest(".sikat-question-card")
            .find(".sikat-question-preview")
            .text($(this).val() || "Pertanyaan baru...");
    });

    /* ── Live update answer text ──────────────────────────────── */
    $(document).on("input", ".soal-answer-input", function() {
        var si = $(this).data("si"),
            ai = $(this).data("ai");
        state.soalData[si].answers[ai].answer = $(this).val();
    });

    /* ── Select correct answer ────────────────────────────────── */
    $(document).on("change", ".sikat-answer-radio", function() {
        var si = $(this).data("si"),
            ai = $(this).data("ai");
        state.soalData[si].answers.forEach(function(a, i) {
            a.isKey = i === ai;
        });
        state.soalData[si].key_answer = state.soalData[si].answers[ai].id;
        // re-render just that card's answers
        var $cont = $('.sikat-answer-container[data-si="' + si + '"]').empty();
        state.soalData[si].answers.forEach(function(ans, i) {
            $cont.append(buildAnswerRow(si, i, ans));
        });
    });

    /* ── Tambah Soal ──────────────────────────────────────────── */
    $("#btnTambahSoal").on("click", function() {
        var si = state.soalData.length;
        var aIds = [uuid(), uuid(), uuid(), uuid()];
        state.soalData.push({
            id: uuid(),
            question: "",
            seqno: si + 1,
            key_answer: aIds[0],
            answers: [{
                    id: aIds[0],
                    answer: "",
                    seqno: 1,
                    isKey: true
                },
                {
                    id: aIds[1],
                    answer: "",
                    seqno: 2,
                    isKey: false
                },
                {
                    id: aIds[2],
                    answer: "",
                    seqno: 3,
                    isKey: false
                },
                {
                    id: aIds[3],
                    answer: "",
                    seqno: 4,
                    isKey: false
                },
            ],
        });
        renderSoal();
        // scroll to new
        setTimeout(function() {
            var $cards = $(".sikat-question-card");
            if ($cards.last().length)
                $("html,body").animate({
                        scrollTop: $cards.last().offset().top - 100
                    },
                    300,
                );
        }, 50);
    });

    /* ── Hapus Soal ───────────────────────────────────────────── */
    $(document).on("click", ".btn-hapus-soal", function(e) {
        e.stopPropagation();
        var si = $(this).data("si");
        Swal.fire({
            title: "Hapus soal ini?",
            text: "Semua jawaban pada soal ini juga akan dihapus.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Hapus",
            cancelButtonText: "Batal",
            confirmButtonColor: "#dc2626",
            cancelButtonColor: "#94a3b8",
            customClass: {
                popup: "sikat-swal"
            },
        }).then(function(r) {
            if (r.isConfirmed) {
                state.soalData.splice(si, 1);
                state.soalData.forEach(function(s, i) {
                    s.seqno = i + 1;
                });
                renderSoal();
            }
        });
    });

    /* ── Tambah Jawaban ───────────────────────────────────────── */
    $(document).on("click", ".btn-tambah-jawaban", function() {
        var si = $(this).data("si");
        if (state.soalData[si].answers.length >= 6) {
            Swal.fire({
                title: "Maks 6 jawaban",
                text: "Setiap soal maksimal 6 pilihan jawaban.",
                icon: "info",
                timer: 1800,
                showConfirmButton: false,
                customClass: {
                    popup: "sikat-swal"
                },
            });
            return;
        }
        var ai = state.soalData[si].answers.length;
        state.soalData[si].answers.push({
            id: uuid(),
            answer: "",
            seqno: ai + 1,
            isKey: false,
        });
        var $cont = $('.sikat-answer-container[data-si="' + si + '"]').empty();
        state.soalData[si].answers.forEach(function(ans, i) {
            $cont.append(buildAnswerRow(si, i, ans));
        });
    });

    /* ── Hapus Jawaban ────────────────────────────────────────── */
    $(document).on("click", ".btn-hapus-jawaban", function(e) {
        e.stopPropagation();
        var si = $(this).data("si"),
            ai = $(this).data("ai");
        if (state.soalData[si].answers.length <= 2) {
            Swal.fire({
                title: "Minimal 2 jawaban",
                icon: "warning",
                timer: 1500,
                showConfirmButton: false,
                customClass: {
                    popup: "sikat-swal"
                },
            });
            return;
        }
        var wasKey = state.soalData[si].answers[ai].isKey;
        state.soalData[si].answers.splice(ai, 1);
        state.soalData[si].answers.forEach(function(a, i) {
            a.seqno = i + 1;
        });
        if (wasKey && state.soalData[si].answers.length > 0) {
            state.soalData[si].answers[0].isKey = true;
            state.soalData[si].key_answer = state.soalData[si].answers[0].id;
        }
        var $cont = $('.sikat-answer-container[data-si="' + si + '"]').empty();
        state.soalData[si].answers.forEach(function(ans, i) {
            $cont.append(buildAnswerRow(si, i, ans));
        });
    });

    /* ── Simpan Semua ─────────────────────────────────────────── */
    // $("#btnSimpanSemua").on("click", function() {
    //     // Validate
    //     for (var i = 0; i < state.soalData.length; i++) {
    //         var s = state.soalData[i];
    //         if (!$.trim(s.question)) {
    //             Swal.fire({
    //                 title: "Soal " + (i + 1) + " kosong",
    //                 text: "Harap isi teks pertanyaan.",
    //                 icon: "warning",
    //                 customClass: {
    //                     popup: "sikat-swal"
    //                 },
    //             });
    //             return;
    //         }
    //         for (var j = 0; j < s.answers.length; j++) {
    //             if (!$.trim(s.answers[j].answer)) {
    //                 Swal.fire({
    //                     title: "Jawaban kosong",
    //                     text: "Soal " + (i + 1) + " pilihan " + (j + 1) + " masih kosong.",
    //                     icon: "warning",
    //                     customClass: {
    //                         popup: "sikat-swal"
    //                     },
    //                 });
    //                 return;
    //             }
    //         }
    //         if (
    //             !s.answers.some(function(a) {
    //                 return a.isKey;
    //             })
    //         ) {
    //             Swal.fire({
    //                 title: "Belum ada jawaban benar",
    //                 text: "Soal " + (i + 1) + " belum ditandai jawaban benarnya.",
    //                 icon: "warning",
    //                 customClass: {
    //                     popup: "sikat-swal"
    //                 },
    //             });
    //             return;
    //         }
    //     }

    //     var mid = state.editId;
    //     if (!mid) {
    //         Swal.fire({
    //             title: "Simpan info modul dulu",
    //             icon: "info",
    //             customClass: {
    //                 popup: "sikat-swal"
    //             },
    //         });
    //         return;
    //     }

    //     // Remove old Q+A for this module
    //     var oldQids = DB.questions
    //         .filter(function(q) {
    //             return q.id_module === mid;
    //         })
    //         .map(function(q) {
    //             return q.id;
    //         });
    //     DB.questions = DB.questions.filter(function(q) {
    //         return q.id_module !== mid;
    //     });
    //     DB.answers = DB.answers.filter(function(a) {
    //         return !oldQids.includes(a.id_question);
    //     });

    //     // Insert new
    //     state.soalData.forEach(function(s, i) {
    //         DB.questions.push({
    //             id: s.id,
    //             id_module: mid,
    //             question: s.question,
    //             seqno: i + 1,
    //             image: null,
    //             key_answer: s.key_answer,
    //             aktif: "Y",
    //             crtdt: now(),
    //             crtby: "admin",
    //             upddt: null,
    //             updby: null,
    //         });
    //         s.answers.forEach(function(a, j) {
    //             DB.answers.push({
    //                 id: a.id,
    //                 id_question: s.id,
    //                 answer: a.answer,
    //                 seqno: j + 1,
    //                 image: null,
    //                 aktif: "Y",
    //                 crtdt: now(),
    //                 crtby: "admin",
    //                 upddt: null,
    //                 updby: null,
    //             });
    //         });
    //     });

    //     renderTable();
    //     hideForm();
    //     Swal.fire({
    //         title: "Berhasil Disimpan!",
    //         html: '<span style="font-size:14px">Modul beserta <strong>' +
    //             state.soalData.length +
    //             " soal</strong> berhasil disimpan.</span>",
    //         icon: "success",
    //         confirmButtonColor: "#2563eb",
    //         customClass: {
    //             popup: "sikat-swal"
    //         },
    //     });
    // });
    $("#btnSimpanSemua").on("click", function() {
        var $btn = $(this);

        // ✅ VALIDASI (tetap)
        for (var i = 0; i < state.soalData.length; i++) {
            var s = state.soalData[i];

            if (!$.trim(s.question)) {
                Swal.fire({
                    title: "Soal " + (i + 1) + " kosong",
                    text: "Harap isi teks pertanyaan.",
                    icon: "warning",
                    customClass: {
                        popup: "sikat-swal"
                    },
                });
                return;
            }

            for (var j = 0; j < s.answers.length; j++) {
                if (!$.trim(s.answers[j].answer)) {
                    Swal.fire({
                        title: "Jawaban kosong",
                        text: "Soal " + (i + 1) + " pilihan " + (j + 1) + " masih kosong.",
                        icon: "warning",
                        customClass: {
                            popup: "sikat-swal"
                        },
                    });
                    return;
                }
            }

            if (!s.answers.some(a => a.isKey)) {
                Swal.fire({
                    title: "Belum ada jawaban benar",
                    text: "Soal " + (i + 1) + " belum ditandai jawaban benarnya.",
                    icon: "warning",
                    customClass: {
                        popup: "sikat-swal"
                    },
                });
                return;
            }
        }

        var mid = state.editId;

        if (!mid) {
            Swal.fire({
                title: "Simpan info modul dulu",
                icon: "info",
                customClass: {
                    popup: "sikat-swal"
                },
            });
            return;
        }

        // 🔥 Payload kirim ke backend
        var payload = {
            id_module: mid,
            questions: state.soalData.map((s, i) => ({
                id: s.id,
                question: s.question,
                seqno: i + 1,
                key_answer: s.key_answer,
                answers: s.answers.map((a, j) => ({
                    id: a.id,
                    answer: a.answer,
                    seqno: j + 1,
                    isKey: a.isKey
                }))
            }))
        };
        var jmlSoal = state.soalData.length;

        // 🔥 disable button + spinner
        $btn.prop("disabled", true).html(`
            <span class="spinner-border spinner-border-sm"></span> Menyimpan...
        `);

        // 🔥 Swal loading
        Swal.fire({
            title: "Menyimpan soal...",
            text: "Mohon tunggu",
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading(),
            customClass: {
                popup: "sikat-swal"
            },
        });

        $.ajax({
            url: "/MasterModul/saveQuestions", // 🔥 endpoint kamu
            method: "POST",
            data: JSON.stringify(payload),
            contentType: "application/json",

            success: function(res) {
                Swal.close();

                // optional reload data
                loadModules();

                hideForm();

                Swal.fire({
                    title: "Berhasil Disimpan!",
                    html: '<span style="font-size:14px">Modul beserta <strong>' +
                        jmlSoal +
                        " soal</strong> berhasil disimpan.</span>",
                    icon: "success",
                    confirmButtonColor: "#2563eb",
                    customClass: {
                        popup: "sikat-swal"
                    },
                });
            },

            error: function() {
                Swal.close();

                Swal.fire({
                    title: "Error!",
                    text: "Gagal menyimpan soal",
                    icon: "error",
                    customClass: {
                        popup: "sikat-swal"
                    },
                });
            },

            complete: function() {
                $btn.prop("disabled", false).html("Simpan Semua");
            },
        });
    });

    /* ── Init ─────────────────────────────────────────────────── */
    $(function() {
        loadModules();
    });
</script>