<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Modern Furniture Store</title>

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
    <link rel="stylesheet" href="assets/css/auth.css" />
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
              <a class="nav-link" href="featured.html">Featured</a>
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
          <div class="ms-auto">
            <a href="register.html" class="btn btn-outline-dark me-2"
              >Register</a
            >
            <a href="login.html" class="btn btn-dark">Login</a>
          </div>
        </div>
      </div>
    </nav>

    <!-- Login Form -->
    <div class="auth-container">
      <div class="auth-card">
        <div class="auth-header">
          <h2>Welcome Back</h2>
          <p>Please login to your account</p>
        </div>
        <form>
          <div class="form-group">
            <label class="form-label">Email Address</label>
            <input
              type="email"
              class="form-control"
              placeholder="Enter your email"
              required
            />
          </div>
          <div class="form-group">
            <label class="form-label">Password</label>
            <input
              type="password"
              class="form-control"
              placeholder="Enter your password"
              required
            />
          </div>
          <button type="submit" class="auth-btn">Login</button>

          <div class="auth-links">
            <p>Don't have an account? <a href="register.html">Register</a></p>
          </div>
        </form>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
