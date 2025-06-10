<?php
require_once dirname(__FILE__) . '/auth_handler.php';
?>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.php">Furniture</a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="featured.php">Featured</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="review.php">Review</a>
                </li>
            </ul>
            <form class="search-form d-flex">
                <input class="form-control" type="search" placeholder="Search" />
                <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <div class="d-flex align-items-center ms-3">
                <a href="cart.php" class="text-dark me-3">
                    <i class="fas fa-shopping-cart"></i>
                </a>
                <?php if (!isLoggedIn()): ?>
                    <a href="register.php" class="btn btn-outline-dark me-2">Register</a>
                    <a href="login.php" class="btn btn-dark">Login</a>
                <?php else: ?>
                    <div class="dropdown">
                        <button class="btn btn-outline-dark dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo htmlspecialchars($_SESSION['username']); ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <?php if (isAdmin()): ?>
                                <li><a class="dropdown-item" href="admin/index.php">Admin Dashboard</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            <?php endif; ?>
                            <li><a class="dropdown-item" href="#">My Orders</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form action="includes/auth_handler.php" method="POST" class="dropdown-item p-0">
                                    <input type="hidden" name="action" value="logout">
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>