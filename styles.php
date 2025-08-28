<?php
header('Content-Type: text/css');
?>
/* AK Cashews Custom Styles */
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

/* Banner Styles */
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

/* Feature Cards */
.feature-card {
  background: var(--theme-light);
  border-radius: 15px;
  transition: transform 0.3s ease;
}
.feature-card:hover {
  transform: translateY(-5px);
}

/* Animations */
[data-animate] {
  opacity: 0;
  transform: translateY(30px);
  transition: all 0.6s ease;
}
[data-animate].in-view {
  opacity: 1;
  transform: translateY(0);
}

/* Cart Styles */
#cart-list img {
  width: 60px;
  height: 60px;
  object-fit: cover;
}

/* Floating WhatsApp */
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

/* Responsive */
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

/* Admin Styles */
.table-responsive {
  max-height: 400px;
  overflow-y: auto;
}

/* Product Grid */
#product-grid .card {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
#product-grid .card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

/* Navigation */
.navbar-brand img {
  transition: transform 0.3s ease;
}
.navbar-brand:hover img {
  transform: scale(1.05);
}

/* Accordion */
.accordion-button:not(.collapsed) {
  background-color: var(--theme-light);
  color: var(--theme-dark);
}

/* Form Styles */
.form-control:focus {
  border-color: var(--theme-color);
  box-shadow: 0 0 0 0.2rem rgba(255, 149, 38, 0.25);
}

/* Card Hover Effects */
.card {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.card:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

/* Button Animations */
.btn {
  transition: all 0.3s ease;
}
.btn:hover {
  transform: translateY(-1px);
}

/* Loading States */
.btn:disabled {
  opacity: 0.7;
  cursor: not-allowed;
}

/* Alert Styles */
.alert {
  border-radius: 10px;
}

/* Footer */
footer {
  margin-top: auto;
}

/* Cashew Variety Images */
.cashew-variety-img {
  object-fit: contain;
  width: fit-content;
  margin-left: 20px;
  height: 200px;
}

/* Cart Badge */
#cart-count {
  font-size: 0.7em !important;
  min-width: 1.5em;
  height: 1.5em;
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Smooth Scrolling */
html {
  scroll-behavior: smooth;
}

/* Section Spacing */
.route {
  min-height: 50vh;
}

/* Image Optimization */
img {
  max-width: 100%;
  height: auto;
}

/* Print Styles */
@media print {
  .floating-whatsapp,
  .navbar,
  footer {
    display: none !important;
  }
}