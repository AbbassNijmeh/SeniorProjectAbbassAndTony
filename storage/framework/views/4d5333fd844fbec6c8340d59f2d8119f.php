<?php if($recommendedProducts->isNotEmpty()): ?>
    <div class="recommendations">
        <h4>Recommended Products</h4>
        <div class="row">
            <?php $__currentLoopData = $recommendedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <img src="<?php echo e($product->image_url); ?>" class="card-img-top" alt="<?php echo e($product->name); ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo e($product->name); ?></h5>
                            <p class="card-text">$<?php echo e(number_format($product->price, 2)); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-info">
        No recommendations available yet. Check out our popular products:
        <?php $__currentLoopData = App\Models\Product::inRandomOrder()->limit(5)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(route('products.show', $product)); ?>"><?php echo e($product->name); ?></a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>
<?php /**PATH C:\Users\abbas\OneDrive\Desktop\ShopMain\shop\resources\views/components/recommendations.blade.php ENDPATH**/ ?>