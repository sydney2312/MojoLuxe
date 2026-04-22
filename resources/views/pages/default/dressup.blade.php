<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MojoLux — Dress Up {{ $pet->name ?? 'Your Pet' }}</title>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:ital,opsz,wght@0,9..40,400;0,9..40,500;1,9..40,300&display=swap" rel="stylesheet">
<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
<style>
:root {
  --ink:#1A1714; --ink-soft:#5C5650; --gold:#B8963E; --gold-warm:#D4AF6A;
  --gold-pale:#F7EDD8; --gold-faint:#FBF5EA; --white:#FFFFFF;
  --paper:#FAF7F2; --paper-deep:#F2EDE4; --rule:#E8E0D4;
  --nav-h:74px; --ease:cubic-bezier(.4,0,.2,1);
}
* { margin:0; padding:0; box-sizing:border-box; }
body { font-family:'DM Sans',sans-serif; background:var(--paper); color:var(--ink); -webkit-font-smoothing:antialiased; }

.nav-bar { position:fixed; top:0; left:0; right:0; z-index:1000; background:rgba(255,255,255,.97); backdrop-filter:blur(12px); border-bottom:1px solid rgba(212,175,55,.18); padding:1.5rem 3rem; }
.nav-content { display:flex; justify-content:space-between; align-items:center; max-width:1800px; margin:auto; }
.logo { font-family:'DM Serif Display',serif; font-size:1.8rem; font-weight:400; text-decoration:none; color:var(--ink); }
.nav-links { display:flex; gap:3rem; }
.nav-links a { font-size:.75rem; letter-spacing:2px; text-transform:uppercase; color:var(--ink); text-decoration:none; font-weight:500; transition:color .2s; }
.nav-links a:hover { color:var(--gold); }

.page-wrap { margin-top:var(--nav-h); display:grid; grid-template-columns:280px 1fr 300px; min-height:calc(100vh - var(--nav-h)); }

/* ── WARDROBE ── */
.wardrobe { background:var(--white); border-right:1px solid var(--rule); display:flex; flex-direction:column; position:sticky; top:var(--nav-h); height:calc(100vh - var(--nav-h)); overflow-y:auto; scrollbar-width:none; }
.wardrobe::-webkit-scrollbar { display:none; }
.wardrobe-head { padding:1.4rem 1.4rem 1rem; border-bottom:1px solid var(--rule); flex-shrink:0; }
.wardrobe-label { font-size:.58rem; letter-spacing:3px; text-transform:uppercase; color:var(--gold); font-weight:500; }
.wardrobe-sub { font-size:.75rem; color:var(--ink-soft); margin-top:.2rem; }
.cat-section { padding:1.2rem 1.4rem; border-bottom:1px solid var(--rule); }
.cat-label { font-size:.58rem; letter-spacing:2.5px; text-transform:uppercase; color:var(--gold); font-weight:500; margin-bottom:.75rem; }
.cat-items { display:grid; grid-template-columns:1fr 1fr; gap:.6rem; }

.item-btn { background:var(--paper); border:1px solid var(--rule); border-radius:10px; overflow:hidden; cursor:pointer; transition:border-color .2s, transform .2s; padding:0; position:relative; text-align:left; }
.item-btn:hover { border-color:var(--gold-warm); transform:translateY(-2px); }
.item-btn.active { border-color:var(--gold); border-width:2px; background:var(--gold-faint); }
.item-btn.active::after { content:'✓'; position:absolute; top:5px; right:7px; font-size:.65rem; color:var(--gold); font-weight:700; }
/* Hardcoded flat-lay clothing image shown in wardrobe */
.item-thumb { width:100%; height:80px; object-fit:contain; object-position:center; display:block; padding:8px; background:var(--white); }
.item-name  { font-size:.65rem; color:var(--ink); padding:.3rem .5rem .2rem; line-height:1.3; }
.item-price { font-size:.68rem; color:var(--gold); font-weight:500; padding:0 .5rem .45rem; }

/* ── CANVAS ── */
.canvas-area {
  display:flex;
  flex-direction:column;
  align-items:center;
  justify-content:flex-start;
  padding:3rem 2rem 2rem;
  background:var(--paper);
}

.dog-stage {
  position:relative;
  width:360px;
  height:360px;
}

/* Dog image */
.dog-photo {
  width:100%;
  height:100%;
  object-fit:contain;
  object-position:center;
  display:block;
  position: relative;
  z-index: 1;



  filter: drop-shadow(0 10px 20px rgba(0,0,0,.15));
}

/* ── CLOTHING LAYERS ── */
.clothing-layer {
  position:absolute;
  pointer-events:none;
  opacity:0;
  transition:opacity .25s ease;
  z-index: 1;

}

.clothing-layer.visible {
  opacity:0.9; /* softer blend */
}

/* ── SLOT POSITIONS (adjust for better fit) ── */
#layer-body {
  top:43%;
  left:29%;
  width:48%;
  height:32%;
}

#layer-neck {
  top:43%;
  left:36%;
  width:21.9%;
  height:17%;
}

#layer-full {
  top:43%;
  left:36%;
  width:52%;
  height:40%;
}

/* ── CLOTHING IMAGE ── */
.cloth-img {
  width:100%;
  height:100%;
  object-fit:contain;

  /* CLEAN 2D FIT  */
  transform: scale(0.73)    translateY(-6px);
transform-origin: center;

  filter: drop-shadow(0 3px 6px rgba(0,0,0,.2));
}

/* Slot-specific tweaks */
#layer-neck .cloth-img {
  transform: scale(1) translateY(0px);
}

#layer-full .cloth-img {
  transform: scale(0.88)  translateX(6px)  translateY(10px);
}

/* ── EQUIP ANIMATION ── */
.clothing-layer.visible .cloth-img {
  animation: equip 0.2s ease;
}

@keyframes equip {
  0% {
    transform: scale(0.8) translateY(12px);
    opacity: 0;
  }
  100% {
    transform: scale(0.92) translateY(6px);
    opacity: 1;
  }

}

/* ── SELECTED PANEL ── */
.selected-panel { background:var(--white); border-left:1px solid var(--rule); display:flex; flex-direction:column; position:sticky; top:var(--nav-h); height:calc(100vh - var(--nav-h)); overflow-y:auto; scrollbar-width:none; }
.selected-panel::-webkit-scrollbar { display:none; }
.selected-head { padding:1.4rem 1.4rem 1rem; border-bottom:1px solid var(--rule); flex-shrink:0; }
.selected-label { font-size:.58rem; letter-spacing:3px; text-transform:uppercase; color:var(--gold); font-weight:500; }
.selected-sub   { font-size:.75rem; color:var(--ink-soft); margin-top:.2rem; }
.selected-empty { padding:2rem 1.4rem; text-align:center; }
.selected-empty-icon { font-size:2rem; opacity:.2; margin-bottom:.5rem; }
.selected-empty-text { font-size:.78rem; color:var(--ink-soft); line-height:1.6; }
.selected-items { padding:1rem 1.2rem; display:flex; flex-direction:column; gap:.8rem; flex:1; }
.selected-item  { background:var(--paper); border:1px solid var(--rule); border-radius:12px; overflow:hidden; }
.selected-item-top { display:flex; gap:.75rem; padding:.75rem; align-items:center; }
.selected-item-img { width:52px; height:52px; object-fit:contain; border-radius:8px; flex-shrink:0; background:var(--white); padding:3px; }
.selected-item-info { flex:1; min-width:0; }
.selected-item-cat   { font-size:.58rem; letter-spacing:2px; text-transform:uppercase; color:var(--gold); font-weight:500; }
.selected-item-name  { font-size:.78rem; color:var(--ink); line-height:1.3; margin-top:.15rem; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
.selected-item-price { font-size:.8rem; color:var(--ink); font-weight:500; margin-top:.2rem; }
.selected-item-actions { display:flex; gap:.5rem; padding:0 .75rem .75rem; }
.btn-add-cart { flex:1; background:var(--ink); color:var(--white); padding:.5rem .75rem; border-radius:8px; font-size:.7rem; font-weight:500; text-decoration:none; transition:background .2s; display:flex; align-items:center; justify-content:center; gap:.3rem; }
.btn-add-cart:hover { background:var(--gold); color:var(--ink); }
.btn-remove { width:32px; height:32px; border-radius:8px; background:var(--paper-deep); border:1px solid var(--rule); display:flex; align-items:center; justify-content:center; cursor:pointer; font-size:.8rem; color:var(--ink-soft); transition:border-color .2s, color .2s; }
.btn-remove:hover { border-color:#c0392b; color:#c0392b; }
.selected-footer { padding:1rem 1.2rem; border-top:1px solid var(--rule); margin-top:auto; }
.selected-total  { display:flex; justify-content:space-between; align-items:center; margin-bottom:.75rem; }
.selected-total-label { font-size:.75rem; color:var(--ink-soft); }
.selected-total-val   { font-family:'DM Serif Display',serif; font-size:1.2rem; color:var(--ink); }
.btn-view-cart { display:block; width:100%; background:var(--gold); color:var(--ink); padding:.7rem; border-radius:10px; text-align:center; font-size:.78rem; font-weight:500; text-decoration:none; transition:background .2s; }
.btn-view-cart:hover { background:var(--gold-warm); }

@media(max-width:1100px) { .page-wrap { grid-template-columns:240px 1fr 260px; } }
@media(max-width:860px) { .page-wrap { grid-template-columns:1fr; } .wardrobe,.selected-panel { position:relative; height:auto; } .dog-stage { width:280px; height:280px; } }
</style>
</head>
<body>

<!-- NAV -->
<nav class="nav-bar">
  <div class="nav-content">

    <a href="{{ route('home') }}" class="logo">
      Mojo<span style="color: var(--gold); font-style: italic;">Lux</span>
    </a>

    <div class="nav-links">
      <a href="{{ route('home') }}">Home</a>
      <a href="{{ route('store.index') }}">Collections</a>
      <a href="{{ route('dressup') }}">Style Lab</a>
      <a href="{{ route('wagclub.index') }}">Wag Club</a>
      <a href="{{ route('cart.index') }}">Cart</a>
    </div>

  </div>
</nav>

<div class="page-wrap">

  {{--
  ════════════════════════════════════════════════════════
  LEFT — WARDROBE
  ════════════════════════════════════════════════════════
  --}}

  <aside class="wardrobe">
    <div class="wardrobe-head">
      <div class="wardrobe-label">Wardrobe</div>
      <div class="wardrobe-sub">Click to dress {{ $pet->name ?? 'your pup' }}</div>
    </div>

    {{-- ── T-SHIRTS ── --}}
    @if(isset($products['t-shirts']) && $products['t-shirts']->count())
    <div class="cat-section">
      <div class="cat-label">T-Shirts</div>
      <div class="cat-items">

        {{-- Blue T-Shirt — hardcoded image, linked to DB product id 1 --}}
        @php $p = $products['t-shirts']->firstWhere('id', 13) ?? $products['t-shirts']->first(); @endphp
        @if($p)
        <button class="item-btn" onclick="toggleItem(this)"
          data-id="{{ $p->id }}"
          data-name="{{ $p->title }}"
          data-price="{{ $p->getPrice() }}"
          data-category="t-shirts"
          data-slot="body"
          data-cart="{{ route('cart.addfromstorepage', ['id' => $p->id]) }}"
          data-overlay-img="{{ asset('template_default/images/pinktshirt2.png') }}"
        >
          <img class="item-thumb"
               src="{{ asset('template_default/images/pinktshirt2.png') }}"
               alt="{{ $p->title }}">
          <div class="item-name">{{ $p->title }}</div>
          <div class="item-price">${{ $p->getPrice() }}</div>
        </button>
        @endif

        {{-- Pink T-Shirt — linked to DB product id 2 --}}
        @php $p2 = $products['t-shirts']->firstWhere('id', 12) ?? $products['t-shirts']->skip(1)->first(); @endphp
        @if($p2)
        <button class="item-btn" onclick="toggleItem(this)"
          data-id="{{ $p2->id }}"
          data-name="{{ $p2->title }}"
          data-price="{{ $p2->getPrice() }}"
          data-category="t-shirts"
          data-slot="body"
          data-cart="{{ route('cart.addfromstorepage', ['id' => $p2->id]) }}"
          data-overlay-img="{{ asset('template_default/images/dressupgrey2.png') }}"
        >
          <img class="item-thumb"
               src="{{ asset('template_default/images/dressupgrey2.png') }}"
               alt="{{ $p2->title }}">
          <div class="item-name">{{ $p2->title }}</div>
          <div class="item-price">${{ $p2->getPrice() }}</div>
        </button>
        @endif

        {{-- ADD MORE T-SHIRTS HERE — copy a button block above --}}

      </div>
    </div>
    @endif

    {{-- ── HOODIES ── --}}
    @if(isset($products['hoodies']) && $products['hoodies']->count())
    <div class="cat-section">
      <div class="cat-label">Hoodies</div>
      <div class="cat-items">

        @php $h = $products['hoodies']->first(); @endphp
        @if($h)
        <button class="item-btn" onclick="toggleItem(this)"
          data-id="{{ $h->id }}"
          data-name="{{ $h->title }}"
          data-price="{{ $h->getPrice() }}"
          data-category="hoodies"
          data-slot="body"
          data-cart="{{ route('cart.addfromstorepage', ['id' => $h->id]) }}"
          data-overlay-img="{{ asset('template_default/images/greydressup.png') }}"
        >
          <img class="item-thumb"
               src="{{ asset('template_default/images/greydressup.png') }}"
               alt="{{ $h->title }}">
          <div class="item-name">{{ $h->title }}</div>
          <div class="item-price">${{ $h->getPrice() }}</div>
        </button>
        @endif

      </div>
    </div>
    @endif

    {{-- ── DRESSES ── --}}
    @if(isset($products['dresses']) && $products['dresses']->count())
    <div class="cat-section">
      <div class="cat-label">Dresses</div>
      <div class="cat-items">

        @php $dr = $products['dresses']->first(); @endphp
        @if($dr)
        <button class="item-btn" onclick="toggleItem(this)"
          data-id="{{ $dr->id }}"
          data-name="{{ $dr->title }}"
          data-price="{{ $dr->getPrice() }}"
          data-category="dresses"
          data-slot="body"
          data-cart="{{ route('cart.addfromstorepage', ['id' => $dr->id]) }}"
          data-overlay-img="{{ asset('template_default/images/dressup-floraldress2.png') }}"
        >
          <img class="item-thumb"
               src="{{ asset('template_default/images/floraldresspw.png') }}"
               alt="{{ $dr->title }}">
          <div class="item-name">{{ $dr->title }}</div>
          <div class="item-price">${{ $dr->getPrice() }}</div>
        </button>
        @endif

      </div>
    </div>
    @endif

    {{-- ── BANDANAS ── --}}
    @if(isset($products['bandanas']) && $products['bandanas']->count())
    <div class="cat-section">
      <div class="cat-label">Bandanas</div>
      <div class="cat-items">

        @php $bn = $products['bandanas']->first(); @endphp
        @if($bn)
        <button class="item-btn" onclick="toggleItem(this)"
          data-id="{{ $bn->id }}"
          data-name="{{ $bn->title }}"
          data-price="{{ $bn->getPrice() }}"
          data-category="bandanas"
          data-slot="neck"
          data-cart="{{ route('cart.addfromstorepage', ['id' => $bn->id]) }}"
          data-overlay-img="{{ asset('template_default/images/dressup-bdna.png') }}"
        >
          <img class="item-thumb"
               src="{{ asset('template_default/images/dressup-bdna.png') }}"
               alt="{{ $bn->title }}">
          <div class="item-name">{{ $bn->title }}</div>
          <div class="item-price">${{ $bn->getPrice() }}</div>
        </button>
        @endif

      </div>
    </div>
    @endif

    {{-- ── RAINCOATS ── --}}
    @if(isset($products['raincoats']) && $products['raincoats']->count())
    <div class="cat-section">
      <div class="cat-label">Raincoats</div>
      <div class="cat-items">

        @php $rc = $products['raincoats']->first(); @endphp
        @if($rc)
        <button class="item-btn" onclick="toggleItem(this)"
          data-id="{{ $rc->id }}"
          data-name="{{ $rc->title }}"
          data-price="{{ $rc->getPrice() }}"
          data-category="raincoats"
          data-slot="full"
          data-cart="{{ route('cart.addfromstorepage', ['id' => $rc->id]) }}"
          data-overlay-img="{{ asset('template_default/images/raincoatdressup.png') }}"
        >
          <img class="item-thumb"
               src="{{ asset('template_default/images/raincoatdressup.png') }}"
               alt="{{ $rc->title }}">
          <div class="item-name">{{ $rc->title }}</div>
          <div class="item-price">${{ $rc->getPrice() }}</div>
        </button>
        @endif

      </div>
    </div>
    @endif

  </aside>

  {{--
  ════════════════════════════════════════════════════════
  CENTRE — DOG CANVAS
  ════════════════════════════════════════════════════════
  Dog image is hardcoded per breed.
  Place your PNGs at: public/template_default/images/dogs/

  Clothing sits on top via .clothing-layer divs.
  Tweak the top/left/width/height values in the CSS above
  (#layer-body, #layer-neck, #layer-full) using DevTools
  until the clothes line up with YOUR photo.
  ════════════════════════════════════════════════════════
  --}}

  <main class="canvas-area">
    <div class="canvas-top">
      <div class="canvas-pet-name">{{ $pet->name ?? 'Your Pup' }}</div>
      <div class="canvas-pet-breed">{{ ucfirst($pet->breed ?? 'Mixed breed') }}</div>
    </div>

    <div class="dog-stage" id="dog-stage">

      {{-- Hardcoded dog photo per breed --}}
      @if($dog_svg === 'poodle')
        <img class="dog-photo" src="{{ asset('template_default/images/dressup-poodle.PNG') }}" alt="Poodle">
      @elseif($dog_svg === 'chihuahua')
        <img class="dog-photo" src="{{ asset('template_default/images/chihuahua.png') }}" alt="Chihuahua">
      @elseif($dog_svg === 'bulldog')
        <img class="dog-photo" src="{{ asset('template_default/images/bulldog.png') }}" alt="Bulldog">
      @elseif($dog_svg === 'husky')
        <img class="dog-photo" src="{{ asset('template_default/images/husky.png') }}" alt="Husky">
      @elseif($dog_svg === 'dachshund')
        <img class="dog-photo" src="{{ asset('template_default/images/dachshund.png') }}" alt="Dachshund">
      @else
        <img class="dog-photo" src="{{ asset('template_default/images/golden.png') }}" alt="Golden Retriever">
      @endif

      {{-- Clothing overlay layers — JS swaps the src when user clicks --}}
      <div class="clothing-layer" id="layer-body">
        <img class="cloth-img" src="" alt="" id="cloth-body">
      </div>
      <div class="clothing-layer" id="layer-neck">
        <img class="cloth-img" src="" alt="" id="cloth-neck">
      </div>
      <div class="clothing-layer" id="layer-full">
        <img class="cloth-img" src="" alt="" id="cloth-full">
      </div>

    </div>

    <p class="canvas-hint">Click items from the wardrobe to dress {{ $pet->name ?? 'your pup' }}</p>
  </main>

  {{-- ── RIGHT: SELECTED ITEMS ── --}}
  <aside class="selected-panel">
    <div class="selected-head">
      <div class="selected-label">Selected Looks</div>
      <div class="selected-sub">Add to cart to buy</div>
    </div>

    <div id="selected-empty" class="selected-empty">
      <div class="selected-empty-icon">🛍</div>
      <p class="selected-empty-text">No items selected yet.<br>Click clothing from the wardrobe to style {{ $pet->name ?? 'your pup' }}.</p>
    </div>

    <div id="selected-items" class="selected-items" style="display:none;"></div>

    <div id="selected-footer" class="selected-footer" style="display:none;">
      <div class="selected-total">
        <span class="selected-total-label">Total</span>
        <span class="selected-total-val" id="selected-total">$0.00</span>
      </div>
      <a href="{{ route('cart.index') }}" class="btn-view-cart">View Cart</a>
    </div>
  </aside>

</div>

<script>
const selected = {};

function toggleItem(btn) {
  const d    = btn.dataset;
  const slot = d.slot;

  if (btn.classList.contains('active')) {
    btn.classList.remove('active');
    clearLayer(slot);
    delete selected[slot];
  } else {
    // deselect previous in same slot
    const prev = document.querySelector('.item-btn.active[data-slot="' + slot + '"]');
    if (prev) { prev.classList.remove('active'); delete selected[slot]; }

    btn.classList.add('active');
    selected[slot] = {
      id:       d.id,
      name:     d.name,
      price:    parseFloat(d.price),
      category: d.category,
      cart:     d.cart,
      img:      d.overlayImg,
      thumb:    btn.querySelector('.item-thumb').src,
    };
    showLayer(slot, d.overlayImg, d.name);
  }
  renderPanel();
}

function showLayer(slot, src, alt) {
  const img   = document.getElementById('cloth-' + slot);
  const layer = document.getElementById('layer-' + slot);
  img.src = src; img.alt = alt;
  layer.classList.add('visible');
}

function clearLayer(slot) {
  const layer = document.getElementById('layer-' + slot);
  layer.classList.remove('visible');
  setTimeout(function() {
    if (!layer.classList.contains('visible'))
      document.getElementById('cloth-' + slot).src = '';
  }, 300);
}

function renderPanel() {
  const items   = Object.values(selected);
  const empty   = document.getElementById('selected-empty');
  const list    = document.getElementById('selected-items');
  const footer  = document.getElementById('selected-footer');
  const totalEl = document.getElementById('selected-total');

  if (!items.length) {
    empty.style.display  = 'block';
    list.style.display   = 'none';
    footer.style.display = 'none';
    return;
  }
  empty.style.display  = 'none';
  list.style.display   = 'flex';
  footer.style.display = 'block';

  list.innerHTML = items.map(function(item) { return (
    '<div class="selected-item">' +
      '<div class="selected-item-top">' +
        '<img class="selected-item-img" src="' + item.thumb + '" alt="' + item.name + '">' +
        '<div class="selected-item-info">' +
          '<div class="selected-item-cat">'   + item.category + '</div>' +
          '<div class="selected-item-name">'  + item.name     + '</div>' +
          '<div class="selected-item-price">$' + item.price.toFixed(2) + '</div>' +
        '</div>' +
      '</div>' +
      '<div class="selected-item-actions">' +
        '<a href="' + item.cart + '" class="btn-add-cart"><i class="ion-ios-cart"></i> Add to Cart</a>' +
        '<button class="btn-remove" onclick="removeItem(\'' + item.id + '\')"><i class="ion-ios-close"></i></button>' +
      '</div>' +
    '</div>'
  ); }).join('');

  totalEl.textContent = '$' + items.reduce(function(s,i){return s+i.price;},0).toFixed(2);
}

function removeItem(id) {
  for (var slot in selected) {
    if (selected[slot].id === id) {
      var btn = document.querySelector('.item-btn[data-id="' + id + '"]');
      if (btn) btn.classList.remove('active');
      clearLayer(slot);
      delete selected[slot];
      break;
    }
  }
  renderPanel();
}
</script>
</body>
</html>
