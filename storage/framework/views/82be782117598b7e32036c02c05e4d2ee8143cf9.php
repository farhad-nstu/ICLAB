
<?php $__env->startSection('title', 'Edit Role'); ?>
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
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.create')): ?>
                                    <a href="<?php echo e(route('role.create')); ?>" class="btn btn-primary waves-effect waves-light">Add
                                        New</a>
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.show')): ?>
                                    <a href="<?php echo e(route('role.index')); ?>" class="btn btn-primary waves-effect waves-light">Role
                                        List</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('role.update', $role->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Role name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="name"
                                        class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name"
                                        placeholder="Role name" value="<?php echo e(old('name', $role->name)); ?>" required>
                                    <?php echo $errors->first('name', '<span class="invalid-feedback">:message</span>'); ?>

                                </div>
                            </div>
                            <?php echo $__env->make('layouts.components.select', [
                                'wrap' => 'col-md-6',
                                'field' => 'guard_name',
                                'label' => 'Guard Name',
                                'id' => 'guard',
                                'placeholder' => 'Select Guard',
                                'values' => $guards,
                                'current_value' => request()->guard ? request()->guard : $role->guard_name,
                                'value_type' => 'indexed',
                                'event' => 'onchange',
                                'function' => 'selectPermissions(event)',
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <?php if(count($group_permissions) > 0): ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <div class="form-group edit_all">
                                        <label for="name">Permisions</label>
                                        <div class="form-check">
                                            <input readonly type="checkbox" readonly class="form-check-input"
                                                id="edit_checkPermissionAll" value="1"
                                                <?php echo e($checking ? (HasPermissions($role, $all_permissions) ? 'checked' : '') : ''); ?>>
                                            <label class="form-check-label" for="edit_checkPermissionAll">All</label>
                                        </div>
                                        <hr>
                                        <?php $i=1; ?>
                                        <?php $__currentLoopData = $group_permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $group_permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input readonly type="checkbox" class="form-check-input"
                                                            id="edit_<?php echo e($i); ?>management"
                                                            value="<?php echo e($key); ?>"
                                                            onclick="edit_checkPermissionByGroup('edit_role-<?php echo e($i); ?>-management-checkbox', this)"
                                                            <?php echo e($checking ? (HasPermissions($role, $group_permission) ? 'checked' : '') : ''); ?>>
                                                        <label class="form-check-label"
                                                            for="edit_checkPermission"><?php echo e(ucwords($key)); ?></label>
                                                    </div>
                                                </div>

                                                <div class="col-9 edit_role-<?php echo e($i); ?>-management-checkbox">
                                                    <div class="row">
                                                        <?php $__currentLoopData = $group_permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div class="col-md-3">
                                                                <div class="form-check">
                                                                    <input readonly type="checkbox" class="form-check-input"
                                                                        name="permissions[]"
                                                                        id="edit_checkPermission<?php echo e($permission->id); ?>"
                                                                        value="<?php echo e($permission->name); ?>"
                                                                        onclick="edit_checkSinglePermission('edit_role-<?php echo e($i); ?>-management-checkbox','edit_<?php echo e($i); ?>management','<?php echo e(count($group_permission)); ?>')"
                                                                        <?php echo e($checking ? ($role->hasPermissionTo($permission->name) ? 'checked' : '') : ''); ?>>
                                                                    <label class="form-check-label"
                                                                        for="edit_checkPermission<?php echo e($permission->id); ?>">
                                                                        <?php
                                                                            $permision_name = isset(explode('.', $permission->name)[1]) ? explode('.', $permission->name)[1] : '';
                                                                        ?>
                                                                        <?php echo e(ucwords($permision_name)); ?>

                                                                    </label>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <hr>
                                                </div>
                                            </div>
                                            <?php  $i++; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.edit')): ?>
                                <button class="btn btn-primary" type="submit">Submit Changes</button>
                            <?php endif; ?>
                        </div>
                    </form>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div> <!-- end col -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        function selectPermissions(event) {
            var targetUrl = "<?php echo e(route('role.edit', $role->id)); ?>";
            const guard = event.target.value;
            const name = document.getElementById('name').value;
            const url = targetUrl + '?guard=' + guard + '&name=' + name;
            window.location.href = url;
        }
        /**
         * Check all the permissions
         */
        $("#edit_checkPermissionAll").click(function() {
            if ($(this).is(':checked')) {
                // check all the checkbox
                $('input[type=checkbox]').prop('checked', true);
            } else {
                // un check all the checkbox
                $('input[type=checkbox]').prop('checked', false);
            }
        });

        function edit_checkPermissionByGroup(className, checkThis) {
            const groupIdName = $("#" + checkThis.id);
            const classCheckBox = $('.' + className + ' input');
            if (groupIdName.is(':checked')) {
                classCheckBox.prop('checked', true);
            } else {
                classCheckBox.prop('checked', false);
            }
            edit_implementAllChecked();
        }

        function edit_checkSinglePermission(groupClassName, groupID, countTotalPermission) {
            const classCheckbox = $('.' + groupClassName + ' input');
            const groupIDCheckBox = $("#" + groupID);
            // if there is any occurance where something is not selected then make selected = false
            if ($('.' + groupClassName + ' input:checked').length == countTotalPermission) {
                groupIDCheckBox.prop('checked', true);
            } else {
                groupIDCheckBox.prop('checked', false);
            }
            edit_implementAllChecked();
        }

        function edit_implementAllChecked() {
            const countPermissions = <?php echo e(count($all_permissions)); ?>;
            const countPermissionGroups = <?php echo e(count($group_permissions)); ?>;
            console.log(countPermissionGroups)
            if ($('.edit_all input:checked').length >= (countPermissions + countPermissionGroups)) {
                $("#edit_checkPermissionAll").prop('checked', true);
            } else {
                $("#edit_checkPermissionAll").prop('checked', false);
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\iclab\resources\views/layouts/admin/pages/roles/edit.blade.php ENDPATH**/ ?>