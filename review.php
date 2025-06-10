<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reviews - Modern Furniture Store</title>
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
    <link rel="stylesheet" href="assets/css/review.css" />
    <link rel="stylesheet" href="assets/css/admin/admin.css" />
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
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="review.html">Review</a>
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

    <!-- Review Section -->
    <section class="review-container">
      <div class="container">
        <div class="review-header">
          <h2>Customer Reviews</h2>
          <p>
            Read what our customers have to say about their experience with our
            products and services.
          </p>
        </div>

        <!-- Write Review Section -->
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="write-review-card">
              <h3>Write a Review</h3>
              <form>
                <div class="rating-select text-center">
                  <input type="radio" name="rating" id="star5" value="5" />
                  <label for="star5"><i class="fas fa-star"></i></label>
                  <input type="radio" name="rating" id="star4" value="4" />
                  <label for="star4"><i class="fas fa-star"></i></label>
                  <input type="radio" name="rating" id="star3" value="3" />
                  <label for="star3"><i class="fas fa-star"></i></label>
                  <input type="radio" name="rating" id="star2" value="2" />
                  <label for="star2"><i class="fas fa-star"></i></label>
                  <input type="radio" name="rating" id="star1" value="1" />
                  <label for="star1"><i class="fas fa-star"></i></label>
                </div>
                <div class="form-group">
                  <label class="form-label">Your Review</label>
                  <textarea
                    class="form-control"
                    rows="4"
                    placeholder="Share your experience with us..."
                  ></textarea>
                </div>
                <div class="text-center">
                  <button type="submit" class="review-btn">
                    Submit Review
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!-- Reviews List -->
        <div class="row">
          <!-- Review 1 -->
          <div class="col-lg-6">
            <div class="review-card">
              <div class="review-user">
                <div class="review-user-info">
                  <h4>Sarah Johnson</h4>
                  <p>Verified Buyer</p>
                </div>
              </div>
              <div class="review-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <div class="review-text">
                <p>
                  The modern sofa I purchased exceeded my expectations. The
                  quality is outstanding, and it perfectly fits my living room.
                  The delivery was quick and the assembly was straightforward.
                  Highly recommend!
                </p>
              </div>
              <div class="review-date">2 weeks ago</div>
            </div>
          </div>

          <!-- Review 2 -->
          <div class="col-lg-6">
            <div class="review-card">
              <div class="review-user">
                <div class="review-user-info">
                  <h4>Michael Chen</h4>
                  <p>Verified Buyer</p>
                </div>
              </div>
              <div class="review-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
              </div>
              <p class="review-text">
                "Excellent quality furniture! The modern chair I purchased is
                not only stylish but also very comfortable. The delivery was
                prompt and the customer service was exceptional."
              </p>
              <p class="review-date">June 8, 2025</p>
            </div>
          </div>

          <!-- Review 2 -->
          <div class="col-lg-6">
            <div class="review-card">
              <div class="review-user">
                <img
                  src="assets/images/user2.jpg"
                  alt="User"
                  class="review-avatar"
                />
                <div class="review-user-info">
                  <h4>Sarah Johnson</h4>
                  <p>Verified Buyer</p>
                </div>
              </div>
              <div class="review-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
              </div>
              <p class="review-text">
                "The sofa set I ordered is beautiful and exactly as pictured.
                Assembly was easy and the quality is outstanding. Would
                definitely recommend!"
              </p>
              <p class="review-date">June 5, 2025</p>
            </div>
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
