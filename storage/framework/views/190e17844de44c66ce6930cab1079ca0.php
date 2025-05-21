<?php $__env->startSection('body'); ?>
<section class="hero-wrap hero-wrap-2" style="background-image: url(<?php echo e(asset('assets/img/bg-1.jpg')); ?>);"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <p class="breadcrumbs mb-0"><span class="mr-2"><a href="<?php echo e(route('home')); ?>">Home <i
                                class="fa fa-chevron-right"></i></a></span>
                    <a href="<?php echo e(route('products')); ?>"> <span> Products <i class="fa fa-chevron-right"></i></span></a>
                </p>
                <h2 class="mb-0 bread">Filtered Products</h2>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">

        <div class="row mb-4">
            <div class="col-md-12 d-flex justify-content-between align-items-center">
                <h4 class="product-select">Filtered Products</h4>
            </div>
        </div>
        
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4 p-3">
                    <form method="GET" action="<?php echo e(route('filtered.products')); ?>" class="row g-3 align-items-center">
                        <!-- Search Input -->
                        <div class="col-md-3 mb-2">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Product name..."
                                    value="<?php echo e(request('search')); ?>">
                                <span class="input-group-text">
                                    <i class="fa fa-search"></i>
                                </span>
                            </div>
                        </div>

                        <!-- Category Dropdown -->
                        <div class="col-md-2 mb-2">
                            <select name="category" class="form-select select2">
                                <option value="">All Categories</option>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>" <?php echo e(request('category')==$category->id ? 'selected' :
                                    ''); ?>>
                                    <?php echo e($category->name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <!-- Price Range -->
                        <div class="col-md-3 mb-2">
                            <div class="input-group">
                                <input type="number" name="min_price" class="form-control" placeholder="Min"
                                    value="<?php echo e(request('min_price')); ?>">
                                <span class="input-group-text">-</span>
                                <input type="number" name="max_price" class="form-control" placeholder="Max"
                                    value="<?php echo e(request('max_price')); ?>">
                            </div>
                        </div>

                        <!-- Discount Dropdown -->
                        <div class="col-md-2 mb-2">
                            <select name="discount" class="form-select select2">
                                <option value="">Any</option>
                                <option value="1" <?php echo e(request('discount')==='1' ? 'selected' : ''); ?>>On Discount</option>
                                <option value="0" <?php echo e(request('discount')==='0' ? 'selected' : ''); ?>>No Discount</option>
                            </select>
                        </div>

                        <!-- Buttons -->
                        <div class="col-md-2 d-flex gap-2 mb-2">
                            <button type="submit" class="btn btn-primary flex-grow-1">
                                <i class="fa fa-check me-1"></i> Apply
                            </button>
                            <a href="<?php echo e(route('filtered.products')); ?>" class="btn btn-outline-secondary">
                                <i class="fa fa-sync-alt"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $filteredProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-3 d-flex">
                <div class="product ftco-animate">
                    <div class="img d-flex align-items-center justify-content-center"
                        style="background-image: url('<?php echo e(asset($product->image)); ?>');">
                        <div class="desc">
                            <p class="meta-prod d-flex">
                                <a href="javascript:void(0);"
                                    class="add-to-cart-btn d-flex align-items-center justify-content-center"
                                    data-id="<?php echo e($product->id); ?>">
                                    <span class="flaticon-shopping-bag"></span></a>
                                <a href="javascript:void(0)" onclick="addToWsihList(<?php echo e($product->id); ?>)"
                                    class="d-flex align-items-center justify-content-center"
                                    data-product-id="<?php echo e($product->id); ?>">
                                    <span class="flaticon-heart"></span></a>
                                <a href="<?php echo e(route('product.show', $product->id)); ?>"
                                    class="d-flex align-items-center justify-content-center"><span
                                        class="flaticon-visibility"></span></a>
                            </p>
                        </div>
                    </div>
                    <div class="text text-center">
                        <?php if(
                        $product->discount > 0 &&
                        $product->discount_start !== null &&
                        \Carbon\Carbon::now()->greaterThanOrEqualTo($product->discount_start) &&
                        ($product->discount_end === null ||
                        \Carbon\Carbon::now()->lessThanOrEqualTo($product->discount_end))
                        ): ?>

                        <span class="sale"><?php echo e($product->discount); ?>% Off</span>
                        <p class="mb-0">
                            <span class="price price-sale">$<?php echo e(number_format($product->price, 2)); ?></span>
                            <span class="price">$<?php echo e(number_format($product->price * (1 - $product->discount /
                                100), 2)); ?></span>
                        </p>
                        <?php else: ?>
                        <p class="mb-0">
                            <span class="price">$<?php echo e(number_format($product->price, 2)); ?></span>
                        </p>
                        <?php endif; ?>
                        <span class="category"><?php echo e($product->category->name ?? 'No Category'); ?></span>
                        <h2><?php echo e($product->name); ?></h2>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

            <div class="col-12 text-center">
                <p>No products found matching your filters.</p>
            </div>
            <?php endif; ?>
        </div>

        
        

        <div class="block-27">
            <ul>
                <?php if($filteredProducts->onFirstPage()): ?>
                <li class="disabled"><span>&lt;</span></li>
                <?php else: ?>
                <li><a href="<?php echo e($filteredProducts->previousPageUrl()); ?>">&lt;</a></li>
                <?php endif; ?>
                <?php $__currentLoopData = $filteredProducts->getUrlRange(1, $filteredProducts->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($page == $filteredProducts->currentPage()): ?>
                <li class="active"><span><?php echo e($page); ?></span></li>
                <?php else: ?>
                <li><a href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($filteredProducts->hasMorePages()): ?>
                <li><a href="<?php echo e($filteredProducts->nextPageUrl()); ?>">&gt;</a></li>
                <?php else: ?>
                <li class="disabled"><span>&gt;</span></li>
                <?php endif; ?>
            </ul>
        </div>

        
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script>
    $(document).ready(function() {
        $('.select2').select2({
    width: '100%',

});
   });
    // Add to Cart button click event
  $('.add-to-cart-btn').click(function(e) {
        e.preventDefault();

        var product_id = $(this).data('id');
        var quantity = 1; // Quantity is always 1 for this setup

        // AJAX request to add the product to the cart
        $.ajax({
            url: "<?php echo e(route('cart.add')); ?>", // Route to the cart add method
            method: "POST",
            data: {
                _token: "<?php echo e(csrf_token()); ?>", // CSRF token for security
                product_id: product_id,
                quantity: quantity // Always send quantity as 1
            },
            success: function(response) {
                if(response.success) {
                    // Update the cart count in the navbar
                    $('#cart-count').text(response.totalItems);

                    showMessage('Product added to cart successfully!', '#4CAF50'); // Green for success
                } else {
                    showMessage('Failed to add the product to the cart. Please try again.', '#F44336'); // Red for error
                }
            },
            error: function(xhr) {
                // Handle error
                showMessage('Oops! Something went wrong. Please try again later.', '#F44336'); // Red for error
            }
        });
    });
    function addToWsihList(id) {
    $.ajax({
        url: "<?php echo e(route('wishlist.store')); ?>",
        method: 'POST',
        data: {
            _token: "<?php echo e(csrf_token()); ?>",
            id: id
        },
        success: function(response) {
            let color = '#4CAF50'; // Default color for success
            let message = response.message;

            // Change color based on response type
            if (response.type === 'cart') {
                color = '#2196F3'; // Blue for cart
                message = 'Product successfully added to your cart!';
            } else if (response.type === 'info') {
                color = '#FFC107'; // Amber for already in wishlist
                message = 'Product is already in your wishlist.';
            }

            showMessage(message, color);  // Display a success message
        },
        error: function(xhr) {
            console.log('Error: ' + xhr.responseText);
            showMessage('Oops! Something went wrong. Please try again later.', '#F44336'); // Red for error
        }
    });
}
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\abbas\OneDrive\Desktop\ShopMain\shop\resources\views/site/filteredProducts.blade.php ENDPATH**/ ?>