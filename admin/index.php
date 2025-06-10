<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - Modern Furniture Store</title>

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
            <a class="nav-link active" href="index.html">
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
            <a class="nav-link" href="orders.html">
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
          <h1 class="h3 m-0">Dashboard</h1>
          <div class="admin-header-right">
            <span class="me-3">Welcome, Admin</span>
            <a href="#" class="admin-btn admin-btn-danger btn-sm">
              <i class="fas fa-sign-out-alt"></i> Logout
            </a>
          </div>
        </header>

        <!-- Stats Row -->
        <div class="row">
          <div class="col-md-3">
            <div class="stats-card primary">
              <i class="fas fa-shopping-cart"></i>
              <h3>150</h3>
              <p>Total Orders</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="stats-card success">
              <i class="fas fa-box"></i>
              <h3>75</h3>
              <p>Products</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="stats-card warning">
              <i class="fas fa-users"></i>
              <h3>250</h3>
              <p>Users</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="stats-card danger">
              <i class="fas fa-star"></i>
              <h3>120</h3>
              <p>Reviews</p>
            </div>
          </div>
        </div>

        <!-- Recent Orders -->
        <div class="admin-card">
          <div class="admin-card-header">
            <h2 class="admin-card-title">Recent Orders</h2>
            <a href="orders.html" class="admin-btn admin-btn-primary"
              >View All</a
            >
          </div>
          <div class="table-responsive">
            <table class="admin-table">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Customer</th>
                  <th>Product</th>
                  <th>Amount</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>#1234</td>
                  <td>John Doe</td>
                  <td>Modern Sofa</td>
                  <td>$899</td>
                  <td><span class="badge bg-success">Delivered</span></td>
                </tr>
                <tr>
                  <td>#1235</td>
                  <td>Jane Smith</td>
                  <td>Dining Set</td>
                  <td>$1,299</td>
                  <td><span class="badge bg-warning">Processing</span></td>
                </tr>
                <tr>
                  <td>#1236</td>
                  <td>Mike Johnson</td>
                  <td>Office Chair</td>
                  <td>$299</td>
                  <td><span class="badge bg-info">Shipped</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Recent Reviews -->
        <div class="admin-card">
          <div class="admin-card-header">
            <h2 class="admin-card-title">Recent Reviews</h2>
            <a href="reviews.html" class="admin-btn admin-btn-primary"
              >View All</a
            >
          </div>
          <div class="table-responsive">
            <table class="admin-table">
              <thead>
                <tr>
                  <th>User</th>
                  <th>Product</th>
                  <th>Rating</th>
                  <th>Comment</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Sarah Johnson</td>
                  <td>Modern Sofa</td>
                  <td>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                  </td>
                  <td>Excellent quality and comfort!</td>
                  <td>June 8, 2025</td>
                </tr>
                <tr>
                  <td>Michael Chen</td>
                  <td>Office Chair</td>
                  <td>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="fas fa-star text-warning"></i>
                    <i class="far fa-star text-warning"></i>
                  </td>
                  <td>Great ergonomic design</td>
                  <td>June 7, 2025</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
