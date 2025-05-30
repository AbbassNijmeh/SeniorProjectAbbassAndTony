<?php $__env->startSection('body'); ?>
<section class="hero-wrap hero-wrap-2" style="background-image: url(<?php echo e(asset('assets/img/bg-1.jpg')); ?>);"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <p class="breadcrumbs mb-0"><span class="mr-2"><a href="<?php echo e(route('home')); ?>">Home <i
                                class="fa fa-chevron-right"></i></a></span> <span><a
                            href="<?php echo e(route('products')); ?>">Products <i class="fa fa-chevron-right"></i></a></span>
                    <span>Products Single <i class="fa fa-chevron-right"></i></span>
                </p>
                <h2 class="mb-0 bread"><?php echo e($product->name); ?></h2>
            </div>
        </div>
    </div>
</section>
<?php if($allergicIngredients->count()): ?>
<!-- Hidden button to trigger modal -->
<button type="button" id="triggerAllergyModal" class="d-none" data-toggle="modal" data-target="#allergyWarningModal"></button>

<!-- Allergy Warning Modal -->
<div class="modal fade" id="allergyWarningModal" tabindex="-1" role="dialog" aria-labelledby="allergyWarningLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content border-danger">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="allergyWarningLabel">
          Allergy Warning
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-danger">
        <p><strong>This product contains ingredients you may be allergic to:</strong></p>
        <ul>
          <?php $__currentLoopData = $allergicIngredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($ingredient->name); ?></li>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Got it</button>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>

<?php if($allergicIngredients->count()): ?>
<script>
  window.addEventListener('DOMContentLoaded', function () {
    document.getElementById('triggerAllergyModal').click();
  });
</script>
<?php endif; ?>

<section class="ftco-section">
    <div class="container">

        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <img src="<?php echo e(asset($product->image)); ?>" class="img-fluid">
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3><?php echo e($product->name); ?></h3>
                <div class="rating d-flex">
                    <p class="text-left mr-4 mb-0">
                        <a href="#" class="mr-2"><?php echo e(number_format($product->rating, 2)); ?></a>

                        <?php
                        $rating = round($product->rating, 1);
                        $fullStars = floor($rating);
                        $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
                        $emptyStars = 5 - ($fullStars + $halfStar);
                        ?>


                        <?php for($i = 0; $i < $fullStars; $i++): ?> <a href="#"><span class="fa fa-star "></span></a>
                            <?php endfor; ?>

                            <?php if($halfStar): ?>
                            <a href="#"><span class="fa fa-star-half-o "></span></a>
                            <?php endif; ?>

                            <?php for($i = 0; $i < $emptyStars; $i++): ?> <a href="#"><span class="fa fa-star-o "></span></a>
                                <?php endfor; ?>
                    </p>

                    <p class="text-left mr-4">
                        <a href="#" class="mr-2" style="color: #000;"><?php echo e($product->reviews_count); ?> <span
                                style="color: #bbb;">Rating</span></a>
                    </p>
                    <p class="text-left">
                        <a href="#" class="mr-2" style="color: #000;"><?php echo e($total); ?> <span
                                style="color: #bbb;">Sold</span></a>
                    </p>
                </div>


                <p class="price">
                    <?php if($product->discount > 0 && \Carbon\Carbon::now()->between($product->discount_start,
                    $product->discount_end)): ?>
                    <span class="text-danger">
                        $<?php echo e(number_format($product->price - ($product->price * ($product->discount / 100)), 2)); ?>

                    </span>
                    <del class="text-muted">$<?php echo e(number_format($product->price, 2)); ?></del>
                    <?php else: ?>
                    <span>$<?php echo e(number_format($product->price, 2)); ?></span>
                    <?php endif; ?>
                </p>
                <p><?php echo e($product->description); ?></p>

                <div class="row mt-4">
                    <div class="input-group col-md-6 d-flex mb-3">
                        <span class="input-group-btn mr-2">
                            <button type="button" class="quantity-left-minus btn" data-type="minus" onclick="">
                                <i class="fa fa-minus"></i>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="quantity" class="quantity form-control input-number"
                            value="1" min="1" max="100">
                        <span class="input-group-btn ml-2">
                            <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                <i class="fa fa-plus"></i>
                            </button>
                        </span>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-12">
                        <p style="color: #000;"><?php echo e($product->stock_quantity); ?> piece available</p>
                    </div>
                </div>
                <p><a href="javascript:void(0)" class="btn btn-primary py-3 px-5 mr-2 add-to-cart-btn"
                        data-id="<?php echo e($product->id); ?>">Add to Cart</a>
                    <a href="" class="btn btn-primary py-3 px-5">Buy
                        now</a>
                </p>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-12 nav-link-wrap">
                <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill"
                        href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Description</a>

                    <a class="nav-link ftco-animate mr-lg-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2"
                        role="tab" aria-controls="v-pills-2" aria-selected="false">Manufacturer</a>

                    <a class="nav-link ftco-animate" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab"
                        aria-controls="v-pills-3" aria-selected="false">Reviews</a>

                </div>
            </div>
            <div class="col-md-12 tab-wrap">

                <div class="tab-content bg-light" id="v-pills-tabContent">

                    
                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
                        <div class="p-4">
                            <h3 class="mb-4"><?php echo e($product->name); ?></h3>

                            
                            <p class="price">
                                <?php if($product->discount > 0 && now()->between($product->discount_start,
                                $product->discount_end)): ?>
                                <span class="text-danger">$<?php echo e(number_format($product->price - ($product->price *
                                    $product->discount / 100), 2)); ?></span>
                                <small class="text-muted"><del>$<?php echo e(number_format($product->price, 2)); ?></del></small>
                                <?php else: ?>
                                <span>$<?php echo e(number_format($product->price, 2)); ?></span>
                                <?php endif; ?>
                            </p>

                            
                            <p><?php echo e($product->description); ?></p>

                            
                            <?php if($product->ingredients->isNotEmpty()): ?>
                            <h4 class="mt-4">Ingredients</h4>
                            <ul>
                                <?php $__currentLoopData = $product->ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($ingredient->name); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>

                            
                            <h4 class="mt-4">Product Information</h4>
                            <ul>
                                <li><strong>Barcode:</strong> <?php echo e($product->barcode ?? 'Not specified'); ?></li>
                                <li><strong>Expiration Date:</strong> <?php echo e($product->expiration_date ?
                                    $product->expiration_date : 'Not specified'); ?></li>
                            </ul>
                        </div>
                    </div>

                    
                    <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
                        <div class="p-4">
                            <h3 class="mb-4">Manufactured By: <?php echo e($product->brand ?? 'Unknown Brand'); ?></h3>

                            <ul>
                                <li><strong>Brand:</strong> <?php echo e($product->brand ?? 'Not specified'); ?></li>
                                <li><strong>Weight:</strong> <?php echo e($product->weight ?? 'Not specified'); ?></li>
                                <li><strong>Dimensions:</strong> <?php echo e($product->dimensions ?? 'Not specified'); ?></li>
                                <li><strong>Aisle:</strong> <?php echo e($product->aisle ?? 'Not specified'); ?></li>
                                <li><strong>Section:</strong> <?php echo e($product->section ?? 'Not specified'); ?></li>
                                <li><strong>Floor:</strong> <?php echo e($product->floor ?? 'Not specified'); ?></li>
                            </ul>
                        </div>
                    </div>

                    
                    
                    <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
                        <div class="row p-4">
                            <div class="col-md-7">
                                <h3 class="mb-4"><?php echo e($product->reviews_count); ?> Reviews</h3>

                                <?php $__empty_1 = true; $__currentLoopData = $product->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="review mb-4">
                                    <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                    <div class="desc">
                                        <h4>
                                            <span class="text-left"><?php echo e($review->user->name ?? 'Anonymous'); ?></span>
                                            <span class="text-right"><?php echo e($review->created_at->format('d M Y')); ?></span>
                                        </h4>
                                        <p class="star">
                                            <span>
                                                <?php for($i = 0; $i < 5; $i++): ?> <i
                                                    class="fa fa-star<?php echo e($i < $review->rating ? '' : '-o'); ?>"></i>
                                                    <?php endfor; ?>
                                            </span>
                                        </p>
                                        <p><?php echo e($review->comment); ?></p>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <p>No reviews yet. Be the first to review this product!</p>
                                <?php endif; ?>
                            </div>
                            <div class="col-md-5">
                                <div class="rating-wrap p-4 bg-white rounded shadow-sm">
                                    <h3 class="mb-4">Leave a Review</h3>

                                    <!-- Review Form -->
                                    <form id="review-form">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                        <input type="hidden" name="user_id" value="<?php echo e(auth()->id()); ?>">

                                        <div class="form-group">
                                            <label for="rating" class="font-weight-bold">Rating</label>
                                            <select name="rating" class="form-control" required>
                                                <option value="" disabled selected>Select Rating</option>
                                                <?php for($i = 1; $i <= 5; $i++): ?> <option value="<?php echo e($i); ?>"><?php echo e($i); ?> Star<?php echo e($i
                                                    > 1 ? 's' : ''); ?></option>
                                                    <?php endfor; ?>
                                            </select>
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="comment" class="font-weight-bold">Your Review</label>
                                            <textarea name="comment" class="form-control" rows="4"
                                                placeholder="Write your review here..." required></textarea>
                                        </div>

                                        <div class="form-group mt-4 text-right">
                                            <button type="button" class="btn btn-primary px-4 py-2"
                                                id="submit-review-btn">Submit Review</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script>


    $(document).ready(function() {
    $('#submit-review-btn').click(function(e) {
        e.preventDefault(); // Prevent default form submission

        var formData = $('#review-form').serialize(); // Get form data

        $.ajax({
            url: "<?php echo e(route('reviews.store', ['id' => $product->id])); ?>",
            method: "POST",
            data: formData,
            success: function(response) {
                if(response.success) {
                    showMessage('Review submitted successfully!', '#4CAF50'); // Green for success
                    // Optionally, reload the reviews or update the reviews count dynamically
                    $('#reviews-section').prepend(response.reviewHtml); // Optionally update reviews list dynamically
                } else {
                    showMessage('Failed to submit the review. Please try again.', '#F44336'); // Red for error
                }
            },
            error: function(xhr) {
                showMessage('Failed to submit the review. Please try again.', '#F44336'); // Red for error
                console.log('Error: ' + xhr.responseText);
            }
        });
    });

        $('.add-to-cart-btn').click(function(e) {
            e.preventDefault();
            var product_id = $(this).data('id');
            var quantity = $('#quantity').val();

            $.ajax({
                url: "<?php echo e(route('cart.add')); ?>",
                method: "POST",
                data: {
                    _token: "<?php echo e(csrf_token()); ?>",
                    product_id: product_id,
                    quantity: quantity
                },
                success: function(response) {
                    showMessage(response.success, '#4CAF50');
                    $('#cart-count').text(response.totalItems); // Update the cart count dynamically
                },
                error: function(xhr) {
                    console.log('Error: ' + xhr.responseText);
                    showMessage('Failed to add the product to the cart. Please try again.', '#F44336');
                }
            });
        });

        // Quantity Increment & Decrement
        $('.quantity-right-plus').click(function() {
            var quantity = parseInt($('#quantity').val());
            $('#quantity').val(quantity + 1);
        });

        $('.quantity-left-minus').click(function() {
            var quantity = parseInt($('#quantity').val());
            if (quantity > 1) {
                $('#quantity').val(quantity - 1);
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\abbas\OneDrive\Desktop\ShopMain\shop\resources\views/site/singleProduct.blade.php ENDPATH**/ ?>