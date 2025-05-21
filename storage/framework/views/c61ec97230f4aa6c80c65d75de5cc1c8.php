<?php $__env->startSection('body'); ?>
<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-3 rounded">
            <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.index')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('orders.index')); ?>">Orders</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order #<?php echo e($order->id); ?></li>
        </ol>
    </nav>

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white text-center py-3">
            <h4 class="mb-0"><i class="fas fa-receipt"></i> Order #<?php echo e($order->id); ?></h4>
        </div>

        <div class="card-body" id="printableArea">
            <div class="row g-3">
                <div class="col-12">
                    <!-- Order Details -->
                    <div class="row"><div class="col-6 col-md-4 fw-bold">Order ID:</div><div class="col-6 col-md-8"><?php echo e($order->id); ?></div></div>

                    <div class="row">
                        <div class="col-6 col-md-4 fw-bold">Status:</div>
                        <div class="col-6 col-md-8">
                            <?php if($order->status == 'pending'): ?>
                                <span class="badge bg-warning text-dark">Pending</span>
                            <?php elseif($order->status == 'processing'): ?>
                                <span class="badge bg-primary">Processing</span>
                            <?php elseif($order->status == 'shipped'): ?>
                                <span class="badge bg-secondary">Shipped</span>
                            <?php elseif($order->status == 'delivered'): ?>
                                <span class="badge bg-success">Delivered</span>
                            <?php elseif($order->status == 'cancelled'): ?>
                                <span class="badge bg-danger">Cancelled</span>
                            <?php else: ?>
                                <span class="badge bg-light text-dark"><?php echo e(ucfirst($order->status)); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6 col-md-4 fw-bold">Customer:</div>
                        <div class="col-6 col-md-8">
                            <?php if($order->user): ?>
                                <?php echo e($order->user->name); ?>

                            <?php else: ?>
                                <span class="text-muted">Guest</span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="row"><div class="col-6 col-md-4 fw-bold">Email:</div><div class="col-6 col-md-8"><?php echo e($order->user->email ?? 'N/A'); ?></div></div>
                    <div class="row"><div class="col-6 col-md-4 fw-bold">Total Price:</div><div class="col-6 col-md-8 text-success fw-bold">$<?php echo e(number_format($order->total_price, 2)); ?></div></div>
                    <div class="row"><div class="col-6 col-md-4 fw-bold">Payment Method:</div><div class="col-6 col-md-8"><?php echo e($order->payment->payment_method); ?></div></div>

                    <!-- Delivery Location Section -->
                    <?php if($order->user_address_id && $order->userAddress): ?>
                    <div class="row mt-3">
                        <div class="col-12">
                            <h5 class="fw-bold mb-3">Delivery Location</h5>

                            <?php if($order->userAddress->location_link): ?>
                                <p class="mb-3">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <a href="<?php echo e($order->userAddress->location_link); ?>" target="_blank" class="text-decoration-none">
                                        View on Map
                                    </a>
                                </p>
                            <?php elseif($order->userAddress->latitude && $order->userAddress->longtitude): ?>
                                <div class="mb-3">
                                    <p><i class="fas fa-map-pin"></i>
                                        Coordinates: <?php echo e($order->userAddress->latitude); ?>, <?php echo e($order->userAddress->longtitude); ?>

                                    </p>
                                    <div id="map" style="height: 400px; width: 100%; border-radius: 8px;"></div>
                                </div>
                            <?php else: ?>
                                <p class="mb-3"><i class="fas fa-home"></i>
                                    <?php echo e($order->userAddress->street); ?>,
                                    <?php echo e($order->userAddress->city); ?>,
                                    <?php echo e($order->userAddress->country); ?>

                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="row"><div class="col-6 col-md-4 fw-bold">Created At:</div><div class="col-6 col-md-8"><?php echo e($order->created_at->format('d M Y, H:i A')); ?></div></div>
                </div>
            </div>

            <!-- Order Items -->
            <h5 class="mt-4">Order Items</h5>
            <?php if($order->orderItems->isEmpty()): ?>
                <p class="text-muted">No items in this order</p>
            <?php else: ?>
                <div class="list-group">
                    <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <div class="fw-bold"><?php echo e($item->product->name); ?></div>
                            <div class="text-muted">Qty: <?php echo e($item->quantity); ?></div>
                            <div class="text-muted">$<?php echo e(number_format($item->price, 2)); ?> each</div>
                            <div class="text-success fw-bold">$<?php echo e(number_format($item->quantity * $item->price, 2)); ?></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Card Footer -->
        <div class="card-footer d-flex flex-column flex-md-row justify-content-between gap-3 p-3">
            <a href="<?php echo e(route('orders.index')); ?>" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Orders
            </a>
            <div class="d-flex flex-column flex-md-row gap-3">
                <button class="btn btn-warning" onclick="printVoucher()">
                    <i class="fas fa-print"></i> Print
                </button>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteOrderModal">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteOrderModal" tabindex="-1" aria-labelledby="deleteOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteOrderModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to permanently delete this order?</p>
                    <form id="deleteOrderForm" action="<?php echo e(route('orders.destroy', $order->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <div class="mb-3">
                            <label class="form-label">Order ID:</label>
                            <input type="text" class="form-control" value="<?php echo e($order->id); ?>" readonly>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="deleteOrderForm" class="btn btn-danger">Delete Order</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function printVoucher() {
        const printContents = document.getElementById('printableArea').innerHTML;
        const originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }

    // Initialize Leaflet map
    document.addEventListener('DOMContentLoaded', function() {
        <?php if($order->user_address_id && $order->userAddress && $order->userAddress->latitude && $order->userAddress->longtitude): ?>
            const map = L.map('map').setView([
                <?php echo e($order->userAddress->latitude); ?>,
                <?php echo e($order->userAddress->longtitude); ?>

            ], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.marker([
                <?php echo e($order->userAddress->latitude); ?>,
                <?php echo e($order->userAddress->longtitude); ?>

            ]).addTo(map)
              .bindPopup('Delivery Location<br>Order #<?php echo e($order->id); ?>')
              .openPopup();
        <?php endif; ?>
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\abbas\OneDrive\Desktop\ShopMain\shop\resources\views/admin/order/details.blade.php ENDPATH**/ ?>