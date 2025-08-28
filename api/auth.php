<?php
// api/auth.php
require_once __DIR__.'/db.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST' && isset($_GET['action']) && $_GET['action']==='login') {
    $data = json_input();
    $email = $data['email'] ?? '';
    $password = $data['password'] ?? '';
    if (!$email || !$password) {
        http_response_code(400);
        echo json_encode(['error'=>'Email and password required']);
        exit;
    }
    $stmt = db()->prepare('SELECT id, name, email, password_hash, role FROM users WHERE email=? LIMIT 1');
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    if ($user && password_verify($password, $user['password_hash'])) {
        unset($user['password_hash']);
        $_SESSION['user'] = $user;
        echo json_encode(['message'=>'Logged in', 'user'=>$user]);
    } else {
        http_response_code(401);
        echo json_encode(['error'=>'Invalid credentials']);
    }
    exit;
}

if ($method === 'POST' && isset($_GET['action']) && $_GET['action']==='logout') {
    session_destroy();
    echo json_encode(['message'=>'Logged out']);
    exit;
}

if ($method === 'GET' && isset($_GET['action']) && $_GET['action']==='me') {
    echo json_encode(['user' => $_SESSION['user'] ?? null]);
    exit;
}

http_response_code(405);
echo json_encode(['error'=>'Method not allowed']);
?>
