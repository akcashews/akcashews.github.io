<?php
// api/config.php
// Database configuration - automatically detects environment

// Check if we're on InfinityFree or local environment
if (isset($_SERVER['HTTP_HOST']) && (
    strpos($_SERVER['HTTP_HOST'], 'infinityfree') !== false || 
    strpos($_SERVER['HTTP_HOST'], '.rf.gd') !== false ||
    strpos($_SERVER['HTTP_HOST'], '.42web.io') !== false
)) {
    // InfinityFree hosting configuration
    define('DB_HOST', 'sql200.infinityfree.com'); // Update with your actual MySQL host
    define('DB_NAME', 'if0_39766861_ac_cashews');
    define('DB_USER', 'if0_39766861');
    define('DB_PASS', 'AmalaNini123');
} else {
    // Local XAMPP configuration
    define('DB_HOST', '127.0.0.1');
    define('DB_NAME', 'cashews_spa'); // Local database name
    define('DB_USER', 'root');
    define('DB_PASS', '');
}

// CORS headers for API
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, X-Requested-With, Authorization');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Error reporting for debugging (disable in production)
if (strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

session_name('ak_cashews_sess');
session_start();
?>
