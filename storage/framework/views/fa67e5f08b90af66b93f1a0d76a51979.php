<?php $__env->startSection('body'); ?>
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
    aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard.index')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo e(route('users.index')); ?>">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">Add User</li>
    </ol>
</nav>

<div class="container-fluid">
    <div class="card p-4">
        <h5 class="mb-3">Add New User</h5>
        <form action="<?php echo e(route('users.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="row">
                <!-- Name Field -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name"
                        value="<?php echo e(old('name')); ?>" required>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Email Field -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email"
                        value="<?php echo e(old('email')); ?>" required>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <!-- Password Field -->
                <div class="col-md-6 mb-3 position-relative">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password"
                        id="password" required>
                    <i class="fas fa-eye-slash position-absolute" id="toggle-password"
                        style="top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;"></i>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <small class="form-text text-muted">
                        Password must be at least 8 characters long and contain:
                        <ul>
                            <li>One uppercase letter</li>
                            <li>One lowercase letter</li>
                            <li>One number</li>
                            <li>One special character (optional)</li>
                        </ul>
                    </small>
                </div>

                <!-- Confirm Password Field -->
                <div class="col-md-6 mb-3 position-relative">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        name="password_confirmation" id="password_confirmation" required>
                    <i class="fas fa-eye-slash position-absolute" id="toggle-password-confirm"
                        style="top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;"></i>
                    <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Role Field -->
                <div class="col-md-6 mb-3">
                    <label class="form-label">Role</label>
                    <select class="form-control <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="role" required>
                        <option value="user" <?php echo e(old('role')=='user' ? 'selected' : ''); ?>>User</option>
                        <option value="admin" <?php echo e(old('role')=='admin' ? 'selected' : ''); ?>>Admin</option>
                    </select>
                    <?php $__errorArgs = ['role'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Allergies Field (Select2) -->
                <div class="col-md-6 mb-3">
                    <label for="allergies" class="form-label">Select Allergies</label>
                    <select class="form-control select2" id="allergies" name="allergies[]" multiple>
                        <?php $__currentLoopData = $allergies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allergy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($allergy->id); ?>" <?php echo e(in_array($allergy->id, old('allergies', [])) ? 'selected'
                            : ''); ?>>
                            <?php echo e($allergy->name); ?>

                        </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['allergies'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

            </div>

            <button type="submit" class="btn btn-success">Save User</button>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
    $(document).ready(function() {
        $('#toggle-password').on('click', function() {
            var passwordField = $('#password');
            var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
            passwordField.attr('type', type);

            // Toggle the eye icon
            $(this).toggleClass('fa-eye fa-eye-slash');
        });

        // Toggle confirm password visibility
        $('#toggle-password-confirm').on('click', function() {
            var passwordFieldConfirm = $('#password_confirmation');
            var type = passwordFieldConfirm.attr('type') === 'password' ? 'text' : 'password';
            passwordFieldConfirm.attr('type', type);

            // Toggle the eye icon
            $(this).toggleClass('fa-eye fa-eye-slash');
        });

       $('.select2').select2({
            placeholder: "Select allergies",
            allowClear: true
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\abbas\OneDrive\Desktop\ShopMain\shop\resources\views/admin/user/create.blade.php ENDPATH**/ ?>