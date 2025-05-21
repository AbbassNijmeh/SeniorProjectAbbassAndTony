<?php $__env->startSection('body'); ?>
<section class="hero-wrap hero-wrap-2" style="background-image: url(<?php echo e(asset('assets/img/bg-1.jpg')); ?>);"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <p class="breadcrumbs mb-0">
                    <span class="mr-2"><a href="<?php echo e(route('home')); ?>">Home <i class="fa fa-chevron-right"></i></a></span>
                    <span>Wishlist <i class="fa fa-chevron-right"></i></span>
                </p>
                <h2 class="mb-0 bread">My Wishlist</h2>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="table-wrap">
                <table class="table">
                    <thead class="thead-primary">
                        <tr>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>&nbsp;</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $wishlistItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <?php $product = $item->product; ?>
                            <tr class="alert" role="alert">
                                <td>
                                    <label class="checkbox-wrap checkbox-primary">
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </td>
                                <td>
                                    <div class="img" style="background-image: url(<?php echo e(asset('storage/' . $product->image)); ?>);"></div>
                                </td>
                                <td>
                                    <div class="email">
                                        <span><?php echo e($product->name); ?></span>
                                        <span><?php echo e($product->description); ?></span>
                                    </div>
                                </td>
                                <td>$<?php echo e(number_format($product->price, 2)); ?></td>
                                <td>
                                    <form action="<?php echo e(route('wishlist.moveToCart', $item->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <button class="btn btn-sm btn-success">Add to Cart</button>
                                    </form>
                                </td>
                                <td>
                                    <button type="button" class="close remove-wishlist-btn" data-id="<?php echo e($item->id); ?>" data-toggle="modal" data-target="#deleteModal">
                                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="text-center">Your wishlist is empty.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="deleteForm" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Removal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to remove this item from your wishlist?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Remove</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForm = document.getElementById('deleteForm');
        const removeButtons = document.querySelectorAll('.remove-wishlist-btn');

        removeButtons.forEach(button => {
            button.addEventListener('click', function () {
                const itemId = this.getAttribute('data-id');
                deleteForm.action = `/wishlist/${itemId}/remove`;
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\abbas\OneDrive\Desktop\ShopMain\shop\resources\views/site/wishlist.blade.php ENDPATH**/ ?>