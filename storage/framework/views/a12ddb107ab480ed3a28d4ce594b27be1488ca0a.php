
<?php $__env->startSection('title', 'Change Password'); ?>
<?php $__env->startPush('style'); ?>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title"><?php echo $__env->yieldContent('title'); ?></h4>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-wrap gap-2 float-end">
                                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-light waves-effect"><i
                                        class="fas-light fas fa-angle-double-left"></i> Back</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <?php if(\Session::has('reset_password')): ?>
                                <div class="alert alert-danger">
                                    <p><?php echo \Session::get('reset_password'); ?></p>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>
                    <form method="POST" action="<?php echo e(route('user.update.password', $id)); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PATCH'); ?>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="mb-3">
                                    <label for="current_password" class="form-label">Current Password <span
                                            class="text-danger">*</span></label>
                                    <input type="password" name="current_password"
                                        class="form-control <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="current_password" placeholder="Enter current password" required>
                                    <?php echo $errors->first('current_password', '<span class="invalid-feedback">:message</span>'); ?>

                                </div>
                                <div class="mb-3">
                                    <label for="new_password" class="form-label">New Password <span
                                            class="text-danger">*</span></label>
                                    <input type="password" name="new_password"
                                        class="form-control <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="new_password"
                                        placeholder="Enter new password" required>
                                    <?php echo $errors->first('new_password', '<span class="invalid-feedback">:message</span>'); ?>

                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password <span
                                            class="text-danger">*</span></label>
                                    <input type="password" name="password_confirmation"
                                        class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="password_confirmation" placeholder="Enter confirm password" required>
                                    <?php echo $errors->first('password_confirmation', '<span class="invalid-feedback">:message</span>'); ?>

                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Submit Changes</button>
                        </div>
                    </form>
                </div> <!-- end card-body -->
            </div><!-- end card -->
        </div> <!-- end col -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        const get_photo = (e) => {
            const avatar = URL.createObjectURL(e.target.files[0]);
            $("#" + e.target.id + "_output").attr("src", avatar);
        }
    </script>
    <?php if($errors->any()): ?>
        <script>
            const status = "<?php echo e(old('status')); ?>";
            $("#status1").val(status);
        </script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\iclab\resources\views/layouts/pages/users/change_password.blade.php ENDPATH**/ ?>