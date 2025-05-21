<?php $__env->startSection('body'); ?>
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <ol class="breadcrumb">
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.index')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Products</li>
    </ol>
</nav>

<div class="container-fluid">
    <div class="d-flex justify-content-between mb-3">
        <h5>Product List</h5>
        <a href="<?php echo e(route('products.create')); ?>" class="btn btn-success">Add Product</a>
    </div>

    <table id="example" class="display responsive border text-center small">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Cost Price</th>
                <th>Selling Price</th>
                <th>Stock</th>
                <th>Discount</th>
                <th>Discount Start</th>
                <th>Discount End</th>
                <th>Barcode</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="text-center <?php echo e($product->stock_quantity < 10 ? 'table-danger' : ''); ?>">
                <td class="num"><?php echo e($product->id); ?></td>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->category->name); ?></td>
                <td><?php echo e($product->cost_price); ?></td>
                <td><?php echo e($product->price); ?></td>
                <td <?php if($product->stock_quantity < 10): ?> class="table-danger" <?php endif; ?>><?php echo e($product->stock_quantity); ?>


                </td>
                <td><?php echo e($product->discount); ?></td>
                <td><?php echo e($product->discount_start); ?></td>
                <td><?php echo e($product->discount_end); ?></td>
                <td><?php echo e($product->barcode); ?></td>
                <td>
                    <div class="d-flex justify-content-center gap-2" id="product-buttons">
                        <a class="btn btn-primary text-light" href="<?php echo e(route('products.show', $product->id)); ?>">View</a>
                        <button type="button" class="btn btn-warning restock-btn" data-id="<?php echo e($product->id); ?>"
                            data-name="<?php echo e($product->name); ?>" data-toggle="modal" data-target="#restockModal">
                            Restock
                        </button>
                    </div>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Cost Price</th>
                <th>Selling Price</th>
                <th>Stock</th>
                <th>Discount</th>
                <th>Discount Start</th>
                <th>Discount End</th>
                <th>Barcode</th>
                <th>Actions</th>
            </tr>
        </tfoot>
    </table>
</div>

<!-- Restock Modal -->
<div class="modal fade" id="restockModal" tabindex="-1" aria-labelledby="restockModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="restockModalLabel">Restock Product</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <form id="restockForm" action="<?php echo e(route('products.restock')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" id="restockProductId" name="product_id">
                <div class="modal-body">
                    <p id="restockProductName"></p>
                    <label for="restockQuantity" class="form-label">Quantity to Add</label>
                    <input type="number" class="form-control" id="restockQuantity" name="quantity" required min="1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Restock</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    // Using event delegation on the document to handle all clicks
    document.addEventListener('click', function (event) {
        if (event.target && event.target.classList.contains('restock-btn')) {
            const productId = event.target.getAttribute('data-id');
            const productName = event.target.getAttribute('data-name');

            // Update modal with the product info
            document.getElementById('restockProductId').value = productId;
            document.getElementById('restockProductName').textContent = "Restocking: " + productName;
        }
    });


    // DataTable initialization for the table
    new DataTable('#example');

    });
</script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\abbas\OneDrive\Desktop\ShopMain\shop\resources\views/admin/product/index.blade.php ENDPATH**/ ?>