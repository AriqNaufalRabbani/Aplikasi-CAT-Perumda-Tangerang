<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>Ujian – Kuesioner CAT COPD</title>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>

<style>
:root{
  --blue-dark:   #1e3a8a;
  --blue-main:   #2563eb;
  --blue-mid:    #3b82f6;
  --blue-light:  #93c5fd;
  --blue-pale:   #dbeafe;
  --blue-bg:     #eff6ff;
  --cyan:        #06b6d4;
  --cyan-pale:   #cffafe;
  --white:       #ffffff;
  --text:        #1e293b;
  --text2:       #475569;
  --muted:       #94a3b8;
  --border:      #bfdbfe;
  --border2:     #e2e8f0;
  --green:       #16a34a;
  --green-pale:  #dcfce7;
  --amber:       #d97706;
  --amber-pale:  #fef3c7;
  --red:         #dc2626;
  --red-pale:    #fee2e2;
  --shadow:      0 1px 4px rgba(37,99,235,.08),0 4px 16px rgba(37,99,235,.06);
  --shadow-md:   0 4px 20px rgba(37,99,235,.12);
  --radius:      14px;
}
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth}
body{font-family:'DM Sans',sans-serif;background:var(--blue-bg);color:var(--text);min-height:100vh;display:flex;flex-direction:column}

/* ── TOPBAR ── */
.topbar{
  background:var(--white);
  border-bottom:1.5px solid var(--border);
  padding:0 28px;
  height:60px;
  display:flex;align-items:center;justify-content:space-between;
  position:sticky;top:0;z-index:100;
  box-shadow:0 2px 12px rgba(37,99,235,.07);
}
.top-left{display:flex;align-items:center;gap:14px}
.top-logo{
  width:36px;height:36px;
  background:linear-gradient(135deg,var(--blue-main),var(--cyan));
  border-radius:10px;display:grid;place-items:center;
  box-shadow:0 4px 10px rgba(37,99,235,.3);
}
.top-title{font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;font-size:.95rem;color:var(--blue-dark)}
.top-sub{font-size:.75rem;color:var(--muted);font-weight:500}

.top-center{display:flex;align-items:center;gap:0}
.timer-pill{
  display:flex;align-items:center;gap:8px;
  background:var(--blue-pale);
  border:1.5px solid var(--border);
  border-radius:999px;padding:8px 22px;
}
.timer-pill svg{color:var(--blue-main)}
.timer-val{
  font-family:'Plus Jakarta Sans',sans-serif;
  font-size:1.1rem;font-weight:800;color:var(--blue-dark);
  letter-spacing:1px;min-width:52px;text-align:center;
}
.timer-val.warn{color:var(--amber);animation:blink 1s ease-in-out infinite}
.timer-val.danger{color:var(--red);animation:blink .6s ease-in-out infinite}
@keyframes blink{0%,100%{opacity:1}50%{opacity:.5}}

.btn-submit-top{
  display:flex;align-items:center;gap:8px;
  padding:10px 22px;border:none;border-radius:10px;
  background:linear-gradient(135deg,var(--blue-dark),var(--blue-main));
  color:#fff;font-family:'Plus Jakarta Sans',sans-serif;
  font-weight:700;font-size:.88rem;cursor:pointer;
  box-shadow:0 4px 14px rgba(37,99,235,.3);
  transition:filter .15s,transform .15s;
}
.btn-submit-top:hover{filter:brightness(1.08);transform:translateY(-1px)}

/* ── LAYOUT ── */
.layout{display:flex;flex:1;gap:0;max-width:1280px;margin:0 auto;width:100%;padding:24px 20px;gap:20px}

/* ── QUESTION AREA ── */
.q-area{flex:1;min-width:0;display:flex;flex-direction:column;gap:16px}

/* progress header */
.q-meta{
  background:var(--white);border-radius:var(--radius);
  border:1.5px solid var(--border);
  padding:18px 24px;box-shadow:var(--shadow);
}
.q-meta-top{display:flex;align-items:center;justify-content:space-between;margin-bottom:12px}
.q-counter{
  font-family:'Plus Jakarta Sans',sans-serif;
  font-size:.88rem;font-weight:600;color:var(--text2);
}
.q-counter strong{font-size:1.2rem;color:var(--blue-main);font-weight:800}
.q-status-chips{display:flex;gap:8px}
.chip{
  display:flex;align-items:center;gap:5px;
  padding:4px 12px;border-radius:999px;
  font-size:.75rem;font-weight:700;
}
.chip-green{background:var(--green-pale);color:var(--green)}
.chip-amber{background:var(--amber-pale);color:var(--amber)}
.prog-bar-wrap{height:7px;background:var(--blue-pale);border-radius:999px;overflow:hidden}
.prog-bar{height:100%;background:linear-gradient(90deg,var(--blue-main),var(--cyan));border-radius:999px;transition:width .4s cubic-bezier(.34,1.56,.64,1);width:0%}

/* question card */
.q-card{
  background:var(--white);border-radius:var(--radius);
  border:1.5px solid var(--border);
  padding:28px 28px 22px;box-shadow:var(--shadow);
  flex:1;
}
.q-num-badge{
  display:inline-flex;align-items:center;gap:6px;
  background:var(--blue-pale);color:var(--blue-main);
  border-radius:8px;padding:4px 12px;
  font-size:.78rem;font-weight:700;letter-spacing:.3px;
  margin-bottom:14px;
}
.q-text{
  font-family:'Plus Jakarta Sans',sans-serif;
  font-size:1.12rem;font-weight:700;color:var(--text);
  line-height:1.5;margin-bottom:22px;
}

/* options */
.options{display:flex;flex-direction:column;gap:10px}
.opt{
  display:flex;align-items:center;gap:14px;
  padding:14px 18px;
  border:2px solid var(--border2);
  border-radius:12px;
  background:var(--blue-bg);
  cursor:pointer;
  transition:all .18s ease;
  user-select:none;
  position:relative;
  overflow:hidden;
}
.opt::before{
  content:'';position:absolute;inset:0;
  background:linear-gradient(135deg,var(--blue-pale),transparent);
  opacity:0;transition:opacity .2s;
}
.opt:hover{border-color:var(--blue-mid);background:var(--blue-pale);transform:translateX(3px)}
.opt:hover::before{opacity:1}
.opt.selected{
  border-color:var(--blue-main);
  background:linear-gradient(135deg,var(--blue-pale),#e0f2fe);
  box-shadow:0 0 0 3px rgba(37,99,235,.1);
  transform:translateX(4px);
}
.opt-key{
  width:36px;height:36px;flex-shrink:0;
  border-radius:9px;border:2px solid var(--border2);
  background:var(--white);
  display:grid;place-items:center;
  font-family:'Plus Jakarta Sans',sans-serif;
  font-size:.88rem;font-weight:800;color:var(--text2);
  transition:all .18s;position:relative;z-index:1;
}
.opt:hover .opt-key{border-color:var(--blue-mid);color:var(--blue-main)}
.opt.selected .opt-key{
  background:linear-gradient(135deg,var(--blue-main),var(--cyan));
  border-color:transparent;color:#fff;
  box-shadow:0 4px 10px rgba(37,99,235,.3);
}
.opt-text{font-size:.95rem;font-weight:500;color:var(--text);position:relative;z-index:1;flex:1}
.opt.selected .opt-text{color:var(--blue-dark);font-weight:600}
.opt-check{
  margin-left:auto;color:var(--blue-main);
  opacity:0;transform:scale(.6);
  transition:all .2s;position:relative;z-index:1;
}
.opt.selected .opt-check{opacity:1;transform:scale(1)}

/* saved toast */
.saved-toast{
  display:none;align-items:center;gap:7px;
  background:var(--green-pale);border:1px solid #86efac;
  border-radius:8px;padding:8px 14px;
  font-size:.8rem;font-weight:700;color:var(--green);
  margin-top:12px;
  animation:fadeUp .3s ease;
}
.saved-toast.show{display:flex}

/* nav buttons */
.q-nav{display:flex;justify-content:space-between;align-items:center;gap:12px}
.btn-nav{
  display:flex;align-items:center;gap:8px;
  padding:12px 24px;border-radius:10px;
  font-family:'Plus Jakarta Sans',sans-serif;
  font-size:.88rem;font-weight:700;cursor:pointer;
  transition:all .15s;border:none;
}
.btn-prev{
  background:var(--white);color:var(--text2);
  border:2px solid var(--border2);
}
.btn-prev:hover:not(:disabled){border-color:var(--blue-mid);color:var(--blue-main)}
.btn-prev:disabled{opacity:.4;cursor:not-allowed}
.btn-next{
  background:linear-gradient(135deg,var(--blue-main),var(--blue-mid));
  color:#fff;
  box-shadow:0 4px 14px rgba(37,99,235,.3);
}
.btn-next:hover{filter:brightness(1.08);transform:translateY(-1px);box-shadow:0 6px 20px rgba(37,99,235,.35)}
.btn-finish{
  background:linear-gradient(135deg,var(--green),#22c55e);
  color:#fff;box-shadow:0 4px 14px rgba(22,163,74,.3);
}
.btn-finish:hover{filter:brightness(1.08);transform:translateY(-1px)}

/* ── SIDEBAR ── */
.sidebar{width:280px;flex-shrink:0;display:flex;flex-direction:column;gap:16px}

.side-card{
  background:var(--white);border-radius:var(--radius);
  border:1.5px solid var(--border);
  padding:20px;box-shadow:var(--shadow);
}
.side-title{
  font-family:'Plus Jakarta Sans',sans-serif;
  font-size:.75rem;font-weight:800;letter-spacing:1.5px;
  text-transform:uppercase;color:var(--blue-dark);margin-bottom:14px;
}

/* stat boxes */
.stat-row{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-bottom:14px}
.stat-box{
  border-radius:10px;padding:12px 10px;text-align:center;
}
.stat-box-ans{background:var(--green-pale);border:1.5px solid #86efac}
.stat-box-rem{background:var(--amber-pale);border:1.5px solid #fcd34d}
.stat-box-num{
  font-family:'Plus Jakarta Sans',sans-serif;
  font-size:1.6rem;font-weight:800;line-height:1;
}
.stat-box-ans .stat-box-num{color:var(--green)}
.stat-box-rem .stat-box-num{color:var(--amber)}
.stat-box-lbl{font-size:.68rem;font-weight:700;margin-top:3px;letter-spacing:.4px;text-transform:uppercase}
.stat-box-ans .stat-box-lbl{color:var(--green)}
.stat-box-rem .stat-box-lbl{color:var(--amber)}

/* progress overall */
.prog-label{display:flex;justify-content:space-between;font-size:.8rem;font-weight:600;color:var(--text2);margin-bottom:7px}
.prog-label span{color:var(--blue-main);font-weight:800}
.prog-wrap2{height:8px;background:var(--blue-pale);border-radius:999px;overflow:hidden;margin-bottom:14px}
.prog-fill2{height:100%;background:linear-gradient(90deg,var(--blue-main),var(--cyan));border-radius:999px;transition:width .4s cubic-bezier(.34,1.56,.64,1);width:0%}

/* legend */
.legend{display:flex;gap:10px;flex-wrap:wrap;margin-bottom:4px}
.leg-item{display:flex;align-items:center;gap:5px;font-size:.73rem;font-weight:600;color:var(--text2)}
.leg-dot{width:12px;height:12px;border-radius:4px}
.leg-current{background:var(--blue-main)}
.leg-done{background:var(--green)}
.leg-empty{background:var(--border2);border:1.5px solid var(--muted)}

/* number grid */
.num-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:7px}
.num-btn{
  aspect-ratio:1;border-radius:8px;border:none;
  font-family:'Plus Jakarta Sans',sans-serif;
  font-size:.82rem;font-weight:700;cursor:pointer;
  transition:all .15s;
  background:var(--blue-pale);color:var(--text2);
  border:1.5px solid var(--border);
}
.num-btn:hover{border-color:var(--blue-main);color:var(--blue-main);transform:scale(1.08)}
.num-btn.current{
  background:linear-gradient(135deg,var(--blue-main),var(--blue-mid));
  color:#fff;border-color:transparent;
  box-shadow:0 3px 10px rgba(37,99,235,.35);
  transform:scale(1.1);
}
.num-btn.answered{
  background:var(--green-pale);color:var(--green);
  border-color:#86efac;
}
.num-btn.answered.current{
  background:linear-gradient(135deg,var(--green),#22c55e);
  color:#fff;border-color:transparent;
  box-shadow:0 3px 10px rgba(22,163,74,.3);
}

/* ── MODAL ── */
.modal-overlay{
  display:none;position:fixed;inset:0;
  background:rgba(15,30,80,.35);
  backdrop-filter:blur(4px);
  z-index:200;place-items:center;
}
.modal-overlay.show{display:grid}
.modal{
  background:var(--white);border-radius:20px;
  box-shadow:0 20px 60px rgba(15,30,80,.2);
  padding:36px;max-width:460px;width:90%;
  animation:popIn .3s cubic-bezier(.34,1.56,.64,1);
  text-align:center;
}
@keyframes popIn{from{transform:scale(.85);opacity:0}to{transform:scale(1);opacity:1}}
.modal-icon{
  width:64px;height:64px;border-radius:50%;
  margin:0 auto 18px;display:grid;place-items:center;
}
.modal-icon-warn{background:var(--amber-pale)}
.modal-icon-result{background:var(--blue-pale)}
.modal h2{
  font-family:'Plus Jakarta Sans',sans-serif;
  font-size:1.3rem;font-weight:800;color:var(--text);margin-bottom:8px
}
.modal p{font-size:.9rem;color:var(--text2);line-height:1.6;margin-bottom:24px}
.modal-btns{display:flex;gap:10px}
.modal-btn{
  flex:1;padding:12px;border-radius:10px;
  font-family:'Plus Jakarta Sans',sans-serif;font-size:.9rem;font-weight:700;cursor:pointer;
  transition:all .15s;border:none;
}
.modal-btn-cancel{background:var(--blue-pale);color:var(--blue-main)}
.modal-btn-cancel:hover{background:var(--border)}
.modal-btn-confirm{
  background:linear-gradient(135deg,var(--blue-dark),var(--blue-main));
  color:#fff;box-shadow:0 4px 14px rgba(37,99,235,.3)
}
.modal-btn-confirm:hover{filter:brightness(1.08)}

/* result modal */
.result-score-ring{
  width:96px;height:96px;border-radius:50%;
  background:linear-gradient(135deg,var(--blue-dark),var(--blue-main));
  margin:0 auto 18px;display:flex;flex-direction:column;
  align-items:center;justify-content:center;
  box-shadow:0 8px 24px rgba(37,99,235,.3);
}
.result-score-ring .score-val{
  font-family:'Plus Jakarta Sans',sans-serif;font-size:2rem;font-weight:800;color:#fff;line-height:1
}
.result-score-ring .score-max{font-size:.7rem;color:rgba(255,255,255,.6);font-weight:600}
.result-bands{display:flex;gap:8px;margin:14px 0 22px}
.r-band{flex:1;border-radius:8px;padding:10px 4px;text-align:center;border:2px solid transparent}
.r-band.active{transform:translateY(-3px);box-shadow:0 4px 14px rgba(0,0,0,.12)}
.r-band-low{background:#f0fdf4;border-color:#86efac;color:var(--green)}
.r-band-med{background:#fefce8;border-color:#fcd34d;color:var(--amber)}
.r-band-hi{background:#fff7ed;border-color:#fdba74;color:#ea580c}
.r-band-vhi{background:#fef2f2;border-color:#fca5a5;color:var(--red)}
.r-band.active.r-band-low{background:var(--green);color:#fff;border-color:var(--green)}
.r-band.active.r-band-med{background:var(--amber);color:#fff;border-color:var(--amber)}
.r-band.active.r-band-hi{background:#ea580c;color:#fff;border-color:#ea580c}
.r-band.active.r-band-vhi{background:var(--red);color:#fff;border-color:var(--red)}
.r-band-s{font-family:'Plus Jakarta Sans',sans-serif;font-size:.82rem;font-weight:800}
.r-band-l{font-size:.6rem;font-weight:700;text-transform:uppercase;letter-spacing:.3px;margin-top:2px}

/* ── RESPONSIVE ── */
@media(max-width:900px){
  .sidebar{width:100%}
  .layout{flex-direction:column}
  .num-grid{grid-template-columns:repeat(8,1fr)}
}
@media(max-width:480px){
  .topbar{padding:0 16px}
  .layout{padding:16px 12px}
  .q-card{padding:20px 16px}
  .timer-pill{padding:7px 14px}
  .num-grid{grid-template-columns:repeat(6,1fr)}
}

/* fade up */
@keyframes fadeUp{from{opacity:0;transform:translateY(12px)}to{opacity:1;transform:translateY(0)}}
.q-card{animation:fadeUp .3s ease}
</style>
</head>
<body>

<!-- TOPBAR -->
<header class="topbar">
  <div class="top-left">
    <div class="top-logo">
      <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"/>
      </svg>
    </div>
    <div>
      <div class="top-title">Kuesioner CAT</div>
      <div class="top-sub">COPD Assessment Test</div>
    </div>
  </div>

  <div class="top-center">
    <div class="timer-pill">
      <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
      <span class="timer-val" id="timer">10:00</span>
    </div>
  </div>

  <button class="btn-submit-top" onclick="openSubmitModal()">
    <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
    Kumpulkan
  </button>
</header>

<!-- LAYOUT -->
<div class="layout">

  <!-- QUESTION AREA -->
  <div class="q-area">
    <!-- progress meta -->
    <div class="q-meta">
      <div class="q-meta-top">
        <div class="q-counter">Soal <strong id="cur-num">1</strong> / 8</div>
        <div class="q-status-chips">
          <div class="chip chip-green">
            <svg width="11" height="11" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path d="M20 6L9 17l-5-5"/></svg>
            <span id="chip-ans">0</span> Dijawab
          </div>
          <div class="chip chip-amber">
            <svg width="11" height="11" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            <span id="chip-rem">8</span> Belum
          </div>
        </div>
      </div>
      <div class="prog-bar-wrap"><div class="prog-bar" id="prog-bar"></div></div>
    </div>

    <!-- question card -->
    <div class="q-card" id="q-card">
      <div class="q-num-badge" id="q-badge">
        <svg width="12" height="12" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path d="M9 11l3 3L22 4"/></svg>
        Pertanyaan <span id="q-badge-num">1</span> dari 8
      </div>
      <div class="q-text" id="q-text">Memuat pertanyaan...</div>

      <div class="options" id="opts"></div>

      <div class="saved-toast" id="saved-toast">
        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path d="M20 6L9 17l-5-5"/></svg>
        Jawaban tersimpan
      </div>
    </div>

    <!-- navigation -->
    <div class="q-nav">
      <button class="btn-nav btn-prev" id="btn-prev" onclick="navigate(-1)">
        <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
        Sebelumnya
      </button>
      <button class="btn-nav btn-next" id="btn-next" onclick="navigate(1)">
        Selanjutnya
        <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </button>
    </div>
  </div>

  <!-- SIDEBAR -->
  <div class="sidebar">
    <!-- stats + progress -->
    <div class="side-card">
      <div class="side-title">Status Pengerjaan</div>
      <div class="stat-row">
        <div class="stat-box stat-box-ans">
          <div class="stat-box-num" id="s-ans">0</div>
          <div class="stat-box-lbl">Dijawab</div>
        </div>
        <div class="stat-box stat-box-rem">
          <div class="stat-box-num" id="s-rem">8</div>
          <div class="stat-box-lbl">Belum</div>
        </div>
      </div>
      <div class="prog-label">
        <span>Progres keseluruhan</span>
        <span id="prog-pct">0%</span>
      </div>
      <div class="prog-wrap2"><div class="prog-fill2" id="prog-fill2"></div></div>

      <!-- legend -->
      <div class="legend">
        <div class="leg-item"><div class="leg-dot leg-current"></div>Soal saat ini</div>
        <div class="leg-item"><div class="leg-dot leg-done"></div>Sudah dijawab</div>
        <div class="leg-item"><div class="leg-dot leg-empty"></div>Belum dijawab</div>
      </div>
    </div>

    <!-- number grid -->
    <div class="side-card">
      <div class="side-title">Navigasi Soal</div>
      <div class="num-grid" id="num-grid"></div>
    </div>

    <!-- quick tip -->
    <div class="side-card" style="background:var(--blue-pale);border-color:var(--border)">
      <div style="display:flex;gap:10px;align-items:flex-start">
        <div style="width:32px;height:32px;background:var(--blue-main);border-radius:8px;display:grid;place-items:center;flex-shrink:0">
          <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="#fff" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
        </div>
        <div>
          <div style="font-family:'Plus Jakarta Sans',sans-serif;font-size:.8rem;font-weight:800;color:var(--blue-dark);margin-bottom:4px">Panduan Pengisian</div>
          <div style="font-size:.78rem;color:var(--text2);line-height:1.55">Pilih nilai <strong>0</strong> (tidak ada gejala) hingga <strong>5</strong> (gejala sangat berat) untuk setiap pertanyaan. Jawaban disimpan otomatis.</div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- SUBMIT MODAL -->
<div class="modal-overlay" id="modal-submit">
  <div class="modal">
    <div class="modal-icon modal-icon-warn">
      <svg width="30" height="30" fill="none" viewBox="0 0 24 24" stroke="#d97706" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
    </div>
    <h2>Kumpulkan Jawaban?</h2>
    <p id="modal-warn-text">Pastikan semua pertanyaan telah dijawab. Jawaban yang telah dikumpulkan tidak dapat diubah kembali.</p>
    <div class="modal-btns">
      <button class="modal-btn modal-btn-cancel" onclick="closeModal('modal-submit')">Periksa Lagi</button>
      <button class="modal-btn modal-btn-confirm" onclick="submitExam()">Ya, Kumpulkan</button>
    </div>
  </div>
</div>

<!-- RESULT MODAL -->
<div class="modal-overlay" id="modal-result">
  <div class="modal">
    <div class="result-score-ring">
      <span class="score-val" id="r-score">0</span>
      <span class="score-max">/40</span>
    </div>
    <h2>Hasil Penilaian CAT</h2>
    <p id="r-desc">–</p>
    <div class="result-bands">
      <div class="r-band r-band-low" id="rb0"><div class="r-band-s">0–10</div><div class="r-band-l">Ringan</div></div>
      <div class="r-band r-band-med" id="rb1"><div class="r-band-s">11–20</div><div class="r-band-l">Sedang</div></div>
      <div class="r-band r-band-hi"  id="rb2"><div class="r-band-s">21–30</div><div class="r-band-l">Berat</div></div>
      <div class="r-band r-band-vhi" id="rb3"><div class="r-band-s">31–40</div><div class="r-band-l">Sangat Berat</div></div>
    </div>
    <div class="modal-btns">
      <button class="modal-btn modal-btn-cancel" onclick="window.print()">🖨 Cetak</button>
      <button class="modal-btn modal-btn-confirm" onclick="resetExam()">Isi Ulang</button>
    </div>
  </div>
</div>

<script>
// ─── DATA ────────────────────────────────
const questions = [
  { text:"Seberapa sering Anda batuk?", left:"Tidak pernah batuk", right:"Selalu batuk" },
  { text:"Seberapa banyak lendir / dahak yang ada di dada Anda?", left:"Tidak ada lendir sama sekali", right:"Dada penuh dengan lendir" },
  { text:"Apakah dada Anda terasa sesak atau tertekan?", left:"Tidak terasa sesak sama sekali", right:"Dada sangat terasa sesak" },
  { text:"Saat naik tangga atau berjalan mendaki, seberapa berat sesak napas yang Anda rasakan?", left:"Tidak sesak napas sama sekali", right:"Sangat sesak napas" },
  { text:"Seberapa terbatas aktivitas Anda di dalam rumah?", left:"Tidak terbatas sama sekali", right:"Sangat terbatas" },
  { text:"Apakah penyakit paru-paru Anda membuat Anda tidak percaya diri untuk keluar rumah?", left:"Percaya diri bisa keluar rumah", right:"Tidak percaya diri sama sekali" },
  { text:"Seberapa nyenyak tidur Anda?", left:"Tidur sangat nyenyak", right:"Tidur sangat tidak nyenyak" },
  { text:"Seberapa banyak energi yang Anda miliki?", left:"Memiliki banyak energi", right:"Tidak memiliki energi sama sekali" }
];

const labels = ['0','1','2','3','4','5'];
const answers = new Array(8).fill(null);
let current = 0;

// ─── TIMER ───────────────────────────────
let totalSec = 10 * 60;
const timerEl = document.getElementById('timer');
const timerInterval = setInterval(()=>{
  totalSec--;
  const m = Math.floor(totalSec/60), s = totalSec%60;
  timerEl.textContent = `${String(m).padStart(2,'0')}:${String(s).padStart(2,'0')}`;
  timerEl.className = 'timer-val' + (totalSec<=60?' danger':totalSec<=180?' warn':'');
  if(totalSec<=0){ clearInterval(timerInterval); submitExam(); }
},(1000));

// ─── BUILD NUM GRID ───────────────────────
function buildGrid(){
  const grid = document.getElementById('num-grid');
  grid.innerHTML='';
  questions.forEach((_,i)=>{
    const b=document.createElement('button');
    b.className='num-btn'+(i===current?' current':'')+(answers[i]!==null?' answered':'');
    b.textContent=i+1;
    b.onclick=()=>goTo(i);
    grid.appendChild(b);
  });
}

// ─── RENDER QUESTION ─────────────────────
let toastTimer=null;
function renderQ(){
  const q = questions[current];
  document.getElementById('cur-num').textContent = current+1;
  document.getElementById('q-badge-num').textContent = current+1;
  document.getElementById('q-text').textContent = q.text;

  // opts
  const optsEl = document.getElementById('opts');
  optsEl.innerHTML='';

  // left/right labels
  const labRow = document.createElement('div');
  labRow.style.cssText='display:flex;justify-content:space-between;margin-bottom:8px;padding:0 2px';
  labRow.innerHTML=`<span style="font-size:.75rem;font-weight:700;color:var(--muted);max-width:42%;line-height:1.3">${q.left}</span>
    <span style="font-size:.75rem;font-weight:700;color:var(--muted);max-width:42%;text-align:right;line-height:1.3">${q.right}</span>`;
  optsEl.appendChild(labRow);

  labels.forEach((lbl,i)=>{
    const div=document.createElement('div');
    div.className='opt'+(answers[current]===i?' selected':'');
    div.innerHTML=`
      <div class="opt-key">${lbl}</div>
      <div class="opt-text">${optDesc(i)}</div>
      <svg class="opt-check" width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>`;
    div.onclick=()=>selectOpt(i);
    optsEl.appendChild(div);
  });

  // hide/show saved toast
  document.getElementById('saved-toast').classList.toggle('show', answers[current]!==null);

  // prev/next
  document.getElementById('btn-prev').disabled = current===0;
  const nextBtn = document.getElementById('btn-next');
  if(current===questions.length-1){
    nextBtn.innerHTML=`<svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg> Kumpulkan`;
    nextBtn.className='btn-nav btn-finish';
    nextBtn.onclick=openSubmitModal;
  } else {
    nextBtn.innerHTML=`Selanjutnya <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>`;
    nextBtn.className='btn-nav btn-next';
    nextBtn.onclick=()=>navigate(1);
  }

  buildGrid();
}

function optDesc(i){
  const desc=['Tidak ada / Normal','Sangat sedikit','Sedikit','Sedang','Berat','Sangat berat'];
  return desc[i];
}

function selectOpt(i){
  answers[current]=i;
  renderQ();
  updateStats();

  // show toast
  const t=document.getElementById('saved-toast');
  t.classList.add('show');
  clearTimeout(toastTimer);
  toastTimer=setTimeout(()=>t.classList.remove('show'),2000);
}

function navigate(dir){
  current=Math.max(0,Math.min(questions.length-1,current+dir));
  renderQ();
}
function goTo(i){ current=i; renderQ(); }

function updateStats(){
  const ans=answers.filter(a=>a!==null).length;
  const rem=8-ans;
  const pct=Math.round(ans/8*100);
  document.getElementById('chip-ans').textContent=ans;
  document.getElementById('chip-rem').textContent=rem;
  document.getElementById('s-ans').textContent=ans;
  document.getElementById('s-rem').textContent=rem;
  document.getElementById('prog-pct').textContent=pct+'%';
  document.getElementById('prog-bar').style.width=pct+'%';
  document.getElementById('prog-fill2').style.width=pct+'%';
}

// ─── MODAL ───────────────────────────────
function openSubmitModal(){
  const ans=answers.filter(a=>a!==null).length;
  const rem=8-ans;
  const warnText=rem>0
    ? `⚠️ Masih ada <strong>${rem} pertanyaan</strong> yang belum dijawab. Apakah Anda yakin ingin mengumpulkan sekarang?`
    : `Semua <strong>8 pertanyaan</strong> telah dijawab. Klik "Ya, Kumpulkan" untuk melihat hasil.`;
  document.getElementById('modal-warn-text').innerHTML=warnText;
  document.getElementById('modal-submit').classList.add('show');
}
function closeModal(id){ document.getElementById(id).classList.remove('show') }

function submitExam(){
  clearInterval(timerInterval);
  closeModal('modal-submit');
  const total=answers.reduce((s,a)=>s+(a??0),0);
  document.getElementById('r-score').textContent=total;

  let desc, bandIdx;
  if(total<=10){desc='Dampak <strong>ringan</strong>. Tetap pantau kondisi dan konsultasikan dengan dokter secara rutin.';bandIdx=0}
  else if(total<=20){desc='Dampak <strong>sedang</strong>. Disarankan berkonsultasi dengan dokter untuk rencana pengelolaan penyakit.';bandIdx=1}
  else if(total<=30){desc='Dampak <strong>berat</strong>. Segera konsultasikan ke dokter spesialis paru untuk evaluasi lebih lanjut.';bandIdx=2}
  else{desc='Dampak <strong>sangat berat</strong>. Diperlukan penanganan medis segera dan evaluasi komprehensif.';bandIdx=3}

  document.getElementById('r-desc').innerHTML=desc;
  ['rb0','rb1','rb2','rb3'].forEach((id,i)=>document.getElementById(id).classList.toggle('active',i===bandIdx));
  document.getElementById('modal-result').classList.add('show');
}

function resetExam(){
  answers.fill(null); current=0;
  closeModal('modal-result');
  renderQ(); updateStats();
  totalSec=10*60;
}

// ─── INIT ────────────────────────────────
renderQ();
updateStats();
</script>
</body>
</html>
