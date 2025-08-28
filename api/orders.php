<?php
// api/orders.php
require_once __DIR__.'/db.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    $data = json_input();
    $name = trim($data['customer_name'] ?? '');
    $phone = trim($data['phone'] ?? '');
    $email = trim($data['email'] ?? '');
    $address = trim($data['address'] ?? '');
    $items = $data['items'] ?? [];
    $total = floatval($data['total'] ?? 0);

    if (!$name || !$phone || !$address || !$items || $total <= 0) {
        http_response_code(400);
        echo json_encode(['error'=>'Missing required fields']);
        exit;
    }

    $pdo = db();
    $pdo->beginTransaction();
    try {
        $stmt = $pdo->prepare('INSERT INTO orders (customer_name, phone, email, address, total) VALUES (?,?,?,?,?)');
        $stmt->execute([$name, $phone, $email, $address, $total]);
        $orderId = $pdo->lastInsertId();

        $itemStmt = $pdo->prepare('INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?,?,?,?)');
        foreach ($items as $it) {
            $itemStmt->execute([$orderId, intval($it['product_id']), intval($it['quantity']), floatval($it['price'])]);
        }

        $pdo->commit();
        echo json_encode(['message'=>'Order placed', 'order_id'=>$orderId]);
    } catch (Exception $e) {
        $pdo->rollBack();
        http_response_code(500);
        echo json_encode(['error'=>'Failed to place order']);
    }
    exit;
}

if ($method === 'GET') {
    // Admin list orders
    require_admin();
    $stmt = db()->query('SELECT * FROM orders ORDER BY created_at DESC');
    $orders = $stmt->fetchAll();
    echo json_encode($orders);
    exit;
}

http_response_code(405);
echo json_encode(['error'=>'Method not allowed']);
?>
