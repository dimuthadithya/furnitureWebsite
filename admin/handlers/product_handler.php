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

// Update product function
function updateProduct($product_id, $name, $description, $price, $category_id, $stock_quantity, $image_url = null)
{
    // Get old product data before update
    $old_product = null;
    $old_image_path = null;
    if ($image_url !== null) {
        $old_product = getProductById($product_id);
        if ($old_product && $old_product['image_url']) {
            $old_image_path = dirname(dirname(__DIR__)) . '/' . $old_product['image_url'];
        }
    }

    // Prepare update query
    if ($image_url === null) {
        $sql = "UPDATE products SET name = ?, description = ?, price = ?, category_id = ?, stock_quantity = ? WHERE product_id = ?";
        $params = [$name, $description, $price, $category_id, $stock_quantity, $product_id];
    } else {
        $sql = "UPDATE products SET name = ?, description = ?, price = ?, category_id = ?, stock_quantity = ?, image_url = ? WHERE product_id = ?";
        $params = [$name, $description, $price, $category_id, $stock_quantity, $image_url, $product_id];
    }

    // Execute update
    $result = execute($sql, $params);

    if ($result) {
        // If update successful and we have a new image, delete old image
        if ($old_image_path && file_exists($old_image_path)) {
            unlink($old_image_path);
        }

        return [
            'status' => 'success',
            'message' => 'Product updated successfully'
        ];
    }
    return [
        'status' => 'error',
        'message' => 'Failed to update product'
    ];
}

// Delete product function
function deleteProduct($product_id)
{
    // Get product info to delete image file
    $product = getProductById($product_id);

    // Delete from database
    $sql = "DELETE FROM products WHERE product_id = ?";
    $result = execute($sql, [$product_id]);

    if ($result) {
        // Delete image file if exists
        if ($product && $product['image_url']) {
            $image_path = dirname(dirname(__DIR__)) . '/' . $product['image_url'];
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

        return [
            'status' => 'success',
            'message' => 'Product deleted successfully'
        ];
    }
    return [
        'status' => 'error',
        'message' => 'Failed to delete product'
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
    } elseif ($action === 'edit') {
        // Validate required fields
        $required_fields = ['product_id', 'name', 'price', 'category_id', 'stock_quantity'];
        foreach ($required_fields as $field) {
            if (empty($_POST[$field])) {
                echo json_encode([
                    'status' => 'error',
                    'message' => ucfirst(str_replace('_', ' ', $field)) . ' is required'
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

        // Update product
        $result = updateProduct(
            $_POST['product_id'],
            $_POST['name'],
            $_POST['description'] ?? '',
            (float)$_POST['price'],
            (int)$_POST['category_id'],
            (int)$_POST['stock_quantity'],
            $image_path
        );

        echo json_encode($result);
        exit;
    } elseif ($action === 'delete') {
        if (empty($_POST['product_id'])) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Product ID is required'
            ]);
            exit;
        }

        // Delete product
        $result = deleteProduct($_POST['product_id']);
        echo json_encode($result);
        exit;
    }
}
