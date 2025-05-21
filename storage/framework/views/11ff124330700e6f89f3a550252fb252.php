<?php $__env->startSection('body'); ?>
<section class="hero-wrap hero-wrap-2" style="background-image: url(<?php echo e(asset('assets/img/bg-1.jpg')); ?>);"
    data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 text-center mb-5">
                <p class="breadcrumbs mb-0">
                    <span class="mr-2"><a href="<?php echo e(route('home')); ?>">Home <i class="fa fa-chevron-right"></i></a></span>
                    <span>Order History <i class="fa fa-chevron-right"></i></span>
                </p>
                <h2 class="mb-0 bread">My Orders</h2>
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="mb-0">Your Order History</h4>
                <span class="badge bg-info text-white p-2 rounded-pill"><?php echo e($orders->count()); ?> orders</span>
            </div>

            <?php if($orders->count()): ?>
            <div class="row g-4">
                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 mb-3 shadow">
                    <div class="card shadow-sm border-0">
                        <div class="card-body p-4">
                            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                                <div class="mb-3 mb-md-0">
                                    <h5 class="mb-1">Order #<?php echo e($order->id); ?></h5>
                                    <small class="text-muted">Placed on <?php echo e($order->created_at->format('d M Y')); ?></small>
                                </div>
                                <div class="d-flex flex-column flex-sm-row align-items-sm-end gap-3">
                                    <div class="text-end">
                                        <h4 class="mb-0 text-primary">$<?php echo e(number_format($order->total_price, 2)); ?></h4>
                                    </div>
                                    <div>
                                        <a href="<?php echo e(route('orders.show', $order->id)); ?>"
                                            class="btn btn-sm btn-outline-primary px-3 mx-2">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="mt-3">
                                <?php if($order->status === 'ready'): ?>
                                <p class="text-success mb-0"><i class="fas fa-store"></i> Picked up from store</p>
                                <?php elseif($order->status === 'delivered'): ?>
                                <p class="text-success mb-0"><i class="fas fa-check-circle"></i> Delivered to your
                                    address</p>
                                <?php elseif($order->status === 'pending'): ?>
                                <p class="text-warning mb-0"><i class="fas fa-hourglass-half"></i> The shop is
                                    processing your order</p>
                                <?php elseif($order->status === 'shipping'): ?>
                                <p class="text-info mb-0"><i class="fas fa-truck"></i> Out for delivery</p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="card-footer text-muted">
                            
                            <?php if($order->user_address_id): ?>
                            <?php if($order->userAddress->building && $order->userAddress->street &&
                            $order->userAddress->city && $order->userAddress->country): ?>
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
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php else: ?>
            <div class="card shadow-sm border-0">
                <div class="card-body text-center py-5">
                    <i class="fas fa-shopping-bag fa-3x text-muted mb-4"></i>
                    <h5 class="mb-3">No orders yet</h5>
                    <p class="text-muted mb-4">You haven't placed any orders yet. Start shopping to see your order
                        history here.</p>
                    <a href="<?php echo e(route('home')); ?>" class="btn btn-primary px-4">
                        Start Shopping
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\abbas\OneDrive\Desktop\ShopMain\shop\resources\views/site/orderHistory.blade.php ENDPATH**/ ?>