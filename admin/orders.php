<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order Management - Modern Furniture Store</title>

    <!-- Favicon -->
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="../assets/img/favicon_io/apple-touch-icon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="../assets/img/favicon_io/favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../assets/img/favicon_io/favicon-16x16.png"
    />
    <link rel="manifest" href="../assets/img/favicon_io/site.webmanifest" />

    <!-- Bootstrap 5 CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/colors.css" />
    <link rel="stylesheet" href="../assets/css/admin/admin.css" />
  </head>
  <body>
    <div class="admin-wrapper">
      <!-- Sidebar -->
      <nav class="admin-sidebar">
        <a class="navbar-brand" href="index.html">
          <i class="fas fa-chair"></i> Admin
        </a>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="products.html">
              <i class="fas fa-box"></i> Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="categories.html">
              <i class="fas fa-tags"></i> Categories
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="orders.html">
              <i class="fas fa-shopping-cart"></i> Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="users.html">
              <i class="fas fa-users"></i> Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reviews.html">
              <i class="fas fa-star"></i> Reviews
            </a>
          </li>
          <li class="nav-item mt-4">
            <a class="nav-link" href="../index.html">
              <i class="fas fa-sign-out-alt"></i> Exit Admin
            </a>
          </li>
        </ul>
      </nav>

      <!-- Main Content -->
      <main class="admin-main">
        <!-- Header -->
        <header class="admin-header">
          <h1 class="h3 m-0">Order Management</h1>
          <div>
            <button class="admin-btn admin-btn-primary btn-sm me-2">
              <i class="fas fa-file-export"></i> Export Orders
            </button>
            <button class="admin-btn admin-btn-success btn-sm">
              <i class="fas fa-sync"></i> Refresh
            </button>
          </div>
        </header>

        <!-- Order Filters -->
        <div class="admin-card mb-4">
          <div class="row g-3">
            <div class="col-md-3">
              <select class="admin-form-control">
                <option value="">Filter by Status</option>
                <option value="pending">Pending</option>
                <option value="processing">Processing</option>
                <option value="shipped">Shipped</option>
                <option value="delivered">Delivered</option>
                <option value="cancelled">Cancelled</option>
              </select>
            </div>
            <div class="col-md-3">
              <input
                type="date"
                class="admin-form-control"
                placeholder="Filter by Date"
              />
            </div>
            <div class="col-md-4">
              <input
                type="text"
                class="admin-form-control"
                placeholder="Search Orders..."
              />
            </div>
            <div class="col-md-2">
              <button class="admin-btn admin-btn-primary btn-sm w-100">
                Apply Filters
              </button>
            </div>
          </div>
        </div>

        <!-- Orders Table -->
        <div class="admin-card">
          <div class="table-responsive">
            <table class="admin-table">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Customer</th>
                  <th>Products</th>
                  <th>Total</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>#1234</td>
                  <td>
                    <div>John Doe</div>
                    <small class="text-muted">john@example.com</small>
                  </td>
                  <td>
                    <div>Modern Sofa</div>
                    <small class="text-muted">Qty: 1</small>
                  </td>
                  <td>$899</td>
                  <td>June 8, 2025</td>
                  <td><span class="badge bg-success">Delivered</span></td>
                  <td>
                    <button
                      class="admin-btn admin-btn-warning btn-sm"
                      data-bs-toggle="modal"
                      data-bs-target="#updateOrderModal"
                    >
                      <i class="fas fa-edit"></i>
                    </button>
                    <button class="admin-btn admin-btn-primary btn-sm">
                      <i class="fas fa-eye"></i>
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>#1235</td>
                  <td>
                    <div>Jane Smith</div>
                    <small class="text-muted">jane@example.com</small>
                  </td>
                  <td>
                    <div>Dining Set</div>
                    <small class="text-muted">Qty: 1</small>
                  </td>
                  <td>$1,299</td>
                  <td>June 9, 2025</td>
                  <td><span class="badge bg-warning">Processing</span></td>
                  <td>
                    <button
                      class="admin-btn admin-btn-warning btn-sm"
                      data-bs-toggle="modal"
                      data-bs-target="#updateOrderModal"
                    >
                      <i class="fas fa-edit"></i>
                    </button>
                    <button class="admin-btn admin-btn-primary btn-sm">
                      <i class="fas fa-eye"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>

    <!-- Update Order Modal -->
    <div class="modal fade" id="updateOrderModal" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Update Order Status</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
            ></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="admin-form-group">
                <label class="admin-form-label">Order Status</label>
                <select class="admin-form-control">
                  <option value="pending">Pending</option>
                  <option value="processing">Processing</option>
                  <option value="shipped">Shipped</option>
                  <option value="delivered">Delivered</option>
                  <option value="cancelled">Cancelled</option>
                </select>
              </div>
              <div class="admin-form-group">
                <label class="admin-form-label">Notes</label>
                <textarea class="admin-form-control" rows="3"></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="admin-btn admin-btn-secondary"
              data-bs-dismiss="modal"
            >
              Cancel
            </button>
            <button type="button" class="admin-btn admin-btn-primary">
              Update Status
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
