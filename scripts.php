<?php
header('Content-Type: application/javascript');
?>
// AK Cashews SPA JavaScript
(function(){
  const API = {
    products: 'api/products.php',
    orders: 'api/orders.php',
    auth: 'api/auth.php'
  };

  // Simple router
  function showRoute(hash) {
    $('.route').addClass('d-none');
    const route = (hash || '#home').split('?')[0];
    $(route).removeClass('d-none');
    // active nav
    $('.navbar .nav-link').removeClass('active');
    $(`.navbar .nav-link[href="${route}"]`).addClass('active');
    if (route === '#products') loadProducts();
    if (route === '#cart') renderCart();
    if (route === '#checkout') renderCheckoutTotal();
    if (route === '#admin') initAdmin();
  }
  window.addEventListener('hashchange', () => showRoute(location.hash));
  $(document).ready(() => {
    showRoute(location.hash || '#home');

    // Auto-play hero carousel
    const el = document.querySelector('#heroCarousel');
    if (el && window.bootstrap) {
      const carousel = new bootstrap.Carousel(el, { interval: 4500, ride: 'carousel', pause: false, touch: true });
    }

    // Observe elements for fade-up animation
    const io = new IntersectionObserver((entries)=>{
      entries.forEach(e=>{ if (e.isIntersecting) e.target.classList.add('in-view'); });
    }, {threshold: 0.15});
    document.querySelectorAll('[data-animate]').forEach(el=> io.observe(el));
  });

  // Products
  async function loadProducts(){
    try {
      const res = await $.getJSON(API.products);
      const q = $('#search').val()?.toLowerCase() || '';
      const rows = (res || []).filter(p => p.name.toLowerCase().includes(q) || (p.description||'').toLowerCase().includes(q));
      const $grid = $('#product-grid').empty();
      if (!rows.length) {
        $grid.append('<div class="text-muted">No products found.</div>');
        return;
      }
      rows.forEach(p => {
        const card = $(`
          <div class="col-sm-6 col-md-4 col-lg-3" data-animate>
            <div class="card h-100 shadow-sm">
              <img class="card-img-top" src="${p.image_url || 'assets/img/placeholder.jpg'}" alt="${p.name}">
              <div class="card-body d-flex flex-column">
                <h6 class="card-title">${p.name}</h6>
                <p class="small text-muted flex-grow-1">${p.description || ''}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <strong>₹${(+p.price).toFixed(2)}</strong>
                  <button class="btn btn-theme btn-sm rounded-pill add-to-cart" data-id="${p.id}" data-name="${p.name}" data-price="${p.price}" data-img="${p.image_url || ''}">Add to Cart</button>
                </div>
              </div>
            </div>
          </div>`);
        $grid.append(card);
      });
    } catch (error) {
      console.error('Error loading products:', error);
      $('#product-grid').html('<div class="text-muted">Error loading products. Please try again.</div>');
    }
  }
  $('#search').on('input', loadProducts);
  $('#clear-search').on('click', () => { $('#search').val(''); loadProducts(); });

  // Cart using localStorage
  const CART_KEY = 'ak_cart';
  function getCart(){ return JSON.parse(localStorage.getItem(CART_KEY) || '[]'); }
  function saveCart(items){ localStorage.setItem(CART_KEY, JSON.stringify(items)); updateCartCount(); }
  function updateCartCount(){ $('#cart-count').text(getCart().reduce((s,i)=>s + i.quantity, 0)); }
  updateCartCount();

  $(document).on('click', '.add-to-cart', function(){
    const id = +$(this).data('id');
    const name = $(this).data('name');
    const price = +$(this).data('price');
    const img = $(this).data('img');
    const cart = getCart();
    const found = cart.find(i => i.product_id === id);
    if (found) found.quantity += 1; else cart.push({product_id:id, name, price, quantity:1, image_url:img});
    saveCart(cart);
    const btn = $(this);
    btn.prop('disabled', true).text('Added ✓');
    setTimeout(()=>{ btn.prop('disabled', false).text('Add to Cart'); }, 800);
  });

  function renderCart(){
    const cart = getCart();
    const $list = $('#cart-list').empty();
    if (!cart.length) { $list.html('<div class="text-muted">Your cart is empty.</div>'); $('#cart-total').text('0.00'); return; }
    let total = 0;
    cart.forEach((i, idx) => {
      total += i.price * i.quantity;
      const row = $(`
        <div class="list-group-item d-flex align-items-center gap-3" data-animate>
          <img src="${i.image_url || 'assets/img/placeholder.jpg'}" alt="${i.name}" class="rounded">
          <div class="me-auto">
            <div class="fw-semibold">${i.name}</div>
            <div class="small text-muted">₹${i.price.toFixed(2)}</div>
          </div>
          <div class="input-group input-group-sm" style="width: 120px;">
            <button class="btn btn-outline-secondary btn-dec" data-idx="${idx}">-</button>
            <input class="form-control text-center qty" data-idx="${idx}" value="${i.quantity}" />
            <button class="btn btn-outline-secondary btn-inc" data-idx="${idx}">+</button>
          </div>
          <button class="btn btn-link text-danger btn-remove" data-idx="${idx}">Remove</button>
        </div>`);
      $list.append(row);
    });
    $('#cart-total').text(total.toFixed(2));
  }

  $(document).on('click', '.btn-inc', function(){ const cart = getCart(); const i = +$(this).data('idx'); cart[i].quantity++; saveCart(cart); renderCart(); });
  $(document).on('click', '.btn-dec', function(){ const cart = getCart(); const i = +$(this).data('idx'); cart[i].quantity = Math.max(1, cart[i].quantity-1); saveCart(cart); renderCart(); });
  $(document).on('click', '.btn-remove', function(){ const cart = getCart(); const i = +$(this).data('idx'); cart.splice(i,1); saveCart(cart); renderCart(); });
  $(document).on('input', '.qty', function(){ const cart = getCart(); const i = +$(this).data('idx'); cart[i].quantity = Math.max(1, parseInt($(this).val()) || 1); saveCart(cart); renderCart(); });

  function renderCheckoutTotal(){
    const cart = getCart();
    const total = cart.reduce((s,i)=> s + i.price * i.quantity, 0);
    $('#checkout-total').text(total.toFixed(2));
  }

  // Checkout submit
  $('#checkout-form').on('submit', async function(e){
    e.preventDefault();
    const cart = getCart();
    if (!cart.length) { alert('Your cart is empty.'); return; }
    const payload = Object.fromEntries(new FormData(this).entries());
    const total = cart.reduce((s,i)=> s + i.price * i.quantity, 0);
    payload.items = cart.map(i => ({product_id:i.product_id, quantity:i.quantity, price:i.price}));
    payload.total = +total.toFixed(2);

    try {
      const res = await fetch(API.orders, {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(payload)
      });
      const data = await res.json();
      if (!res.ok) throw new Error(data.error || 'Order failed');
      localStorage.removeItem(CART_KEY); updateCartCount(); renderCheckoutTotal();
      $('#checkout-alert').removeClass('d-none alert-danger').addClass('alert-success').text('Order placed successfully! Order ID: ' + data.order_id);
    } catch (err) {
      $('#checkout-alert').removeClass('d-none alert-success').addClass('alert-danger').text(err.message);
    }
  });

  // Admin
  async function initAdmin(){
    try {
      const me = await $.getJSON(API.auth + '?action=me');
      if (me && me.user && me.user.role === 'admin') {
        $('#admin-auth').addClass('d-none');
        $('#admin-area').removeClass('d-none');
        loadAdminTables();
      } else {
        $('#admin-auth').removeClass('d-none');
        $('#admin-area').addClass('d-none');
      }
    } catch (error) {
      console.error('Admin init error:', error);
      $('#admin-auth').removeClass('d-none');
      $('#admin-area').addClass('d-none');
    }
  }

  $('#admin-login').on('click', async function(){
    const email = $('#admin-email').val();
    const password = $('#admin-password').val();
    try {
      const res = await fetch(API.auth + '?action=login', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({email, password})
      });
      const data = await res.json();
      if (!res.ok) throw new Error(data.error || 'Login failed');
      $('#admin-login-msg').text('Login successful.');
      initAdmin();
    } catch (e) {
      $('#admin-login-msg').text(e.message);
    }
  });

  $('#btn-logout').on('click', async function(){
    await fetch(API.auth + '?action=logout', { method: 'POST' });
    initAdmin();
  });

  $('#btn-refresh').on('click', loadAdminTables);

  async function loadAdminTables(){
    try {
      // products
      const products = await $.getJSON(API.products);
      const table = [`<table class="table table-sm table-striped align-middle">
        <thead><tr><th>ID</th><th>Name</th><th>Price</th><th>Active</th><th>Actions</th></tr></thead><tbody>`];
      products.forEach(p => {
        table.push(`<tr>
          <td>${p.id}</td>
          <td>${p.name}</td>
          <td>₹${(+p.price).toFixed(2)}</td>
          <td>${p.is_active ? 'Yes' : 'No'}</td>
          <td>
            <button class="btn btn-outline-dark btn-sm act-edit" data-id="${p.id}">Edit</button>
            <button class="btn btn-outline-danger btn-sm act-del" data-id="${p.id}">Delete</button>
          </td>
        </tr>`);
      });
      table.push('</tbody></table>');
      $('#admin-products').html(table.join(''));

      // orders
      try {
        const orders = await $.getJSON(API.orders);
        const ot = [`<table class="table table-sm table-striped">
          <thead><tr><th>ID</th><th>Customer</th><th>Phone</th><th>Total</th><th>Status</th><th>Date</th></tr></thead><tbody>`];
        orders.forEach(o => {
          ot.push(`<tr><td>${o.id}</td><td>${o.customer_name}</td><td>${o.phone}</td><td>₹${(+o.total).toFixed(2)}</td><td>${o.status}</td><td>${o.created_at}</td></tr>`);
        });
        ot.push('</tbody></table>');
        $('#admin-orders').html(ot.join(''));
      } catch {
        $('#admin-orders').html('<div class="text-muted">Login to view orders.</div>');
      }
    } catch (error) {
      console.error('Error loading admin tables:', error);
    }
  }

  // product form handlers
  $('#save-product').on('click', async function(e){
    e.preventDefault();
    const id = $('#prod-id').val();
    const payload = {
      name: $('#prod-name').val(),
      price: parseFloat($('#prod-price').val() || '0'),
      image_url: $('#prod-image').val(),
      is_active: $('#prod-active').is(':checked') ? 1 : 0,
      description: $('#prod-desc').val()
    };
    const opts = {
      method: id ? 'PUT' : 'POST',
      headers: {'Content-Type': 'application/json'},
      body: JSON.stringify(payload)
    };
    const url = API.products + (id ? ('?id=' + encodeURIComponent(id)) : '');
    try {
      const res = await fetch(url, opts);
      const data = await res.json();
      if (!res.ok) { alert(data.error || 'Failed'); return; }
      $('#reset-product').click(); loadAdminTables();
    } catch (error) {
      alert('Error saving product: ' + error.message);
    }
  });

  $('#reset-product').on('click', function(){
    $('#prod-id').val(''); $('#prod-name').val(''); $('#prod-price').val('');
    $('#prod-image').val(''); $('#prod-active').prop('checked', true); $('#prod-desc').val('');
  });

  $(document).on('click', '.act-edit', async function(){
    const id = $(this).data('id');
    try {
      const p = await $.getJSON(API.products + '?id=' + id);
      $('#prod-id').val(p.id); $('#prod-name').val(p.name); $('#prod-price').val(p.price);
      $('#prod-image').val(p.image_url); $('#prod-active').prop('checked', !!(+p.is_active)); $('#prod-desc').val(p.description || '');
      window.scrollTo({top:0, behavior:'smooth'});
    } catch (error) {
      alert('Error loading product: ' + error.message);
    }
  });

  $(document).on('click', '.act-del', async function(){
    if (!confirm('Delete this product?')) return;
    const id = $(this).data('id');
    try {
      const res = await fetch(API.products + '?id=' + id, { method: 'DELETE' });
      const data = await res.json();
      if (!res.ok) { alert(data.error || 'Failed'); return; }
      loadAdminTables();
    } catch (error) {
      alert('Error deleting product: ' + error.message);
    }
  });

  // Make functions globally available
  window.showRoute = showRoute;
  window.loadProducts = loadProducts;
  window.renderCart = renderCart;
  window.renderCheckoutTotal = renderCheckoutTotal;
  window.initAdmin = initAdmin;
})();