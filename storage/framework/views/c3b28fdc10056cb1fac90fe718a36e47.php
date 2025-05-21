<?php $__env->startSection('body'); ?>
<nav style="--breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <ol class="breadcrumb">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.index')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Categories</li>
    </ol>
</nav>

<div class="container-fluid">
    <!-- Add Category Button -->
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addCategoryModal">
        + Add Category
    </button>

    <table id="example" class="display responsive bcategory text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Image</th>
                <th>Total Products</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-center">
                <td><?php echo e($category->id); ?></td>
                <td><?php echo e($category->name); ?></td>
                <td> <img src="<?php echo e(asset('storage/' . $category->image)); ?>" alt="<?php echo e($category->name); ?>"
                        class="img-thumbnail" style="max-width: 100px; height: auto;"></td>
                <td><?php echo e($category->products_count); ?></td>
                <td><?php echo e($category->created_at->format('d M Y')); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Image</th>
                <th>Total products</th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <form action="<?php echo e(route('categories.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="category_name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Category Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
    new DataTable('#example');
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\abbas\OneDrive\Desktop\ShopMain\shop\resources\views/admin/category/index.blade.php ENDPATH**/ ?>