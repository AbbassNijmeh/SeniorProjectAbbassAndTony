<?php $__env->startSection('body'); ?>

<nav class="breadcrumb-container" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.index')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Reviews</li>
    </ol>
</nav>

<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Customer Reviews</h5>
        </div>
        <div class="card-body">
            <table id="reviewsTable" class="table table-striped table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Product</th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($review->id); ?></td>
                        <td><a href="<?php echo e(route('users.show', $review->user->id)); ?>" class="text-decoration-none"><?php echo e($review->user->name); ?></a></td>
                        <td><a href="<?php echo e(route('products.show', $review->product->id)); ?>" class="text-decoration-none"><?php echo e($review->product->name); ?></a></td>
                        <td><?php echo str_repeat('⭐', $review->rating); ?></td>
                        <td><?php echo e(Str::limit($review->comment, 50)); ?></td>
                        <td><?php echo e($review->created_at->format('d M Y')); ?></td>
                        <td>
                            <form action="<?php echo e(route('reviews.destroy', $review->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Product</th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Date</th>
                        <th>Actions</th>
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
        $('#reviewsTable').DataTable({
            responsive: true,
            "order": [[0, "desc"]]
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\abbas\OneDrive\Desktop\ShopMain\shop\resources\views/admin/review/index.blade.php ENDPATH**/ ?>