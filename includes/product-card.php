<?php
// product-card.php - Reusable product card component
if (!isset($product)) {
    return;
}
?>
<div class="featured-product-card"> <?php if ($product['image_url']): ?>
        <img
            src="./<?php echo htmlspecialchars($product['image_url']); ?>"
            alt="<?php echo htmlspecialchars($product['name']); ?>"
            class="featured-product-image"
            onerror="this.onerror=null; this.src='./assets/img/products/placeholder.jpg';" />
    <?php else: ?>
        <div class="featured-product-image bg-secondary"></div>
    <?php endif; ?>

    <h3 class="featured-product-title"><?php echo htmlspecialchars($product['name']); ?></h3>
    <p class="featured-product-category"><?php echo htmlspecialchars($product['category_name']); ?></p>
    <div class="featured-product-description">
        <?php echo htmlspecialchars($product['description']); ?>
    </div>
    <div class="featured-product-price">$<?php echo number_format($product['price'], 2); ?></div>
    <button class="btn-add-cart mt-3" data-product-id="<?php echo $product['product_id']; ?>">
        <i class="fas fa-shopping-cart me-2"></i>Add to Cart
    </button>
</div>