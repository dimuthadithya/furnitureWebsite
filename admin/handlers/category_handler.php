<?php
require_once dirname(dirname(__DIR__)) . '/config/db.php';

// Add new category function
function addCategory($name, $description, $icon_class)
{
    $sql = "INSERT INTO categories (name, description, icon_class) VALUES (?, ?, ?)";
    $result = insert($sql, [$name, $description, $icon_class]);

    if ($result) {
        return [
            'status' => 'success',
            'message' => 'Category added successfully',
            'category_id' => $result
        ];
    }
    return [
        'status' => 'error',
        'message' => 'Failed to add category'
    ];
}

// Get all categories with product count
function getAllCategories()
{
    $sql = "SELECT c.*, COUNT(p.product_id) as product_count 
            FROM categories c 
            LEFT JOIN products p ON c.category_id = p.category_id 
            GROUP BY c.category_id";
    return fetchAll($sql);
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';
        $icon_class = $_POST['icon_class'] ?? '';

        // Validate input
        if (empty($name)) {
            echo json_encode(['status' => 'error', 'message' => 'Category name is required']);
            exit;
        }

        // Add category
        $result = addCategory($name, $description, $icon_class);
        echo json_encode($result);
        exit;
    }
}
