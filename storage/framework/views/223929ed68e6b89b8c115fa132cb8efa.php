<?php $__env->startSection('body'); ?>
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <ol class="breadcrumb">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.index')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('users.index')); ?>">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?php echo e($user->name); ?></li>
    </ol>
</nav>

<div class="container-fluid">
    <div class="card p-4 shadow-sm">
        <!-- User Information -->
        <div class="row mb-4">
            <div class="col-md-6">
                <h4 class="mb-3"><?php echo e($user->name); ?></h4>
                <p><strong>Email:</strong> <?php echo e($user->email); ?></p>
                <p><strong>Role:</strong> <?php echo e(ucfirst($user->role)); ?></p>
                <p><strong>Joined On:</strong> <?php echo e($user->created_at->format('d M Y')); ?></p>
            </div>
            <div class="col-md-6 text-md-end">
                <p><strong>Last Updated:</strong> <?php echo e($user->updated_at->format('d M Y')); ?></p>
                <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Edit User
                </a>
            </div>
        </div>

        <!-- Allergy Information -->
        <div class="mb-4">
            <h5>Allergy Information</h5>
            <?php if($user->allergies->isEmpty()): ?>
            <p>No allergies found for this user.</p>
            <?php else: ?>
            <ul class="list-group list-group-flush">
                <?php $__currentLoopData = $user->allergies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allergy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="list-group-item"><?php echo e($allergy->name); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <?php endif; ?>
        </div>

        <!-- Order Summary -->
        <div class="row mb-4">
            <div class="col-md-6">
                <h5>Order Summary</h5>
                <p><strong>Total Orders:</strong> <?php echo e($user->orders->count()); ?></p>
                <p><strong>Total Amount Paid:</strong> $<?php echo e(number_format($user->orders->sum('total_price'), 2)); ?></p>
            </div>
        </div>

        <!-- Order History DataTable -->
        <h5 class="mb-3">Order History</h5>
        <?php if($user->orders->isEmpty()): ?>
        <p>No orders placed by this user.</p>
        <?php else: ?>
        <div class="table-responsive">
            <table id="ordersTable" class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Total Amount</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $user->orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($order->id); ?></td>
                        <td><?php echo e($order->created_at->format('d M Y')); ?></td>
                        <td>$<?php echo e(number_format($order->total_price, 2)); ?></td>

                        <td>
                            <a href="<?php echo e(route('admin.orders.show', $order->id)); ?>" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> View Details
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
    new DataTable('#ordersTable');
    $(document).ready(function() {
        $('#ordersTable').DataTable({
            "responsive": true,
            "order": [[0, 'desc']],
            "pageLength": 10,
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\abbas\OneDrive\Desktop\ShopMain\shop\resources\views/admin/user/details.blade.php ENDPATH**/ ?>