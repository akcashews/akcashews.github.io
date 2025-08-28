# InfinityFree Deployment Guide for AK Cashews

## Issues Fixed:
1. ✅ Removed `d-none` class from all navigation sections
2. ✅ Added cart navigation with counter
3. ✅ Fixed Bootstrap JS CDN path
4. ✅ Fixed routing from `#shop` to `#products`
5. ✅ Added proper CORS headers for API
6. ✅ Auto-detection of hosting environment

## Steps to Deploy on InfinityFree:

### 1. Prepare Your Files
- All sections are now visible (About, Products, FAQ, Contact, Cart)
- Bootstrap JS is loaded from CDN (more reliable)
- API has proper CORS headers

### 2. Update Database Configuration
Before uploading, update `api/config.php` with your actual InfinityFree database details:

```php
// Replace these with your actual InfinityFree database details
define('DB_HOST', 'sql200.infinityfree.com'); // Your MySQL hostname
define('DB_NAME', 'if0_39766861_ac_cashews'); // Your database name
define('DB_USER', 'if0_39766861'); // Your database username
define('DB_PASS', 'AmalaNini123'); // Your database password
```

### 3. Upload Files to InfinityFree
1. **Login to InfinityFree Control Panel**
2. **Go to File Manager** or use FTP
3. **Upload all files to `htdocs` folder**:
   ```
   htdocs/
   ├── index.html
   ├── .htaccess
   ├── api/
   │   ├── config.php
   │   ├── db.php
   │   ├── auth.php
   │   ├── products.php
   │   └── orders.php
   ├── assets/
   │   ├── css/
   │   ├── js/
   │   └── img/
   └── cashews_spa_schema.sql
   ```

### 4. Set Up Database
1. **Go to MySQL Databases** in InfinityFree control panel
2. **Import** the `cashews_spa_schema.sql` file
3. **Verify** tables are created: `users`, `products`, `orders`, `order_items`

### 5. Test Your Website
1. Visit your InfinityFree domain
2. Test navigation: Home → About → Products → FAQ → Contact → Cart
3. Test admin login: `admin@akcashews.com` / `Admin@123`

## Common Upload Issues & Solutions:

### Issue 1: Files Not Uploading
- **Solution**: Upload files in smaller batches
- **Alternative**: Use FTP client like FileZilla instead of web file manager

### Issue 2: Database Connection Errors
- **Solution**: Double-check database credentials in `api/config.php`
- **Check**: Ensure database is created and imported correctly

### Issue 3: Images Not Loading
- **Solution**: Verify all image files are uploaded to `assets/img/` folder
- **Check**: File permissions (should be 644 for files, 755 for folders)

### Issue 4: API Not Working
- **Solution**: Ensure `.htaccess` file is uploaded
- **Check**: PHP version compatibility (PHP 7.4+ recommended)

## File Structure Check:
```
Your InfinityFree htdocs should contain:
✅ index.html (main page)
✅ .htaccess (URL rewriting)
✅ api/ folder with all PHP files
✅ assets/ folder with CSS, JS, and images
✅ Database schema file (for reference)
```

## Testing Checklist:
- [ ] Website loads without errors
- [ ] All navigation links work
- [ ] Products display correctly
- [ ] Cart functionality works
- [ ] Contact information displays
- [ ] Admin panel accessible
- [ ] Database operations work

## Support:
If you encounter issues, check:
1. InfinityFree error logs
2. Browser developer console for JavaScript errors
3. Database connection in phpMyAdmin