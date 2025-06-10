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
      href="./assets/img/favicon_io/apple-touch-icon.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="./assets/img/favicon_io/favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="./assets/img/favicon_io/favicon-16x16.png"
    />
    <link rel="manifest" href="/site.webmanifest" />

    <!-- Bootstrap 5 CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

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
    <link rel="stylesheet" href="assets/css/colors.css" />
    <link rel="stylesheet" href="assets/css/navigation.css" />
    <link rel="stylesheet" href="assets/css/footer.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/featured.css" />
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.html">Furniture</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="featured.html">Featured</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Review</a>
            </li>
          </ul>
          <form class="search-form d-flex">
            <input class="form-control" type="search" placeholder="Search" />
            <button class="btn" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </form>
          <div class="ms-3">
            <a href="cart.html" class="text-dark">
              <i class="fas fa-shopping-cart"></i>
            </a>
          </div>
        </div>
      </div>
    </nav>

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
              class="featured-product-image"
            />
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
              class="featured-product-image"
            />
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
              class="featured-product-image"
            />
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

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <h5 class="footer-heading">FURNITURE</h5>
            <p>
              "Discover stylish,affordable furniture and home decor to transform
              your space.Shop online 24/7 with secure checkout and fast
              delivery".
            </p>
          </div>
          <div class="col-md-3">
            <h5 class="footer-heading">PRODUCTS</h5>
            <ul class="footer-links">
              <li><a href="#">Chairs</a></li>
              <li><a href="#">Sofas</a></li>
              <li><a href="#">Home Decor</a></li>
              <li><a href="#">Best Sellers</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h5 class="footer-heading">USEFUL LINKS</h5>
            <ul class="footer-links">
              <li><a href="#">Shipping & Returns</a></li>
              <li><a href="#">Terms & Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">About Us</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <h5 class="footer-heading">CONTACT</h5>
            <ul class="footer-links">
              <li><i class="fas fa-map-marker-alt"></i> Kegalle,Sri Lanka</li>
              <li><i class="fas fa-envelope"></i> furniture@gmail.com</li>
              <li><i class="fas fa-phone"></i> + 94717323579</li>
              <li><i class="fas fa-print"></i> + 94728410781</li>
            </ul>
            <div class="social-links mt-3">
              <a href="#"><i class="fab fa-facebook"></i></a>
              <a href="#"><i class="fab fa-twitter"></i></a>
              <a href="#"><i class="fab fa-google"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
              <a href="#"><i class="fab fa-linkedin"></i></a>
              <a href="#"><i class="fab fa-github"></i></a>
            </div>
          </div>
        </div>
        <div class="text-center mt-4">
          <p>© 2024 Copyright: Furniture</p>
        </div>
      </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
