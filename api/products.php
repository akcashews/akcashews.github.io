<?php
// api/products.php
require_once __DIR__.'/db.php';

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // Optional: ?id= to fetch single
        if (isset($_GET['id'])) {
            $stmt = db()->prepare('SELECT * FROM products WHERE id = ? AND is_active=1');
            $stmt->execute([intval($_GET['id'])]);
            $row = $stmt->fetch();
            echo json_encode($row ?: null);
            exit;
        } else {
            $stmt = db()->query('SELECT * FROM products WHERE is_active=1 ORDER BY created_at DESC');
            $rows = $stmt->fetchAll();
            echo json_encode($rows);
            exit;
        }
    case 'POST':
        require_admin();
        $data = json_input();
        $stmt = db()->prepare('INSERT INTO products (name, description, price, image_url, is_active) VALUES (?,?,?,?,?)');
        $stmt->execute([
            $data['name'] ?? '',
            $data['description'] ?? '',
            $data['price'] ?? 0,
            $data['image_url'] ?? null,
            isset($data['is_active']) ? intval($data['is_active']) : 1
        ]);
        echo json_encode(['message'=>'Product created','id'=>db()->lastInsertId()]);
        exit;
    case 'PUT':
        require_admin();
        parse_str($_SERVER['QUERY_STRING'] ?? '', $q);
        $id = intval($q['id'] ?? 0);
        if (!$id) { http_response_code(400); echo json_encode(['error'=>'id required']); exit; }
        $data = json_input();
        $stmt = db()->prepare('UPDATE products SET name=?, description=?, price=?, image_url=?, is_active=? WHERE id=?');
        $stmt->execute([
            $data['name'] ?? '',
            $data['description'] ?? '',
            $data['price'] ?? 0,
            $data['image_url'] ?? null,
            isset($data['is_active']) ? intval($data['is_active']) : 1,
            $id
        ]);
        echo json_encode(['message'=>'Product updated']);
        exit;
    case 'DELETE':
        require_admin();
        parse_str($_SERVER['QUERY_STRING'] ?? '', $q);
        $id = intval($q['id'] ?? 0);
        if (!$id) { http_response_code(400); echo json_encode(['error'=>'id required']); exit; }
        $stmt = db()->prepare('DELETE FROM products WHERE id=?');
        $stmt->execute([$id]);
        echo json_encode(['message'=>'Product deleted']);
        exit;
    default:
        http_response_code(405);
        echo json_encode(['error'=>'Method not allowed']);
}
?>
