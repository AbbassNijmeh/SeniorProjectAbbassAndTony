<?php $__env->startSection('body'); ?>
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <ol class="breadcrumb">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.index')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Orders</li>
    </ol>
</nav>


<div class="container-fluid">
    <table id="example" class="display responsive border text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Customer Phone</th>
                <th>Status</th>
                <th>Total Price</th>
                <th>Created At</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-center <?php if($order->status == 'pending'): ?>
                table-danger
            <?php endif; ?>">
                <td><?php echo e($order->id); ?></td>
                <td><?php echo e($order->user->name); ?></td>
                <td><?php echo e($order->user->phone); ?></td>
                <td>
                    <?php if($order->status == 'ready'): ?>
                    Ready (No delivery required)
                    <?php elseif($order->status == 'pending'): ?>
                    pending -
                    <button class="btn btn-sm btn-primary approve-delivery" data-toggle="modal"
                        data-target="#deliveryModal-<?php echo e($order->id); ?>">
                        Choose Delivery Guy
                    </button> <?php elseif($order->status == 'delivered'): ?>
                    Delivered
                    <?php else: ?>
                    <?php echo e($order->status); ?>

                    <!-- Fallback for any other status -->
                    <?php endif; ?>

                </td>
                <td><?php echo e($order->total_price); ?></td>
                <td><?php echo e($order->created_at->format('d M Y')); ?></td>
                <td>
                    <div class="btn btn-primary "><a class="text-light"
                            href="<?php echo e(route('admin.orders.show', $order->id)); ?>">View</a></div>
                </td>
            </tr>

            <!-- Delivery Modal -->
            <div class="modal fade" id="deliveryModal-<?php echo e($order->id); ?>" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Assign Delivery for Order #<?php echo e($order->id); ?></h5>
                            <button type="button" class="btn-close" data-dismiss="modal">&times;</button>
                        </div>
                        <form action="<?php echo e(route('admin.orders.sendToDelivery')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="order_id" value="<?php echo e($order->id); ?>">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Select Delivery Agent</label>
                                    <select class="form-select" name="delivery_guy_id" required>
                                        <option value="">Choose...</option>
                                        <?php $__currentLoopData = $deliveryUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $delivery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($delivery->id); ?>"><?php echo e($delivery->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Assign Delivery</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Customer Phone</th>
                <th>Status</th>
                <th>Total Price</th>
                <th>Created At</th>
                <th>&nbsp;</th>
            </tr>
        </tfoot>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script>
    new DataTable('#example');
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\abbas\OneDrive\Desktop\ShopMain\shop\resources\views/admin/order/index.blade.php ENDPATH**/ ?>