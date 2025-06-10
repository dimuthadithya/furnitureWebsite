<?php
require_once 'includes/auth_handler.php';

// Redirect if not logged in
if (!isLoggedIn()) {
    header('Location: login.php');
    exit();
}

// Get user's orders
require_once 'config/connection.php';
$userId = $_SESSION['user_id'];

try {
    // Fetch orders with their items and products
    $stmt = $conn->prepare("
        SELECT 
            o.order_id,
            o.total_amount,
            o.status,
            o.created_at,
            GROUP_CONCAT(p.name) as products
        FROM orders o
        LEFT JOIN order_items oi ON o.order_id = oi.order_id
        LEFT JOIN products p ON oi.product_id = p.product_id
        WHERE o.user_id = ?
        GROUP BY o.order_id
        ORDER BY o.created_at DESC
    ");
    $stmt->execute([$userId]);
    $orders = $stmt->fetchAll();
} catch (PDOException $e) {
    $error = "Error fetching orders: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Modern Furniture Store</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="assets/img/favicon_io/site.webmanifest">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/colors.css">
    <link rel="stylesheet" href="assets/css/navigation.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/styles.css">

    <style>
        .profile-section {
            padding: 50px 0;
            background-color: var(--light-bg);
        }

        .profile-card {
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .profile-header {
            margin-bottom: 30px;
            border-bottom: 2px solid var(--light-bg);
            padding-bottom: 20px;
        }

        .order-card {
            background: #fff;
            border: 1px solid #eee;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.2s;
        }

        .order-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .order-status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        .status-pending {
            background-color: #ffeeba;
            color: #856404;
        }

        .status-completed {
            background-color: #d4edda;
            color: #155724;
        }

        .status-cancelled {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>

<body>
    <?php include 'includes/nav.php'; ?>

    <div class="profile-section">
        <div class="container">
            <div class="profile-card">
                <div class="profile-header">
                    <h2><i class="fas fa-user-circle me-2"></i>My Profile</h2>
                    <p class="text-muted">Welcome back, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-card">
                            <h4>Account Details</h4>
                            <hr>
                            <p><strong>Username:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
                            <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
                            <button class="btn btn-outline-dark mt-3" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                                <i class="fas fa-edit me-2"></i>Edit Profile
                            </button>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <h4>Order History</h4>
                        <hr>
                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php else: ?>
                            <?php if (empty($orders)): ?>
                                <div class="text-center py-5">
                                    <i class="fas fa-shopping-bag fa-3x mb-3 text-muted"></i>
                                    <p class="text-muted">You haven't placed any orders yet.</p>
                                    <a href="featured.php" class="btn btn-dark">Start Shopping</a>
                                </div>
                            <?php else: ?>
                                <?php foreach ($orders as $order): ?>
                                    <div class="order-card">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5 class="mb-0">Order #<?php echo $order['order_id']; ?></h5>
                                            <span class="order-status status-<?php echo strtolower($order['status']); ?>">
                                                <?php echo ucfirst($order['status']); ?>
                                            </span>
                                        </div>
                                        <p class="text-muted mb-2">
                                            <i class="far fa-calendar-alt me-2"></i>
                                            <?php echo date('F j, Y', strtotime($order['created_at'])); ?>
                                        </p>
                                        <p class="mb-2"><strong>Products:</strong> <?php echo $order['products']; ?></p>
                                        <p class="mb-0"><strong>Total:</strong> Rs<?php echo number_format($order['total_amount'], 2); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="includes/update_profile.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username"
                                value="<?php echo htmlspecialchars($_SESSION['username']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email"
                                value="<?php echo htmlspecialchars($_SESSION['email']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">New Password</label>
                            <input type="password" class="form-control" name="new_password"
                                placeholder="Leave blank to keep current password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Current Password</label>
                            <input type="password" class="form-control" name="current_password"
                                placeholder="Enter current password to confirm changes" required>
                        </div>
                        <button type="submit" class="btn btn-dark w-100">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>