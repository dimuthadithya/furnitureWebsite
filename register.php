<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - Modern Furniture Store</title>

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
  <link rel="stylesheet" href="assets/css/auth.css" />
</head>

<body>
  <?php include 'includes/nav.php'; ?>

  <!-- Register Form -->
  <div class="auth-container">
    <div class="auth-card">
      <div class="auth-header">
        <h2>Create Account</h2>
        <p>Join us to start shopping</p>
      </div>
      <form>
        <div class="row g-3">
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">First Name</label>
              <input
                type="text"
                class="form-control"
                placeholder="Enter first name"
                required />
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="form-label">Last Name</label>
              <input
                type="text"
                class="form-control"
                placeholder="Enter last name"
                required />
            </div>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Email Address</label>
          <input
            type="email"
            class="form-control"
            placeholder="Enter your email"
            required />
        </div>

        <div class="form-group">
          <label class="form-label">Password</label>
          <input
            type="password"
            class="form-control"
            placeholder="Enter your password"
            required />
        </div>

        <div class="form-group">
          <label class="form-label">Confirm Password</label>
          <input
            type="password"
            class="form-control"
            placeholder="Confirm your password"
            required />
        </div>

        <div class="terms-check">
          <div class="form-check">
            <input
              type="checkbox"
              class="form-check-input"
              id="terms"
              required />
            <label class="form-check-label" for="terms">
              I agree to the <a href="#">Terms of Service</a> and
              <a href="#">Privacy Policy</a>
            </label>
          </div>
        </div>

        <button type="submit" class="auth-btn">Create Account</button>

        <div class="auth-links">
          <p>Already have an account? <a href="login.html">Login</a></p>
        </div>
      </form>
    </div>
  </div>

  <?php include 'includes/footer.php'; ?>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>