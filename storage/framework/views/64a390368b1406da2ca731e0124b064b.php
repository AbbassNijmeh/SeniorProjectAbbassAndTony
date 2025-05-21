<?php $__env->startSection('body'); ?>
<nav class="breadcrumb-container" aria-label="breadcrumb">
    <ol class="breadcrumb"><button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.index')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Payments</li>
    </ol>
</nav>

<div class="container-fluid">


    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Payment Transactions</h5>
        </div>
        <div class="card-body">
            <table id="paymentTable" class="table table-striped table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Order ID</th>
                        <th>User Name</th>
                        <th>Payment Method</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($payment->id); ?></td>
                        <td>
                            <?php if($payment->order): ?>
                                <a href="<?php echo e(route('orders.show', $payment->order->id)); ?>" class="text-decoration-none">
                                    <?php echo e($payment->order->id); ?>

                                </a>
                            <?php else: ?>
                                <span>No Order</span>
                            <?php endif; ?>
                        </td>

                        <td><a href="<?php echo e(route('users.show', $payment->user->id)); ?>" class="text-decoration-none"> <?php echo e($payment->user->name); ?></a></td>
                        <td><?php echo e(ucfirst($payment->payment_method)); ?></td>
                        <td>$<?php echo e(number_format($payment->total_amount, 2)); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Order ID</th>
                        <th>User Name</th>
                        <th>Payment Method</th>
                        <th>Total Amount</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
    $(document).ready(function () {
        new DataTable('#paymentTable');

        $('#paymentTable').DataTable({
            responsive: true,
            "order": [[0, "desc"]],
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\abbas\OneDrive\Desktop\ShopMain\shop\resources\views/admin/payment/index.blade.php ENDPATH**/ ?>