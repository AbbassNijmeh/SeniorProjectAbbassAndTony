<?php $__env->startSection('body'); ?>
<section class="hero-wrap hero-wrap-2" style="background-image: url(<?php echo e(asset('assets/img/bg-1.jpg')); ?>);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-9 ftco-animate mb-5 text-center">
                <p class="breadcrumbs mb-0">
                    <span class="mr-2"><a href="<?php echo e(route('home')); ?>">Home <i class="fa fa-chevron-right"></i></a></span>
                    <span>Allergies <i class="fa fa-chevron-right"></i></span>
                </p>
                <h2 class="mb-0 bread">Manage My Allergies</h2>
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-lg">
                <div class="card-body p-4">
                    <h4 class="mb-4">Select Your Allergies</h4>
                    <form action="<?php echo e(route('user.allergies.update')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('POST'); ?>

                        <div class="form-group">
                            <label for="allergies">Allergies:</label>
                            <select name="allergies[]" id="allergies" class="form-control select2" multiple>
                                <?php $__currentLoopData = $allergies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allergy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($allergy->id); ?>" <?php echo e(in_array($allergy->id, $userAllergies) ? 'selected' : ''); ?>>
                                        <?php echo e($allergy->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
                    </form>

                    <?php if(count($userAllergies)): ?>
                        <div class="mt-4">
                            <h6>Currently Selected:</h6>
                            <?php $__currentLoopData = $allergies->whereIn('id', $userAllergies); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <span class="badge badge-info mr-1 mb-1"><?php echo e($a->name); ?></span>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<script>
    $(document).ready(function() {
        $('#allergies').select2({
            placeholder: 'Select your allergies',
            allowClear: true,
            width: '100%'
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\abbas\OneDrive\Desktop\ShopMain\shop\resources\views/site/allergies.blade.php ENDPATH**/ ?>