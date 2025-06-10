<?php
require_once dirname(dirname(__DIR__)) . '/config/db.php';

// Add new category function
function addCategory($name, $description)
{
    $sql = "INSERT INTO categories (name, description) VALUES (?, ?)";
    $result = insert($sql, [$name, $description]);

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

// Update category function
function updateCategory($category_id, $name, $description)
{
    $sql = "UPDATE categories SET name = ?, description = ? WHERE category_id = ?";
    $result = execute($sql, [$name, $description, $category_id]);

    if ($result) {
        return [
            'status' => 'success',
            'message' => 'Category updated successfully'
        ];
    }
    return [
        'status' => 'error',
        'message' => 'Failed to update category'
    ];
}

// Delete category function
function deleteCategory($category_id)
{
    // First check if category has products
    $sql = "SELECT COUNT(*) as count FROM products WHERE category_id = ?";
    $result = fetchOne($sql, [$category_id]);

    if ($result['count'] > 0) {
        return [
            'status' => 'error',
            'message' => 'Cannot delete category because it has associated products'
        ];
    }

    // If no products, delete the category
    $sql = "DELETE FROM categories WHERE category_id = ?";
    $result = execute($sql, [$category_id]);

    if ($result) {
        return [
            'status' => 'success',
            'message' => 'Category deleted successfully'
        ];
    }
    return [
        'status' => 'error',
        'message' => 'Failed to delete category'
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

        // Validate input
        if (empty($name)) {
            echo json_encode(['status' => 'error', 'message' => 'Category name is required']);
            exit;
        }

        // Add category
        $result = addCategory($name, $description);
        echo json_encode($result);
        exit;
    } elseif ($action === 'edit') {
        $category_id = $_POST['category_id'] ?? '';
        $name = $_POST['name'] ?? '';
        $description = $_POST['description'] ?? '';

        // Validate input
        if (empty($name) || empty($category_id)) {
            echo json_encode(['status' => 'error', 'message' => 'Category name and ID are required']);
            exit;
        }

        // Update category
        $result = updateCategory($category_id, $name, $description);
        echo json_encode($result);
        exit;
    } elseif ($action === 'delete') {
        $category_id = $_POST['category_id'] ?? '';

        // Validate input
        if (empty($category_id)) {
            echo json_encode(['status' => 'error', 'message' => 'Category ID is required']);
            exit;
        }

        // Delete category
        $result = deleteCategory($category_id);
        echo json_encode($result);
        exit;
    }
}
