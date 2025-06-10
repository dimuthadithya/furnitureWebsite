<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shopping Cart - Modern Furniture Store</title>

  <!-- Favicon -->
  <link
    rel="apple-touch-icon"
    sizes="180x180"
    href="./assets/img/favicon_io/apple-touch-icon.png" />
  <link
    rel="icon"
    type="image/png"
    sizes="32x32"
    href="./assets/img/favicon_io/favicon-32x32.png" />
  <link
    rel="icon"
    type="image/png"
    sizes="16x16"
    href="./assets/img/favicon_io/favicon-16x16.png" />
  <link rel="manifest" href="/site.webmanifest" />

  <!-- Bootstrap 5 CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    rel="stylesheet" />

  <!-- Font Awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/css/colors.css" />
  <link rel="stylesheet" href="assets/css/navigation.css" />
  <link rel="stylesheet" href="assets/css/footer.css" />
  <link rel="stylesheet" href="assets/css/styles.css" />
  <link rel="stylesheet" href="assets/css/cart.css" />
</head>

<body>
  <?php include 'includes/nav.php'; ?>

  <!-- Cart Section -->
  <section class="cart-page">
    <div class="container">
      <h1 class="cart-title">Shopping Cart</h1>

      <div class="row">
        <div class="col-lg-8">
          <!-- Cart Items -->
          <div class="cart-item">
            <img
              src="assets/images/chair1.jpg"
              alt="Modern Chair"
              class="cart-item-image" />
            <div class="cart-item-details">
              <h3 class="cart-item-title">Modern Swivel Chair</h3>
              <p class="cart-item-price">Rs3000</p>
              <div class="quantity-control">
                <button class="quantity-btn">-</button>
                <input
                  type="number"
                  class="quantity-input"
                  value="1"
                  min="1" />
                <button class="quantity-btn">+</button>
              </div>
            </div>
            <button class="remove-item">
              <i class="fas fa-trash"></i>
            </button>
          </div>

          <div class="cart-item">
            <img
              src="assets/images/table1.jpg"
              alt="Coffee Table"
              class="cart-item-image" />
            <div class="cart-item-details">
              <h3 class="cart-item-title">Modern Coffee Table</h3>
              <p class="cart-item-price">Rs2500</p>
              <div class="quantity-control">
                <button class="quantity-btn">-</button>
                <input
                  type="number"
                  class="quantity-input"
                  value="1"
                  min="1" />
                <button class="quantity-btn">+</button>
              </div>
            </div>
            <button class="remove-item">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        </div>

        <!-- Cart Summary -->
        <div class="col-lg-4">
          <div class="cart-summary">
            <h2 class="summary-title">Order Summary</h2>
            <div class="summary-item">
              <span>Subtotal</span>
              <span>Rs5500</span>
            </div>
            <div class="summary-item">
              <span>Shipping</span>
              <span>Rs500</span>
            </div>
            <div class="summary-item summary-total">
              <span>Total</span>
              <span>Rs6000</span>
            </div>
            <button class="checkout-btn">Proceed to Checkout</button>
          </div>
        </div>
      </div>

      <!-- Empty Cart State (hidden by default) -->
      <div class="empty-cart" style="display: none">
        <i class="fas fa-shopping-cart"></i>
        <h2>Your cart is empty</h2>
        <p>Looks like you haven't added anything to your cart yet</p>
        <a href="featured.html" class="continue-shopping">Continue Shopping</a>
      </div>
    </div>
  </section>

  <?php include 'includes/footer.php'; ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>