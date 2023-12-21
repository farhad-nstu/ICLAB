
<?php $__env->startSection('title', 'Role List'); ?>
<?php $__env->startPush('style'); ?>
    <style>
        .table-hd-bg {
            background: #0576b9;
            color: #fff;
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('body'); ?>
    <div class="row">
        <div class="col-12">
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
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="GET" action="<?php echo e(url()->current()); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <hr>
                            </div>
                            <?php echo $__env->make('layouts.components.select', [
                                'wrap' => 'col-md-6',
                                'field' => 'guard',
                                'id' => 'guard',
                                'placeholder' => 'Select Guard',
                                'values' => $guards,
                                'current_value' => request()->guard,
                                'value_type' => 'indexed',
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <hr>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr class="table-hd-bg">
                                <th>#</th>
                                <th>Name</th>
                                <th>action</th>
                            </tr>
                        </thead>


                        <tbody>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->index + 1); ?></td>
                                    <td><?php echo e($role->name); ?></td>
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role.edit')): ?>
                                            <a href="<?php echo e(route('role.edit', $role->id)); ?>" class="btn btn-info"><i
                                                    class="fas fa-edit"></i></a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                </div>
                <!-- end card-body -->
            </div>
            <!-- end card -->
        </div> <!-- end col -->
    </div> <!-- end row -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\iclab\resources\views/layouts/admin/pages/roles/index.blade.php ENDPATH**/ ?>