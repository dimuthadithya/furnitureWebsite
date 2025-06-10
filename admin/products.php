<?php
require_once '../config/db.php';
require_once 'handlers/product_handler.php';
require_once 'handlers/category_handler.php';

// Fetch all products and categories
$products = getAllProducts();
$categories = getAllCategories();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Product Management - Modern Furniture Store</title>

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
        <h1 class="h3 m-0">Product Management</h1>
        <button
          class="admin-btn admin-btn-primary btn-sm"
          data-bs-toggle="modal"
          data-bs-target="#addProductModal">
          Add Product
        </button>
      </header>

      <!-- Product List -->
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Image</th>
              <th>Name</th>
              <th>Category</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($products as $product): ?>
              <tr>
                <td><?php echo htmlspecialchars($product['product_id']); ?></td>
                <td>
                  <?php if ($product['image_url']): ?>
                    <img src="../<?php echo htmlspecialchars($product['image_url']); ?>"
                      alt="<?php echo htmlspecialchars($product['name']); ?>"
                      style="width: 50px; height: 50px; object-fit: cover;">
                  <?php else: ?>
                    <div class="bg-secondary" style="width: 50px; height: 50px;"></div>
                  <?php endif; ?>
                </td>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td><?php echo htmlspecialchars($product['category_name']); ?></td>
                <td>$<?php echo number_format($product['price'], 2); ?></td>
                <td><?php echo htmlspecialchars($product['stock_quantity']); ?></td>
                <td>
                  <button class="btn btn-sm btn-primary edit-product"
                    data-product-id="<?php echo htmlspecialchars($product['product_id']); ?>"
                    data-description="<?php echo htmlspecialchars($product['description'] ?? ''); ?>"
                    data-category-id="<?php echo htmlspecialchars($product['category_id']); ?>"
                    data-image-url="<?php echo htmlspecialchars($product['image_url'] ?? ''); ?>">
                    <i class="fas fa-edit"></i>
                  </button>
                  <button class="btn btn-sm btn-danger delete-product"
                    data-product-id="<?php echo htmlspecialchars($product['product_id']); ?>"
                    data-product-name="<?php echo htmlspecialchars($product['name']); ?>">
                    <i class="fas fa-trash"></i>
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

      <!-- Add Product Modal -->
      <div class="modal fade" id="addProductModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add New Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <form id="addProductForm" enctype="multipart/form-data">
                <input type="hidden" name="action" value="add">

                <div class="mb-3">
                  <label for="productName" class="form-label">Product Name</label>
                  <input type="text" class="form-control" id="productName" name="name" required>
                </div>

                <div class="mb-3">
                  <label for="productDescription" class="form-label">Description</label>
                  <textarea class="form-control" id="productDescription" name="description" rows="3"></textarea>
                </div>

                <div class="mb-3">
                  <label for="productPrice" class="form-label">Price</label>
                  <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control" id="productPrice" name="price" step="0.01" min="0" required>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="productCategory" class="form-label">Category</label>
                  <select class="form-select" id="productCategory" name="category_id" required>
                    <option value="">Select a category</option>
                    <?php foreach ($categories as $category): ?>
                      <option value="<?php echo htmlspecialchars($category['category_id']); ?>">
                        <?php echo htmlspecialchars($category['name']); ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="productStock" class="form-label">Stock Quantity</label>
                  <input type="number" class="form-control" id="productStock" name="stock_quantity" min="0" required>
                </div>

                <div class="mb-3">
                  <label for="productImage" class="form-label">Product Image</label>
                  <input type="file" class="form-control" id="productImage" name="image" accept="image/*">
                </div>

                <div class="text-end">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div> <!-- Edit Product Modal -->
      <div class="modal fade" id="editProductModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <form id="editProductForm" enctype="multipart/form-data">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" id="editProductId" name="product_id">

                <div class="mb-3">
                  <label for="editProductName" class="form-label">Product Name</label>
                  <input type="text" class="form-control" id="editProductName" name="name" required>
                </div>

                <div class="mb-3">
                  <label for="editProductDescription" class="form-label">Description</label>
                  <textarea class="form-control" id="editProductDescription" name="description" rows="3"></textarea>
                </div>

                <div class="mb-3">
                  <label for="editProductPrice" class="form-label">Price</label>
                  <div class="input-group">
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control" id="editProductPrice" name="price" step="0.01" min="0" required>
                  </div>
                </div>

                <div class="mb-3">
                  <label for="editProductCategory" class="form-label">Category</label>
                  <select class="form-select" id="editProductCategory" name="category_id" required>
                    <option value="">Select a category</option>
                    <?php foreach ($categories as $category): ?>
                      <option value="<?php echo htmlspecialchars($category['category_id']); ?>">
                        <?php echo htmlspecialchars($category['name']); ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="editProductStock" class="form-label">Stock Quantity</label>
                  <input type="number" class="form-control" id="editProductStock" name="stock_quantity" min="0" required>
                </div>

                <div id="currentImagePreview" class="mb-3 d-none">
                  <label class="form-label">Current Image</label>
                  <img src="" alt="Current product image" style="max-width: 100px; display: block;">
                </div>

                <div class="mb-3">
                  <label for="editProductImage" class="form-label">New Image (optional)</label>
                  <input type="file" class="form-control" id="editProductImage" name="image" accept="image/*">
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Update Product</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Delete Confirmation Modal -->
      <div class="modal fade" id="deleteProductModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Delete Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <p>Are you sure you want to delete "<span id="deleteProductName"></span>"?</p>
              <p class="text-danger">This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-danger" id="confirmDeleteProduct">Delete</button>
            </div>
          </div>
        </div>
      </div>

    </main>
  </div>

  <!-- Bootstrap 5 JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    $(document).ready(function() {
      // Handle add product form submission
      $('#addProductForm').submit(function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
          url: 'handlers/product_handler.php',
          method: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          dataType: 'json',
          success: function(response) {
            if (response.status === 'success') {
              location.reload();
            } else {
              alert(response.message);
            }
          },
          error: function() {
            alert('An error occurred while adding the product.');
          }
        });
      }); // Handle edit button click
      $('.edit-product').click(function() {
        const button = $(this);
        const row = button.closest('tr');

        // Populate form fields
        $('#editProductId').val(button.data('product-id'));
        $('#editProductName').val(button.data('name'));
        $('#editProductDescription').val(button.data('description'));
        $('#editProductPrice').val(parseFloat(row.find('td:eq(4)').text().replace('$', '').trim()));
        $('#editProductCategory').val(button.data('category-id'));
        $('#editProductStock').val(row.find('td:eq(5)').text().trim());

        // Handle image preview
        const imgUrl = button.data('image-url');
        if (imgUrl) {
          $('#currentImagePreview')
            .removeClass('d-none')
            .find('img')
            .attr('src', '../' + imgUrl);
        } else {
          $('#currentImagePreview').addClass('d-none');
        }

        // Clear file input
        $('#editProductImage').val('');

        $('#editProductModal').modal('show');
      });

      // Handle edit form submission
      $('#editProductForm').submit(function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
          url: 'handlers/product_handler.php',
          method: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          dataType: 'json',
          success: function(response) {
            if (response.status === 'success') {
              location.reload();
            } else {
              alert(response.message);
            }
          },
          error: function() {
            alert('An error occurred while updating the product.');
          }
        });
      });

      // Handle delete button click
      $('.delete-product').click(function() {
        const productId = $(this).data('product-id');
        const productName = $(this).data('product-name');

        $('#deleteProductName').text(productName);
        $('#confirmDeleteProduct').data('product-id', productId);
        $('#deleteProductModal').modal('show');
      });

      // Handle delete confirmation
      $('#confirmDeleteProduct').click(function() {
        const productId = $(this).data('product-id');

        $.ajax({
          url: 'handlers/product_handler.php',
          method: 'POST',
          data: {
            action: 'delete',
            product_id: productId
          },
          dataType: 'json',
          success: function(response) {
            if (response.status === 'success') {
              location.reload();
            } else {
              alert(response.message);
            }
          },
          error: function() {
            alert('An error occurred while deleting the product.');
          }
        });

        $('#deleteProductModal').modal('hide');
      });
    });
  </script>
</body>

</html>