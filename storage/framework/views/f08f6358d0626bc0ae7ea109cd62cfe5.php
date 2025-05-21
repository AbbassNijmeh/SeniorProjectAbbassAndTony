<?php $__env->startSection('body'); ?>
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <ol class="breadcrumb">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.index')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('products.index')); ?>">Products</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add Product</li>
    </ol>
</nav>
<div class="container-fluid">
    <div class="card p-4">
        <h5 class="mb-3">Add New Product</h5>
        <form id="productForm" action="<?php echo e(route('products.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Product Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Category</label>
                    <select class="form-control" name="category_id" required>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Cost Price</label>
                    <input type="number" step="0.01" class="form-control" name="cost_price" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Selling Price</label>
                    <input type="number" step="0.01" class="form-control" name="price" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Stock Quantity</label>
                    <input type="number" class="form-control" name="stock_quantity" required>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Brand</label>
                    <input type="text" class="form-control" name="brand">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Discount</label>
                    <input type="number" step="0.01" class="form-control" name="discount">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Discount Start Date</label>
                    <input type="date" class="form-control" name="discount_start">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Discount End Date</label>
                    <input type="date" class="form-control" name="discount_end">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Barcode</label>
                    <input type="text" class="form-control" name="barcode">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Expiration Date</label>
                    <input type="date" class="form-control" name="expiration_date">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Weight</label>
                    <input type="number" step="0.01" class="form-control" name="weight">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Dimensions</label>
                    <input type="text" class="form-control" name="dimensions">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Aisle</label>
                    <input type="text" class="form-control" name="aisle">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Section</label>
                    <input type="text" class="form-control" name="section">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Floor</label>
                    <input type="number" class="form-control" name="floor">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">Product Image</label>
                    <input type="file" class="form-control" name="image">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ingredients" class="form-label">Select Ingredients</label>
                    <select class="form-control select2" id="ingredients" name="ingredients[]" multiple>
                        <?php $__currentLoopData = $ingredients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ingredient): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($ingredient->id); ?>"><?php echo e($ingredient->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Save Product</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script>
    $(document).ready(function() {
    // Initialize Select2 for ingredients
       $(document).ready(function () {
        $('.select2').select2({
            tags: true,
            tokenSeparators: [','],
            placeholder: "Enter or select ingredients",
            allowClear: true
        });
    });
});

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\abbas\OneDrive\Desktop\ShopMain\shop\resources\views/admin/product/create.blade.php ENDPATH**/ ?>