<?php
require_once dirname(dirname(__DIR__)) . '/config/db.php';

// Add new product function
function addProduct($name, $description, $price, $category_id, $stock_quantity, $image_url = null)
{
    $sql = "INSERT INTO products (name, description, price, category_id, stock_quantity, image_url) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $result = insert($sql, [$name, $description, $price, $category_id, $stock_quantity, $image_url]);

    if ($result) {
        return [
            'status' => 'success',
            'message' => 'Product added successfully',
            'product_id' => $result
        ];
    }
    return [
        'status' => 'error',
        'message' => 'Failed to add product'
    ];
}

// Get all products with category names
function getAllProducts()
{
    $sql = "SELECT p.*, c.name as category_name 
            FROM products p 
            LEFT JOIN categories c ON p.category_id = c.category_id 
            ORDER BY p.product_id DESC";
    return fetchAll($sql);
}

// Get product by ID
function getProductById($product_id)
{
    $sql = "SELECT p.*, c.name as category_name 
            FROM products p 
            LEFT JOIN categories c ON p.category_id = c.category_id 
            WHERE p.product_id = ?";
    return fetchOne($sql, [$product_id]);
}

// Handle file upload
function handleImageUpload($file)
{
    $target_dir = dirname(dirname(__DIR__)) . "/assets/img/products/";

    // Create directory if it doesn't exist
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Generate unique filename
    $file_extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    $unique_filename = uniqid() . '.' . $file_extension;
    $target_file = $target_dir . $unique_filename;

    // Check file type
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($file_extension, $allowed_types)) {
        return [
            'status' => 'error',
            'message' => 'Only JPG, JPEG, PNG & GIF files are allowed'
        ];
    }

    // Try to upload file
    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        return [
            'status' => 'success',
            'message' => 'File uploaded successfully',
            'path' => 'assets/img/products/' . $unique_filename
        ];
    }

    return [
        'status' => 'error',
        'message' => 'Failed to upload file'
    ];
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        // Validate required fields
        $required_fields = ['name', 'price', 'category_id', 'stock_quantity'];
        foreach ($required_fields as $field) {
            if (empty($_POST[$field])) {
                echo json_encode([
                    'status' => 'error',
                    'message' => ucfirst($field) . ' is required'
                ]);
                exit;
            }
        }

        // Handle image upload if provided
        $image_path = null;
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $upload_result = handleImageUpload($_FILES['image']);
            if ($upload_result['status'] === 'error') {
                echo json_encode($upload_result);
                exit;
            }
            $image_path = $upload_result['path'];
        }

        // Add product
        $result = addProduct(
            $_POST['name'],
            $_POST['description'] ?? '',
            (float)$_POST['price'],
            (int)$_POST['category_id'],
            (int)$_POST['stock_quantity'],
            $image_path
        );

        echo json_encode($result);
        exit;
    }
}
