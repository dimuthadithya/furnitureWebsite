<?php
require_once '../config/db.php';
require_once './handlers/category_handler.php';

// Get all categories
$categories = getAllCategories();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Category Management - Modern Furniture Store</title>

  <!-- Favicon -->
  <link
    rel="apple-touch-icon"
    sizes="180x180"
    href="../assets/img/favicon_io/apple-touch-icon.png" />
  <link
    rel="icon"
    type="image/png"
    sizes="32x32"
    href="../assets/img/favicon_io/favicon-32x32.png" />
  <link
    rel="icon"
    type="image/png"
    sizes="16x16"
    href="../assets/img/favicon_io/favicon-16x16.png" />
  <link rel="manifest" href="../assets/img/favicon_io/site.webmanifest" />

  <!-- Bootstrap 5 CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet" />
  <!-- Font Awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/css/colors.css" />
  <link rel="stylesheet" href="../assets/css/admin/admin.css" />
</head>

<body>
  <div class="admin-wrapper">
    <?php include '../includes/admin-sidebar.php'; ?>

    <!-- Main Content -->
    <main class="admin-main">
      <!-- Header -->
      <header class="admin-header">
        <h1 class="h3 m-0">Category Management</h1>
        <button
          class="admin-btn admin-btn-primary btn-sm"
          data-bs-toggle="modal"
          data-bs-target="#addCategoryModal">
          <i class="fas fa-plus"></i> Add New Category
        </button>
      </header>

      <!-- Categories Table -->
      <div class="admin-card">
        <div class="table-responsive">
          <table class="admin-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Icon</th>
                <th>Name</th>
                <th>Description</th>
                <th>Products Count</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($categories as $category): ?>
                <tr>
                  <td>#C<?php echo str_pad($category['category_id'], 3, '0', STR_PAD_LEFT); ?></td>
                  <td><i class="<?php echo htmlspecialchars($category['icon_class']); ?>"></i></td>
                  <td><?php echo htmlspecialchars($category['name']); ?></td>
                  <td><?php echo htmlspecialchars($category['description']); ?></td>
                  <td><span class="badge bg-primary"><?php echo $category['product_count']; ?> Products</span></td>
                  <td>
                    <button
                      class="admin-btn admin-btn-warning btn-sm edit-category"
                      data-category-id="<?php echo $category['category_id']; ?>"
                      data-bs-toggle="modal"
                      data-bs-target="#editCategoryModal">
                      <i class="fas fa-edit"></i>
                    </button>
                    <button
                      class="admin-btn admin-btn-danger btn-sm delete-category"
                      data-category-id="<?php echo $category['category_id']; ?>">
                      <i class="fas fa-trash"></i>
                    </button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>

  <!-- Add Category Modal -->
  <div class="modal fade" id="addCategoryModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form id="addCategoryForm">
          <div class="modal-body">
            <div class="admin-form-group">
              <label class="admin-form-label">Category Name</label>
              <input type="text" name="name" class="admin-form-control" required />
            </div>
            <div class="admin-form-group">
              <label class="admin-form-label">Icon Class</label>
              <select name="icon_class" class="admin-form-control" required>
                <option value="fas fa-couch">Couch</option>
                <option value="fas fa-bed">Bed</option>
                <option value="fas fa-chair">Chair</option>
                <option value="fas fa-table">Table</option>
                <option value="fas fa-lamp">Lamp</option>
                <option value="fas fa-door-closed">Door</option>
              </select>
            </div>
            <div class="admin-form-group">
              <label class="admin-form-label">Description</label>
              <textarea name="description" class="admin-form-control" rows="3" required></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="admin-btn admin-btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="admin-btn admin-btn-primary">Add Category</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Edit Category Modal -->
  <div class="modal fade" id="editCategoryModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Category</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="admin-form-group">
              <label class="admin-form-label">Category Name</label>
              <input
                type="text"
                class="admin-form-control"
                value="Living Room"
                required />
            </div>
            <div class="admin-form-group">
              <label class="admin-form-label">Icon Class</label>
              <div class="input-group">
                <span class="input-group-text">fa-</span>
                <input
                  type="text"
                  class="admin-form-control"
                  value="couch"
                  required />
              </div>
              <small class="text-muted">Enter Font Awesome icon name without 'fa-' prefix</small>
            </div>
            <div class="admin-form-group">
              <label class="admin-form-label">Description</label>
              <textarea class="admin-form-control" rows="3" required>
Furniture for living rooms and lounges</textarea>
            </div>
            <div class="admin-form-group">
              <label class="admin-form-label">Status</label>
              <select class="admin-form-control" required>
                <option value="active" selected>Active</option>
                <option value="inactive">Inactive</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="admin-btn admin-btn-secondary btn-sm"
            data-bs-dismiss="modal">
            Cancel
          </button>
          <button type="button" class="admin-btn admin-btn-primary btn-sm">
            Save Changes
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    $(document).ready(function() {
      // Add Category Form Submit
      $('#addCategoryForm').on('submit', function(e) {
        e.preventDefault();

        const formData = new FormData(this);
        formData.append('action', 'add');

        $.ajax({
          url: 'handlers/category_handler.php',
          type: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          success: function(response) {
            const result = JSON.parse(response);
            if (result.success) {
              alert('Category added successfully!');
              window.location.reload();
            } else {
              alert('Error: ' + result.message);
            }
          },
          error: function() {
            alert('An error occurred while adding the category.');
          }
        });
      });

      // Delete Category
      $('.delete-category').on('click', function() {
        if (confirm('Are you sure you want to delete this category?')) {
          const categoryId = $(this).data('category-id');
          // Add delete functionality here
        }
      });
    });
  </script>
</body>

</html>