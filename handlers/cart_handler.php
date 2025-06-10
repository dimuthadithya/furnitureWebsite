<?php
require_once dirname(__DIR__) . '/config/db.php';
session_start();

// Initialize cart in session if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

function addToCart($product_id, $quantity)
{
    // Validate product exists and has enough stock
    $sql = "SELECT product_id, name, price, stock_quantity, image_url FROM products WHERE product_id = ?";
    $product = fetchOne($sql, [$product_id]);

    if (!$product) {
        return [
            'status' => 'error',
            'message' => 'Product not found'
        ];
    }

    if ($product['stock_quantity'] < $quantity) {
        return [
            'status' => 'error',
            'message' => 'Not enough stock available'
        ];
    }

    // Add or update cart item
    $cart_item = [
        'product_id' => $product['product_id'],
        'name' => $product['name'],
        'price' => $product['price'],
        'quantity' => $quantity,
        'image_url' => $product['image_url']
    ];

    // If product already in cart, update quantity
    if (isset($_SESSION['cart'][$product_id])) {
        $new_quantity = $_SESSION['cart'][$product_id]['quantity'] + $quantity;
        if ($new_quantity > $product['stock_quantity']) {
            return [
                'status' => 'error',
                'message' => 'Cannot add more items than available in stock'
            ];
        }
        $_SESSION['cart'][$product_id]['quantity'] = $new_quantity;
    } else {
        $_SESSION['cart'][$product_id] = $cart_item;
    }

    return [
        'status' => 'success',
        'message' => 'Product added to cart',
        'cart_count' => array_sum(array_column($_SESSION['cart'], 'quantity'))
    ];
}

// Handle AJAX requests
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        $product_id = (int)($_POST['product_id'] ?? 0);
        $quantity = (int)($_POST['quantity'] ?? 1);

        if ($product_id <= 0 || $quantity <= 0) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid product ID or quantity'
            ]);
            exit;
        }

        $result = addToCart($product_id, $quantity);
        echo json_encode($result);
        exit;
    }
}
