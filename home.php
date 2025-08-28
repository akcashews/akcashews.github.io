<?php
// AK Cashews Website - InfinityFree Compatible Version
header('Content-Type: text/html; charset=utf-8');

// Database configuration - auto-detects environment
if (isset($_SERVER['HTTP_HOST']) && (
    strpos($_SERVER['HTTP_HOST'], 'infinityfree') !== false || 
    strpos($_SERVER['HTTP_HOST'], '.rf.gd') !== false ||
    strpos($_SERVER['HTTP_HOST'], '.42web.io') !== false
)) {
    // InfinityFree hosting
    define('DB_HOST', 'sql200.infinityfree.com');
    define('DB_NAME', 'if0_39766861_ac_cashews');
    define('DB_USER', 'if0_39766861');
    define('DB_PASS', 'AmalaNini123');
} else {
    // Local development
    define('DB_HOST', '127.0.0.1');
    define('DB_NAME', 'cashews_spa');
    define('DB_USER', 'root');
    define('DB_PASS', '');
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AK Cashews | Premium Cashews in Cuddalore & Panruti | All India Delivery</title>
  <meta name="theme-color" content="#FF9526">
  <meta name="description" content="Buy premium cashews from AK Cashews in Cuddalore and Panruti. Fresh W180, W240, W320, roasted and split cashews. Fast delivery all over India.">
  <meta name="keywords" content="AK Cashews, cashew nuts Cuddalore, cashews Panruti, W240, W320, roasted cashews, buy cashews online India">
  
  <!-- CDN Resources -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  
  <!-- Embedded CSS -->
  <style>
    :root {
      --theme-color: #FF9526;
      --theme-dark: #E8851F;
      --theme-light: #FFF4E6;
    }
    .text-theme { color: var(--theme-color) !important; }
    .bg-theme { background-color: var(--theme-color) !important; }
    .btn-theme {
      background-color: var(--theme-color);
      border-color: var(--theme-color);
      color: white;
    }
    .btn-theme:hover {
      background-color: var(--theme-dark);
      border-color: var(--theme-dark);
      color: white;
    }
    .banner-item {
      position: relative;
      height: 70vh;
      min-height: 500px;
    }
    .banner-img {
      height: 100%;
      object-fit: cover;
      object-position: center;
    }
    .banner-overlay {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(0,0,0,0.4);
    }
    .banner-caption {
      position: absolute;
      bottom: 20%;
      left: 5%;
      right: 5%;
      z-index: 10;
    }
    .feature-card {
      background: var(--theme-light);
      border-radius: 15px;
      transition: transform 0.3s ease;
    }
    .feature-card:hover {
      transform: translateY(-5px);
    }
    [data-animate] {
      opacity: 0;
      transform: translateY(30px);
      transition: all 0.6s ease;
    }
    [data-animate].in-view {
      opacity: 1;
      transform: translateY(0);
    }
    .floating-whatsapp {
      position: fixed;
      bottom: 20px;
      right: 20px;
      background: #25D366;
      color: white;
      width: 60px;
      height: 60px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      text-decoration: none;
      box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
      z-index: 1000;
      transition: transform 0.3s ease;
    }
    .floating-whatsapp:hover {
      transform: scale(1.1);
      color: white;
    }
    .cashew-variety-img {
      object-fit: contain;
      width: fit-content;
      margin-left: 20px;
      height: 200px;
    }
    #cart-count {
      font-size: 0.7em !important;
      min-width: 1.5em;
      height: 1.5em;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .route {
      min-height: 50vh;
    }
    .d-none {
      display: none !important;
    }
    @media (max-width: 768px) {
      .banner-item {
        height: 50vh;
        min-height: 400px;
      }
      .banner-caption {
        bottom: 15%;
        left: 3%;
        right: 3%;
      }
      .banner-caption h1 {
        font-size: 2rem !important;
      }
      .banner-caption h2 {
        font-size: 1.5rem !important;
      }
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="#home">
      <img src="assets/img/akcashewslogo.png" alt="AK Cashews Logo" height="40" class="me-2">
      <span class="fw-bold text-theme">AK Cashews</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#products">Products</a></li>
        <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
        <li class="nav-item">
          <a class="nav-link position-relative" href="#cart">
            <i class="bi bi-cart3"></i> Cart
            <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">0</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Hero Section -->
<section id="home" class="route">
  <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active banner-item">
        <img src="assets/img/cashew1.jpg" class="d-block w-100 banner-img" alt="Fresh Cashews">
        <div class="banner-overlay"></div>
        <div class="carousel-caption banner-caption text-start">
          <h1 class="display-5 fw-bold">Fresh. Premium. Handpicked.</h1>
          <p class="lead">Bring home purity & prosperity with AK Cashews.</p>
          <a href="#products" class="btn btn-theme btn-lg rounded-pill">Shop Now</a>
        </div>
      </div>
      <div class="carousel-item banner-item">
        <img src="assets/img/cashew2.jpg" class="d-block w-100 banner-img" alt="Roasted Cashews">
        <div class="banner-overlay"></div>
        <div class="carousel-caption banner-caption">
          <h2 class="fw-bold">Perfectly Roasted. Irresistibly Crunchy.</h2>
          <p>Great taste, premium quality — every single bite.</p>
          <a href="#products" class="btn btn-outline-light btn-lg rounded-pill">Explore Products</a>
        </div>
      </div>
      <div class="carousel-item banner-item">
        <img src="assets/img/cashew3.avif" class="d-block w-100 banner-img" alt="W320 Cashews">
        <div class="banner-overlay"></div>
        <div class="carousel-caption banner-caption">
          <h2 class="fw-bold">Every Grade. Same Commitment.</h2>
          <p>Carefully sourced, hygienically processed, beautifully packed.</p>
          <a href="#contact" class="btn btn-light btn-lg rounded-pill">Contact Us</a>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>

  <!-- Features -->
  <div class="container py-5">
    <div class="row g-4 text-center">
      <div class="col-md-3" data-animate>
        <div class="feature-card p-4 h-100">
          <i class="bi bi-award-fill fs-1 text-theme mb-3"></i>
          <h5>Premium Quality</h5>
          <p class="small text-muted">Handpicked cashews from the finest sources</p>
        </div>
      </div>
      <div class="col-md-3" data-animate>
        <div class="feature-card p-4 h-100">
          <i class="bi bi-shield-check fs-1 text-theme mb-3"></i>
          <h5>Hygienic Processing</h5>
          <p class="small text-muted">Processed in clean, controlled environments</p>
        </div>
      </div>
      <div class="col-md-3" data-animate>
        <div class="feature-card p-4 h-100">
          <i class="bi bi-truck fs-1 text-theme mb-3"></i>
          <h5>Fast Delivery</h5>
          <p class="small text-muted">Quick delivery across India</p>
        </div>
      </div>
      <div class="col-md-3" data-animate>
        <div class="feature-card p-4 h-100">
          <i class="bi bi-heart-fill fs-1 text-theme mb-3"></i>
          <h5>Customer Love</h5>
          <p class="small text-muted">Trusted by thousands of happy customers</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- About -->
<section id="about" class="py-5 route d-none">
  <div class="container" data-animate>
    <div class="row g-4 align-items-center">
      <div class="col-lg-6">
        <h2 class="mb-3">About AK Cashews</h2>
        <p class="lead">Your trusted partner for premium cashews in Cuddalore and Panruti.</p>
        <p>At AK Cashews, we believe in delivering nothing but the finest quality cashews to your doorstep. Our journey began with a simple mission: to bring you the freshest, most delicious cashews sourced directly from the best farms.</p>
        <p>Every cashew that reaches you has been carefully handpicked, processed under hygienic conditions, and packed with love. We take pride in our commitment to quality and customer satisfaction.</p>
        <div class="row g-3 mt-3">
          <div class="col-6">
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill text-theme me-2"></i>
              <span class="small">Premium Quality</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill text-theme me-2"></i>
              <span class="small">Fresh & Hygienic</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill text-theme me-2"></i>
              <span class="small">All India Delivery</span>
            </div>
          </div>
          <div class="col-6">
            <div class="d-flex align-items-center">
              <i class="bi bi-check-circle-fill text-theme me-2"></i>
              <span class="small">Customer Satisfaction</span>
            </div>
          </div>
        </div>
        <div class="mt-4">
          <a href="#products" class="btn btn-theme rounded-pill me-2">Browse Products</a>
          <a href="#contact" class="btn btn-outline-dark rounded-pill">Get a Quote</a>
        </div>
      </div>
      <div class="col-lg-6">
        <img src="assets/img/about-cashews.jpg" alt="About AK Cashews" class="img-fluid rounded shadow">
      </div>
    </div>
  </div>
</section>

<!-- Products -->
<section id="products" class="py-5 route d-none">
  <div class="container" data-animate>
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="mb-0">Our Products</h2>
      <div class="input-group w-auto">
        <input id="search" type="text" class="form-control" placeholder="Search products...">
        <button id="clear-search" class="btn btn-outline-secondary">Clear</button>
      </div>
    </div>
    <div id="product-grid" class="row g-4">
      <!-- Products will be loaded here -->
      <div class="col-md-3 col-sm-6">
        <div class="card h-100">
          <img src="assets/img/variety/W180.png" class="card-img-top cashew-variety-img" alt="WW180">
          <div class="card-body">
            <h6 class="card-title">WW180</h6>
            <p class="small text-muted">Premium grade cashews</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="card h-100">
          <img src="assets/img/variety/W240.png" class="card-img-top cashew-variety-img" alt="WW240">
          <div class="card-body">
            <h6 class="card-title">WW240</h6>
            <p class="small text-muted">Premium grade cashews</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="card h-100">
          <img src="assets/img/variety/w320.png" class="card-img-top cashew-variety-img" alt="WW320">
          <div class="card-body">
            <h6 class="card-title">WW320</h6>
            <p class="small text-muted">Premium grade cashews</p>
          </div>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="card h-100">
          <img src="assets/img/variety/ws.png" class="card-img-top cashew-variety-img" alt="WS">
          <div class="card-body">
            <h6 class="card-title">WS</h6>
            <p class="small text-muted">White splits cashews</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Cart -->
<section id="cart" class="py-5 route d-none">
  <div class="container" data-animate>
    <h2>Your Cart</h2>
    <div id="cart-list" class="list-group mb-3">
      <div class="text-muted">Your cart is empty.</div>
    </div>
    <div class="d-flex justify-content-between">
      <strong>Total: ₹<span id="cart-total">0.00</span></strong>
      <a href="#contact" class="btn btn-theme">Contact for Order</a>
    </div>
  </div>
</section>

<!-- FAQ -->
<section id="faq" class="py-5 route d-none">
  <div class="container" data-animate>
    <h2 class="mb-4">Frequently Asked Questions</h2>
    <div class="accordion" id="faqAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
            What grades of cashews do you offer?
          </button>
        </h2>
        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            We offer premium grades including W180, W240, W320, WS (White Splits), and LWP (Large White Pieces). Each grade is carefully selected for quality and taste.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
            Do you deliver all over India?
          </button>
        </h2>
        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Yes! We provide fast and secure delivery across all states in India. Delivery time varies from 2-7 days depending on your location.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
            How do you ensure freshness?
          </button>
        </h2>
        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            Our cashews are processed in hygienic conditions and packed immediately to lock in freshness. We use vacuum-sealed packaging to maintain quality during transit.
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
            What are your payment options?
          </button>
        </h2>
        <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            We accept various payment methods including UPI, bank transfers, and cash on delivery (COD) for select locations. Contact us for specific payment arrangements.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Contact -->
<section id="contact" class="py-5 route d-none">
  <div class="container">
    <h2 class="mb-4" data-animate>Contact Us</h2>
    <div class="row g-4" data-animate>
      <div class="col-md-6">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title mb-4">Get in Touch</h5>
            <div class="d-flex mb-3 align-items-start">
              <i class="bi bi-telephone-fill me-3 fs-5 text-theme"></i>
              <div>
                <h6 class="mb-1">Phone</h6>
                <p class="mb-0"><a href="tel:+917418277696" class="text-decoration-none">+91 74182 77696</a></p>
                <p class="mb-0"><a href="tel:+91968833868" class="text-decoration-none">+91 96883 33868</a></p>
              </div>
            </div>
            <div class="d-flex mb-3 align-items-start">
              <i class="bi bi-whatsapp me-3 fs-5 text-theme"></i>
              <div>
                <h6 class="mb-1">WhatsApp</h6>
                <p class="mb-0"><a href="https://wa.me/7418277696" target="_blank" class="text-decoration-none">+91 74182 77696</a></p>
                <p class="mb-0"><a href="https://wa.me/968833868" target="_blank" class="text-decoration-none">+91 96883 33868</a></p>
              </div>
            </div>
            <div class="d-flex mb-3 align-items-start">
              <i class="bi bi-envelope-fill me-3 fs-5 text-theme"></i>
              <div>
                <h6 class="mb-1">Email</h6>
                <p class="mb-0"><a href="mailto:akcashews.nut@gmail.com" class="text-decoration-none">akcashews.nut@gmail.com</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title mb-4">Our Location</h5>
            <div class="d-flex mb-3 align-items-start">
              <i class="bi bi-geo-alt-fill me-3 fs-5 text-theme"></i>
              <div>
                <h6 class="mb-1">Address</h6>
                <p class="mb-0">
                  AK Cashews<br>
                  No. 29<br>
                  Manjakuppam, Cuddalore 607001<br>
                  India
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="py-4 bg-theme text-white mt-auto">
  <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-center gap-2">
    <div class="small">© <?php echo date('Y'); ?> AK Cashews. All rights reserved.</div>
    <div class="small">Fresh • Premium • Handpicked</div>
  </div>
</footer>

<!-- Floating WhatsApp Button -->
<a class="floating-whatsapp" href="https://wa.me/918838965378" target="_blank" aria-label="Chat on WhatsApp">
  <i class="bi bi-whatsapp"></i>
</a>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Simple SPA functionality
$(document).ready(function() {
  // Navigation
  function showRoute(hash) {
    $('.route').addClass('d-none');
    const route = (hash || '#home').split('?')[0];
    $(route).removeClass('d-none');
    $('.navbar .nav-link').removeClass('active');
    $(`.navbar .nav-link[href="${route}"]`).addClass('active');
  }
  
  // Handle navigation clicks
  $('.nav-link').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href');
    showRoute(href);
    window.location.hash = href;
  });
  
  // Handle browser back/forward
  window.addEventListener('hashchange', () => showRoute(location.hash));
  
  // Initialize
  showRoute(location.hash || '#home');
  
  // Carousel
  const carousel = new bootstrap.Carousel('#heroCarousel', {
    interval: 4500,
    ride: 'carousel'
  });
  
  // Animation observer
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('in-view');
      }
    });
  }, { threshold: 0.15 });
  
  document.querySelectorAll('[data-animate]').forEach(el => {
    observer.observe(el);
  });
  
  // Search functionality
  $('#search').on('input', function() {
    const query = $(this).val().toLowerCase();
    $('#product-grid .col-md-3').each(function() {
      const title = $(this).find('.card-title').text().toLowerCase();
      if (title.includes(query)) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });
  
  $('#clear-search').on('click', function() {
    $('#search').val('');
    $('#product-grid .col-md-3').show();
  });
});
</script>

</body>
</html>