<?php $__env->startSection('body'); ?>
<section class="hero-wrap hero-wrap-2" style="background-image: url(<?php echo e(asset('assets/img/bg-1.jpg')); ?>);"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 text-center mb-5">
                <p class="breadcrumbs mb-0">
                    <span class="mr-2"><a href="<?php echo e(route('home')); ?>">Home <i class="fa fa-chevron-right"></i></a></span>
                    <span>Order Details <i class="fa fa-chevron-right"></i></span>
                </p>
                <h2 class="mb-0 bread">Order #<?php echo e($order->id); ?></h2>
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <h4 class="card-title mb-3">Order Information</h4>
                    <p><strong>Order ID:</strong> <?php echo e($order->id); ?></p>
                    <p><strong>Date:</strong> <?php echo e($order->created_at->format('d M Y')); ?></p>
                    <p><strong>Total Price:</strong> $<?php echo e(number_format($order->total_price, 2)); ?></p>

                </div>
                <div class="card-footer">
                     
                            <?php if($order->user_address_id): ?>
                            <?php if(
                            $order->userAddress->building &&
                            $order->userAddress->street &&
                            $order->userAddress->city &&
                            $order->userAddress->country
                            ): ?>
                            <p class="mb-0">
                                <i class="fas fa-map-marker-alt"></i>
                                <?php echo e($order->userAddress->country); ?>,
                                <?php echo e($order->userAddress->city); ?>,
                                <?php echo e($order->userAddress->street); ?>,
                                <?php echo e($order->userAddress->building); ?>

                            </p>
                            <?php elseif($order->userAddress->location_link): ?>
                            <p class="mb-0">
                                <i class="fas fa-map-marker-alt"></i>
                                <a href="<?php echo e($order->userAddress->location_link); ?>" target="_blank"
                                    class="text-decoration-none">
                                    View on Map
                                </a>
                            </p>
                            <?php elseif($order->userAddress->latitude && $order->userAddress->longtitude): ?>
                            <p class="mb-0">
                                <i class="fas fa-map-marker-alt"></i>
                                Coordinates: <?php echo e($order->userAddress->latitude); ?>, <?php echo e($order->userAddress->longtitude); ?>

                            </p>
                            <?php endif; ?>
                            <?php else: ?>
                            <p class="mb-0"><i class="fas fa-home"></i> No address provided</p>
                            <?php endif; ?>
                </div>
            </div>

            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-4">Order Items</h4>
                    <ul class="list-group list-group-flush">
                        <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="list-group-item">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                                <div>
                                    <strong>Product:</strong> <?php echo e($item->product->name); ?><br>
                                    <strong>Qty:</strong> <?php echo e($item->quantity); ?><br>
                                    <strong>Price:</strong> $<?php echo e(number_format($item->price, 2)); ?>

                                </div>
                                <div class="mt-3 mt-md-0 text-md-right">
                                    <strong>Subtotal:</strong><br>
                                    $<?php echo e(number_format($item->quantity * $item->price, 2)); ?>

                                </div>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>

            <div class="mt-4 text-center">
                <a href="<?php echo e(route('user.orderHistory')); ?>" class="btn btn-outline-secondary">← Back to Orders</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\abbas\OneDrive\Desktop\ShopMain\shop\resources\views/site/orderDetail.blade.php ENDPATH**/ ?>