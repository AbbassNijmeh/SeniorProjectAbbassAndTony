<?php $__env->startSection('body'); ?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.index')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
    </ol>
</nav>

<div class="container-fluid">
    <!-- Add User Button -->
    <div class="d-flex justify-content-between mb-3">
        <h5>User List</h5>
        <a href="<?php echo e(route('users.create')); ?>" class="btn btn-success rounded-pill px-4 py-2 shadow-sm">
            <i class="fas fa-plus-circle"></i> Add New User
        </a>
    </div>

    <!-- Users Table -->
    <div class="table-responsive">
        <table id="users-table" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Email</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td>
                        <span class="badge
                            <?php if($user->role == 'admin'): ?> badge-primary
                            <?php elseif($user->role == 'delivery'): ?> badge-info text-white
                            <?php else: ?> badge-secondary <?php endif; ?>">
                            <?php echo e(ucfirst($user->role)); ?>

                        </span>
                    </td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->created_at->format('d M Y h:i:s')); ?></td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <!-- View Button -->
                            <a href="<?php echo e(route('users.show', $user->id)); ?>" class="btn btn-primary" title="View">
                                <i class="fas fa-eye"></i>
                            </a>

                            <!-- Edit Button -->
                            <a href="<?php echo e(route('users.edit', $user->id)); ?>" class="btn btn-warning" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>

                            <!-- Delete Button with Modal Trigger -->
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#deleteModal<?php echo e($user->id); ?>" title="Delete" <?php if($user->id === auth()->id()
                                ||
                                ($user->isAdmin() && \App\Models\User::where('role', 'admin')->count() <= 1) || ($user->
                                    isDelivery() && \App\Models\User::where('role', 'delivery')->count() <= 1)): ?> disabled
                                        <?php endif; ?>>
                                        <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>

                        <!-- Delete Confirmation Modal -->
                        <div class="modal fade" id="deleteModal<?php echo e($user->id); ?>" tabindex="-1" role="dialog"
                            aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure you want to delete user <strong><?php echo e($user->name); ?></strong>?</p>
                                        <?php if($user->isAdmin()): ?>
                                        <div class="alert alert-warning">
                                            <i class="fas fa-exclamation-triangle"></i> This is an administrator
                                            account.
                                        </div>
                                        <?php elseif($user->isDelivery()): ?>
                                        <div class="alert alert-info">
                                            <i class="fas fa-truck"></i> This is a delivery account.
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <form action="<?php echo e(route('users.destroy', $user->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger">Delete User</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

<?php $__env->stopSection(); ?>



<?php $__env->startPush('script'); ?>


<script>
    $(document).ready(function() {
        new DataTable('#users-table');

    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\abbas\OneDrive\Desktop\ShopMain\shop\resources\views/admin/user/index.blade.php ENDPATH**/ ?>