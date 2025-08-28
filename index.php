<?php
// AK Cashews - Main Website
header('Content-Type: text/html; charset=utf-8');
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
  <meta name="robots" content="index, follow">
  <meta property="og:type" content="website">
  <meta property="og:site_name" content="AK Cashews">
  <meta property="og:locale" content="en_IN">
  <meta property="og:title" content="AK Cashews | Premium Cashews in Cuddalore & Panruti | All India Delivery">
  <meta property="og:description" content="Buy premium cashews from AK Cashews in Cuddalore and Panruti. Fresh W180, W240, W320, roasted and split cashews. Fast delivery all over India.">
  <meta property="og:image" content="assets/img/akcashewslogo.png">
  <meta property="og:url" content="">
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="AK Cashews | Premium Cashews in Cuddalore & Panruti | All India Delivery">
  <meta name="twitter:description" content="Fresh, handpicked cashews. Fast delivery across India.">
  <meta name="twitter:image" content="assets/img/akcashewslogo.png">
  
  <!-- Use CDN for Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
  
  <!-- CSS served via PHP to avoid upload restrictions -->
  <link rel="stylesheet" href="styles.php">

  <!-- LocalBusiness structured data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Store",
    "name": "AK Cashews",
    "url": "",
    "telephone": "+91 74182 77696",
    "email": "akcashews.nut@gmail.com",
    "image": "assets/img/akcashewslogo.png",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "No. 29, Manjakuppam",
      "addressLocality": "Cuddalore",
      "postalCode": "607001",
      "addressCountry": "IN"
    },
    "geo": {
      "@type": "GeoCoordinates",
      "latitude": 11.7726,
      "longitude": 79.7414
    },
    "openingHours": "Mo-Su 09:00-18:00",
    "priceRange": "₹₹",
    "servesCuisine": "Snacks",
    "hasOfferCatalog": {
      "@type": "OfferCatalog",
      "name": "Cashew Products",
      "itemListElement": [
        {
          "@type": "Offer",
          "itemOffered": {
            "@type": "Product",
            "name": "W320 Cashews",
            "description": "Premium W320 grade cashews"
          }
        }
      ]
    }
  }
  </script>
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
            <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 0.7em;">0</span>
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
<section id="about" class="py-5 route">
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

<!-- Shop -->


<section id="products" class="py-5 route">
  <div class="container" data-animate>
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="mb-0">Our Products</h2>
      <div class="input-group w-auto">
        <input id="search" type="text" class="form-control" placeholder="Search products...">
        <button id="clear-search" class="btn btn-outline-secondary">Clear</button>
      </div>
    </div>
    <div id="product-grid" class="row g-4"></div>
  </div>
</section>




<!-- Cart -->
<section id="cart" class="py-5 route">
  <div class="container" data-animate>
    <h2>Your Cart</h2>
    <div id="cart-list" class="list-group mb-3"></div>
    <div class="d-flex justify-content-between">
      <strong>Total: ₹<span id="cart-total">0.00</span></strong>
      <a href="#checkout" class="btn btn-theme">Proceed to Checkout</a>
    </div>
  </div>
</section>

<!-- Checkout -->
<section id="checkout" class="py-5 route">
  <div class="container" data-animate>
    <h2>Checkout</h2>
    <form id="checkout-form" class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Full Name *</label>
        <input name="customer_name" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Phone *</label>
        <input name="phone" class="form-control" required>
      </div>
      <div class="col-md-6">
        <label class="form-label">Email</label>
        <input name="email" type="email" class="form-control">
      </div>
      <div class="col-12">
        <label class="form-label">Address *</label>
        <textarea name="address" class="form-control" rows="3" required></textarea>
      </div>
      <div class="col-12">
        <div class="alert alert-info d-none" id="checkout-alert"></div>
        <div class="d-flex justify-content-between align-items-center">
          <strong>Total: ₹<span id="checkout-total">0.00</span></strong>
          <button type="submit" class="btn btn-theme btn-lg">Place Order</button>
        </div>
      </div>
    </form>
  </div>
</section>

<!-- FAQ -->
<section id="faq" class="py-5 route">
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
<section id="contact" class="py-5 route">
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
              <i class="bi bi-instagram me-3 fs-5 text-theme"></i>
              <div>
                <h6 class="mb-1">Instagram</h6>
                <p class="mb-0"><a href="https://www.instagram.com/p/DNdjacSPKlw/" target="_blank" class="text-decoration-none">@ak_cashews</a></p>
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
            <div class="mt-4">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9959.391295945765!2d79.74146186192596!3d11.772575669451735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a5499811d936fc3%3A0x90c3f3c1b59b6dd4!2sOm%20Shakthi%20nagar!5e0!3m2!1sen!2sin!4v1755865475179!5m2!1sen!2sin" width="100%" 
                height="200" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Admin -->
<section id="admin" class="py-5 route">
  <div class="container">
    <h2 class="mb-4">Admin Panel</h2>
    
    <!-- Admin Login -->
    <div id="admin-auth" class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Admin Login</h5>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input id="admin-email" type="email" class="form-control" value="admin@akcashews.com">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input id="admin-password" type="password" class="form-control" placeholder="Admin@123">
            </div>
            <button id="admin-login" class="btn btn-theme">Login</button>
            <div id="admin-login-msg" class="mt-2 text-muted"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Admin Area -->
    <div id="admin-area" class="d-none">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h3>Dashboard</h3>
        <div>
          <button id="btn-refresh" class="btn btn-outline-secondary me-2">Refresh</button>
          <button id="btn-logout" class="btn btn-outline-danger">Logout</button>
        </div>
      </div>

      <!-- Product Management -->
      <div class="row mb-4">
        <div class="col-md-6">
          <div class="card">
            <div class="card-header">
              <h5 class="mb-0">Add/Edit Product</h5>
            </div>
            <div class="card-body">
              <form>
                <input id="prod-id" type="hidden">
                <div class="mb-3">
                  <label class="form-label">Name</label>
                  <input id="prod-name" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Price (₹)</label>
                  <input id="prod-price" type="number" step="0.01" class="form-control" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">Image URL</label>
                  <input id="prod-image" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="form-label">Description</label>
                  <textarea id="prod-desc" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3 form-check">
                  <input id="prod-active" type="checkbox" class="form-check-input" checked>
                  <label class="form-check-label">Active</label>
                </div>
                <button id="save-product" type="button" class="btn btn-theme me-2">Save</button>
                <button id="reset-product" type="button" class="btn btn-outline-secondary">Reset</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- Products Table -->
      <div class="card mb-4">
        <div class="card-header">
          <h5 class="mb-0">Products</h5>
        </div>
        <div class="card-body">
          <div id="admin-products" class="table-responsive"></div>
        </div>
      </div>

      <!-- Orders Table -->
      <div class="card">
        <div class="card-header">
          <h5 class="mb-0">Orders</h5>
        </div>
        <div class="card-body">
          <div id="admin-orders" class="table-responsive"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="py-4 bg-theme text-white mt-auto">
  <div class="container d-flex flex-column flex-lg-row justify-content-between align-items-center gap-2">
    <div class="small">© <span id="year"></span> AK Cashews. All rights reserved.</div>
    <div class="small">Fresh • Premium • Handpicked</div>
  </div>
</footer>

<!-- Floating WhatsApp Button -->
<a class="floating-whatsapp" href="https://wa.me/918838965378" target="_blank" aria-label="Chat on WhatsApp">
  <i class="bi bi-whatsapp"></i>
</a>

<!-- Use CDN for jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript served via PHP to avoid upload restrictions -->
<script src="scripts.php"></script>
<script>

// Product list with image URLs
const products = [
  { name: "WW180", img: "assets/img/variety/W180.png" },
  { name: "WW240", img: "assets/img/variety/w240.png" },
  { name: "WW320", img: "assets/img/variety/w320.png" },
  { name: "WS", img: "assets/img/variety/ws.png" },
  { name: "LWP", img: "assets/img/variety/lwp.png" },
];

// Function to render products
function renderProducts(filter = "") {
  const grid = $("#product-grid");
  grid.empty();
  products
    .filter((p) => p.name.toLowerCase().includes(filter.toLowerCase()))
    .forEach((p) => {
      grid.append(`
        <div class="col-md-3 col-sm-6">
          <div class="card h-100 ">
            <img src="${p.img}" class="card-img-top cashew-variety-img" alt="${p.name}" >
          </div>
        </div>
      `);
    });
}

// Initial render
renderProducts();

// Search functionality
$("#search").on("input", function () {
  renderProducts($(this).val());
});

$("#clear-search").on("click", function () {
  $("#search").val("");
  renderProducts();
});

document.getElementById('year').textContent = new Date().getFullYear();
</script>
</body>
</html>