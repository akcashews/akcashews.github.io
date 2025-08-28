AK Cashews SPA - Quick Start (XAMPP)
===================================

1) Copy the 'cashews_spa' folder into: C:\xampp\htdocs\cashews_spa  (Windows) 
   or /Applications/XAMPP/xamppfiles/htdocs/cashews_spa (macOS), or /opt/lampp/htdocs/cashews_spa (Linux).

2) Start Apache and MySQL in XAMPP Control Panel.

3) Import database:
   - Open phpMyAdmin -> Import -> select cashews_spa_schema.sql from this folder -> Go.
   (This creates DB 'cashews_spa', tables, and seed data.)

4) Visit the site:
   - http://localhost/cashews_spa/  (Shop + Cart + Checkout)
   - Admin login (seed):
       Email: admin@akcashews.com
       Password: Admin@123
     Change password after first login by updating users table or adding UI.

5) File overview:
   - index.html               -> SPA (Bootstrap + jQuery)
   - assets/js/app.js         -> SPA logic, cart, admin
   - assets/css/styles.css    -> Styles
   - api/*.php                -> PHP REST-style endpoints (PDO + prepared statements)
   - cashews_spa_schema.sql   -> DB schema + seeds

6) Notes / Security:
   - This starter uses PHP sessions for admin auth.
   - All DB calls use prepared statements (PDO).
   - For production, move to env-based config, enforce HTTPS, CSRF, and rate-limit admin APIs.
   - Replace sample images under assets/img and update image_url in DB.
