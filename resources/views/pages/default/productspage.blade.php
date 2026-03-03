<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MojoLux — Collections</title>

<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap" rel="stylesheet">
<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

<style>
:root {
  --ink:         #1A1714;
  --ink-soft:    #5C5650;
  --gold:        #B8963E;
  --gold-warm:   #D4AF6A;
  --gold-pale:   #F7EDD8;
  --gold-faint:  #FBF5EA;
  --white:       #FFFFFF;
  --paper:       #FAF7F2;
  --paper-deep:  #F2EDE4;
  --rule:        #E8E0D4;
  --sw-open:     252px;
  --nav-h:       74px;
  --ease:        cubic-bezier(.4,0,.2,1);
}
* { margin:0; padding:0; box-sizing:border-box; }
body { font-family:'DM Sans',sans-serif; background:var(--paper); color:var(--ink); -webkit-font-smoothing:antialiased; }

/* ── NAV UNTOUCHED ── */
.nav-bar { position:fixed; top:0; left:0; right:0; z-index:1000; background:rgba(255,255,255,.97); backdrop-filter:blur(12px); border-bottom:1px solid rgba(212,175,55,.18); padding:1.5rem 3rem; }
.nav-content { display:flex; justify-content:space-between; align-items:center; max-width:1800px; margin:auto; }
.logo { font-family:'Playfair Display',serif; font-size:1.8rem; font-weight:700; text-decoration:none; color:var(--ink); }
.nav-links { display:flex; gap:3rem; }
.nav-links a { font-size:.75rem; letter-spacing:2px; text-transform:uppercase; color:var(--ink); text-decoration:none; font-weight:500; transition:color .2s; }
.nav-links a:hover { color:var(--gold); }

/* ── LAYOUT ── */
.page-wrap { margin-top:var(--nav-h); display:flex; min-height:calc(100vh - var(--nav-h)); }

/* ── SIDEBAR ── */
.sidebar { width:var(--sw-open); min-width:var(--sw-open); background:var(--white); border-right:1px solid var(--rule); position:sticky; top:var(--nav-h); height:calc(100vh - var(--nav-h)); display:flex; flex-direction:column; overflow:hidden; transition:width .35s var(--ease), min-width .35s var(--ease); z-index:50; }
.sidebar.collapsed { width:0; min-width:0; border-right-color:transparent; }
.sb-head { display:flex; align-items:center; justify-content:space-between; padding:1.4rem 1.4rem 1rem; flex-shrink:0; border-bottom:1px solid var(--rule); }
.sb-head-label { font-size:.58rem; letter-spacing:3px; text-transform:uppercase; color:var(--gold); font-weight:500; }
.sb-toggle-btn { width:28px; height:28px; border-radius:8px; border:1px solid var(--rule); background:var(--paper); cursor:pointer; display:flex; align-items:center; justify-content:center; transition:background .2s, border-color .2s; flex-shrink:0; }
.sb-toggle-btn:hover { background:var(--gold-faint); border-color:var(--gold-warm); }
.sb-toggle-btn svg { width:12px; height:12px; stroke:var(--ink-soft); fill:none; transition:transform .35s var(--ease); }
.sidebar.collapsed .sb-toggle-btn svg { transform:rotate(180deg); }
.sb-body { flex:1; overflow-y:auto; overflow-x:hidden; padding:1.4rem 1.4rem 2rem; display:flex; flex-direction:column; gap:1.8rem; scrollbar-width:none; white-space:nowrap; transition:opacity .18s var(--ease); }
.sb-body::-webkit-scrollbar { display:none; }
.sidebar.collapsed .sb-body { opacity:0; pointer-events:none; }
.sb-search { display:flex; align-items:center; gap:.5rem; background:var(--paper); border:1px solid var(--rule); border-radius:50px; padding:.55rem 1rem; transition:border-color .2s, box-shadow .2s; }
.sb-search:focus-within { border-color:var(--gold); box-shadow:0 0 0 3px rgba(184,150,62,.1); }
.sb-search svg { width:13px; height:13px; stroke:var(--ink-soft); fill:none; flex-shrink:0; }
.sb-search input { border:none; background:transparent; outline:none; font-family:'DM Sans',sans-serif; font-size:.82rem; color:var(--ink); width:100%; }
.sb-search input::placeholder { color:#c0b8ae; }
.sb-section-label { font-size:.58rem; letter-spacing:2.5px; text-transform:uppercase; color:var(--gold); font-weight:500; margin-bottom:.65rem; }
.cat-list { display:flex; flex-direction:column; gap:.1rem; }
.cat-btn { display:flex; align-items:center; gap:.75rem; padding:.6rem .85rem; border-radius:10px; border:none; background:transparent; cursor:pointer; font-family:'DM Sans',sans-serif; font-size:.84rem; color:var(--ink-soft); text-align:left; transition:all .18s; width:100%; white-space:nowrap; }
.cat-btn:hover { background:var(--paper); color:var(--ink); }
.cat-btn.active { background:var(--gold-faint); color:var(--ink); font-weight:500; border-left:2px solid var(--gold); padding-left:calc(.85rem - 2px); }
.cat-dot { width:6px; height:6px; border-radius:50%; background:var(--rule); flex-shrink:0; transition:background .18s; }
.cat-btn.active .cat-dot { background:var(--gold); }
.cat-btn:hover .cat-dot { background:var(--gold-warm); }

/* ── MAIN ── */
.main { flex:1; padding:2.4rem 2.8rem 5rem; min-width:0; }

/* ── SIDEBAR OPEN TOGGLE (outside sidebar, top of main) ── */
.sb-open-btn { display:none; align-items:center; gap:.5rem; background:transparent; border:1px solid var(--rule); border-radius:8px; padding:.4rem .8rem; cursor:pointer; font-family:'DM Sans',sans-serif; font-size:.75rem; color:var(--ink-soft); margin-bottom:1.5rem; transition:border-color .2s, color .2s; }
.sb-open-btn:hover { border-color:var(--gold); color:var(--ink); }
.sb-open-btn svg { width:12px; height:12px; stroke:currentColor; fill:none; }
.sidebar.collapsed ~ .main .sb-open-btn { display:flex; }
.sb-reopen-tab {
  position: fixed;
  top: calc(74px + 2rem);
  left: 0;
  z-index: 500;
  background: #FFFFFF;
  border: 1px solid #E8E0D4;
  border-left: none;
  border-radius: 0 10px 10px 0;
  padding: .7rem .5rem;
  cursor: pointer;
  box-shadow: 4px 0 16px rgba(26,23,20,.07);
  flex-direction: column;
  align-items: center;
  gap: .5rem;
  transition: background .2s, border-color .2s;
}
.sb-reopen-tab:hover {
  background: #FBF5EA;
  border-color: #D4AF6A;
}

/* ── RECOMMENDER ── */
.recommender { background:var(--ink); border-radius:20px; overflow:hidden; margin-bottom:3rem; position:relative; box-shadow:0 20px 60px rgba(26,23,20,.2); }
.recommender::after { content:'🐾'; position:absolute; right:2.5rem; bottom:1.5rem; font-size:10rem; opacity:.03; pointer-events:none; user-select:none; filter:grayscale(1); line-height:1; }

.rec-top { padding:2.8rem 3rem 0; position:relative; z-index:1; }
.rec-eyebrow { display:flex; align-items:center; gap:.7rem; margin-bottom:1.1rem; }
.rec-eyebrow-line { width:24px; height:1px; background:var(--gold); flex-shrink:0; }
.rec-eyebrow-text { font-size:.6rem; letter-spacing:3px; text-transform:uppercase; color:var(--gold); font-weight:500; }
.rec-headline { font-family:'DM Serif Display',serif; font-size:2.7rem; font-weight:400; color:var(--white); line-height:1.12; }
.rec-headline em { font-style:italic; color:var(--gold-warm); }
.rec-sub { margin-top:.65rem; font-size:.82rem; color:rgba(255,255,255,.38); font-weight:300; max-width:420px; line-height:1.75; }

.rec-divider { margin:2rem 3rem 0; height:1px; background:rgba(255,255,255,.06); }

.rec-controls { padding:1.6rem 3rem 0; display:flex; gap:.7rem; flex-wrap:wrap; align-items:center; position:relative; z-index:1; }
.rec-select-wrap { position:relative; }
.rec-select-wrap::after { content:'↓'; position:absolute; right:1.1rem; top:50%; transform:translateY(-50%); color:var(--gold-warm); font-size:.72rem; pointer-events:none; }
.rec-select { appearance:none; padding:.75rem 2.4rem .75rem 1.2rem; border-radius:50px; border:1px solid rgba(255,255,255,.1); background:rgba(255,255,255,.06); color:rgba(255,255,255,.8); font-family:'DM Sans',sans-serif; font-size:.82rem; outline:none; cursor:pointer; min-width:200px; transition:border-color .2s, background .2s; }
.rec-select option { background:#2a2520; color:white; }
.rec-select:focus { border-color:var(--gold); background:rgba(255,255,255,.09); }
.rec-input { padding:.75rem 1.2rem; border-radius:50px; border:1px solid rgba(255,255,255,.1); background:rgba(255,255,255,.06); color:rgba(255,255,255,.8); font-family:'DM Sans',sans-serif; font-size:.82rem; outline:none; min-width:210px; transition:border-color .2s, background .2s; }
.rec-input::placeholder { color:rgba(255,255,255,.25); }
.rec-input:focus { border-color:var(--gold); background:rgba(255,255,255,.09); }
.rec-btn { padding:.75rem 1.8rem; border:none; border-radius:50px; background:var(--gold); color:var(--ink); font-family:'DM Sans',sans-serif; font-weight:500; font-size:.82rem; cursor:pointer; transition:background .2s, transform .15s, box-shadow .2s; white-space:nowrap; }
.rec-btn:hover { background:var(--gold-warm); transform:translateY(-1px); box-shadow:0 6px 20px rgba(184,150,62,.3); }
.rec-btn:active { transform:translateY(0); }

.pet-traits { display:none; flex-wrap:wrap; gap:.4rem; padding:1.2rem 3rem 0; position:relative; z-index:1; animation:rise .3s var(--ease); }
.pet-traits.show { display:flex; }
.trait-pill { padding:.22rem .75rem; border-radius:50px; background:rgba(255,255,255,.05); border:1px solid rgba(255,255,255,.09); font-size:.71rem; color:rgba(255,255,255,.45); }
.trait-pill b { color:var(--gold-warm); font-weight:500; }

.rec-status { padding:1rem 3rem .2rem; font-size:.75rem; color:rgba(255,255,255,.25); min-height:1rem; letter-spacing:.2px; position:relative; z-index:1; }

/* top result */
.rec-result-top { display:none; margin:0 3rem 1.6rem; background:rgba(255,255,255,.05); border:1px solid rgba(184,150,62,.18); border-radius:14px; padding:1.7rem 1.9rem; animation:rise .4s var(--ease); position:relative; z-index:1; }
.rt-label { font-size:.58rem; letter-spacing:3px; text-transform:uppercase; color:var(--gold); font-weight:500; margin-bottom:.55rem; }
.rt-row { display:flex; justify-content:space-between; align-items:flex-start; gap:1.5rem; flex-wrap:wrap; }
.rt-name { font-family:'DM Serif Display',serif; font-size:1.8rem; color:var(--white); font-weight:400; line-height:1.15; }
.rt-sub { margin-top:.3rem; font-size:.77rem; color:rgba(255,255,255,.32); font-weight:300; }
.rt-tags { display:flex; flex-wrap:wrap; gap:.35rem; margin-top:.85rem; }
.rt-tag { padding:.18rem .65rem; border-radius:50px; background:rgba(184,150,62,.1); border:1px solid rgba(184,150,62,.2); font-size:.67rem; color:var(--gold-warm); }
.rt-score { text-align:right; flex-shrink:0; }
.rt-score-num { font-family:'DM Serif Display',serif; font-size:2.2rem; color:var(--gold); line-height:1; }
.rt-score-label { font-size:.6rem; color:rgba(255,255,255,.22); margin-top:.15rem; letter-spacing:.5px; }

.match-bar-wrap { margin-top:1.1rem; }
.match-bar-track { height:2px; border-radius:2px; background:rgba(255,255,255,.07); overflow:hidden; }
.match-bar-fill { height:100%; border-radius:2px; background:linear-gradient(90deg, var(--gold), var(--gold-warm)); width:0%; transition:width .9s var(--ease) .1s; }

/* other picks */
.rec-other-wrap { display:none; padding:0 3rem 2.8rem; position:relative; z-index:1; }
.rec-other-label { font-size:.58rem; letter-spacing:3px; text-transform:uppercase; color:rgba(255,255,255,.22); font-weight:500; margin-bottom:1rem; }
.rec-other-grid { display:grid; grid-template-columns:repeat(auto-fill, minmax(168px,1fr)); gap:.9rem; }
.rec-card { background:rgba(255,255,255,.04); border:1px solid rgba(255,255,255,.07); border-radius:12px; overflow:hidden; cursor:pointer; transition:border-color .2s, transform .2s; animation:rise .5s var(--ease) both; }
.rec-card:hover { border-color:rgba(184,150,62,.28); transform:translateY(-3px); }
.rec-card img { width:100%; height:128px; object-fit:cover;  object-position: top; display:block; }
.rec-card-info { padding:.75rem .9rem; }
.rec-card-name { font-size:.81rem; font-weight:400; color:rgba(255,255,255,.78); line-height:1.3; }
.rec-card-price { font-size:.84rem; font-weight:500; color:var(--gold); margin-top:.25rem; }
.rec-card-tags { display:flex; flex-wrap:wrap; gap:.25rem; margin-top:.45rem; }
.rec-card-tag { font-size:.62rem; padding:.1rem .48rem; border-radius:50px; background:rgba(184,150,62,.07); color:rgba(255,255,255,.32); border:1px solid rgba(184,150,62,.12); }
.rec-card-bar { height:2px; border-radius:2px; overflow:hidden; background:rgba(255,255,255,.06); margin-top:.55rem; }
.rec-card-bar-fill { height:100%; background:var(--gold); width:0%; border-radius:2px; transition:width .8s var(--ease) .15s; }

/* ── PRODUCTS ── */
.products-header { display:flex; align-items:baseline; gap:1rem; margin-bottom:2rem; }
.products-title { font-family:'DM Serif Display',serif; font-size:1.9rem; font-weight:400; }
.products-count { font-size:.72rem; color:var(--ink-soft); letter-spacing:.5px; }

.pgrid { display:grid; grid-template-columns:repeat(auto-fill, minmax(255px,1fr)); gap:1.6rem; }

.product-card { background:var(--white); border-radius:14px; overflow:hidden; border:1px solid var(--rule); transition:transform .28s var(--ease), box-shadow .28s var(--ease); }
.product-card:hover { transform:translateY(-5px); box-shadow:0 16px 40px rgba(26,23,20,.1); }
.product-card.hidden { display:none; }

.product-image-wrap { overflow:hidden; background:var(--paper-deep); }
.product-image-wrap img { width:100%; height:260px; object-fit:cover;  object-position:top; display:block; transition:transform .45s var(--ease); }
.product-card:hover .product-image-wrap img { transform:scale(1.05); }

.product-info { padding:1.1rem 1.2rem 1.3rem; }
.product-category { font-size:.58rem; letter-spacing:2.5px; text-transform:uppercase; color:var(--gold); font-weight:500; margin-bottom:.3rem; }
.product-name { font-family:'DM Serif Display',serif; font-size:1.05rem; font-weight:400; color:var(--ink); line-height:1.35; }
.product-price { font-size:.92rem; font-weight:500; color:var(--ink); margin-top:.45rem; }
.product-actions { display:flex; gap:.5rem; margin-top:.95rem; }
.btn-add-cart { flex:1; background:var(--ink); color:var(--white); padding:.62rem .9rem; border-radius:9px; text-decoration:none; font-size:.74rem; font-weight:500; text-align:center; letter-spacing:.2px; transition:background .2s; display:flex; align-items:center; justify-content:center; gap:.35rem; }
.btn-add-cart:hover { background:var(--gold); color:var(--ink); }
.btn-quick-view { width:38px; height:38px; border-radius:9px; background:var(--paper); border:1px solid var(--rule); display:flex; align-items:center; justify-content:center; text-decoration:none; color:var(--ink-soft); font-size:1rem; transition:border-color .2s, color .2s; }
.btn-quick-view:hover { border-color:var(--gold); color:var(--ink); }

@keyframes rise { from{opacity:0;transform:translateY(14px);} to{opacity:1;transform:translateY(0);} }

@media(max-width:900px){ .sidebar{display:none;} .main{padding:1.5rem;} }
@media(max-width:640px){ .rec-top{padding:2rem 1.6rem 0;} .rec-controls,.rec-other-wrap,.pet-traits,.rec-status{padding-left:1.6rem;padding-right:1.6rem;} .rec-result-top{margin-left:1.6rem;margin-right:1.6rem;} .rec-divider{margin-left:1.6rem;margin-right:1.6rem;} .rec-headline{font-size:2rem;} .pgrid{grid-template-columns:1fr 1fr;gap:1rem;} }
</style>
</head>
<body>

<!-- NAV — UNTOUCHED -->
<nav class="nav-bar">
  <div class="nav-content">
    <a href="/" class="logo">MojoLux</a>
    <div class="nav-links">
      <a href="/">Home</a>
      <a href="/collections">Collections</a>
      <a href="/cart">Cart</a>
    </div>
  </div>
</nav>

<button class="sb-reopen-tab" id="sb-reopen-tab" onclick="toggleSidebar()" style="display:none;">
  <svg viewBox="0 0 24 24" stroke-width="1.8" style="width:13px;height:13px;stroke:#5C5650;fill:none;display:block;"><path d="M9 18l6-6-6-6"/></svg>
  <span style="font-size:.55rem;letter-spacing:2px;text-transform:uppercase;color:#5C5650;writing-mode:vertical-rl;font-weight:500;">Browse</span>
</button>


<div class="page-wrap">

  <!-- SIDEBAR -->
  <aside class="sidebar" id="sidebar">
    <div class="sb-head">
      <span class="sb-head-label">Browse</span>
      <button class="sb-toggle-btn" onclick="toggleSidebar()">
        <svg viewBox="0 0 24 24" stroke-width="1.8"><path d="M15 18l-6-6 6-6"/></svg>
      </button>
    </div>
    <div class="sb-body">
      <div class="sb-search">
        <svg viewBox="0 0 24 24" stroke-width="1.8"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg>
        <input type="text" placeholder="Search products…" oninput="filterSearch(this.value)">
      </div>
      <div>
        <div class="sb-section-label">Categories</div>
        <div class="cat-list" id="cat-list">
          <button class="cat-btn active"  onclick="filterCat('all',this)"><span class="cat-dot"></span>All Products</button>
          <button class="cat-btn" onclick="filterCat('toys',this)"><span class="cat-dot"></span>Toys</button>
          <button class="cat-btn" onclick="filterCat('t-shirts',this)"><span class="cat-dot"></span>T-Shirts</button>
          <button class="cat-btn" onclick="filterCat('hoodies',this)"><span class="cat-dot"></span>Hoodies</button>
          <button class="cat-btn" onclick="filterCat('raincoats',this)"><span class="cat-dot"></span>Raincoats</button>
          <button class="cat-btn" onclick="filterCat('grooming',this)"><span class="cat-dot"></span>Grooming</button>
          <button class="cat-btn" onclick="filterCat('bandanas',this)"><span class="cat-dot"></span>Bandanas</button>
        </div>
      </div>
    </div>
  </aside>

  <!-- MAIN -->
  <div class="main">

    <!-- show sidebar button when collapsed -->
    <button class="sb-open-btn" onclick="toggleSidebar()">
      <svg viewBox="0 0 24 24" stroke-width="1.8"><path d="M9 18l6-6-6-6"/></svg>
      Browse
    </button>

    <!-- RECOMMENDER -->
    <div class="recommender">
      <div class="rec-top">
        <div class="rec-eyebrow">
          <span class="rec-eyebrow-line"></span>
          <span class="rec-eyebrow-text">Personalised for your dog</span>
        </div>
        <div class="rec-headline">Dressed for their<br><em>personality.</em></div>
        <div class="rec-sub">Pick your dog and we'll find the products that actually suit them — matched to their breed, age, size and character.</div>
      </div>

      <div class="rec-divider"></div>

      <div class="rec-controls">
        <div class="rec-select-wrap">
          <select id="pet-select" class="rec-select" onchange="onPetChange()">
            <option value="">Choose your dog</option>
            @foreach($pets as $pet)
            <option
              value="{{ $pet->id }}"
              data-name="{{ $pet->name }}"
              data-type="{{ strtolower($pet->type) }}"
              data-breed="{{ strtolower($pet->breed) }}"
              data-age="{{ $pet->age }}"
              data-personality="{{ strtolower($pet->personality) }}"
              data-weight="{{ $pet->weight ?? '' }}"
              data-size="{{ strtolower($pet->size ?? '') }}"
            >{{ $pet->name }}</option>
            @endforeach
          </select>
        </div>
        <input type="text" id="ai-q" class="rec-input" placeholder="e.g. cozy, outdoor, budget…">
        <button class="rec-btn" onclick="runRecommender()">Find their picks</button>
      </div>

      <div class="pet-traits" id="pet-traits"></div>
      <div class="rec-status" id="rec-status"></div>
      <div class="rec-result-top" id="rec-top"></div>
      <div class="rec-other-wrap" id="rec-other-wrap">
        <div class="rec-other-label">Also a great fit</div>
        <div class="rec-other-grid" id="rec-other-grid"></div>
      </div>
    </div>

    <!-- ALL PRODUCTS -->
    <div class="products-header">
      <div class="products-title">All Products</div>
      <div class="products-count" id="pcount"></div>
    </div>

    <div class="pgrid" id="pgrid">
      @foreach ($product_data as $data)
      <div class="product-card"
        data-id="{{ $data->id }}"
        data-price="{{ $data->getPrice() }}"
        data-rating="{{ $data->rating }}"
        data-category="{{ strtolower($data->category) }}"
        data-name="{{ strtolower($data->title) }}">
        <div class="product-image-wrap">
          <img src="{{ $data->getImage() }}" alt="{{ $data->title }}" loading="lazy">
        </div>
        <div class="product-info">
          <div class="product-category">{{ $data->category }}</div>
          <div class="product-name">{{ $data->title }}</div>
          <div class="product-price">${{ $data->getPrice() }}</div>
          <div class="product-actions">
            <a href="{{ route('cart.addfromstorepage',['id'=>$data->id]) }}" class="btn-add-cart">Add to Cart</a>
            <a href="{{ $data->getLink() }}" class="btn-quick-view"><i class="ion-ios-eye"></i></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>

  </div>
</div>

<!-- PET FROM DB — UNTOUCHED -->
<script>
  const userPet = @json($pets->first());
</script>

<script>
function cap(s){ return s ? s.split(' ').map(w=>w[0].toUpperCase()+w.slice(1)).join(' ') : ''; }

function updateCount(){
  const n = document.querySelectorAll('#pgrid .product-card:not(.hidden)').length;
  document.getElementById('pcount').textContent = n + ' items';
}
document.addEventListener('DOMContentLoaded', updateCount);

function toggleSidebar(){
  const sb  = document.getElementById('sidebar');
  const tab = document.getElementById('sb-reopen-tab');
  sb.classList.toggle('collapsed');
  tab.style.display = sb.classList.contains('collapsed') ? 'flex' : 'none' ;
}

function filterCat(cat, btn){
  document.querySelectorAll('.cat-btn').forEach(b=>b.classList.remove('active'));
  btn.classList.add('active');
  applyFilter(cat, '');
}

function applyFilter(cat, search){
  document.querySelectorAll('#pgrid .product-card').forEach(card=>{
    const mc = (cat==='all' || card.dataset.category===cat);
    const ms = (!search || card.dataset.name.includes(search) || card.dataset.category.includes(search));
    card.classList.toggle('hidden', !(mc && ms));
  });
  updateCount();
}

function filterSearch(v){
  const q = v.toLowerCase().trim();
  document.querySelectorAll('.cat-btn').forEach(b=>b.classList.remove('active'));
  document.querySelector('#cat-list .cat-btn').classList.add('active');
  applyFilter('all', q);
}

function onPetChange(){
  const sel = document.getElementById('pet-select');
  const el  = document.getElementById('pet-traits');
  el.innerHTML = ''; el.classList.remove('show');
  if(!sel.value) return;
  const o   = sel.options[sel.selectedIndex];
  const age = parseInt(o.dataset.age);
  const fields = [
    {l:'Name',        v:cap(o.dataset.name)},
    {l:'Breed',       v:cap(o.dataset.breed)},
    {l:'Age',         v:age+(age===1?' yr':' yrs')},
    {l:'Personality', v:cap(o.dataset.personality)},
  ];
  if(o.dataset.size)   fields.push({l:'Size',   v:cap(o.dataset.size)});
  if(o.dataset.weight) fields.push({l:'Weight', v:o.dataset.weight+' kg'});
  fields.forEach(f=>{
    if(!f.v||f.v===' ') return;
    const p = document.createElement('div');
    p.className = 'trait-pill';
    p.innerHTML = `${f.l} <b>${f.v}</b>`;
    el.appendChild(p);
  });
  el.classList.add('show');
}

function runRecommender(){
  const q         = (document.getElementById('ai-q').value||'').toLowerCase();
  const sel       = document.getElementById('pet-select');
  const status    = document.getElementById('rec-status');
  const topEl     = document.getElementById('rec-top');
  const otherGrid = document.getElementById('rec-other-grid');
  const otherWrap = document.getElementById('rec-other-wrap');

  let pet = userPet ? {...userPet} : null;
  if(sel.value){
    const o = sel.options[sel.selectedIndex];
    pet = {
      name:o.dataset.name, type:o.dataset.type, breed:o.dataset.breed,
      age:parseInt(o.dataset.age), personality:o.dataset.personality,
      size:o.dataset.size||'', weight:parseFloat(o.dataset.weight)||0
    };
  }

  topEl.innerHTML=''; topEl.style.display='none';
  otherGrid.innerHTML=''; otherWrap.style.display='none';
  status.textContent = 'Finding the best picks for '+cap(pet?.name||'your dog')+'…';

  setTimeout(()=>{
    const cards = Array.from(document.querySelectorAll('#pgrid .product-card'));
    let scored  = [];

    cards.forEach(card=>{
      let score=0; const reasons=[];
      const name   = card.dataset.name||'';
      const cat    = card.dataset.category;
      const price  = parseFloat(card.dataset.price);
      const rating = parseInt(card.dataset.rating)||0;

      if(rating>=5){score+=2;reasons.push('Top rated');}
      else if(rating>=4) score+=1;

      if(pet){
        const p   = (pet.personality||'').toLowerCase();
        const b   = (pet.breed||'').toLowerCase();
        const age = pet.age||0;
        const sz  = (pet.size||'').toLowerCase();
        const wt  = pet.weight||0;

        if(age<=1){
          if(cat==='toys')     {score+=5;reasons.push('Great for puppies');}
          if(cat==='t-shirts') {score+=3;reasons.push('Sized for young dogs');}
        } else if(age<=3){
          if(cat==='toys')     {score+=4;reasons.push('Playful age');}
          if(cat==='bandanas')  score+=2;
        } else if(age>=8){
          if(cat==='grooming') {score+=5;reasons.push('Senior coat care');}
          if(cat==='hoodies')  {score+=4;reasons.push('Warmth for older dogs');}
          if(cat==='toys')      score+=1;
        }

        if(p.includes('playful')){
          if(cat==='toys')     {score+=5;reasons.push('Matches playful nature');}
          if(cat==='bandanas')  score+=2;
        }
        if(p.includes('lazy')||p.includes('calm')){
          if(cat==='hoodies')  {score+=4;reasons.push('Perfect for couch days');}
          if(cat==='grooming') {score+=3;reasons.push('Low-activity care');}
        }
        if(p.includes('adventurous')||p.includes('active')||p.includes('energetic')){
          if(cat==='raincoats'){score+=5;reasons.push('Adventure-ready');}
          if(cat==='toys')     {score+=3;reasons.push('High-energy play');}
          if(cat==='t-shirts')  score+=2;
        }
        if(p.includes('stylish')||p.includes('fashionable')){
          if(cat==='t-shirts') {score+=5;reasons.push('Fashion-forward pick');}
          if(cat==='bandanas') {score+=5;reasons.push('Born to accessorise');}
          if(cat==='hoodies')   score+=3;
        }
        if(p.includes('clean')||p.includes('tidy')){
          if(cat==='grooming') {score+=5;reasons.push('Keeps them pristine');}
          if(cat==='bandanas')  score+=2;
        }
        if(p.includes('gentle')||p.includes('shy')){
          if(cat==='hoodies')  {score+=4;reasons.push('Comforting & snug');}
          if(cat==='grooming')  score+=3;
        }

        if(b.includes('retriev')||b.includes('spaniel')||b.includes('beagle')){
          if(cat==='toys')     {score+=3;reasons.push('Retrieval breed love');}
        }
        if(b.includes('poodle')||b.includes('maltese')||b.includes('bichon')){
          if(cat==='grooming') {score+=4;reasons.push('Coat-intensive breed');}
          if(cat==='bandanas')  score+=3;
        }
        if(b.includes('husky')||b.includes('malamute')||b.includes('shepherd')){
          if(cat==='raincoats'){score+=3;reasons.push('Built for outdoors');}
          if(cat==='toys')      score+=3;
        }
        if(b.includes('bulldog')||b.includes('pug')||b.includes('french')){
          if(cat==='hoodies')  {score+=4;reasons.push('Short-coat warmth');}
          if(cat==='grooming') {score+=3;reasons.push('Skin fold care');}
        }
        if(b.includes('chihuahua')||b.includes('yorkie')||b.includes('dachshund')){
          if(cat==='hoodies')  {score+=5;reasons.push('Small dogs feel the cold');}
          if(cat==='raincoats') score+=3;
          if(cat==='t-shirts')  score+=3;
        }

        if(sz==='small'||wt<10){
          if(cat==='hoodies')  {score+=3;reasons.push('Petite fit');}
        }
        if(sz==='large'||wt>30){
          if(cat==='raincoats') score+=2;
          if(cat==='toys')     {score+=2;reasons.push('Durable for big dogs');}
        }
      }

      if(q){
        if(name.includes(q))   score+=4;
        if(cat.includes(q))    score+=3;
        if(q.includes('budget')  &&price<60)  {score+=4;reasons.push('Budget pick');}
        if(q.includes('premium') &&price>100) {score+=4;reasons.push('Premium choice');}
        if((q.includes('cozy')||q.includes('warm'))&&(cat==='hoodies'||cat==='raincoats')) score+=4;
        if((q.includes('outdoor')||q.includes('rain'))&&cat==='raincoats') score+=4;
        if(q.includes('groom')&&cat==='grooming') score+=4;
        if((q.includes('style')||q.includes('fashion'))&&(cat==='t-shirts'||cat==='bandanas')) score+=4;
      }

      if(score>0) scored.push({score,card,name,price,cat,rating,reasons:[...new Set(reasons)]});
    });

    scored.sort((a,b)=>b.score-a.score||b.rating-a.rating);

    if(!scored.length){
      status.textContent='Nothing matched — try choosing a dog or different keywords.';
      return;
    }

    const pname = cap(pet?.name||'Your Dog');
    const MAX   = 16;
    const top   = scored[0];
    const pct   = Math.min(100, Math.round((top.score/MAX)*100));

    topEl.innerHTML=`
      <div class="rt-label">Best match for ${pname}</div>
      <div class="rt-row">
        <div>
          <div class="rt-name">${cap(top.name)}</div>
          <div class="rt-sub">$${top.price} &nbsp;·&nbsp; matched on breed, age &amp; personality</div>
          <div class="rt-tags">${top.reasons.map(r=>`<span class="rt-tag">${r}</span>`).join('')}</div>
        </div>
        <div class="rt-score">
          <div class="rt-score-num">${top.score}</div>
          <div class="rt-score-label">match score</div>
        </div>
      </div>
      <div class="match-bar-wrap">
        <div class="match-bar-track"><div class="match-bar-fill" id="top-bar"></div></div>
      </div>`;
    topEl.style.display='block';
    setTimeout(()=>{ const b=document.getElementById('top-bar'); if(b) b.style.width=pct+'%'; },80);

    scored.slice(1,7).forEach((item,i)=>{
      const img=item.card.querySelector('img');
      const el=document.createElement('div');
      el.className='rec-card';
      el.style.animationDelay=(i*.07)+'s';
      const ipct=Math.min(100,Math.round((item.score/MAX)*100));
      el.innerHTML=`
        ${img?`<img src="${img.src}" alt="${item.name}" loading="lazy">`:''}
        <div class="rec-card-info">
          <div class="rec-card-name">${cap(item.name)}</div>
          <div class="rec-card-price">$${item.price}</div>
          <div class="rec-card-tags">${item.reasons.slice(0,2).map(r=>`<span class="rec-card-tag">${r}</span>`).join('')}</div>
          <div class="rec-card-bar"><div class="rec-card-bar-fill" data-pct="${ipct}"></div></div>
        </div>`;
      otherGrid.appendChild(el);
    });

    otherWrap.style.display='block';
    status.textContent=scored.length+' products ranked for '+pname;
    setTimeout(()=>{
      document.querySelectorAll('.rec-card-bar-fill').forEach(b=>{ b.style.width=b.dataset.pct+'%'; });
    },180);

  },700);
}
</script>
</body>
</html>
