<?php
require_once 'config/db.php';

// Get product ID from URL
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch product details with category
$sql = "SELECT p.*, c.name as category_name 
        FROM products p 
        LEFT JOIN categories c ON p.category_id = c.category_id 
        WHERE p.product_id = ?";
$product = fetchOne($sql, [$product_id]);

// If product not found, redirect to featured page
if (!$product) {
    header('Location: featured.php');
    exit;
}

// Fetch related products from same category
$sql = "SELECT p.*, c.name as category_name 
        FROM products p 
        LEFT JOIN categories c ON p.category_id = c.category_id 
        WHERE p.category_id = ? AND p.product_id != ? 
        LIMIT 4";
$related_products = fetchAll($sql, [$product['category_id'], $product_id]);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Modern Furniture Store</title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/img/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/img/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/colors.css">
    <link rel="stylesheet" href="assets/css/navigation.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/featured.css">
</head>

<body>
    <?php include 'includes/nav.php'; ?>

    <!-- Product Details Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Product Image -->
                <div class="col-md-6 mb-4">
                    <div class="product-image-container">
                        <?php if ($product['image_url']): ?>
                            <img src="./<?php echo htmlspecialchars($product['image_url']); ?>"
                                alt="<?php echo htmlspecialchars($product['name']); ?>"
                                class="img-fluid product-detail-image"
                                onerror="this.onerror=null; this.src='./assets/img/products/placeholder.jpg';">
                        <?php else: ?>
                            <div class="product-detail-image bg-secondary"></div>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Product Info -->
                <div class="col-md-6">
                    <h1 class="product-detail-title mb-3"><?php echo htmlspecialchars($product['name']); ?></h1>
                    <p class="product-detail-category text-muted mb-2">
                        Category: <?php echo htmlspecialchars($product['category_name']); ?>
                    </p>
                    <div class="product-detail-price h2 mb-4">
                        $<?php echo number_format($product['price'], 2); ?>
                    </div>
                    <div class="product-detail-description mb-4">
                        <?php echo nl2br(htmlspecialchars($product['description'])); ?>
                    </div>
                    <div class="product-detail-stock mb-4">
                        <strong>Stock Quantity:</strong> <?php echo $product['stock_quantity']; ?> units
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <div class="quantity-selector me-3">
                            <button class="btn btn-outline-secondary btn-sm" onclick="updateQuantity(-1)">-</button>
                            <input type="number" id="quantity" value="1" min="1" max="<?php echo $product['stock_quantity']; ?>"
                                class="form-control form-control-sm mx-2" style="width: 60px;">
                            <button class="btn btn-outline-secondary btn-sm" onclick="updateQuantity(1)">+</button>
                        </div>
                        <button class="btn btn-primary" onclick="addToCart(<?php echo $product['product_id']; ?>)">
                            <i class="fas fa-shopping-cart me-2"></i>Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products Section -->
    <?php if (!empty($related_products)): ?>
        <section class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-4">Related Products</h2>
                <div class="row">
                    <?php foreach ($related_products as $product): ?>
                        <div class="col-md-3 mb-4">
                            <?php include 'includes/product-card.php'; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php include 'includes/footer.php'; ?>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function updateQuantity(change) {
            const input = document.getElementById('quantity');
            const newValue = parseInt(input.value) + change;
            const maxStock = <?php echo $product['stock_quantity']; ?>;

            if (newValue >= 1 && newValue <= maxStock) {
                input.value = newValue;
            }
        }

        function addToCart(productId) {
            const quantity = document.getElementById('quantity').value;
            // TODO: Implement add to cart functionality
            alert('Added ' + quantity + ' item(s) to cart');
        }
    </script>
</body>

</html>