<?php
require_once 'includes/auth_check.php';
require_once '../config/connection.php';

// Fetch users from database
try {
  $stmt = $conn->prepare("SELECT user_id, username, email, is_admin, created_at FROM users ORDER BY created_at DESC");
  $stmt->execute();
  $users = $stmt->fetchAll();
} catch (PDOException $e) {
  $_SESSION['error'] = "Error fetching users: " . $e->getMessage();
  $users = []; // Initialize empty array to prevent foreach error
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Management - Modern Furniture Store</title>

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
        <h1 class="h3 m-0">User Management</h1>
        <button
          class="admin-btn admin-btn-primary"
          data-bs-toggle="modal"
          data-bs-target="#addUserModal">
          <i class="fas fa-user-plus"></i> Add New User
        </button>
      </header>

      <!-- User Filters -->
      <div class="admin-card mb-4">
        <div class="row g-3">
          <div class="col-md-3">
            <select class="admin-form-control">
              <option value="">Filter by Role</option>
              <option value="customer">Customer</option>
              <option value="admin">Admin</option>
            </select>
          </div>
          <div class="col-md-3">
            <select class="admin-form-control">
              <option value="">Filter by Status</option>
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
              <option value="blocked">Blocked</option>
            </select>
          </div>
          <div class="col-md-4">
            <input
              type="text"
              class="admin-form-control"
              placeholder="Search Users..." />
          </div>
          <div class="col-md-2">
            <button class="admin-btn admin-btn-primary w-100">
              Apply Filters
            </button>
          </div>
        </div>
      </div>

      <!-- Users Table -->
      <div class="admin-card">
        <?php if (isset($_SESSION['error'])): ?>
          <div class="alert alert-danger"><?php echo $_SESSION['error'];
                                          unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])): ?>
          <div class="alert alert-success"><?php echo $_SESSION['success'];
                                            unset($_SESSION['success']); ?></div>
        <?php endif; ?>

        <div class="table-responsive">
          <table class="admin-table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Joined Date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($users as $user): ?>
                <tr>
                  <td>#<?php echo str_pad($user['user_id'], 3, '0', STR_PAD_LEFT); ?></td>
                  <td><?php echo htmlspecialchars($user['username']); ?></td>
                  <td><?php echo htmlspecialchars($user['email']); ?></td>
                  <td><?php echo $user['is_admin'] ? 'Admin' : 'Customer'; ?></td>
                  <td><?php echo date('F j, Y', strtotime($user['created_at'])); ?></td>
                  <td>
                    <button
                      class="admin-btn admin-btn-warning btn-sm"
                      data-bs-toggle="modal"
                      data-bs-target="#editUserModal"
                      data-user-id="<?php echo $user['user_id']; ?>">
                      <i class="fas fa-edit"></i>
                    </button>
                    <?php if ($user['user_id'] !== $_SESSION['user_id']): ?>
                      <button
                        class="admin-btn admin-btn-danger btn-sm"
                        onclick="toggleUserStatus(<?php echo $user['user_id']; ?>)">
                        <i class="fas fa-ban"></i>
                      </button>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>

  <!-- Add User Modal -->
  <div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add New User</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="admin-form-group">
              <label class="admin-form-label">Full Name</label>
              <input type="text" class="admin-form-control" required />
            </div>
            <div class="admin-form-group">
              <label class="admin-form-label">Email</label>
              <input type="email" class="admin-form-control" required />
            </div>
            <div class="admin-form-group">
              <label class="admin-form-label">Password</label>
              <input type="password" class="admin-form-control" required />
            </div>
            <div class="admin-form-group">
              <label class="admin-form-label">Role</label>
              <select class="admin-form-control" required>
                <option value="customer">Customer</option>
                <option value="admin">Admin</option>
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
            Add User
          </button>
        </div>
      </div>
    </div>
  </div>

  <!-- Edit User Modal -->
  <div class="modal fade" id="editUserModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit User</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="admin-form-group">
              <label class="admin-form-label">Full Name</label>
              <input
                type="text"
                class="admin-form-control"
                value="John Doe"
                required />
            </div>
            <div class="admin-form-group">
              <label class="admin-form-label">Email</label>
              <input
                type="email"
                class="admin-form-control"
                value="john@example.com"
                required />
            </div>
            <div class="admin-form-group">
              <label class="admin-form-label">Role</label>
              <select class="admin-form-control" required>
                <option value="customer" selected>Customer</option>
                <option value="admin">Admin</option>
              </select>
            </div>
            <div class="admin-form-group">
              <label class="admin-form-label">Status</label>
              <select class="admin-form-control" required>
                <option value="active" selected>Active</option>
                <option value="inactive">Inactive</option>
                <option value="blocked">Blocked</option>
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

  <script>
    // Function to handle user status toggle
    function toggleUserStatus(userId) {
      if (confirm('Are you sure you want to change this user\'s status?')) {
        // Create form data
        const formData = new FormData();
        formData.append('action', 'toggleStatus');
        formData.append('user_id', userId);

        // Send request
        fetch('manage_user.php', {
            method: 'POST',
            body: formData
          })
          .then(response => response.json())
          .then(data => {
            if (data.status === 'success') {
              location.reload();
            } else {
              alert(data.message);
            }
          })
          .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while updating user status');
          });
      }
    }

    // Handle edit user modal
    const editUserModal = document.getElementById('editUserModal');
    if (editUserModal) {
      editUserModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;
        const userId = button.getAttribute('data-user-id');
        // You can fetch user details here and populate the modal form
      });
    }
  </script>
</body>

</html>