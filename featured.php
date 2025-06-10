<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Featured Products - Modern Furniture Store</title>

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
  <link rel="stylesheet" href="assets/css/featured.css" />
</head>

<body>
  <?php include 'includes/nav.php'; ?>

  <!-- Featured Header -->
  <header class="featured-header">
    <div class="container">
      <h1 class="featured-title">Featured Products</h1>
      <p class="featured-description">
        Discover our carefully curated collection of premium furniture pieces
        that blend style, comfort, and functionality.
      </p>
    </div>
  </header>

  <!-- Filter Section -->
  <section class="filter-section">
    <div class="container text-center">
      <button class="filter-btn active">All</button>
      <button class="filter-btn">Chairs</button>
      <button class="filter-btn">Sofas</button>
      <button class="filter-btn">Tables</button>
      <button class="filter-btn">Decor</button>
    </div>
  </section>

  <!-- Featured Products -->
  <section class="container my-5">
    <div class="row">
      <!-- Product 1 -->
      <div class="col-md-4">
        <div class="featured-product-card">
          <img
            src="assets/images/chair1.jpg"
            alt="Modern Chair"
            class="featured-product-image" />
          <h3 class="featured-product-title">Modern Swivel Chair</h3>
          <div class="featured-product-rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>(4.5/5)</span>
          </div>
          <div class="featured-product-price">Rs3000</div>
          <button class="btn-add-cart mt-3">Add to Cart</button>
        </div>
      </div>

      <!-- Product 2 -->
      <div class="col-md-4">
        <div class="featured-product-card">
          <img
            src="assets/images/sofa1.jpg"
            alt="Luxury Sofa"
            class="featured-product-image" />
          <h3 class="featured-product-title">Luxury Comfort Sofa</h3>
          <div class="featured-product-rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <span>(5/5)</span>
          </div>
          <div class="featured-product-price">Rs5000</div>
          <button class="btn-add-cart mt-3">Add to Cart</button>
        </div>
      </div>

      <!-- Product 3 -->
      <div class="col-md-4">
        <div class="featured-product-card">
          <img
            src="assets/images/table1.jpg"
            alt="Coffee Table"
            class="featured-product-image" />
          <h3 class="featured-product-title">Modern Coffee Table</h3>
          <div class="featured-product-rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
            <span>(4/5)</span>
          </div>
          <div class="featured-product-price">Rs2500</div>
          <button class="btn-add-cart mt-3">Add to Cart</button>
        </div>
      </div>
    </div>
  </section>

  <?php include 'includes/footer.php'; ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>